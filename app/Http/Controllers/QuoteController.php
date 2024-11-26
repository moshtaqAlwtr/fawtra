<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Client;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;

class QuoteController extends Controller
{
    /**
     * عرض جميع عروض الأسعار.
     */
public function index()
    {
        $clients = Client::all();
        $employees = Employee::all(); // جلب جميع الموظفين
        $quotes = Quote::with('client')->get(); // جلب جميع عروض الأسعار مع العملاء

        // احصل على رقم عرض السعر التالي
        $nextQuoteId = Quote::max('quote_id') + 1;

        return view('layouts.nav-slider-route', [
            'page' => 'quotation',
            'clients' => $clients,
            'employees' => $employees,
            'quotes' => $quotes,
            'nextQuoteId' => $nextQuoteId
        ]);
    }
    /**
     * عرض نموذج إنشاء عرض سعر جديد.
     */
    public function create()
    {
        $clients = Client::all();
        $employees = Employee::all();
        return view('quotes.create', compact('clients', 'employees'));
    }

    /**
     * تخزين عرض سعر جديد.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'quote_date' => 'required|date',
            'total_amount' => 'nullable|numeric|min:0',
            'status' => 'required|in:مبدئي,مقبول,مرفوض',
            'created_by' => 'required|exists:employees,id',
            'notes' => 'nullable|string',
        ]);

        $quote = Quote::create($validatedData);

        return redirect()->route('quotes.index')->with('success', 'تم إنشاء عرض السعر بنجاح.');
    }

    /**
     * عرض تفاصيل عرض سعر معين.
     */
    public function show($id)
    {
        $quote = Quote::with('client', 'employee')->findOrFail($id);
        return view('quotes.show', compact('quote'));
    }

    /**
     * عرض نموذج تعديل عرض السعر.
     */
    public function edit($id)
    {
        $quote = Quote::findOrFail($id);
        $clients = Client::all();
        $employees = Employee::all();
        return view('quotes.edit', compact('quote', 'clients', 'employees'));
    }

    /**
     * تحديث بيانات عرض سعر.
     */
    public function update(Request $request, $id)
    {
        $quote = Quote::findOrFail($id);

        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'quote_date' => 'required|date',
            'total_amount' => 'nullable|numeric|min:0',
            'status' => 'required|in:مبدئي,مقبول,مرفوض',
            'created_by' => 'required|exists:employees,id',
            'notes' => 'nullable|string',
        ]);

        $quote->update($validatedData);

        return redirect()->route('quotes.index')->with('success', 'تم تحديث عرض السعر بنجاح.');
    }

    /**
     * حذف عرض سعر.
     */
    public function destroy($id)
    {
        $quote = Quote::findOrFail($id);
        $quote->delete();

        return redirect()->route('quotes.index')->with('success', 'تم حذف عرض السعر بنجاح.');
    }

    /**
     * تكرار عرض السعر.
     */
    public function duplicate($id)
    {
        $quote = Quote::findOrFail($id);

        $newQuote = $quote->replicate();
        $newQuote->quote_date = now();
        $newQuote->status = 'مبدئي';
        $newQuote->save();

        return redirect()->route('quotes.index')->with('success', 'تم تكرار عرض السعر بنجاح.');
    }

    /**
     * تحويل عرض السعر إلى فاتورة.
     */
    public function convertToInvoice($id)
    {
        $quote = Quote::findOrFail($id);

        $invoiceData = [
            'client_id' => $quote->client_id,
            'invoice_date' => now(),
            'total_amount' => $quote->total_amount,
            'created_by' => $quote->created_by,
            'notes' => $quote->notes,
        ];

        $invoice = \App\Models\Invoice::create($invoiceData);

        return redirect()->route('invoices.show', $invoice->id)->with('success', 'تم تحويل عرض السعر إلى فاتورة بنجاح.');
    }

    /**
     * البحث عن عروض الأسعار.
     */
    public function search(Request $request)
    {
        $query = Quote::query();

        if ($request->filled('client_id')) {
            $query->where('client_id', $request->client_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date_range')) {
            $dates = explode(' - ', $request->date_range);
            $query->whereBetween('quote_date', [$dates[0], $dates[1]]);
        }

        $quotes = $query->with('client', 'employee')->get();

        return view('quotes.search-results', compact('quotes'));
    }

    /**
     * إرسال عرض السعر عبر البريد الإلكتروني.
     */
    public function sendToClient($id)
    {
        $quote = Quote::with('client')->findOrFail($id);

        Mail::to($quote->client->email)->send(new \App\Mail\QuoteMail($quote));

        return redirect()->route('quotes.index')->with('success', 'تم إرسال عرض السعر إلى العميل بنجاح.');
    }

    /**
     * تصدير عرض السعر كملف PDF.
     */
    public function exportToPDF($id)
    {
        $quote = Quote::with('client', 'employee')->findOrFail($id);

        $pdf = PDF::loadView('quotes.pdf', compact('quote'));

        return $pdf->download("quote-{$quote->id}.pdf");
    }

    /**
     * إلغاء عرض السعر.
     */
    public function cancel(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cancellation_reason' => 'required|string|max:255',
        ]);

        $quote = Quote::findOrFail($id);
        $quote->update([
            'status' => 'مرفوض',
            'cancellation_reason' => $validatedData['cancellation_reason'],
        ]);

        return redirect()->route('quotes.index')->with('success', 'تم إلغاء عرض السعر بنجاح.');
    }

    /**
     * إضافة بند إلى عرض السعر.
     */
    public function addItem(Request $request, $id)
    {
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
        ]);

        $quote = Quote::findOrFail($id);

        $quote->items()->create([
            'description' => $validatedData['description'],
            'quantity' => $validatedData['quantity'],
            'unit_price' => $validatedData['unit_price'],
            'total' => $validatedData['quantity'] * $validatedData['unit_price'],
        ]);

        return redirect()->route('quotes.show', $id)->with('success', 'تم إضافة البند بنجاح.');
    }

    /**
     * توليد تقرير بعروض الأسعار.
     */
    public function generateReport(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $quotes = Quote::whereBetween('quote_date', [$validated['start_date'], $validated['end_date']])
            ->with('client', 'employee')
            ->get();

        return view('quotes.report', compact('quotes', 'validated'));
    }

    /**
     * عرض إحصائيات عروض الأسعار.
     */
    public function statistics()
    {
        $totalQuotes = Quote::count();
        $acceptedQuotes = Quote::where('status', 'مقبول')->count();
        $rejectedQuotes = Quote::where('status', 'مرفوض')->count();

        return response()->json([
            'total_quotes' => $totalQuotes,
            'accepted_quotes' => $acceptedQuotes,
            'rejected_quotes' => $rejectedQuotes,
        ]);
    }
}
