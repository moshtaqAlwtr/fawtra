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
        Schema::create('receipt_vouchers', function (Blueprint $table) {
            $table->id(); // رقم السند
            $table->date('date'); // تاريخ السند
            $table->string('payer_name'); // اسم الدافع
            $table->decimal('amount', 15, 2); // المبلغ
            $table->text('description')->nullable(); // وصف السند
            $table->unsignedBigInteger('account_id'); // الحساب المرتبط
            $table->string('created_by')->nullable(); // المستخدم الذي أنشأ السند
            $table->timestamps();

            $table->foreign('account_id')->references('id')->on('chart_of_accounts')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipt_vouchers');
    }
};
