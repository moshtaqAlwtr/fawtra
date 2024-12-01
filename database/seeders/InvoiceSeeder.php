<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;
use App\Models\Client;
use App\Models\Employee;

class InvoiceSeeder extends Seeder
{
    public function run()
    {
        // Get some clients and employees
        $clients = Client::all();
        $employees = Employee::all();

        if ($clients->isEmpty()) {
            \Log::warning('No clients found. Please run ClientSeeder first.');
            return;
        }

        if ($employees->isEmpty()) {
            \Log::warning('No employees found. Please run EmployeeSeeder first.');
            return;
        }

        // Create some test invoices
        for ($i = 1; $i <= 5; $i++) {
            Invoice::create([
                'client_id' => $clients->random()->id,
                'employee_id' => $employees->random()->employee_id,
                'invoice_date' => now(),
                'sales_manager' => 'Test Manager',
                'issue_date' => now(),
                'payment_terms' => 'Net 30',
                'payment_status' => $i % 2 == 0 ? 'paid' : 'unpaid',
                'currency' => 'SAR',
                'total' => 1000 * $i,
                'grand_total' => 1150 * $i, // Including tax
            ]);
        }
    }
}
