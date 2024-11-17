<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * عرض قائمة بعروض الأسعار.
     */
    public function index()
    {
        // جلب جميع عروض الأسعار
        $quotes = Quote::all();
        return response()->json($quotes);
    }

    /**
     * تخزين عرض سعر جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات القادمة من الطلب
        $validatedData = $request->validate([
            'client_id' => 'nullable|exists:clients,client_id',
            'quote_date' => 'required|date',
            'total_amount' => 'nullable|numeric',
            'status' => 'required|in:مبدئي,مقبول,مرفوض',
            'created_by' => 'required|exists:employees,employee_id',
        ]);

        // إنشاء عرض السعر
        $quote = Quote::create($validatedData);

        return response()->json($quote, 201);
    }

    /**
     * عرض تفاصيل عرض سعر معين.
     */
    public function show($id)
    {
        // جلب عرض السعر المحدد
        $quote = Quote::findOrFail($id);
        return response()->json($quote);
    }

    /**
     * تحديث عرض السعر في قاعدة البيانات.
     */
    public function update(Request $request, $id)
    {
        // جلب عرض السعر المطلوب تحديثه
        $quote = Quote::findOrFail($id);

        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'client_id' => 'nullable|exists:clients,client_id',
            'quote_date' => 'required|date',
            'total_amount' => 'nullable|numeric',
            'status' => 'required|in:مبدئي,مقبول,مرفوض',
            'created_by' => 'required|exists:employees,employee_id',
        ]);

        // تحديث البيانات
        $quote->update($validatedData);

        return response()->json($quote);
    }

    /**
     * حذف عرض سعر من قاعدة البيانات.
     */
    public function destroy($id)
    {
        // حذف عرض السعر
        Quote::destroy($id);
        return response()->json(null, 204);
    }
}
