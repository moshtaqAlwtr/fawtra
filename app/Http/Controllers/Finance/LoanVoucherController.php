<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoanVoucher;
use App\Models\ChartOfAccount;
use App\Models\Tax;
use App\Models\Treasury;
use Carbon\Carbon;

class LoanVoucherController extends Controller
{
    /**
     * عرض جميع سندات القرض.
     */
    public function index(Request $request)
    {
        // بداية الاستعلام
        $query = LoanVoucher::query();

        // تحقق إذا كان هناك قيمة مرفقة بـ 'id' في الطلب
        if ($request->has('loan_id') && $request->input('loan_id') != '') {
            $query->where('loan_id', $request->input('loan_id'));
        }

        if ($request->has('loan_type') && $request->input('loan_type') != '') {
            $query->where('loan_type', $request->input('loan_type'));
        }

        if ($request->has('status') && $request->input('status') != '') {
            $query->where('status', $request->input('status'));
        }

        if ($request->has('date') && $request->input('date') != '') {
            $query->whereDate('date', $request->input('date'));
        }

        // تنفيذ الاستعلام وجلب النتائج
        $loanVouchers = $query->with(['treasury', 'account', 'details'])->get();

        // بيانات أخرى
        $accounts = ChartOfAccount::all();
        $stats = [
            'last_7_days' => LoanVoucher::where('voucher_date', '>=', now()->subDays(7))->sum('amount'),
            'last_30_days' => LoanVoucher::where('voucher_date', '>=', now()->subDays(30))->sum('amount'),
            'last_365_days' => LoanVoucher::where('voucher_date', '>=', now()->subDays(365))->sum('amount'),
        ];

        // تجهيز محتوى الصفحة
        $content = view('fawtra.14-Finance_Module.loan_vouchers', [
            'loanVouchers' => $loanVouchers,
            'accounts' => $accounts,
            'stats' => $stats
        ])->render();

        return view('layouts.nav-slider-route', [
            'page' => 'loan_vouchers',
            'content' => $content
        ]);
    }

    public function search(Request $request)
    {
        $query = LoanVoucher::query();

        if ($request->has('code') && $request->code != '') {
            $query->where('code', 'like', '%' . $request->code . '%');
        }

        if ($request->has('loan_type') && $request->loan_type != 'أي نوع') {
            $query->where('loan_type', $request->loan_type);
        }

        if ($request->has('status') && $request->status != 'الكل') {
            $query->where('status', $request->status);
        }

        if ($request->has('borrower_name') && $request->borrower_name != '') {
            $query->where('borrower_name', 'like', '%' . $request->borrower_name . '%');
        }

        if ($request->has('amount-more') && $request->input('amount-more') != '') {
            $query->where('amount', '>', $request->input('amount-more'));
        }

        if ($request->has('amount-less') && $request->input('amount-less') != '') {
            $query->where('amount', '<', $request->input('amount-less'));
        }

        if ($request->has('date-range-from') && $request->input('date-range-from') != '') {
            $query->whereDate('voucher_date', '>=', $request->input('date-range-from'));
        }

        if ($request->has('date-range-to') && $request->input('date-range-to') != '') {
            $query->whereDate('voucher_date', '<=', $request->input('date-range-to'));
        }

        $loanVouchers = $query->get();

        return view('layouts.nav-slider-route', [
            'page' => 'loan_vouchers',
            'loanVouchers' => $loanVouchers,
        ]);
    }

    /**
     * عرض نموذج إنشاء سند قرض جديد.
     */
    public function create()
    {
        $accounts = ChartOfAccount::with('childAccounts')->get();
        $treasuries = Treasury::all();

        return view('layouts.nav-slider-route', [
            'page' => 'loan_voucher_create',
            'accounts' => $accounts,
            'treasuries' => $treasuries,
        ]);
    }

    /**
     * تخزين سند قرض جديد.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'voucher_date' => 'required|date',
            'borrower_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
            'account_id' => 'required|exists:chart_of_accounts,id',
            'treasury_id' => 'required|exists:treasuries,id',
            'attachment' => 'nullable|file|max:2048',
            'repayment_date' => 'required|date|after:voucher_date',
            'interest_rate' => 'nullable|numeric|min:0',
            'loan_type' => 'required|string|max:50',
            'details' => 'array',
            'details.*.description' => 'nullable|string|max:255',
            'details.*.amount' => 'nullable|numeric|min:0',
        ]);

        if ($request->hasFile('attachment')) {
            $validatedData['attachment'] = $request->file('attachment')->store('attachments', 'public');
        }

        $loanVoucher = LoanVoucher::create($validatedData);

        if ($request->has('details')) {
            $filteredDetails = array_filter($request->details, function ($detail) {
                return !empty($detail['description']);
            });

            if (!empty($filteredDetails)) {
                $loanVoucher->details()->createMany($filteredDetails);
            }
        }

        return redirect()->route('loan_vouchers.index')
            ->with('success', 'تمت إضافة سند القرض بنجاح!');
    }

    /**
     * عرض تفاصيل سند قرض.
     */
    public function show(LoanVoucher $loanVoucher)
    {
        $loanVoucher->load('account', 'treasury');
        return view('loan_vouchers.show', compact('loanVoucher'));
    }

    /**
     * عرض نموذج تعديل سند قرض.
     */
    public function edit(LoanVoucher $loanVoucher)
    {
        $accounts = ChartOfAccount::all();
        $treasuries = Treasury::all();

        return view('loan_vouchers.edit', compact('loanVoucher', 'accounts', 'treasuries'));
    }

    /**
     * تحديث بيانات سند قرض.
     */
    public function update(Request $request, LoanVoucher $loanVoucher)
    {
        $validatedData = $request->validate([
            'voucher_date' => 'required|date',
            'borrower_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
            'account_id' => 'required|exists:chart_of_accounts,id',
            'treasury_id' => 'required|exists:treasuries,id',
            'attachment' => 'nullable|file|max:2048',
            'repayment_date' => 'required|date|after:voucher_date',
            'interest_rate' => 'nullable|numeric|min:0',
            'loan_type' => 'required|string|max:50',
        ]);

        if ($request->hasFile('attachment')) {
            $validatedData['attachment'] = $request->file('attachment')->store('attachments', 'public');
        }

        $loanVoucher->update($validatedData);

        return redirect()->route('loan_vouchers.index')
            ->with('success', 'تم تحديث سند القرض بنجاح!');
    }

    /**
     * حذف سند قرض.
     */
    public function destroy(LoanVoucher $loanVoucher)
    {
        $loanVoucher->delete();

        return redirect()->route('loan_vouchers.index')
            ->with('success', 'تم حذف سند القرض بنجاح!');
    }

    public function getStatistics()
    {
        $last7Days = Carbon::now()->subDays(7);
        $last30Days = Carbon::now()->subDays(30);
        $last365Days = Carbon::now()->subDays(365);

        $stats = [
            'last_7_days' => LoanVoucher::where('voucher_date', '>=', $last7Days)->sum('amount'),
            'last_30_days' => LoanVoucher::where('voucher_date', '>=', $last30Days)->sum('amount'),
            'last_365_days' => LoanVoucher::where('voucher_date', '>=', $last365Days)->sum('amount'),
        ];

        return view('layouts.nav-slider-route', [
            'page' => 'loan_vouchers',
            'stats' => $stats,
        ]);
    }
}
