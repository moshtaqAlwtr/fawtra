<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentVoucher;
use App\Models\ChartOfAccount;
use App\Models\Tax;
use App\Models\Treasury;
   use Carbon\Carbon;

class PaymentVoucherController extends Controller
{
    /**
     * عرض جميع سندات الصرف.
     */
    public function index(Request $request)
    {
        // بداية الاستعلام
        $query = PaymentVoucher::query();

        // تحقق إذا كان هناك قيمة مرفقة بـ 'id' في الطلب
        if ($request->has('payment_id') && $request->input('payment_id') != '') {
            $query->where('payment_id', $request->input('payment_id'));  // تعديل هنا
        }

        // أضف شروط أخرى إذا كنت ترغب
        if ($request->has('category') && $request->input('category') != '') {
            $query->where('category', $request->input('category'));
        }

        if ($request->has('status') && $request->input('status') != '') {
            $query->where('status', $request->input('status'));
        }

        if ($request->has('date') && $request->input('date') != '') {
            $query->whereDate('date', $request->input('date'));
        }

        // تنفيذ الاستعلام وجلب النتائج
        $paymentVouchers = $query->get();  // تعديل هنا

        // بيانات أخرى
        $accounts = ChartOfAccount::all();
        $taxes = Tax::all();
        $stats = [
            'last_7_days' => PaymentVoucher::where('voucher_date', '>=', now()->subDays(7))->sum('amount'),
            'last_30_days' => PaymentVoucher::where('voucher_date', '>=', now()->subDays(30))->sum('amount'),
            'last_365_days' => PaymentVoucher::where('voucher_date', '>=', now()->subDays(365))->sum('amount'),
        ]; // Call the getStats method to get the stats data

        // إرجاع العرض مع البيانات
        return view('layouts.nav-slider-route', [
            'page' => 'import_expense_receipts',
            'paymentVouchers' => $paymentVouchers,
            'accounts' => $accounts,
            'taxes' => $taxes,
            'stats' => $stats, // Pass the $stats variable to the view
        ]);
    }


    public function search(Request $request)
    {
        // بناء استعلام البحث بناءً على المدخلات من الـ request
        $query = PaymentVoucher::query();

        // تحقق من الكود
        if ($request->has('code') && $request->code != '') {
            $query->where('code', 'like', '%' . $request->code . '%');
        }

        // تحقق من التصنيف
        if ($request->has('category') && $request->category != 'أي تصنيف') {
            $query->where('category', $request->category);
        }

        // تحقق من الحالة
        if ($request->has('status') && $request->status != 'الكل') {
            $query->where('status', $request->status);
        }

        // تحقق من التاريخ
        if ($request->has('date') && $request->date != '') {
            $query->whereDate('created_at', '=', $request->date);
        }

        // تحقق من الوصف
        if ($request->has('description') && $request->description != '') {
            $query->where('description', 'like', '%' . $request->description . '%');
        }

        // تحقق من المبلغ (أكثر من أو أقل من)
        if ($request->has('amount-more') && $request->amount-more != '') {
            $query->where('amount', '>', $request->amount-more);
        }
        if ($request->has('amount-less') && $request->amount-less != '') {
            $query->where('amount', '<', $request->amount-less);
        }

        // تحقق من الموظف الذي أضاف السند
        if ($request->has('added-by') && $request->added-by != 'أي موظف') {
            $query->where('added_by', $request->added-by);
        }

        // تحقق من الحساب الفرعي
        if ($request->has('account') && $request->account != 'أي حساب') {
            $query->where('account_id', $request->account);
        }

        // تحقق من البائع
        if ($request->has('salesman') && $request->salesman != 'أي بائع') {
            $query->where('salesman', $request->salesman);
        }

        // تحقق من تاريخ الإنشاء
        if ($request->has('date-range-from') && $request->date-range-from != '') {
            $query->whereDate('created_at', '>=', $request->date-range-from);
        }
        if ($request->has('date-range-to') && $request->date-range-to != '') {
            $query->whereDate('created_at', '<=', $request->date-range-to);
        }

        // تنفيذ الاستعلام وجلب النتائج
        $paymentVouchers = $query->get();

        // إعادة العرض مع البيانات التي تم العثور عليها
        return view('layouts.nav-slider-route', [
            'page' => 'import_expense_receipts',
            'paymentVouchers' => $paymentVouchers,  // تمرير النتائج للعرض
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
            'tax_id' => 'nullable|exists:taxes,id',
            'attachment' => 'nullable|file|max:2048',
            'details' => 'array', // التحقق إذا كانت التفاصيل موجودة
            'details.*.unit' => 'nullable|string|max:50',
            'details.*.amount' => 'nullable|numeric|min:0',
            'details.*.category' => 'nullable|string|max:50',

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
            'voucher_date' => 'required|voucher_date',
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
    public function getStatistics()
    {
        // حساب التواريخ
        $last7Days = Carbon::now()->subDays(7);
        $last30Days = Carbon::now()->subDays(30);
        $last365Days = Carbon::now()->subDays(365);

        // جلب البيانات من جدول سندات الصرف
        $stats = [
            'last_7_days' => PaymentVoucher::where('voucher_date', '>=', $last7Days)->sum('amount'),
            'last_30_days' => PaymentVoucher::where('voucher_date', '>=', $last30Days)->sum('amount'),
            'last_365_days' => PaymentVoucher::where('voucher_date', '>=', $last365Days)->sum('amount'),
        ];

        // إعادة البيانات إلى الواجهة
        return view('layouts.nav-slider-route', [
            'page' => 'import_expense_receipts', // الصفحة التي سيتم عرض البيانات فيها
            'stats' => $stats,
        ]);
    }

}
