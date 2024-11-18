<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Client;

class InvoiceController extends Controller
{
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
    



    public function store(Request $request)
    {


        $validatedData = $request->validate([
         
            'client_id' => 'required|exists:clients,client_id',
            'invoice_date' => 'nullable|date',
            'sales_manager' => 'nullable|string|max:100',
            'issue_date' => 'nullable|date',
            'payment_terms' => 'nullable|string|max:255',
        ]);

        // تخزين البيانات
        Invoice::create($validatedData);

        // إعادة توجيه مع رسالة نجاح
        return redirect()->route('sales_invoice')->with('success', 'تم حفظ الفاتورة بنجاح.');
    }
}

