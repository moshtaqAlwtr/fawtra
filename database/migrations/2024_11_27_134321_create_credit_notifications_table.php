<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('credit_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('notification_number')->nullable();
            $table->date('notification_date')->nullable();
            $table->date('issue_date')->nullable();
            $table->unsignedBigInteger('client_id')->nullable(); // Foreign Key to clients
            $table->unsignedBigInteger('employee_id')->nullable(); // Allow null values for employee_id
            $table->string('sales_responsible')->nullable();
            $table->string('method')->nullable();
            $table->timestamps();

            // Define foreign keys
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');
        });



    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_notifications');
    }
};
