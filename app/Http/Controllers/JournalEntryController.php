<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JournalEntry;

class JournalEntryController extends Controller
{
    // عرض جميع القيود
    public function index()
    {
        $journalEntries = JournalEntry::all(); // استرجاع جميع القيود
        return view('add_entry.index', compact('journalEntries'));
    }

    // عرض نموذج إضافة قيد جديد
    public function create()
    {
        return view('add_entry.create');
    }

    // تخزين القيد الجديد
 public function store(Request $request)
{
    $validated = $request->validate([
        'date' => 'required|date',
        'description' => 'nullable|string',
        'currency' => 'required|string',
        'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    // حفظ الملف إذا تم رفعه
    $attachmentPath = null;
    if ($request->hasFile('attachment')) {
        $attachmentPath = $request->file('attachment')->store('attachments', 'public');
    }

    // إنشاء القيد
    JournalEntry::create([
        'date' => $request->date,
        'description' => $request->description,
        'currency' => $request->currency,
        'attachment' => $attachmentPath,
    ]);

    return redirect()->route('add_entry')->with('success', 'تم إضافة القيد بنجاح.');
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
