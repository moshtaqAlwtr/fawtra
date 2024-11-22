<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_payments', function (Blueprint $table) {
            $table->id('payment_id'); // مفتاح أساسي
            $table->unsignedBigInteger('client_id'); // معرف العميل
            $table->unsignedBigInteger('invoice_id')->nullable(); // معرف الفاتورة (يمكن أن يكون فارغًا)
            $table->unsignedBigInteger('employee_id'); // معرف الموظف
            $table->unsignedBigInteger('journal_entry_id')->nullable(); // معرف القيد
            $table->unsignedBigInteger('treasury_id'); // معرف الخزينة

            $table->date('payment_date'); // تاريخ الدفع
            $table->decimal('amount', 10, 2); // المبلغ المدفوع
            $table->enum('payment_method', ['Cash', 'Bank Transfer', 'Credit Card', 'Other']); // طريقة الدفع
            $table->decimal('discount_amount', 10, 2)->default(0); // مبلغ الخصم
            $table->decimal('partial_payment_amount', 10, 2)->default(0); // مبلغ الدفع الجزئي
            $table->enum('status', ['Paid', 'Pending', 'Failed'])->default('Pending'); // حالة الدفع
            $table->text('notes')->nullable(); // ملاحظات

            // المفاتيح الخارجية
            $table->foreign('client_id')->references('client_id')->on('clients')->onDelete('cascade');
            $table->foreign('invoice_id')->references('invoice_id')->on('invoices')->onDelete('cascade');
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');
            $table->foreign('journal_entry_id')->references('id')->on('journal_entries')->onDelete('cascade');
            $table->foreign('treasury_id')->references('id')->on('treasuries')->onDelete('cascade');

            $table->timestamps(); // وقت الإنشاء والتحديث
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_payments');
    }
}
