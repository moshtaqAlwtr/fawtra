<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentVoucher;
use App\Models\ChartOfAccount; // لإحضار الحسابات

class PaymentVoucherController extends Controller
{
    /**
     * عرض قائمة السندات.
     */
    public function index()
    {
        // جلب المصروفات
        // $expenses = Expense::all();

        // جلب سندات الصرف
        $paymentVouchers = PaymentVoucher::all();

        // جلب الحسابات
        $accounts = ChartOfAccount::with('childAccounts')->get();
        dd($expenses, $paymentVouchers);
        // تمرير البيانات إلى View
        return view('layouts.nav-slider-route', [
            'page' => 'import_expense_receipts',
            // 'expenses' => $expenses,
            'paymentVouchers' => $paymentVouchers,

        ]);
    }

    /**
     * عرض نموذج إضافة سند صرف جديد.
     */
    public function create()
    {
        $accounts = ChartOfAccount::with('childAccounts')->get();
        dd($accounts);
        // جلب الحسابات
        return view('layouts.nav-slider-route', [
            'page' => 'expense_voucher',
            'accounts' => $accounts,
        ]);
    }

    /**
     * حفظ سند صرف جديد.
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'date' => 'required|date',
            'payee_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
            'account_id' => 'required|exists:chart_of_accounts,id',
            'attachment' => 'nullable|file|max:2048',
            'unit' => 'nullable|string|max:50',
            'vendor' => 'nullable|string|max:50',
            'seller' => 'nullable|string|max:50',
            'category' => 'nullable|string|max:50',
            'min_limit' => 'nullable|integer|min:0',
            'code_number' => 'required|string|max:50',
        ]);

        // حفظ المرفق إذا وجد
        if ($request->hasFile('attachment')) {
            $validatedData['attachment'] = $request->file('attachment')->store('attachments', 'public');
        }

        // إنشاء السند
        PaymentVoucher::create($validatedData);

        // جلب الحسابات من قاعدة البيانات
        $accounts = ChartOfAccount::with('childAccounts')->get();
dd($accounts);


        // إعادة التوجيه إلى الصفحة مع الحسابات
        return redirect()->route('payment_vouchers.index', compact('accounts'))
            ->with('success', 'تمت إضافة سند الصرف بنجاح!');
    }
        /**
     * عرض نموذج تعديل سند صرف.
     */
    public function edit(PaymentVoucher $paymentVoucher)
    {
        // جلب الحسابات لعرضها في القائمة المنسدلة
        $accounts = ChartOfAccount::all();
        return view('layouts.nav-slider-route', [
            'page' => 'expense_voucher',
            'accounts' => $accounts,

        ]);
    }

    /**
     * تحديث بيانات سند الصرف.
     */
    public function update(Request $request, PaymentVoucher $paymentVoucher)
    {
        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'date' => 'required|date',
            'payee_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
            'account_id' => 'required|exists:chart_of_accounts,id',
            'attachment' => 'nullable|file|max:2048',
            'unit' => 'nullable|string|max:50',
            'vendor' => 'nullable|string|max:50',
            'seller' => 'nullable|string|max:50',
            'category' => 'nullable|string|max:50',
            'min_limit' => 'nullable|integer|min:0',
            'code_number' => 'required|string|max:50',
        ]);

        // تحديث المرفق إذا وجد
        if ($request->hasFile('attachment')) {
            $validatedData['attachment'] = $request->file('attachment')->store('attachments', 'public');
        }

        // تحديث السند
        $paymentVoucher->update($validatedData);

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('finance.payment_vouchers.index')
            ->with('success', 'تم تحديث سند الصرف بنجاح!');
    }

    /**
     * حذف سند الصرف.
     */
    public function destroy(PaymentVoucher $paymentVoucher)
    {
        $paymentVoucher->delete();
        return redirect()->route('finance.payment_vouchers.index')
            ->with('success', 'تم حذف سند الصرف بنجاح!');
    }
    /**
 * عرض تفاصيل سند صرف محدد.
 */
public function show(PaymentVoucher $paymentVoucher)
{
    // جلب الحساب المرتبط بسند الصرف
    $paymentVoucher->load('account'); // تحميل العلاقة مع الحساب
$expenses=Expense::all();
    // جلب الحسابات إذا كانت مطلوبة في العرض
    $accounts = ChartOfAccount::with('childAccounts')->get();

    // إعادة البيانات إلى الصفحة
    return view('layouts.nav-slider-route', [
        'page' => 'import_expense_receipts',
        'accounts' => $accounts,
        'expenses' => $expenses,
        'paymentVoucher' => $paymentVoucher,
    ]);
}

}
