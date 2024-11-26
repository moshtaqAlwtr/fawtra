<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use App\Models\JournalEntryDetail;
use App\Models\ChartOfAccount;
use Illuminate\Http\Request;

class JournalEntryDetailController extends Controller
{
    // عرض جميع السجلات
    public function index()
    {
        $accounts = ChartOfAccount::all();
        $journalEntries = JournalEntryDetail::with(['journalEntry', 'chartOfAccount'])->get();

        return view('account.index', compact('accounts', 'journalEntries'));
    }

    // عرض نموذج إنشاء سجل جديد
    public function create()
    {
        $accounts = ChartOfAccount::all();
        return view('accounts.journal_entry_details.create', compact('accounts'));
    }

    // تخزين سجل جديد
    public function store(Request $request)
    {
        $validated = $request->validate([
            'journal_entry_id' => 'required|exists:journal_entries,id',
            'account_id' => 'required|exists:chart_of_accounts,id',
            'description' => 'nullable|string|max:255',
            'debit' => 'nullable|numeric|min:0',
            'credit' => 'nullable|numeric|min:0',
        ]);

        JournalEntryDetail::create($validated);

        return redirect()->route('accounts.journal_entry_details.index')->with('success', 'Record added successfully.');
    }

    // عرض تفاصيل سجل معين
    public function show($id)
    {
        $detail = JournalEntryDetail::with(['journalEntry', 'chartOfAccount'])->findOrFail($id);
        return view('accounts.journal_entry_details.show', compact('detail'));
    }

    // عرض نموذج تعديل سجل
    public function edit($id)
    {
        $detail = JournalEntryDetail::findOrFail($id);
        $accounts = ChartOfAccount::all();
        return view('accounts.journal_entry_details.edit', compact('detail', 'accounts'));
    }

    // تحديث سجل معين
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'journal_entry_id' => 'required|exists:journal_entries,id',
            'account_id' => 'required|exists:chart_of_accounts,id',
            'description' => 'nullable|string|max:255',
            'debit' => 'nullable|numeric|min:0',
            'credit' => 'nullable|numeric|min:0',
        ]);

        $detail = JournalEntryDetail::findOrFail($id);
        $detail->update($validated);

        return redirect()->route('accounts.journal_entry_details.index')->with('success', 'Record updated successfully.');
    }

    // حذف سجل معين
    public function destroy($id)
    {
        $detail = JournalEntryDetail::findOrFail($id);
        $detail->delete();

        return redirect()->route('accounts.journal_entry_details.index')->with('success', 'Record deleted successfully.');
    }

    // البحث عن القيود
    public function search(Request $request)
    {
        $query = JournalEntryDetail::query();

        if ($request->filled('account_id')) {
            $query->where('account_id', $request->account_id);
        }

        if ($request->filled('description')) {
            $query->where('description', 'LIKE', '%' . $request->description . '%');
        }

        if ($request->filled('date_range')) {
            $dates = explode(' - ', $request->date_range);
            $query->whereBetween('created_at', [$dates[0], $dates[1]]);
        }

        $results = $query->with(['journalEntry', 'chartOfAccount'])->get();

        return view('accounts.journal_entry_details.search', compact('results'));
    }

    // التحقق من توازن القيود
    public function checkBalance()
    {
        $debitSum = JournalEntryDetail::sum('debit');
        $creditSum = JournalEntryDetail::sum('credit');

        return response()->json([
            'balanced' => $debitSum === $creditSum,
            'total_debit' => $debitSum,
            'total_credit' => $creditSum,
        ]);
    }

    // إنشاء قيود تلقائية بناءً على حساب معين
    public function createAutomaticEntry(Request $request)
    {
        $validated = $request->validate([
            'account_id' => 'required|exists:chart_of_accounts,id',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
        ]);

        // إدخال مدين
        JournalEntryDetail::create([
            'journal_entry_id' => 1, // إدخال قيود افتراضي
            'account_id' => $validated['account_id'],
            'debit' => $validated['amount'],
            'credit' => 0,
            'description' => $validated['description'],
        ]);

        // إدخال دائن
        JournalEntryDetail::create([
            'journal_entry_id' => 1, // إدخال قيود افتراضي
            'account_id' => $validated['account_id'],
            'debit' => 0,
            'credit' => $validated['amount'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('accounts.journal_entry_details.index')->with('success', 'Automatic entry created successfully.');
    }

    // توليد تقرير مالي للفترة
    public function generateFinancialReport(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $entries = JournalEntryDetail::whereBetween('created_at', [$validated['start_date'], $validated['end_date']])
            ->with(['chartOfAccount', 'journalEntry'])
            ->get();

        $totalDebit = $entries->sum('debit');
        $totalCredit = $entries->sum('credit');

        return view('accounts.journal_entry_details.report', compact('entries', 'totalDebit', 'totalCredit', 'validated'));
    }

    // حساب إجمالي المدين والدائن لكل حساب
    public function accountSummary()
    {
        $accounts = ChartOfAccount::with(['journalEntryDetails' => function ($query) {
            $query->selectRaw('account_id, SUM(debit) as total_debit, SUM(credit) as total_credit')
                ->groupBy('account_id');
        }])->get();

        return view('accounts.journal_entry_details.summary', compact('accounts'));
    }

    // عرض القيود غير المتوازنة
    public function unbalancedEntries()
    {
        $unbalancedEntries = JournalEntryDetail::havingRaw('SUM(debit) != SUM(credit)')
            ->groupBy('journal_entry_id')
            ->get();

        return view('accounts.journal_entry_details.unbalanced', compact('unbalancedEntries'));
    }
}
