<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Client;
use App\Models\InvoiceItem;
use PDF;
use Mail;

class InvoiceController extends Controller
{
    /**
     * عرض جميع الفواتير
     */
    public function index()
    {
        $clients = Client::all(); // جلب جميع العملاء
        $invoices = Invoice::all(); // جلب جميع الفواتير

        // احصل على رقم الفاتورة التالي
        $nextInvoiceId = Invoice::max('invoice_id') + 1;

        return view('layouts.nav-slider-route', [
            'page' => 'sales_invoice',
            'clients' => $clients,
            'invoices' => $invoices,
            'nextInvoiceId' => $nextInvoiceId
        ]);
    }
    /**
     * عرض نموذج إنشاء فاتورة جديدة
     */
    public function create()
    {
        $clients = Client::all();
        return view('invoices.create', compact('clients'));
    }

    /**
     * تخزين فاتورة جديدة
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'invoice_date' => 'required|date',
            'items' => 'required|array',
            'items.*.description' => 'required|string|max:255',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        $invoice = Invoice::create([
            'client_id' => $validatedData['client_id'],
            'invoice_date' => $validatedData['invoice_date'],
            'total' => 0, // سيتم حسابه لاحقًا
        ]);

        $total = 0;

        foreach ($validatedData['items'] as $item) {
            $invoice->items()->create($item);
            $total += $item['quantity'] * $item['price'];
        }

        $invoice->update(['total' => $total]);

        return redirect()->route('invoices.index')->with('success', 'تم إنشاء الفاتورة بنجاح.');
    }

    /**
     * عرض تفاصيل فاتورة معينة
     */
    public function show($id)
    {
        $invoice = Invoice::with(['client', 'items'])->findOrFail($id);
        return view('invoices.show', compact('invoice'));
    }

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
        $invoice->items()->delete();
        $invoice->delete();

        return redirect()->route('invoices.index')->with('success', 'تم حذف الفاتورة بنجاح.');
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
        $invoice = Invoice::with(['client', 'items'])->findOrFail($id);

        $pdf = PDF::loadView('invoices.pdf', compact('invoice'));

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
