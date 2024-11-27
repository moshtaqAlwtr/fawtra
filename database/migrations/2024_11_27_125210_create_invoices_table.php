<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id('invoice_id'); // Primary Key
            $table->unsignedBigInteger('client_id')->nullable(); // العميل
            $table->unsignedBigInteger('employee_id')->nullable(); // الموظف المسؤول
            $table->date('invoice_date')->nullable(); // تاريخ الفاتورة
            $table->string('sales_manager', 100)->nullable(); // مدير المبيعات
            $table->date('issue_date')->nullable(); // تاريخ الإصدار
            $table->string('payment_terms', 100)->nullable(); // شروط الدفع
            $table->string('payment_status', 50)->nullable(); // حالة الدفع
            $table->string('currency', 10)->nullable(); // العملة
            $table->decimal('total', 10, 2)->nullable(); // المجموع الكلي
            $table->decimal('grand_total', 10, 2)->nullable(); // المجموع الكلي مع الضرائب
            $table->timestamps(); // created_at, updated_at

            // Foreign Key Constraints
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null'); // ربط العميل
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('set null'); // ربط الفاتورة بالموظف
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
