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
    public function index()
    {
        // جلب جميع المدفوعات مع العلاقات المطلوبة
        $payments = ClientPayment::with(['client', 'invoice', 'treasury', 'employee'])->paginate(10);
        $clients = Client::with('invoices')->get();// العملاء والفواتير
        $treasuries = Treasury::all(); // الخزائن
        $employees = Employee::all(); // الموظفون
$invoices=Invoice::all();

        // إرسال جميع البيانات إلى العرض
        return view('layouts.nav-slider-route', [
            'page' => 'add_payment_process',
            'payments' => $payments,
            'clients' => $clients,

            'treasuries' => $treasuries,
            'employees' => $employees,
        ]);
    }
        // عرض صفحة إنشاء دفعة جديدة
        public function create()
{
    $clients = Client::all();
    $invoices = Invoice::all();
    $treasuries = Treasury::all();
    $employees = Employee::all();

    if ($clients->isEmpty() || $treasuries->isEmpty() || $employees->isEmpty()) {
        return redirect()->route('payments.index')->with('error', 'لا توجد بيانات كافية.');
    }

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
        'client_id' => 'required|exists:clients,id',
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
