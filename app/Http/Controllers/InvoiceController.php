<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Client;
use App\Models\InvoiceItem;
use App\Models\Employee;  // Make sure to include the Employee model
use Barryvdh\DomPDF\Facade as PDF;

use Mail;

class InvoiceController extends Controller
{
    /**
     * Display all invoices.
     */
    public function index(Request $request)
    {
        // جلب جميع العملاء، الفواتير، والموظفين
        $clients = Client::all(); // Get all clients
        $invoices = Invoice::all(); // Get all invoices
        $employees = Employee::all();

        // إذا كانت هناك فاتورة جديدة تم إضافتها
        $newInvoice = session('new_invoice');

        // جلب رقم الفاتورة التالي
        $nextInvoiceId = (Invoice::max('invoice_id') ?? 0) + 1;

        // الحصول على المتغير 'page' من الرابط مع تعيين قيمة افتراضية 'management' إذا لم يكن موجودًا
        $page = $request->get('page', 'management');  // القيمة الافتراضية هي 'management'

        // إذا كانت الصفحة هي "إنشاء فاتورة جديدة"
        if ($page == 'create') {
            // إعادة التوجيه إلى صفحة إنشاء الفاتورة مع تمرير رقم الفاتورة التالي
            return redirect()->route('sales_invoice.create', ['nextInvoiceId' => $nextInvoiceId]);
        }

        // العودة إلى صفحة إدارة الفواتير مع تمرير جميع البيانات
        return view('layouts.nav-slider-route', [
            'page' => 'invoice-management',
            'clients' => $clients,
            'invoices' => $invoices,
            'employees' => $employees,
            'nextInvoiceId' => $nextInvoiceId,  // تأكد من تمرير هذا المتغير
            'newInvoice' => $newInvoice
        ]);
    }


        /**
     * Display the form to create a new invoice.
     */
    public function create()
    {
        $clients = Client::all();
        $employees = Employee::all(); // Fetch all employees
        $nextInvoiceId = (Invoice::max('invoice_id') ?? 0) + 1;  // Get the next invoice ID passed from the route
     return view('layouts.nav-slider-route', [
            'page' => 'sales_invoice',
            'clients' => $clients,

            'employees' => $employees,
            'nextInvoiceId' => $nextInvoiceId,

        ]);
    }

    /**
     * Store a new invoice.
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

        // حساب الإجمالي الكبير (Grand Total) باستخدام العناصر المرسلة في الطلب
        $grandTotal = 0;
        foreach ($request->items as $item) {
            $subtotal = $item['unit_price'] * $item['quantity']; // حساب المجموع الفرعي بدون خصم
            $discount = $item['discount'];

            // تطبيق الخصم بناءً على نوعه
            if ($item['discount_type'] === 'percentage') {
                $discount = ($subtotal * $item['discount']) / 100; // خصم نسبة مئوية
            }

            $total = $subtotal - $discount + $item['tax1'] + $item['tax2']; // الإجمالي بعد الخصم والضرائب
            $item['total'] = $total; // تحديث إجمالي العنصر

            // إضافة الإجمالي الكبير
            $grandTotal += $total;
        }

        // حفظ الفاتورة مع الإجمالي الكبير
        $invoice->grand_total = $grandTotal;
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
            $invoiceItem->total = $item['total']; // حفظ الإجمالي المحسوب
            $invoiceItem->save();
        }

        // إعادة التوجيه إلى صفحة إدارة الفواتير بعد حفظ الفاتورة
        return redirect()->route('invoice-management')->with([
            'success' => __('sales_invoice.invoice_saved'),
            'new_invoice' => $invoice // تمرير الفاتورة الجديدة إلى الواجهة
        ]);
    }


    /**
     * Display details for a specific invoice.
     */
    public function show($id)  // تمرير الـ ID من الـ Route
{
    // جلب الفاتورة باستخدام الـ ID مع روابط العلاقات (Client, Employee, Invoice Items)
    $invoice = Invoice::with('client', 'employee', 'invoice_items')->findOrFail($id);

    // تمرير الفاتورة إلى الـ View
    return view('layouts.nav-slider-route', [
        'page' => 'invoice-management',
        'invoice' => $invoice  // تمرير الفاتورة هنا
    ]);
}


