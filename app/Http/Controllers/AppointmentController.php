<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // عرض جميع المواعيد
    public function index()
    {
        $appointments = Appointment::all();
        return view('appointments.index', compact('appointments'));
    }

    // عرض نموذج إنشاء موعد جديد
    public function create()
    {
        return view('appointments.create');
    }

    // تخزين موعد جديد
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'duration' => 'nullable|string',
            'actions' => 'nullable|string',
            'notes' => 'nullable|string',
            'repeat' => 'nullable|boolean',
            'share_with_client' => 'nullable|boolean',
            'assign_to_employees' => 'nullable|boolean',
        ]);

        Appointment::create($validatedData);

        return redirect()->route('schedule.appointment')->with('success', 'تم إضافة الموعد بنجاح.');
    }

    // عرض تفاصيل موعد معين
    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('appointments.show', compact('appointment'));
    }

    // عرض نموذج تعديل موعد
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('appointments.edit', compact('appointment'));
    }

    // تحديث موعد
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'client' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'duration' => 'nullable|string',
            'actions' => 'nullable|string',
            'notes' => 'nullable|string',
            'repeat' => 'nullable|boolean',
            'share_with_client' => 'nullable|boolean',
            'assign_to_employees' => 'nullable|boolean',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update($validatedData);

        return redirect()->route('schedule.appointment')->with('success', 'تم تحديث الموعد بنجاح.');
    }

    // حذف موعد
    public function destroy($id)
    {
        Appointment::destroy($id);

        return redirect()->route('schedule.appointment')->with('success', 'تم حذف الموعد بنجاح.');
    }

    // =================== إضافات مقترحة ===================

    /**
     * عرض المواعيد المستقبلية فقط.
     */
    public function upcomingAppointments()
    {
        $appointments = Appointment::where('date', '>=', now())->orderBy('date', 'asc')->get();
        return view('appointments.upcoming', compact('appointments'));
    }

    /**
     * عرض المواعيد الخاصة بعميل معين.
     */
    public function appointmentsByClient(Request $request)
    {
        $clientName = $request->input('client');
        $appointments = Appointment::where('client', 'like', "%{$clientName}%")->get();
        return view('appointments.by-client', compact('appointments'));
    }

    /**
     * إلغاء موعد معين.
     */
    public function cancel($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => 'cancelled']);

        return redirect()->route('schedule.appointment')->with('success', 'تم إلغاء الموعد بنجاح.');
    }

    /**
     * تأكيد موعد معين.
     */
    public function confirm($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => 'confirmed']);

        return redirect()->route('schedule.appointment')->with('success', 'تم تأكيد الموعد بنجاح.');
    }

    /**
     * إرسال تذكير بموعد معين.
     */
    public function sendReminder($id)
    {
        $appointment = Appointment::findOrFail($id);

        // هنا يمكن إضافة منطق الإرسال بالبريد أو رسالة نصية
        // كود افتراضي: Mail::to($appointment->client_email)->send(new AppointmentReminder($appointment));

        return redirect()->route('schedule.appointment')->with('success', 'تم إرسال تذكير للموعد.');
    }

    /**
     * عرض المواعيد حسب التاريخ.
     */
    public function appointmentsByDate(Request $request)
    {
        $date = $request->input('date');
        $appointments = Appointment::where('date', $date)->get();
        return view('appointments.by-date', compact('appointments'));
    }
}
