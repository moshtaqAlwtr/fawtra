<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JournalEntry;
use App\Models\ChartOfAccount;
class JournalEntryController extends Controller
{
    // عرض جميع القيود
    public function index()
{
    $journalEntries = JournalEntry::all(); // استرجاع جميع القيود
    $accounts = ChartOfAccount::all(); // جلب الحسابات

    return view('add_entry.index', [
        'journalEntries' => $journalEntries,
        'accounts' => $accounts, // تمرير الحسابات إلى العرض
    ]);
}


    // عرض نموذج إضافة ق
    public function create()
{
    $lastEntry = JournalEntry::latest('id')->first(); // جلب آخر قيد
    $nextId = $lastEntry ? $lastEntry->id + 1 : 1; // حساب رقم القيد التالي

    $accounts = ChartOfAccount::all(); // جلب الحسابات

    return view('layouts.nav-slider-route', [
        'page' => 'add_entry',
        'accounts' => $accounts,
        'nextId' => $nextId, // تمرير رقم القيد التالي إلى العرض
    ]);
}


    // تخزين القيد الجديدpublic function store(Request $request)
    public function store(Request $request)
    {
    // التحقق من البيانات
    $validated = $request->validate([
        'date' => 'required|date',
        'description' => 'nullable|string',
        'currency' => 'required|string',
        'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'accounts' => 'required|array',
        'accounts.*' => 'required|integer|exists:chart_of_accounts,id',
        'descriptions.*' => 'nullable|string',
        'debits.*' => 'nullable|numeric',
        'credits.*' => 'nullable|numeric',
    ]);

    // حفظ الملف إذا تم رفعه
    $attachmentPath = null;
    if ($request->hasFile('attachment')) {
        $attachmentPath = $request->file('attachment')->store('attachments', 'public');
    }

    // إنشاء القيد الرئيسي
    $journalEntry = JournalEntry::create([
        'date' => $request->date,
        'description' => $request->description,
        'currency' => $request->currency,
        'attachment' => $attachmentPath,
    ]);

    // إضافة تفاصيل القيد
    foreach ($request->accounts as $index => $accountId) {
        $journalEntry->details()->create([
            'account_id' => $accountId,
            'description' => $request->descriptions[$index] ?? null,
            'debit' => $request->debits[$index] ?? 0,
            'credit' => $request->credits[$index] ?? 0,
        ]);
    }
    return redirect()->route('add_entry')->with('success', 'تم إضافة القيد وتفاصيله بنجاح.');

}

       // عرض تفاصيل قيد معين
    public function show($id)
    {
        $journalEntry = JournalEntry::findOrFail($id); // استرجاع القيد المحدد
        return view('add_entry.show', compact('journalEntry'));
    }

    // حذف القيد
    public function destroy($id)
    {
        $journalEntry = JournalEntry::findOrFail($id);
        $journalEntry->delete(); // حذف القيد

        return redirect()->route('add_entry.index')->with('success', 'تم حذف القيد بنجاح.');
    }
}
