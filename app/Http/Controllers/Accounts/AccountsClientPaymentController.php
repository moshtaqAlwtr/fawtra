<?php
namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;

use App\Models\ClientPayment;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Treasury;
use App\Models\Employee;
use Illuminate\Http\Request;

class AccountsClientPaymentController extends Controller
{
    // عرض صفحة إنشاء دفعة جديدة
    public function create()
    {
        $clients = Client::with(['invoices'])->get();
        $invoices = Invoice::with(['client'])->get();
        $treasuries = Treasury::all();
        $employees = Employee::all();
$dd($clients, $invoices, $treasuries, $employees);
        return view('layouts.nav-slider-route', [
            'page' => 'add_payment_process',
            'clients' => $clients,
            'invoices' => $invoices,
            'treasuries' => $treasuries,
            'employees' => $employees,
        ]);
    }
    // تخزين دفعة جديدة
    public function store(Request $request)
{
    $request->validate([
        'client_id' => 'required|exists:clients,client_id',
        'invoice_id' => 'required|exists:invoices,invoice_id',
        'treasury_id' => 'required|exists:treasuries,treasury_id',
        'employee_id' => 'required|exists:employees,employee_id',
        'payment_date' => 'required|date',
        'amount' => 'required|numeric|min:0',
        'payment_method' => 'required|in:Cash,Bank Transfer,Credit Card,Other',
    ]);

    // تخزين البيانات
    ClientPayment::create($request->all());

    return redirect()->route('payments.create')->with('success', 'تم إضافة الدفعة بنجاح!');
}

}
