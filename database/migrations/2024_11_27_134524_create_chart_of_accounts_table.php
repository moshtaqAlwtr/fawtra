<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
    {
        Schema::create('chart_of_accounts', function (Blueprint $table) {
            $table->id(); // رقم الحساب
            $table->string('name'); // اسم الحساب
            $table->enum('type', ['asset', 'liability', 'equity', 'revenue', 'expense']); // نوع الحساب
            $table->string('code')->unique()->nullable();
            // الكود مع السماح أن يكون اختيارياً
            $table->unsignedBigInteger('parent_account_id')->nullable(); // الحساب الرئيسي إذا كان فرعياً
            $table->enum('normal_balance', ['debit', 'credit']); // طبيعة الحساب
            $table->timestamps();

            $table->foreign('parent_account_id')->references('id')->on('chart_of_accounts')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chart_of_accounts');
    }
};
