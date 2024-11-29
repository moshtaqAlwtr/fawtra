<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Client;
use App\Models\InvoiceItem;
use App\Models\Employee;  // Make sure to include the Employee model
use PDF;
use Mail;

class InvoiceController extends Controller
{
    /**
     * عرض جميع الفواتير
     */
    public function index(Request $request)
    {
        // جلب جميع الفواتير مع العميل والموظف
        $invoices = Invoice::with(['client', 'employee'])->get();

        return view('layouts.nav-slider-route', [
            'page' => 'invoice-management',
            'invoices' => $invoices
        ]);
    }
    /**
     * Display the form to create a new invoice.
     */
    public function create()
    {
        $clients = Client::all();
        $employees = Employee::all(); // Fetch all employees

        return view('layouts.nav-slider-route', [
            'page' => 'salas_invoice',
            'invoices' => $invoices
        ]);
    }

    /**
     * تخزين فاتورة جديدة
     */
    public function store(Request $request)
{
    // التحقق من صحة البيانات
    $validated = $request->validate([
        'payment_status' => 'required|string',
        'client_id' => 'required|exists:clients,id',
        'invoice_date' => 'required|date',
        'employee_id' => 'required|exists:employees,employee_id',
        'items.*.item' => 'required|string',
        'items.*.unit_price' => 'required|numeric|min:0',
        'items.*.quantity' => 'required|numeric|min:1',
        'items.*.total' => 'nullable|numeric',
    ]);

    // إنشاء الفاتورة
    $invoice = new Invoice();
    $invoice->client_id = $request->client_id;
    $invoice->invoice_date = $request->invoice_date;
    $invoice->payment_status = $request->payment_status;
    $invoice->employee_id = $request->employee_id;
    $invoice->sales_manager = $request->sales_manager ?? null;
    $invoice->issue_date = $request->issue_date;
    $invoice->payment_terms = $request->payment_terms;
    $invoice->grand_total = array_sum(array_column($request->items, 'total'));
    $invoice->save();

    // إضافة عناصر الفاتورة
    foreach ($request->items as $item) {
        $invoiceItem = new InvoiceItem();
        $invoiceItem->invoice_id = $invoice->id;
        $invoiceItem->item = $item['item'];
        $invoiceItem->description = $item['description'];
        $invoiceItem->unit_price = $item['unit_price'];
        $invoiceItem->quantity = $item['quantity'];
        $invoiceItem->discount = $item['discount'];
        $invoiceItem->discount_type = $item['discount_type'];
        $invoiceItem->tax_1 = $item['tax1'];
        $invoiceItem->tax_2 = $item['tax2'];
        $invoiceItem->total = $item['total'];
        $invoiceItem->save();
    }

    // العودة إلى صفحة عرض الفاتورة
    return redirect()->route('invoice-management.show', ['invoice' => $invoice])
                     ->with('success', __('sales_invoice.invoice_saved'));
}


    /**
     * عرض تفاصيل فاتورة معينة
     */
    // public function show(Invoice $invoice)  // استخدم Implicit Binding
    // {
    //     return view('layouts.nav-slider-route', [
    //         'page' => 'invoice-management',
    //         'invoice' => $invoice
    //     ]);
    // }



    /**
     * تعديل الفاتورة
     */
    public function edit($id)
    {
        $invoice = Invoice::with('items')->findOrFail($id);
        $clients = Client::all();
        return view('invoices.edit', compact('invoice', 'clients'));
    }

    /**
     * تحديث فاتورة
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'invoice_date' => 'required|date',
            'items' => 'required|array',
            'items.*.description' => 'required|string|max:255',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        $invoice = Invoice::findOrFail($id);
        $invoice->update([
            'client_id' => $validatedData['client_id'],
            'invoice_date' => $validatedData['invoice_date'],
        ]);

        $invoice->items()->delete();
        $total = 0;

        foreach ($validatedData['items'] as $item) {
            $invoice->items()->create($item);
            $total += $item['quantity'] * $item['price'];
        }

        $invoice->update(['total' => $total]);

        return redirect()->route('invoices.index')->with('success', 'تم تحديث الفاتورة بنجاح.');
    }

    /**
     * حذف فاتورة
     */
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->invoice_items()->delete();
        $invoice->delete();

        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
    }

    /**
     * إضافة ضريبة وخصم
     */
    public function addTaxAndDiscount(Request $request, $id)
    {
        $validated = $request->validate([
            'tax' => 'nullable|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
        ]);

        $invoice = Invoice::findOrFail($id);
        $total = $invoice->items->sum(function ($item) {
            return $item->quantity * $item->price;
        });

        $total += $validated['tax'] ?? 0;
        $total -= $validated['discount'] ?? 0;

        $invoice->update([
            'tax' => $validated['tax'],
            'discount' => $validated['discount'],
            'total' => $total,
        ]);

        return redirect()->route('invoices.index')->with('success', 'تم تحديث الضريبة والخصومات بنجاح.');
    }

    /**
     * إنشاء تقرير فواتير
     */
    public function generateReport(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'client_id' => 'nullable|exists:clients,id',
        ]);

        $query = Invoice::whereBetween('invoice_date', [$validated['start_date'], $validated['end_date']]);

        if ($request->filled('client_id')) {
            $query->where('client_id', $validated['client_id']);
        }

        $invoices = $query->with('client')->get();

        return view('invoices.report', compact('invoices', 'validated'));
    }

    /**
     * إرسال الفاتورة بالبريد الإلكتروني
     */
    public function sendToClient($id)
    {
        $invoice = Invoice::with('client')->findOrFail($id);

        $pdf = PDF::loadView('invoices.pdf', compact('invoice'));

        Mail::send([], [], function ($message) use ($invoice, $pdf) {
            $message->to($invoice->client->email)
                ->subject('Invoice #' . $invoice->id)
                ->attachData($pdf->output(), 'invoice-' . $invoice->id . '.pdf');
        });

        return redirect()->route('invoices.index')->with('success', 'تم إرسال الفاتورة إلى العميل بنجاح.');
    }

    /**
     * طباعة الفاتورة كملف PDF
     */
    public function print($id)
    {
        $invoice = Invoice::with(['client', 'invoice_items'])->findOrFail($id);

         // تحميل الـ Blade لعرض الفاتورة وتحويلها إلى PDF
         $pdf = PDF::loadView('fawtra.2-purchase_admin.invoice.invoice_print', compact('invoice'));

         // تحميل الـ PDF
         return $pdf->download('invoice-' . $invoice->id . '.pdf');
     }

    /**
     * فلترة الفواتير
     */
    public function filter(Request $request)
    {
        $query = Invoice::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('client_id')) {
            $query->where('client_id', $request->client_id);
        }

        $invoices = $query->with('client')->get();

        return view('invoices.filter', compact('invoices'));
    }
}
