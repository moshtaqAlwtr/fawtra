<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use App\Models\JournalEntryDetail;
use Illuminate\Http\Request;

class JournalEntryDetailController extends Controller
{
    // عرض جميع السجلات
    public function index()
    {
        // جلب جميع الحسابات العامة
        $accounts = ChartOfAccount::all();

        // جلب جميع القيود مع الحسابات العامة المرتبطة بها
        $journalEntries = JournalEntryDetail::with(['journalEntry', 'chartOfAccount'])->get();

        return view('account.index', compact('accounts', 'journalEntries'));
    }

    // عرض نموذج إنشاء سجل جديد
    public function create()
    {
        return view('accounts.journal_entry_details.create');
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
        $detail = JournalEntryDetail::with(['journalEntry', 'accounts'])->findOrFail($id);
        return view('accounts.journal_entry_details.show', compact('detail'));
    }

    // عرض نموذج تعديل سجل
    public function edit($id)
    {
        $detail = JournalEntryDetail::findOrFail($id);
        return view('accounts.journal_entry_details.edit', compact('detail'));
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
}
