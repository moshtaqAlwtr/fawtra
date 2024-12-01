<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        // Create some test employees
        $employees = [
            [
                'name' => 'سارة محمد',
                'position' => 'مدير مبيعات',
                'department' => 'المبيعات',
                'email' => 'sarah@example.com',
                'phone' => '0501111111',
            ],
            [
                'name' => 'عمر خالد',
                'position' => 'مندوب مبيعات',
                'department' => 'المبيعات',
                'email' => 'omar@example.com',
                'phone' => '0502222222',
            ],
            [
                'name' => 'فاطمة أحمد',
                'position' => 'محاسب',
                'department' => 'المالية',
                'email' => 'fatima@example.com',
                'phone' => '0503333333',
            ],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
