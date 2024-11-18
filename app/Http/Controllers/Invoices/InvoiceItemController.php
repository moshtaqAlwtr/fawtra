<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the invoices.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::with('items')->get();
        return view('invoices.index', compact('invoices'));
        return view('layouts.nav-slider-route', [
            'page' => 'sales_invoice', // اسم الصفحة المرتبطة بالعرض
            'invoices' => $invoices,

            'iteminvoices' => $iteminvoices,
        ]);
    }

    /**
     * Show the form for creating a new invoice.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = \App\Models\Client::all();
        return view('invoices.create', compact('clients'));
    }

    /**
     * Store a newly created invoice in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,client_id',
            'invoice_date' => 'required|date',
            'payment_terms' => 'nullable|string',
            'sales_manager' => 'nullable|string',
            'issue_date' => 'nullable|date',
            'items' => 'required|array',
            'items.*.description' => 'nullable|string',
            'items.*.unit_price' => 'required|numeric',
            'items.*.quantity' => 'required|integer',
            'items.*.discount' => 'nullable|numeric',
            'items.*.tax1' => 'nullable|numeric',
            'items.*.tax2' => 'nullable|numeric',
            'items.*.total' => 'required|numeric',
        ]);

        // إنشاء الفاتورة
        $invoice = Invoice::create([
            'client_id' => $request->client_id,
            'invoice_date' => $request->invoice_date,
            'payment_terms' => $request->payment_terms,
            'sales_manager' => $request->sales_manager,
            'issue_date' => $request->issue_date,
        ]);

        // حفظ البنود المرتبطة بالفاتورة
        foreach ($request->items as $item) {
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'description' => $item['description'],
                'unit_price' => $item['unit_price'],
                'quantity' => $item['quantity'],
                'discount' => $item['discount'],
                'tax_1' => $item['tax1'],
                'tax_2' => $item['tax2'],
                'total' => $item['total'],
            ]);
        }

        return redirect()->route('invoices.index')->with('success', 'Invoice and items created successfully!');
    }

    /**
     * Display the specified invoice.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        $invoice->load('items');
        return view('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified invoice.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        $clients = \App\Models\Client::all();
        $invoice->load('items');
        return view('invoices.edit', compact('invoice', 'clients'));
    }

    /**
     * Update the specified invoice in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,client_id',
            'invoice_date' => 'required|date',
            'payment_terms' => 'nullable|string',
            'sales_manager' => 'nullable|string',
            'issue_date' => 'nullable|date',
            'items' => 'required|array',
            'items.*.description' => 'nullable|string',
            'items.*.unit_price' => 'required|numeric',
            'items.*.quantity' => 'required|integer',
            'items.*.discount' => 'nullable|numeric',
            'items.*.tax1' => 'nullable|numeric',
            'items.*.tax2' => 'nullable|numeric',
            'items.*.total' => 'required|numeric',
        ]);

        // تحديث بيانات الفاتورة
        $invoice->update([
            'client_id' => $request->client_id,
            'invoice_date' => $request->invoice_date,
            'payment_terms' => $request->payment_terms,
            'sales_manager' => $request->sales_manager,
            'issue_date' => $request->issue_date,
        ]);

        // حذف البنود القديمة
        $invoice->items()->delete();

        // إضافة البنود الجديدة
        foreach ($request->items as $item) {
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'description' => $item['description'],
                'unit_price' => $item['unit_price'],
                'quantity' => $item['quantity'],
                'discount' => $item['discount'],
                'tax_1' => $item['tax1'],
                'tax_2' => $item['tax2'],
                'total' => $item['total'],
            ]);
        }

        return redirect()->route('invoices.index')->with('success', 'Invoice and items updated successfully!');
    }

    /**
     * Remove the specified invoice from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully!');
    }
}
