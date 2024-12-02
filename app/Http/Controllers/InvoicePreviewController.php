<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoicePreviewController extends Controller
{
    public function show($id)
    {
        $invoice = Invoice::with(['client', 'invoice_items', 'payments', 'employee', 'customFields'])
            ->findOrFail($id);

        return view('fawtra.2-purchase_admin.invoice_preview', compact('invoice'));
    }
}
