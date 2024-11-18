<?php

namespace App\Http\Controllers;

use App\Models\CreditNotification;
use Illuminate\Http\Request;

class CreditNotificationController extends Controller
{
    // عرض جميع الإشعارات
    public function index()
    {
        $notifications = CreditNotification::all();
        return view('notifications.index', compact('notifications'));
    }

    // إنشاء إشعار جديد
    public function create()
    {
        return view('notifications.create');
    }

    // حفظ الإشعار الجديد
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'notification_number' => 'nullable|string|max:255',
            'notification_date' => 'nullable|date',
            'sales_responsible' => 'nullable|string|max:255',
            'issue_date' => 'nullable|date',
            'client' => 'nullable|string|max:255',
            'method' => 'nullable|string|max:255',
        ]);

        CreditNotification::create($validatedData);

        return redirect()->route('notifications.index')->with('success', 'تم إضافة الإشعار بنجاح.');
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
