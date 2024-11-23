<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevenuesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('revenues', function (Blueprint $table) {
            $table->id(); // رقم الإيراد
            $table->date('date'); // تاريخ الإيراد
            $table->string('source'); // مصدر الإيراد
            $table->decimal('amount', 15, 2); // قيمة الإيراد
            $table->text('description')->nullable(); // وصف الإيراد
            $table->unsignedBigInteger('account_id'); // الحساب المرتبط
            $table->unsignedBigInteger('payment_voucher_id')->nullable(); // سند القبض المرتبط
            $table->unsignedBigInteger('treasury_id')->nullable(); // الخزينة المرتبطة
            $table->unsignedBigInteger('bank_account_id')->nullable(); // الحساب البنكي المرتبط
            $table->unsignedBigInteger('journal_entry_id')->nullable(); // القيد المرتبط
            $table->string('created_by')->nullable(); // المستخدم الذي أنشأ الإيراد
            $table->timestamps(); // تواريخ الإنشاء والتحديث

            // العلاقات
            $table->foreign('account_id')->references('id')->on('chart_of_accounts')->onDelete('cascade');
            $table->foreign('payment_voucher_id')->references('id')->on('payment_vouchers')->onDelete('set null');
            $table->foreign('treasury_id')->references('id')->on('treasuries')->onDelete('set null');
            $table->foreign('bank_account_id')->references('id')->on('bank_accounts')->onDelete('set null');
            $table->foreign('journal_entry_id')->references('id')->on('journal_entries')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('revenues');
    }
}
