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
     * Display all invoices.
     */
    public function index()
    {
        $clients = Client::all(); // Get all clients
        $invoices = Invoice::all(); // Get all invoices
$employees = Employee::all();
        // Get the next invoice number
        $nextInvoiceId = (Invoice::max('invoice_id') ?? 0) + 1;

        return view('layouts.nav-slider-route', [
            'page' => 'sales_invoice',
            'clients' => $clients,
            'invoices' => $invoices,
            'employees' => $employees,
            'nextInvoiceId' => $nextInvoiceId,
        ]);
    }

    /**
     * Display the form to create a new invoice.
     */
    public function create()
    {
        $clients = Client::all();
        $employees = Employee::all(); // Fetch all employees
        return view('invoices.create', compact('clients', 'employees'));
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
            'employee_id' => 'required|exists:employees,employee_id', // التحقق من وجود الـemployee_id
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
        $invoice->employee_id = $request->employee_id; // تخزين الـemployee_id
        $invoice->sales_manager = $request->sales_manager ?? null; // حقل المدير يمكن أن يكون null
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

        // العودة إلى صفحة الفواتير مع رسالة نجاح
        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully!');
    }



    /**
     * Display details for a specific invoice.
     */
    public function show($id)
    {
        $invoice = Invoice::with(['client', 'invoice_items', 'employee'])->findOrFail($id);
        return view('invoices.show', compact('invoice'));
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
        $invoice->invoice_items()->delete();
        $invoice->delete();

        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
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
        $invoice = Invoice::with(['client', 'invoice_items'])->findOrFail($id);

        $pdf = PDF::loadView('invoices.pdf', compact('invoice'));

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
