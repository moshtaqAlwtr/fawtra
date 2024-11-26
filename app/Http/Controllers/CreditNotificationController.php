<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Employee;
use App\Models\CreditNotification;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CreditNotificationController extends Controller
{
    // عرض جميع الإشعارات
    public function index()
    {
        $clients = Client::all();
        $employees = Employee::all();
        $notifications = CreditNotification::with(['client', 'employee'])->get();

        return view('layouts.nav-slider-route', [
            'page' => 'credit-note',
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
    {
        if ($request->has('issue_date')) {
            try {
                $request->merge([
                    'issue_date' => Carbon::createFromFormat('Y-m-d', $request->issue_date)->format('Y-m-d'),
                ]);
            } catch (\Exception $e) {
                return back()->withErrors(['issue_date' => 'تاريخ الإصدار المدخل غير صحيح.']);
            }
        }

        if ($request->has('notification_date')) {
            try {
                $request->merge([
                    'notification_date' => Carbon::createFromFormat('Y-m-d', $request->notification_date)->format('Y-m-d'),
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
            'client_id' => 'nullable|exists:clients,id',
            'employee_id' => 'nullable|exists:employees,employee_id',
        ]);

        $validatedData['notification_number'] = $this->generateNotificationNumber();

        CreditNotification::create($validatedData);

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

    // توليد رقم إشعار تلقائي
    private function generateNotificationNumber()
    {
        $lastNotification = CreditNotification::latest()->first();
        $lastNumber = $lastNotification ? intval($lastNotification->notification_number) : 0;

        return str_pad($lastNumber + 1, 8, '0', STR_PAD_LEFT);
    }

    // البحث عن الإشعارات
    public function search(Request $request)
    {
        $query = CreditNotification::query();

        if ($request->filled('notification_number')) {
            $query->where('notification_number', 'LIKE', '%' . $request->notification_number . '%');
        }

        if ($request->filled('client_id')) {
            $query->where('client_id', $request->client_id);
        }

        if ($request->filled('employee_id')) {
            $query->where('employee_id', $request->employee_id);
        }

        if ($request->filled('date_range')) {
            $dates = explode(' - ', $request->date_range);
            $query->whereBetween('notification_date', [$dates[0], $dates[1]]);
        }

        $notifications = $query->with(['client', 'employee'])->get();

        return view('notifications.index', compact('notifications'));
    }

    // إنشاء إشعار للعملاء المتأخرين
    public function createOverdueNotifications()
    {
        $overdueClients = Client::whereHas('creditNotifications', function ($query) {
            $query->where('due_date', '<', now())
                  ->where('status', '!=', 'paid');
        })->get();

        foreach ($overdueClients as $client) {
            CreditNotification::create([
                'client_id' => $client->id,
                'notification_date' => now(),
                'issue_date' => now(),
                'amount' => $client->creditNotifications->sum('amount_due'),
                'status' => 'overdue',
                'method' => 'auto',
            ]);
        }

        return redirect()->back()->with('success', 'تم إنشاء الإشعارات للعملاء المتأخرين.');
    }

    // حساب الفائدة أو الرسوم المتأخرة
    public function calculateLateFees($id)
    {
        $notification = CreditNotification::findOrFail($id);

        if ($notification->due_date < now()) {
            $daysLate = now()->diffInDays($notification->due_date);
            $lateFees = $notification->amount * 0.02 * $daysLate;

            return response()->json([
                'notification_id' => $id,
                'late_fees' => $lateFees,
            ]);
        }

        return response()->json([
            'notification_id' => $id,
            'late_fees' => 0,
        ]);
    }

    // تحديث الحالة عند السداد
    public function markAsPaid($id)
    {
        $notification = CreditNotification::findOrFail($id);
        $notification->update(['status' => 'paid']);

        return redirect()->back()->with('success', 'تم تحديث الحالة إلى مدفوعة.');
    }

    // عرض أرصدة العملاء
    public function clientBalances()
    {
        $clients = Client::with(['creditNotifications' => function ($query) {
            $query->selectRaw('client_id, SUM(amount) as total_credit')
                  ->groupBy('client_id');
        }])->get();

        return view('clients.balances', compact('clients'));
    }
    // تذكير الموظفين بالعملاء المتأخرين
public function remindEmployees()
{
    $overdueNotifications = CreditNotification::where('due_date', '<', now())
        ->where('status', '!=', 'paid')
        ->with('employee')
        ->get();

    foreach ($overdueNotifications as $notification) {
        $employee = $notification->employee;
        if ($employee) {
            $employee->notify(new EmployeeReminderNotification($notification));
        }
    }

    return redirect()->back()->with('success', 'تم إرسال التذكيرات للموظفين.');
}
// تقسيم الإشعارات حسب الطريقة
public function groupByMethod()
{
    $groupedNotifications = CreditNotification::selectRaw('method, COUNT(*) as count, SUM(amount) as total_amount')
        ->groupBy('method')
        ->get();

    return view('notifications.grouped-by-method', compact('groupedNotifications'));
}
// حذف جميع الإشعارات المتأخرة
public function deleteOverdueNotifications()
{
    $deletedCount = CreditNotification::where('due_date', '<', now())
        ->where('status', 'overdue')
        ->delete();

    return redirect()->back()->with('success', "تم حذف $deletedCount إشعار متأخر بنجاح.");
}
// إعادة فتح إشعار مغلق
public function reopenNotification($id)
{
    $notification = CreditNotification::findOrFail($id);

    if ($notification->status === 'paid') {
        $notification->update(['status' => 'pending']);
        return redirect()->back()->with('success', 'تم إعادة فتح الإشعار بنجاح.');
    }

    return redirect()->back()->withErrors('الإشعار ليس مغلقًا ولا يمكن إعادة فتحه.');
}
// عرض ملخص الإشعارات للموظف
public function employeeNotificationsSummary($employeeId)
{
    $notifications = CreditNotification::where('employee_id', $employeeId)
        ->selectRaw('status, COUNT(*) as count, SUM(amount) as total_amount')
        ->groupBy('status')
        ->get();

    return view('notifications.employee-summary', compact('notifications', 'employeeId'));
}
// تحديث مبلغ الإشعار
public function updateAmount(Request $request, $id)
{
    $validatedData = $request->validate([
        'amount' => 'required|numeric|min:0',
    ]);

    $notification = CreditNotification::findOrFail($id);
    $notification->update(['amount' => $validatedData['amount']]);

    return redirect()->back()->with('success', 'تم تحديث مبلغ الإشعار بنجاح.');
}
// إرسال تنبيه عند تجاوز تاريخ الاستحقاق
public function notifyOverdue()
{
    $overdueNotifications = CreditNotification::where('due_date', '<', now())
        ->where('status', '!=', 'paid')
        ->with('client')
        ->get();

    foreach ($overdueNotifications as $notification) {
        $client = $notification->client;
        if ($client) {
            $client->notify(new OverdueNotificationAlert($notification));
        }
    }

    return redirect()->back()->with('success', 'تم إرسال التنبيهات للعملاء المتأخرين.');
}
// الحصول على إشعارات العميل المحددة
public function getClientNotifications($clientId)
{
    $notifications = CreditNotification::where('client_id', $clientId)
        ->with('employee')
        ->get();

    return view('notifications.client-notifications', compact('notifications'));
}
// تغيير حالة الإشعار يدويًا
public function updateStatus(Request $request, $id)
{
    $validatedData = $request->validate([
        'status' => 'required|in:pending,paid,overdue',
    ]);

    $notification = CreditNotification::findOrFail($id);
    $notification->update(['status' => $validatedData['status']]);

    return redirect()->back()->with('success', 'تم تحديث حالة الإشعار بنجاح.');
}
// إنشاء إشعار بناءً على مبلغ معين
public function createNotificationByAmount($clientId, $amount)
{
    $client = Client::findOrFail($clientId);

    CreditNotification::create([
        'client_id' => $client->id,
        'notification_date' => now(),
        'issue_date' => now(),
        'amount' => $amount,
        'status' => 'pending',
        'method' => 'manual',
    ]);

    return redirect()->back()->with('success', 'تم إنشاء الإشعار بناءً على المبلغ.');
}

}
