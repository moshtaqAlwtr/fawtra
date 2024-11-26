<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployeesExport;
use App\Imports\EmployeesImport;
use App\Notifications\EmployeeNotification;

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
            'employees' => $employees,
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
            'hire_date' => 'required|date',
            'salary' => 'nullable|numeric|min:0',
            'id_number' => 'nullable|string|max:20|unique:employees,id_number',
            'gender' => 'nullable|in:Male,Female',
            'nationality' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:100|unique:employees,email',
            'phone' => 'nullable|string|max:20',
            'notes' => 'nullable|string',
        ]);

        Employee::create($validatedData);

        return redirect()->back()->with('success', 'تم إضافة الموظف بنجاح.');
    }

    /**
     * عرض بيانات موظف معين
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return response()->json($employee);
    }

    /**
     * تحديث بيانات موظف
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $validatedData = $request->validate([
            'first_name' => 'sometimes|string|max:100',
            'last_name' => 'sometimes|string|max:100',
            'position' => 'nullable|string|max:100',
            'department' => 'nullable|string|max:100',
            'hire_date' => 'sometimes|date',
            'salary' => 'nullable|numeric|min:0',
            'contact_info' => 'nullable|string|max:255',
            'status' => 'nullable|in:Active,Inactive',
            'id_number' => 'nullable|string|max:20|unique:employees,id_number,' . $id,
            'gender' => 'nullable|in:Male,Female',
            'nationality' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:100|unique:employees,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'notes' => 'nullable|string',
        ]);

        $employee->update($validatedData);

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
        Employee::destroy($id);

        return response()->json([
            'message' => 'تم حذف الموظف بنجاح.'
        ], 204);
    }

    /**
     * البحث عن الموظفين بالاسم
     */
    public function searchByName(Request $request)
    {
        $employees = Employee::where('first_name', 'LIKE', '%' . $request->name . '%')
            ->orWhere('last_name', 'LIKE', '%' . $request->name . '%')
            ->get();

        return view('employees.search-results', compact('employees'));
    }

    /**
     * البحث عن الموظفين برقم الهوية
     */
    public function searchByIdNumber(Request $request)
    {
        $employees = Employee::where('id_number', $request->id_number)->get();

        return view('employees.search-results', compact('employees'));
    }

    /**
     * البحث المتعدد
     */
    public function advancedSearch(Request $request)
    {
        $query = Employee::query();

        if ($request->filled('first_name')) {
            $query->where('first_name', 'LIKE', '%' . $request->first_name . '%');
        }

        if ($request->filled('last_name')) {
            $query->where('last_name', 'LIKE', '%' . $request->last_name . '%');
        }

        if ($request->filled('id_number')) {
            $query->where('id_number', $request->id_number);
        }

        if ($request->filled('email')) {
            $query->where('email', 'LIKE', '%' . $request->email . '%');
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        $employees = $query->get();

        return view('employees.search-results', compact('employees'));
    }

    /**
     * تصدير الموظفين إلى Excel
     */
    public function exportToExcel()
    {
        $employees = Employee::all();
        return Excel::download(new EmployeesExport($employees), 'employees.xlsx');
    }

    /**
     * استيراد الموظفين من ملف Excel
     */
    public function importFromExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv',
        ]);

        Excel::import(new EmployeesImport, $request->file('file'));

        return redirect()->back()->with('success', 'تم استيراد الموظفين بنجاح.');
    }

    /**
     * إرسال إشعار للموظفين
     */
    public function notifyEmployees(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $employees = Employee::all();

        foreach ($employees as $employee) {
            if ($employee->email) {
                $employee->notify(new EmployeeNotification($request->message));
            }
        }

        return response()->json([
            'message' => 'تم إرسال الإشعار لجميع الموظفين بنجاح.',
        ]);
    }

    /**
     * عرض الموظفين حسب القسم
     */
    public function employeesByDepartment($department)
    {
        $employees = Employee::where('department', $department)->get();

        return view('employees.by-department', compact('employees', 'department'));
    }

    /**
     * تغيير حالة الموظف
     */
    public function toggleStatus($id)
    {
        $employee = Employee::findOrFail($id);

        $employee->update([
            'status' => $employee->status === 'Active' ? 'Inactive' : 'Active',
        ]);

        return response()->json([
            'message' => 'تم تغيير حالة الموظف بنجاح.',
            'status' => $employee->status,
        ]);
    }
}
