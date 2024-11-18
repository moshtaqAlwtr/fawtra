<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('credit_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('notification_number')->nullable(); // رقم إشعار دائن
            $table->date('notification_date')->nullable(); // تاريخ إشعار دائن
            $table->date('issue_date')->nullable(); // تاريخ الإصدار
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('employee_id');
            $table->string('sales_responsible')->nullable(); // مسؤول مبيعات
            $table->string('method')->nullable(); // الطريقة

            // مفتاح خارجي للعملاء
            $table->foreign('client_id')->references('client_id')->on('clients')->onDelete('cascade');

    $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');
            $table->timestamps();
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
