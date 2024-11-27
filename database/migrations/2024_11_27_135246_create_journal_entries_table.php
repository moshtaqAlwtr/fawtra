<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('journal_entries', function (Blueprint $table) {
            $table->id(); // المفتاح الأساسي
            $table->date('date'); // تاريخ القيد
            $table->text('description')->nullable(); // وصف القيد
            $table->string('currency')->nullable(); // العملة
            $table->string('attachment')->nullable(); // مرفق

            // المفاتيح الخارجية
            $table->unsignedBigInteger('client_id')->nullable(); // معرف العميل
            $table->unsignedBigInteger('employee_id')->nullable(); // معرف الموظف
            $table->unsignedBigInteger('invoice_id')->nullable(); // معرف الفاتورة

            $table->timestamps(); // وقت الإنشاء والتحديث

            // علاقات
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('set null');
            $table->foreign('invoice_id')->references('invoice_id')->on('invoices')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journal_entries');
    }
};
