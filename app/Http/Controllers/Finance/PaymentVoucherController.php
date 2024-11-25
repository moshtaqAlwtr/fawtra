<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentVoucher;
use App\Models\PaymentVoucherDetail; // لإدارة تفاصيل السند
use App\Models\ChartOfAccount; // الحسابات
use App\Models\Tax; // الضرا��ب
use App\Models\Treasury; // الخزا��ن
class PaymentVoucherController extends Controller
{
    /**
     * عرض قائمة السندات.
     */

     private function fetchSharedData()
     {
         $accounts = ChartOfAccount::with('childAccounts')->get(); // جلب الحسابات
         $treasuries = Treasury::all(); // جلب الخزائن
         $taxes = Tax::all(); // جلب الضرائب

         return [
             'accounts' => $accounts,
             'treasuries' => $treasuries,
             'taxes' => $taxes,
         ];
     }

    public function index()
    {
        // جلب سندات الصرف
        $paymentVouchers = PaymentVoucher::with('details')->get();
        $taxs = Tax::get();
        // جلب الحسابات
        $accounts = ChartOfAccount::with('childAccounts')->get();
        return view('layouts.nav-slider-route', [
            'page' => 'import_expense_receipts',
            'paymentVouchers' => $paymentVouchers,
            'accounts' => $accounts,
            'taxes'=>$taxs
        ]);
    }


    /**
     * عرض نموذج إضافة سند صرف جديد.
     */

     public function create(Request $request)
     {
        $taxs = Tax::get();

         $data = $this->fetchSharedData();
        //  if ($request->isMethod('POST')) {
         // التأكد من أن البيانات تم جلبها بشكل صحيح
         if (empty($data['treasuries']) || empty($data['taxes']) || empty($data['accounts'])) {
             return redirect()->back()->withErrors(['error' => 'لا توجد بيانات كافية لعرض الصفحة.']);
         }

         return view('layouts.nav-slider-route', array_merge($data, [
             'page' => 'expense_voucher',
             'taxes'=>$taxs
         ]));
     }



    /**
     * حفظ سند صرف جديد مع التفاصيل.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'date' => 'required|date',
        'payee_name' => 'required|string|max:255',
        'amount' => 'required|numeric|min:0',
        'description' => 'nullable|string|max:255',
        'account_id' => 'required|exists:chart_of_accounts,id',
        'treasury_id' => 'required|exists:treasuries,id', // التحقق من الخزينة
        'attachment' => 'nullable|file|max:2048',
        'details' => 'required|array',
        'details.*.unit' => 'required|string|max:50',
        'details.*.amount' => 'required|numeric|min:0',
        'details.*.category' => 'nullable|string|max:50',
        'details.*.tax_id' => 'nullable|exists:taxes,id',
        'details.*.description' => 'nullable|string|max:255',
    ]);

    if ($request->hasFile('attachment')) {
        $validatedData['attachment'] = $request->file('attachment')->store('attachments', 'public');
    }

    $paymentVoucher = PaymentVoucher::create($validatedData);
    $paymentVoucher->details()->createMany($request->details);

    return redirect()->route('payment_vouchers.index')
        ->with('success', 'تمت إضافة سند الصرف بنجاح!');
}
   /**
     * عرض تفاصيل سند صرف.
     */
    public function show(PaymentVoucher $paymentVoucher)
    {
        // تحميل العلاقات المرتبطة
        $paymentVoucher->load('details', 'account');

        $accounts = ChartOfAccount::with('childAccounts')->get();

        return view('layouts.nav-slider-route', [
            'page' => 'import_expense_receipts',
            'paymentVoucher' => $paymentVoucher,
            'accounts' => $accounts,
        ]);
    }

    /**
     * عرض نموذج تعديل سند صرف.
     */
    public function edit(PaymentVoucher $paymentVoucher)
{
    $accounts = ChartOfAccount::with('childAccounts')->get();
    $treasuries = Treasury::all(); // جلب جميع الخزائن
    // جلب جميع الخزائن
    $taxes = Tax::all(); // جلب جميع الضرائب

    return view('layouts.nav-slider-route', [
        'page' => 'expense_voucher',
        'paymentVoucher' => $paymentVoucher,
        'accounts' => $accounts,
        'treasuries' => $treasuries,
        'taxes' => $taxes,
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
            'treasury_id' => 'required|exists:treasuries,id', // التحقق من الخزينة
            'attachment' => 'nullable|file|max:2048',
            'details' => 'required|array',
            'details.*.unit' => 'required|string|max:50',
            'details.*.amount' => 'required|numeric|min:0',
            'details.*.category' => 'nullable|string|max:50',
            'details.*.tax_id' => 'nullable|exists:taxes,id',
            'details.*.description' => 'nullable|string|max:255',
        ]);

        // تحديث المرفق إذا وجد
        if ($request->hasFile('attachment')) {
            $validatedData['attachment'] = $request->file('attachment')->store('attachments', 'public');
        }

        // تحديث السند
        $paymentVoucher->update($validatedData);

        // تحديث التفاصيل
        $paymentVoucher->details()->delete(); // حذف التفاصيل القديمة
        $paymentVoucher->details()->createMany($request->details); // إضافة التفاصيل الجديدة

        return redirect()->route('payment_vouchers.index')
            ->with('success', 'تم تحديث سند الصرف بنجاح!');
    }

    /**
     * حذف سند الصرف.
     */
    public function destroy(PaymentVoucher $paymentVoucher)
    {
        $paymentVoucher->delete();

        return redirect()->route('payment_vouchers.index')
            ->with('success', 'تم حذف سند الصرف بنجاح!');
    }
}
