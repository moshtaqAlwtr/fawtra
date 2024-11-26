<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentVoucher;
use App\Models\ChartOfAccount;
use App\Models\Tax;
use App\Models\Treasury;

class PaymentVoucherController extends Controller
{
    /**
     * عرض جميع سندات الصرف.
     */
    public function index()
    {
        // جلب البيانات المطلوبة من قواعد البيانات
        $paymentVouchers = PaymentVoucher::with('details', 'account', 'treasury')->get();
        $accounts = ChartOfAccount::with('childAccounts')->get();
        $taxes = Tax::all();

        // تمرير البيانات إلى واجهة العرض
        return view('layouts.nav-slider-route', [
            'page' => 'import_expense_receipts', // تحديد الصفحة ضمن القالب
            'paymentVouchers' => $paymentVouchers, // تمرير بيانات سندات الصرف
            'accounts' => $accounts, // تمرير بيانات الحسابات
            'taxes' => $taxes, // تمرير بيانات الضرائب
        ]);
    }


    /**
     * عرض نموذج إنشاء سند صرف جديد.
     */    public function create()
    {
        $accounts = ChartOfAccount::with('childAccounts')->get();
        $treasuries = Treasury::all();
        $taxes = Tax::all();

        return view('layouts.nav-slider-route', [
            'page' => 'expense_voucher',
            'accounts' => $accounts,
            'treasuries' => $treasuries,
            'taxes' => $taxes,
        ]);
    }

    /**
     * تخزين سند صرف جديد.
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات الأساسية
        $validatedData = $request->validate([
            'voucher_date' => 'required|date',
            'payee_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
            'account_id' => 'required|exists:chart_of_accounts,id',
            'treasury_id' => 'required|exists:treasuries,id',
            'attachment' => 'nullable|file|max:2048',
            'details' => 'array', // التحقق إذا كانت التفاصيل موجودة
            'details.*.unit' => 'nullable|string|max:50',
            'details.*.amount' => 'nullable|numeric|min:0',
            'details.*.category' => 'nullable|string|max:50',
            'details.*.tax_id' => 'nullable|exists:taxes,id',
            'details.*.description' => 'nullable|string|max:255',
        ]);

        // رفع المرفقات إذا وجدت
        if ($request->hasFile('attachment')) {
            $validatedData['attachment'] = $request->file('attachment')->store('attachments', 'public');
        }

        // إنشاء سند الصرف
        $paymentVoucher = PaymentVoucher::create($validatedData);

        // إذا كانت هناك تفاصيل، قم بإضافتها
        if ($request->has('details')) {
            $filteredDetails = array_filter($request->details, function ($detail) {
                return !empty($detail['unit']); // إضافة فقط التفاصيل التي تحتوي على وحدة
            });

            if (!empty($filteredDetails)) {
                $paymentVoucher->details()->createMany($filteredDetails);
            }
        }

        return redirect()->route('payment_vouchers.index')
            ->with('success', 'تمت إضافة سند الصرف بنجاح!');
    }

    /**
     * عرض تفاصيل سند صرف.
     */
    public function show(PaymentVoucher $paymentVoucher)
    {
        $paymentVoucher->load('account', 'treasury');

        return view('payment_vouchers.show', compact('paymentVoucher'));
    }

    /**
     * عرض نموذج تعديل سند صرف.
     */
    public function edit(PaymentVoucher $paymentVoucher)
    {
        $accounts = ChartOfAccount::all();
        $treasuries = Treasury::all();
        $taxes = Tax::all();

        return view('payment_vouchers.edit', compact('paymentVoucher', 'accounts', 'treasuries', 'taxes'));
    }

    /**
     * تحديث بيانات سند صرف.
     */
    public function update(Request $request, PaymentVoucher $paymentVoucher)
    {
        $validatedData = $request->validate([
            'voucher_date' => 'required|date',
            'payee_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
            'account_id' => 'required|exists:chart_of_accounts,id',
            'treasury_id' => 'required|exists:treasuries,id',
            'attachment' => 'nullable|file|max:2048',
        ]);

        // رفع المرفقات إذا وجدت
        if ($request->hasFile('attachment')) {
            $validatedData['attachment'] = $request->file('attachment')->store('attachments', 'public');
        }

        $paymentVoucher->update($validatedData);

        return redirect()->route('payment_vouchers.index')
            ->with('success', 'تم تحديث سند الصرف بنجاح!');
    }

    /**
     * حذف سند صرف.
     */
    public function destroy(PaymentVoucher $paymentVoucher)
    {
        $paymentVoucher->delete();

        return redirect()->route('payment_vouchers.index')
            ->with('success', 'تم حذف سند الصرف بنجاح!');
    }
}
