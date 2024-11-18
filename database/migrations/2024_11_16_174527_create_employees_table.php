<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employee_id');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('position', 100)->nullable(); // Job title
            $table->string('department', 100)->nullable(); // Department
            $table->date('hire_date'); // Joining date
            $table->decimal('salary', 10, 2)->nullable(); // Salary
            $table->string('contact_info', 255)->nullable(); // Phone, email, etc.
            $table->string('id_number', 20)->unique(); // ID number
            $table->enum('gender', ['Male', 'Female'])->nullable(); // Gender
            $table->string('nationality', 100)->nullable(); // Nationality
            $table->string('address', 255)->nullable(); // Address details
            $table->string('email', 100)->unique()->nullable(); // Email address
            $table->string('phone', 20)->nullable(); // Phone number
            $table->enum('status', ['Active', 'Inactive'])->default('Active'); // Employment status
            $table->text('notes')->nullable(); // Additional notes
            $table->timestamps(); // Created and updated timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
