<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * عرض نموذج إضافة عميل جديد.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * حفظ بيانات العميل في قاعدة البيانات.
     */
    public function storeClient(Request $request)
    {
        // التحقق من صحة البيانات القادمة من الطلب، مع جعل printing_method غير إلزامي
        $validatedData = $request->validate([
            'trade_name' => 'required|string|max:255',
            'account_code' => 'required|string|max:50',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'mobile' => 'nullable|string|max:20',
            'street_address_1' => 'nullable|string|max:255',
            'street_address_2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'region' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:10',
            'country' => 'nullable|string|max:255',
            'tax_number' => 'nullable|string|max:50',
            'commercial_registration' => 'nullable|string|max:50',
            'credit_limit' => 'nullable|numeric',
            'credit_period' => 'nullable|integer',
            'printing_method' => 'nullable|in:طباعة,إرسال بالبريد', // الآن الحقل اختياري
            'opening_balance' => 'nullable|numeric',
            'opening_balance_date' => 'nullable|date',
            'currency' => 'nullable|string|max:10',
            'email' => 'nullable|email|max:255',
            'client_type' => 'nullable|string|max:50',
            'notes' => 'nullable|string',
            'attachments' => 'nullable|file',
            'display_language' => 'nullable|string|max:50',
        ]);

        try {
            // حفظ البيانات في قاعدة البيانات
            $client = Client::create($validatedData);

            // رفع الملف وحفظ مساره في قاعدة البيانات إذا وُجدت
            if ($request->hasFile('attachments')) {
                $path = $request->file('attachments')->store('attachments', 'public');
                $client->update(['attachments' => $path]);
            }

            // إعادة التوجيه مع رسالة نجاح
            return redirect()->back()->with('success', 'تم إضافة العميل بنجاح.');

        } catch (\Exception $e) {
            // إعادة التوجيه مع رسالة خطأ مع عرض الرسالة التفصيلية
            return redirect()->back()->withErrors(['error' => 'حدث خطأ: ' . $e->getMessage()]);
        }
    }
}
