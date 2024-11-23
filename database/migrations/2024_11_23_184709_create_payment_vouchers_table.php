<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentVouchersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('payment_vouchers', function (Blueprint $table) {
            $table->id(); // رقم السند
            $table->date('date'); // تاريخ السند
            $table->string('payee_name'); // اسم المستفيد
            $table->decimal('amount', 15, 2); // قيمة المبلغ المصروف
            $table->text('description')->nullable(); // وصف إضافي للسند
            $table->unsignedBigInteger('account_id'); // الحساب المرتبط
            $table->string('attachment')->nullable(); // المرفقات
            $table->string('unit')->nullable(); // الوحدة
            $table->string('vendor')->nullable(); // المورد
            $table->string('seller')->nullable(); // البائع
            $table->string('category')->nullable(); // التصنيف
            $table->integer('min_limit')->nullable(); // الحد الأدنى
            $table->string('code_number')->nullable(); // رقم الكود
            $table->string('created_by')->nullable(); // المستخدم الذي أنشأ السند
            $table->timestamps(); // تواريخ الإنشاء والتحديث

            // العلاقات
            $table->foreign('account_id')->references('id')->on('chart_of_accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('payment_vouchers');
    }
}
