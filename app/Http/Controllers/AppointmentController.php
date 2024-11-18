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
            'assign_to_employees' => 'nullable|boolean'
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
            'assign_to_employees' => 'nullable|boolean'
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
}
