<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JournalEntry;
use App\Models\ChartOfAccount;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Invoice;
class JournalEntryController extends Controller
{
    // عرض جميع القيود
    public function index()
    {
        $journalEntries = JournalEntry::all(); // جلب جميع القيود
        $accounts = ChartOfAccount::all(); // جلب الحسابات
        $clients = Client::all(); // جلب العملاء
        $employees = Employee::all(); // جلب الموظفين
        $invoices = Invoice::all(); // جلب الفواتير

        return view('add_entry.index', [
            'journalEntries' => $journalEntries,
            'accounts' => $accounts,
            'clients' => $clients,
            'employees' => $employees,
            'invoices' => $invoices,
        ]);
    }


    // عرض نموذج إضافة ق
    public function create()
    {
        $lastEntry = JournalEntry::latest('id')->first(); // جلب آخر قيد
        $nextId = $lastEntry ? $lastEntry->id + 1 : 1; // حساب رقم القيد التالي

        $accounts = ChartOfAccount::all(); // جلب الحسابات
        $clients = Client::all(); // جلب العملاء
        $employees = Employee::all(); // جلب الموظفين
        $invoices = Invoice::all(); // جلب الفواتير

        return view('layouts.nav-slider-route', [
            'page' => 'add_entry',
            'accounts' => $accounts,
            'clients' => $clients,
            'employees' => $employees,
            'invoices' => $invoices,
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
        'client_id' => 'nullable|exists:clients,id',
        'employee_id' => 'nullable|exists:employees,id',
        'invoice_id' => 'nullable|exists:invoices,invoice_id',
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
        'client_id' => $request->client_id,
        'employee_id' => $request->employee_id,
        'invoice_id' => $request->invoice_id,
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
    public function displayEntries()
    {
        $journalEntries = JournalEntry::all();
        $accounts = ChartOfAccount::all(); // استرجاع جميع الحسابات

        // طباعة البيانات للتأكد من أنها تسترجع بشكل صحيح

        return view('layouts.nav-slider-route', [
            'page' => 'journal_entries_day',
           'journalEntries'=>$journalEntries,
           'accounts' => $accounts, // تمرير الحسابات إلى العرض

        ]);
    }
    public function search(Request $request)
    {
        $query = JournalEntry::query();

        // الفلاتر
        if ($request->has('account') && $request->account != 'أي حساب') {
            $query->whereHas('details', function ($q) use ($request) {
                $q->where('account_id', $request->account);
            });
        }

        if ($request->has('description') && !empty($request->description)) {
            $query->where('description', 'LIKE', '%' . $request->description . '%');
        }

        if ($request->has('fromDate') && $request->has('toDate') && !empty($request->fromDate) && !empty($request->toDate)) {
            $query->whereBetween('date', [$request->fromDate, $request->toDate]);
        }

        if ($request->has('source') && $request->source != 'أي') {
            $query->where('source', $request->source);
        }

        if ($request->has('entryNumber') && !empty($request->entryNumber)) {
            $query->where('id', $request->entryNumber);
        }

        if ($request->has('entryStatus') && $request->entryStatus != 'الكل') {
            $query->where('status', $request->entryStatus);
        }

        if ($request->has('minAmount') && !empty($request->minAmount)) {
            $query->whereHas('details', function ($q) use ($request) {
                $q->where('debit', '>=', $request->minAmount);
            });
        }

        if ($request->has('maxAmount') && !empty($request->maxAmount)) {
            $query->whereHas('details', function ($q) use ($request) {
                $q->where('credit', '<=', $request->maxAmount);
            });
        }

        $journalEntries = $query->with(['details.chartOfAccount', 'invoice', 'client', 'employee'])->get();
        $accounts = ChartOfAccount::all(); // جلب الحسابات

        return view('layouts.nav-slider-route', [
            'page' => 'journal_entries_day',
            'journalEntries' => $journalEntries,
            'accounts' => $accounts, // تمرير الحسابات إلى العرض
        ]);
    }


}
