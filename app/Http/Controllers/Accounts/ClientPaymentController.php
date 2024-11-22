<?php
namespace App\Http\Controllers;

use App\Models\ClientPayment;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Treasury;
use App\Models\Employee;
use Illuminate\Http\Request;

class ClientPaymentController extends Controller
{
    // عرض صفحة إنشاء دفعة جديدة
    public function create()
    {
        $clients = Client::all();
        $invoices = Invoice::all();
        $treasuries = Treasury::where('status', 'Active')->get();
        $employees = Employee::where('status', 'Active')->get();

        return view('payments.create', compact('clients', 'invoices', 'treasuries', 'employees'));
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

        // تسجيل الدفعة
        $payment = ClientPayment::create($request->all());

        // تحديث رصيد الخزينة
        $treasury = Treasury::find($request->treasury_id);
        $treasury->balance -= $request->amount;
        $treasury->save();

        return redirect()->route('payments.index')->with('success', 'تمت إضافة الدفعة بنجاح!');
    }

    // عرض قائمة المدفوعات
    public function index()
    {
        $payments = ClientPayment::with(['client', 'invoice', 'treasury', 'employee'])->get();
        return view('payments.index', compact('payments'));
    }
}
