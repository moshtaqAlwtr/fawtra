<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * عرض جميع الموظفين
     */
    public function index()
    {
        $employees = Employee::all();
        return view('layouts.nav-slider-route', [
            'page' => 'add_employee',
            'employees' => $employees, // تمرير المتغير
        ]);
    }

    /**
     * إنشاء موظف جديد
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:100',
        'last_name' => 'required|string|max:100',
        'position' => 'nullable|string|max:100',
        'department' => 'nullable|string|max:100',
        'hire_date' => 'required|date',
        'salary' => 'nullable|numeric|min:0',
        'contact_info' => 'nullable|string|max:255',
        'status' => 'nullable|in:Active,Inactive',
        'id_number' => 'nullable|string|max:20|unique:employees,id_number',
        'gender' => 'nullable|in:Male,Female',
        'nationality' => 'nullable|string|max:100',
        'address' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:100|unique:employees,email',
        'phone' => 'nullable|string|max:20',
        'notes' => 'nullable|string',
        // 'user_id' => 'required|integer|exists:users,id',
    ]);

    // تخزين البيانات
    $employee = Employee::create($validatedData);

    // إرجاع رسالة نجاح
    return response()->json([
        'message' => 'تم إضافة الموظف بنجاح.',
        'employee' => $employee,
    ]);
}

    /**
     * عرض بيانات موظف معين
     */
    public function show($id)
    {
        // البحث عن الموظف
        $employee = Employee::findOrFail($id);

        // إرجاع البيانات
        return response()->json($employee);
    }

    /**
     * تحديث بيانات موظف
     */
    public function update(Request $request, $id)
    {
        // البحث عن الموظف
        $employee = Employee::findOrFail($id);

        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'first_name' => 'sometimes|string|max:100',
            'last_name' => 'sometimes|string|max:100',
            'position' => 'nullable|string|max:100',
            'department' => 'nullable|string|max:100',
            'hire_date' => 'sometimes|date',
            'salary' => 'nullable|numeric|min:0',
            'contact_info' => 'nullable|string|max:255',
            'status' => 'nullable|in:Active,Inactive',
            'id_number' => 'nullable|string|max:20|unique:employees,id_number,' . $id . ',employee_id',
            'gender' => 'nullable|in:Male,Female',
            'nationality' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:100|unique:employees,email,' . $id . ',employee_id',
            'phone' => 'nullable|string|max:20',
            'notes' => 'nullable|string',
            // 'user_id' => 'sometimes|integer|exists:users,id',
        ]);

        // تحديث البيانات
        $employee->update($validatedData);

        // إرجاع البيانات
        return response()->json([
            'message' => 'تم تحديث بيانات الموظف بنجاح.',
            'employee' => $employee
        ]);
    }

    /**
     * حذف موظف
     */
    public function destroy($id)
    {
        // حذف الموظف
        Employee::destroy($id);

        // إرجاع استجابة نجاح
        return response()->json([
            'message' => 'تم حذف الموظف بنجاح.'
        ], 204);
    }
}
