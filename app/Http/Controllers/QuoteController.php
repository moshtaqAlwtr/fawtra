<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Client;
use App\Models\Employee;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * عرض جميع عروض الأسعار مع بيانات العملاء.
     */public function index()
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
     * تخزين عرض سعر جديد.
     */
    public function store(Request $request)
    {

        if ($request->has('quote_date')) {
            try {
                $request->merge([
                    'quote_date' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->quote_date)->format('Y-m-d'),
                ]);
            } catch (\Exception $e) {
                return back()->withErrors(['quote_date' => 'التاريخ المدخل غير صحيح.']);
            }
        }

        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,client_id',
            'quote_date' => 'required|date',
            'total_amount' => 'nullable|numeric',
            'status' => 'required|in:مبدئي,مقبول,مرفوض',
            'created_by' => 'required|exists:employees,employee_id',

        ]);

        // تخزين البيانات
        Quote::create($validatedData);

        // إعادة توجيه مع رسالة نجاح
        return redirect()->route('quotation')->with('success', 'تم إنشاء عرض السعر بنجاح!');
    }
}
