<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentVoucher;
use App\Models\PaymentVoucherDetail;
use App\Models\ChartOfAccount;
use App\Models\Tax;
use App\Models\Treasury;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class PaymentVoucherController extends Controller
{
    /**
     * عرض جميع سندات الصرف.
     */
    public function index()
    {
        $paymentVouchers = PaymentVoucher::with('details', 'account', 'treasury')->get();
        $accounts = ChartOfAccount::with('childAccounts')->get();
        $taxes = Tax::all();

        return view('layouts.nav-slider-route', [
            'page' => 'import_expense_receipts',
            'paymentVouchers' => $paymentVouchers,
            'accounts' => $accounts,
            'taxes' => $taxes,
        ]);
    }

    /**
     * عرض نموذج إنشاء سند صرف جديد.
     */
    public function create()
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
        $validatedData = $request->validate([
            'date' => 'required|date',
            'payee_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
            'account_id' => 'required|exists:chart_of_accounts,id',
            'treasury_id' => 'required|exists:treasuries,id',
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
        $paymentVoucher->load('details', 'account', 'treasury');

        return view('layouts.nav-slider-route', [
            'page' => 'expense_voucher_details',
            'paymentVoucher' => $paymentVoucher,
        ]);
    }

    /**
     * عرض نموذج تعديل سند صرف.
     */
    public function edit(PaymentVoucher $paymentVoucher)
    {
        $accounts = ChartOfAccount::with('childAccounts')->get();
        $treasuries = Treasury::all();
        $taxes = Tax::all();

        return view('layouts.nav-slider-route', [
            'page' => 'expense_voucher',
            'paymentVoucher' => $paymentVoucher,
            'accounts' => $accounts,
            'treasuries' => $treasuries,
            'taxes' => $taxes,
        ]);
    }

    /**
     * تحديث بيانات سند صرف.
     */
    public function update(Request $request, PaymentVoucher $paymentVoucher)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'payee_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
            'account_id' => 'required|exists:chart_of_accounts,id',
            'treasury_id' => 'required|exists:treasuries,id',
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

        $paymentVoucher->update($validatedData);

        $paymentVoucher->details()->delete();
        $paymentVoucher->details()->createMany($request->details);

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

    /**
     * البحث عن سند صرف.
     */
    public function search(Request $request)
    {
        $query = PaymentVoucher::query();

        if ($request->filled('payee_name')) {
            $query->where('payee_name', 'LIKE', '%' . $request->payee_name . '%');
        }

        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }

        $paymentVouchers = $query->with('details')->get();

        return view('payment_vouchers.search_results', compact('paymentVouchers'));
    }

    /**
     * تصدير سند صرف إلى PDF.
     */
    public function exportToPDF($id)
    {
        $paymentVoucher = PaymentVoucher::with('details', 'account', 'treasury')->findOrFail($id);

        $pdf = PDF::loadView('payment_vouchers.pdf', compact('paymentVoucher'));

        return $pdf->download("payment_voucher_{$paymentVoucher->id}.pdf");
    }

    /**
     * تصدير سندات الصرف إلى Excel.
     */
    public function exportToExcel()
    {
        $paymentVouchers = PaymentVoucher::all();

        return Excel::download(new PaymentVouchersExport($paymentVouchers), 'payment_vouchers.xlsx');
    }

    /**
     * عرض الإحصائيات الخاصة بسندات الصرف.
     */
    public function statistics()
    {
        $statistics = [
            'total_vouchers' => PaymentVoucher::count(),
            'total_amount' => PaymentVoucher::sum('amount'),
        ];

        return response()->json($statistics);
    }

    /**
     * إلغاء سند الصرف.
     */
    public function cancel(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cancellation_reason' => 'required|string|max:255',
        ]);

        $paymentVoucher = PaymentVoucher::findOrFail($id);
        $paymentVoucher->update([
            'status' => 'cancelled',
            'cancellation_reason' => $validatedData['cancellation_reason'],
        ]);

        return redirect()->route('payment_vouchers.index')
            ->with('success', 'تم إلغاء سند الصرف بنجاح!');
    }

    /**
     * تطبيق خصم على سند الصرف.
     */
    public function addDiscount(Request $request, $id)
    {
        $validatedData = $request->validate([
            'discount' => 'required|numeric|min:0|max:100',
        ]);

        $paymentVoucher = PaymentVoucher::findOrFail($id);
        $newAmount = $paymentVoucher->amount - ($paymentVoucher->amount * $validatedData['discount'] / 100);
        $paymentVoucher->update(['amount' => $newAmount]);

        return redirect()->route('payment_vouchers.show', $id)
            ->with('success', 'تم تطبيق الخصم بنجاح.');
    }

    /**
     * عرض سندات الصرف المرتبطة بخزينة معينة.
     */
    public function filterByTreasury(Request $request)
    {
        $validatedData = $request->validate([
            'treasury_id' => 'required|exists:treasuries,id',
        ]);

        $paymentVouchers = PaymentVoucher::where('treasury_id', $validatedData['treasury_id'])->get();

        return view('payment_vouchers.filtered', compact('paymentVouchers'));
    }
}
