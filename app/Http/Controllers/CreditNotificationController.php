<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Employee;
use App\Models\CreditNotification;
use Illuminate\Http\Request;

class CreditNotificationController extends Controller
{
    // عرض جميع الإشعارp
    public function index()
{
    $clients = Client::all(); // جلب جميع العملاء
    $employees = Employee::all(); // جلب جميع الموظفين
    $notifications = CreditNotification::with(['client', 'employee'])->get(); // جلب الإشعارات مع العلاقات

    // تمرير البيانات إلى العرض
    return view('layouts.nav-slider-route', [
        'page' => 'credit-note', // اسم الصفحة المرتبطة بالعرض
        'clients' => $clients,
        'employees' => $employees,
        'notifications' => $notifications,
    ]);
}




    // إنشاء إشعار جديد
    public function create()
{
    $clients = Client::all();
    $employees = Employee::all();

    if ($clients->isEmpty() || $employees->isEmpty()) {
        return back()->withErrors('لا يوجد عملاء أو موظفين متاحين.');
    }

    return view('notifications.create', compact('clients', 'employees'));
}


    // حفظ الإشعار الجديد
    public function store(Request $request)
    {if ($request->has('issue_date')) {
        try {
            $request->merge([
                'issue_date' => \Carbon\Carbon::createFromFormat('Y-m-d', $request->issue_date)->format('Y-m-d'),
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['issue_date' => 'تاريخ الإصدار المدخل غير صحيح.']);
        }
    }

    if ($request->has('notification_date')) {
        try {
            $request->merge([
                'notification_date' => \Carbon\Carbon::createFromFormat('Y-m-d', $request->notification_date)->format('Y-m-d'),
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['notification_date' => 'تاريخ الإصدار المدخل غير صحيح.']);
        }
    }


        $validatedData = $request->validate([
            'notification_number' => 'nullable|string|max:255',
            'notification_date' => 'required|date',
            'issue_date' => 'required|date',
            'sales_responsible' => 'nullable|string|max:255',
            'method' => 'required|string|max:255',
          'client_id' => 'required|exists:clients,id',
'employee_id' => 'required|exists:employees,id',
        ]);

        // تخزين البيانات
        CreditNotification::create($validatedData);

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->back()->with('success', 'تم إضافة الإشعار بنجاح.');
    }

    // عرض تفاصيل الإشعار
    public function show($id)
    {
        $notification = CreditNotification::findOrFail($id);
        return view('notifications.show', compact('notification'));
    }

    // تعديل الإشعار
    public function edit($id)
    {
        $notification = CreditNotification::findOrFail($id);
        return view('notifications.edit', compact('notification'));
    }

    // تحديث الإشعار
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'notification_number' => 'nullable|string|max:255',
            'notification_date' => 'nullable|date',
            'sales_responsible' => 'nullable|string|max:255',
            'issue_date' => 'nullable|date',
            'client' => 'nullable|string|max:255',
            'method' => 'nullable|string|max:255',
        ]);

        $notification = CreditNotification::findOrFail($id);
        $notification->update($validatedData);

        return redirect()->route('notifications.index')->with('success', 'تم تحديث الإشعار بنجاح.');
    }

    // حذف الإشعار
    public function destroy($id)
    {
        CreditNotification::destroy($id);

        return redirect()->route('notifications.index')->with('success', 'تم حذف الإشعار بنجاح.');
    }
}
