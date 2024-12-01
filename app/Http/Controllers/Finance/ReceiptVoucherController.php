<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReceiptVoucher;
use App\Models\ChartOfAccount;
use App\Models\Tax;
use App\Models\Treasury;
use App\Models\Client;
use App\Models\Employee;
use Carbon\Carbon;

class ReceiptVoucherController extends Controller
{
    /**
     * عرض جميع سندات القبض.
     */
    public function index(Request $request)
    {
        // بداية الاستعلام
        $query = ReceiptVoucher::query();

        // تحقق إذا كان هناك قيمة مرفقة بـ 'id' في الطلب
        if ($request->has('receipt_id') && $request->input('receipt_id') != '') {
            $query->where('receipt_id', $request->input('receipt_id'));
        }

        if ($request->has('classification') && $request->input('classification') != '') {
            $query->where('classification', $request->input('classification'));
        }

        if ($request->has('client_id') && $request->input('client_id') != '') {
            $query->where('client_id', $request->input('client_id'));
        }

        if ($request->has('date') && $request->input('date') != '') {
            $query->whereDate('date', $request->input('date'));
        }

        // تنفيذ الاستعلام وجلب النتائج
        $receiptVouchers = $query->with(['treasury', 'client', 'account', 'employee'])->get();

        // بيانات أخرى
        $accounts = ChartOfAccount::all();
        $clients = Client::all();
        $employees = Employee::all();
        $treasuries = Treasury::all();
        $stats = [
            'last_7_days' => ReceiptVoucher::where('date', '>=', now()->subDays(7))->sum('amount'),
            'last_30_days' => ReceiptVoucher::where('date', '>=', now()->subDays(30))->sum('amount'),
            'last_365_days' => ReceiptVoucher::where('date', '>=', now()->subDays(365))->sum('amount'),
        ];

        // تجهيز محتوى الصفحة
        $content = view('fawtra.14-Finance_Module.receipt_vouchers', [
            'receiptVouchers' => $receiptVouchers,
            'accounts' => $accounts,
            'clients' => $clients,
            'employees' => $employees,
            'treasuries' => $treasuries,
            'stats' => $stats
        ])->render();

        return view('layouts.nav-slider-route', [
            'page' => 'receipt_vouchers',
            'content' => $content
        ]);
    }

    public function search(Request $request)
    {
        $query = ReceiptVoucher::query();

        if ($request->has('code') && $request->code != '') {
            $query->where('code', 'like', '%' . $request->code . '%');
        }

        if ($request->has('classification') && $request->classification != 'أي تصنيف') {
            $query->where('classification', $request->classification);
        }

        if ($request->has('client_id') && $request->client_id != '') {
            $query->where('client_id', $request->client_id);
        }

        if ($request->has('amount-more') && $request->input('amount-more') != '') {
            $query->where('amount', '>', $request->input('amount-more'));
        }

        if ($request->has('amount-less') && $request->input('amount-less') != '') {
            $query->where('amount', '<', $request->input('amount-less'));
        }

        if ($request->has('date-range-from') && $request->input('date-range-from') != '') {
            $query->whereDate('date', '>=', $request->input('date-range-from'));
        }

        if ($request->has('date-range-to') && $request->input('date-range-to') != '') {
            $query->whereDate('date', '<=', $request->input('date-range-to'));
        }

        if ($request->has('employee_id') && $request->employee_id != '') {
            $query->where('employee_id', $request->employee_id);
        }

        $receiptVouchers = $query->with(['treasury', 'client', 'account', 'employee'])->get();

        return view('layouts.nav-slider-route', [
            'page' => 'receipt_vouchers',
            'receiptVouchers' => $receiptVouchers,
        ]);
    }

    /**
     * عرض نموذج إنشاء سند قبض جديد.
     */
    public function create()
    {
        $accounts = ChartOfAccount::with('childAccounts')->get();
        $clients = Client::all();
        $employees = Employee::all();
        $treasuries = Treasury::all();

        return view('layouts.nav-slider-route', [
            'page' => 'receipt_voucher_create',
            'accounts' => $accounts,
            'clients' => $clients,
            'employees' => $employees,
            'treasuries' => $treasuries,
        ]);
    }

    /**
     * تخزين سند قبض جديد.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|string|unique:receipt_vouchers,code',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
            'currency' => 'required|string',
            'date' => 'required|date',
            'employee_id' => 'required|exists:employees,id',
            'treasury_id' => 'required|exists:treasuries,id',
            'classification' => 'required|exists:chart_of_accounts,id',
            'client_id' => 'required|exists:clients,id',
            'account_id' => 'required|exists:chart_of_accounts,id',
        ]);

        $receiptVoucher = ReceiptVoucher::create($validatedData);

        return redirect()->route('receipt_vouchers.index')
            ->with('success', 'تمت إضافة سند القبض بنجاح!');
    }

    /**
     * عرض تفاصيل سند قبض.
     */
    public function show(ReceiptVoucher $receiptVoucher)
    {
        $receiptVoucher->load(['account', 'treasury', 'client', 'employee']);
        return view('receipt_vouchers.show', compact('receiptVoucher'));
    }

    /**
     * عرض نموذج تعديل سند قبض.
     */
    public function edit(ReceiptVoucher $receiptVoucher)
    {
        $accounts = ChartOfAccount::all();
        $clients = Client::all();
        $employees = Employee::all();
        $treasuries = Treasury::all();

        return view('receipt_vouchers.edit', compact('receiptVoucher', 'accounts', 'clients', 'employees', 'treasuries'));
    }

    /**
     * تحديث بيانات سند قبض.
     */
    public function update(Request $request, ReceiptVoucher $receiptVoucher)
    {
        $validatedData = $request->validate([
            'code' => 'required|string|unique:receipt_vouchers,code,' . $receiptVoucher->id,
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
            'currency' => 'required|string',
            'date' => 'required|date',
            'employee_id' => 'required|exists:employees,id',
            'treasury_id' => 'required|exists:treasuries,id',
            'classification' => 'required|exists:chart_of_accounts,id',
            'client_id' => 'required|exists:clients,id',
            'account_id' => 'required|exists:chart_of_accounts,id',
        ]);

        $receiptVoucher->update($validatedData);

        return redirect()->route('receipt_vouchers.index')
            ->with('success', 'تم تحديث سند القبض بنجاح!');
    }

    /**
     * حذف سند قبض.
     */
    public function destroy(ReceiptVoucher $receiptVoucher)
    {
        $receiptVoucher->delete();

        return redirect()->route('receipt_vouchers.index')
            ->with('success', 'تم حذف سند القبض بنجاح!');
    }

    public function getStatistics()
    {
        $last7Days = Carbon::now()->subDays(7);
        $last30Days = Carbon::now()->subDays(30);
        $last365Days = Carbon::now()->subDays(365);

        $stats = [
            'last_7_days' => ReceiptVoucher::where('date', '>=', $last7Days)->sum('amount'),
            'last_30_days' => ReceiptVoucher::where('date', '>=', $last30Days)->sum('amount'),
            'last_365_days' => ReceiptVoucher::where('date', '>=', $last365Days)->sum('amount'),
        ];

        return view('layouts.nav-slider-route', [
            'page' => 'receipt_vouchers',
            'stats' => $stats,
        ]);
    }
}