    /**
     * Show the form to edit an invoice.
     */
    public function edit($id)
    {
        $invoice = Invoice::with('invoice_items')->findOrFail($id);
        $clients = Client::all();
        $employees = Employee::all(); // Fetch all employees for the edit form
        return view('invoices.edit', compact('invoice', 'clients', 'employees'));
    }

    /**
     * Update a specific invoice.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'invoice_date' => 'required|date',
            'employee_id' => 'required|exists:employees,employee_id', // Employee validation
            'items' => 'required|array',
            'items.*.description' => 'required|string|max:255',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        $invoice = Invoice::findOrFail($id);
        $invoice->update([
            'client_id' => $validatedData['client_id'],
            'invoice_date' => $validatedData['invoice_date'],
            'employee_id' => $validatedData['employee_id'], // Update the employee
        ]);

        // Delete old invoice items
        $invoice->invoice_items()->delete();
        $total = 0;

        // Add new items
        foreach ($validatedData['items'] as $item) {
            if (!isset($item['price'])) {
                return back()->withErrors(['items.*.price' => 'Price is required for each item'])->withInput();
            }

            $invoice->invoice_items()->create($item);
            $total += $item['quantity'] * $item['price'];
        }

        $invoice->update(['total' => $total]);

        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully.');
    }

    /**
     * Delete a specific invoice.
     */
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->invoice_items()->delete();  // حذف العناصر المرتبطة بالفاتورة
        $invoice->delete();  // حذف الفاتورة نفسها

        // إعادة التوجيه مع رسالة نجاح
        return view('layouts.nav-slider-route', [
            'page' => 'invoice-management',
            'invoice' => $invoice  // تمرير الفاتورة هنا
        ]);
    }

    /**
     * Add tax and discount to the invoice.
     */
    public function addTaxAndDiscount(Request $request, $id)
    {
        $validated = $request->validate([
            'tax' => 'nullable|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
        ]);

        $invoice = Invoice::findOrFail($id);
        $total = $invoice->invoice_items->sum(function ($item) {
            return $item->quantity * $item->price;
        });

        $tax = $validated['tax'] ?? 0;
        $discount = $validated['discount'] ?? 0;

        $total += $tax;
        $total -= $discount;

        $invoice->update([
            'tax' => $tax,
            'discount' => $discount,
            'total' => $total,
        ]);

        return redirect()->route('invoices.index')->with('success', 'Tax and discounts updated successfully.');
    }

    /**
     * Generate a report for invoices.
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
     * Send the invoice to the client via email.
     */
    public function sendToClient($id)
    {
        $invoice = Invoice::with('client')->findOrFail($id);

        if (!$invoice->client->email) {
            return redirect()->route('invoices.index')->with('error', 'No email address for this client.');
        }

        $pdf = PDF::loadView('invoices.pdf', compact('invoice'));

        Mail::send([], [], function ($message) use ($invoice, $pdf) {
            $message->to($invoice->client->email)
                ->subject('Invoice #' . $invoice->id)
                ->attachData($pdf->output(), 'invoice-' . $invoice->id . '.pdf');
        });

        return redirect()->route('invoices.index')->with('success', 'Invoice sent to client successfully.');
    }

    /**
     * Print the invoice as a PDF.
     */



     public function print($id)
     {
         // استرجاع الفاتورة باستخدام id
         $invoice = Invoice::with(['client', 'invoice_items'])->findOrFail($id);

         // تحميل الـ Blade لعرض الفاتورة وتحويلها إلى PDF
         $pdf = PDF::loadView('fawtra.2-purchase_admin.invoice.invoice_print', compact('invoice'));

         // تحميل الـ PDF
         return $pdf->download('invoice-' . $invoice->id . '.pdf');
     }

    /**
     * Filter invoices based on criteria.
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
