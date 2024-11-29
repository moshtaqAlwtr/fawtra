<?php
namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\ReceiptVoucher;
use App\Models\PaymentVoucherDetail;
use App\Models\Employee;
use App\Models\Transaction;
use App\Models\Account;
use App\Models\Treasury;
use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceiptController extends Controller
{
    /**
     * عرض جميع السندات
     */
    public function index()
    {
        // جلب السندات مع جميع العلاقات المطلوبة
        $receipts = ReceiptVoucher::with([
            'paymentVoucherDetail',
            'employee',
            'account',
            'treasury',
            'entry',
        ])->get();

        // عرض البيانات في العرض
        return view('layouts.nav-slider-route', [
            'page' => 'add_receipt',
            'receipts' => $receipts,
            'accounts' => Account::all(),
            'employees' => Employee::all(),
            'treasuries' => Treasury::all(),
            'paymentVoucherDetails' => PaymentVoucherDetail::all(),
            'entries' => Entry::all(),
        ]);
    }

    /**
     * عرض نموذج إنشاء سند جديد
     */
    public function create()
    {
        $paymentVoucherDetails = PaymentVoucherDetail::all();
        $employees = Employee::all();
        return view('layouts.nav-slider-route', [
            'page' => 'add_receipt',
            'receipts' => $receipts,

            'employees' => Employee::all(),
            'treasuries' => Treasury::all(),
            'paymentVoucherDetails' => PaymentVoucherDetail::all(),
            'entries' => Entry::all(),
        ]);
    }


    /**
     * تخزين السند الجديد
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validated = $request->validate([
            'code' => 'required|unique:receipts,code',
            'amount' => 'nullable|numeric',
            'date' => 'nullable|date',
            'unit' => 'nullable|string',
            'category' => 'nullable|string',
            'seller' => 'nullable|exists:employees,id',
            'warehouse' => 'nullable|string',
            'notes' => 'nullable|string',
            'reference' => 'nullable|string',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // جلب الحساب من القيود
        $account = Account::where('type', 'restriction')->first();

        // إنشاء السند
        $receipt = new Receipt();
        $receipt->code = $request->code;
        $receipt->amount = $request->amount;
        $receipt->description = $request->description;
        $receipt->currency = $request->currency ?? 'SAR';
        $receipt->date = $request->date;
        $receipt->payment_detail_id = $request->payment_detail_id;
        $receipt->employee_id = $request->seller;
        $receipt->warehouse = $request->warehouse;
        $receipt->account_id = $account->id;
        $receipt->notes = $request->notes;
        $receipt->reference = $request->reference;

        // التعامل مع المرفقات إذا كانت موجودة
        if ($request->hasFile('attachment')) {
            $path = $request->file('attachment')->store('attachments', 'public');
            $receipt->attachment = $path;
        }

        // حفظ السند
        $receipt->save();

        return redirect()->route('receipts.index')->with('success', 'تم إضافة السند بنجاح!');
    }

    /**
     * عرض تفاصيل السند
     */
    public function show($id)
    {
        $receipt = Receipt::with(['paymentVoucherDetail', 'employee'])->findOrFail($id);
        return view('fawtra.14fcdcdc.account.receipts.show', compact('receipt'));
    }

    /**
     * عرض نموذج تعديل السند
     */
    public function edit($id)
    {
        $receipt = Receipt::findOrFail($id);
        $paymentVoucherDetails = PaymentVoucherDetail::all();
        $employees = Employee::all();
        return view('fawtra.14fcdcdc.account.receipts.edit', compact('receipt', 'paymentVoucherDetails', 'employees'));
    }

    /**
     * تحديث السند
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'code' => 'required|unique:receipts,code,' . $id,
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'payment_detail_id' => 'required|exists:payment_voucher_details,id',
            'employee_id' => 'required|exists:employees,id',
        ]);

        $receipt = Receipt::findOrFail($id);
        $receipt->code = $request->code;
        $receipt->amount = $request->amount;
        $receipt->description = $request->description;
        $receipt->currency = $request->currency ?? 'SAR';
        $receipt->date = $request->date;
        $receipt->payment_detail_id = $request->payment_detail_id;
        $receipt->employee_id = $request->employee_id;
        $receipt->save();

        return redirect()->route('receipts.index')->with('success', 'تم تحديث السند بنجاح!');
    }

    /**
     * حذف السند
     */
    public function destroy($id)
    {
        $receipt = Receipt::findOrFail($id);
        $receipt->delete();

        return redirect()->route('receipts.index')->with('success', 'تم حذف السند بنجاح!');
    }

    // --- إضافة دوال مالية جديدة --- //

    /**
     * عرض المدفوعات المالية
     */
    public function showPayments()
    {
        $payments = Transaction::where('type', 'payment')->get();
        return view('fawtra.14fcdcdc.account.payments.index', compact('payments'));
    }

    /**
     * إضافة معاملة دفع جديدة
     */
    public function addPayment(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $payment = new Transaction();
        $payment->amount = $request->amount;
        $payment->payment_method = $request->payment_method;
        $payment->date = $request->date;
        $payment->description = $request->description;
        $payment->type = 'payment';
        $payment->save();

        return redirect()->route('payments.index')->with('success', 'تم إضافة الدفع بنجاح!');
    }

    /**
     * عرض المعاملات المالية
     */
    public function showTransactions()
    {
        $transactions = Transaction::all();
        return view('fawtra.14fcdcdc.account.transactions.index', compact('transactions'));
    }

    /**
     * إنشاء تحويل مالي
     */
    public function createTransfer(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'from_account' => 'required|string',
            'to_account' => 'required|string',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $transaction = new Transaction();
        $transaction->amount = $request->amount;
        $transaction->from_account = $request->from_account;
        $transaction->to_account = $request->to_account;
        $transaction->date = $request->date;
        $transaction->description = $request->description;
        $transaction->type = 'transfer';
        $transaction->save();

        return redirect()->route('transactions.index')->with('success', 'تم إجراء التحويل المالي بنجاح!');
    }

    /**
     * عرض تقرير التدقيق المالي
     */
    public function showFinancialAudit()
    {
        $transactions = Transaction::all();
        $payments = Transaction::where('type', 'payment')->get();
        $receipts = Receipt::all();

        return view('fawtra.14fcdcdc.account.audit.index', compact('transactions', 'payments', 'receipts'));
    }
}
