<?php
// في ملف App\Http\Controllers\AppointmentController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        // عرض صفحة المواعيد
        return view('schedule_appointment'); // تأكد من أن اسم الملف في مجلد `views` هو schedule_appointment.blade.php
    }

    public function create()
    {
        // عرض نموذج إضافة موعد
        return view('create_appointment'); // تأكد من وجود صفحة أو ملف لهذه الإضافة في المجلد `views`
    }

    public function store(Request $request)
    {
        // منطق حفظ الموعد في قاعدة البيانات (يمكنك تعديله حسب احتياجاتك)
        // مثال:
        // Appointment::create($request->all());
        return redirect()->route('schedule.appointment')->with('success', 'تمت إضافة الموعد بنجاح');
    }
}
