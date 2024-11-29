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
        Schema::create('receipts', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('code')->unique(); // رقم السند
            $table->decimal('amount', 15, 2); // المبلغ
            $table->text('description')->nullable(); // الوصف
            $table->string('currency')->default('SAR'); // العملة
            $table->date('date'); // تاريخ السند
          $table->unsignedBigInteger('treasury_id')->nullable(); // جدول الخزائن (اختياري)
            $table->unsignedBigInteger('bank_account_id')->nullable(); // جدول حسابات البنوك (اختياري)
            $table->unsignedBigInteger('journal_entry_id')->nullable(); // جدول القيود المحاسبية
            $table->enum('classification', ['default', 'custom'])->default('default'); // التصنيف
            $table->boolean('is_recurring')->default(false); // هل السند مكرر؟
            $table->enum('recurrence_type', ['daily', 'weekly', 'monthly'])->nullable(); // نوع التكرار
            $table->date('recurrence_start_date')->nullable(); // تاريخ بدء التكرار
            $table->date('recurrence_end_date')->nullable(); // تاريخ انتهاء التكرار
            // جدول الحسابات
            $table->unsignedBigInteger('client_id')->nullable(); // جدول العملاء
            $table->json('attachments')->nullable(); // المرفقات
            $table->string('created_by', 255)->nullable(); // الشخص الذي أنشأ السند
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('journal_entry_id')->references('id')->on('journal_entries')->onDelete('set null');
            $table->foreign('treasury_id')->references('id')->on('treasuries')->onDelete('set null');
            $table->foreign('bank_account_id')->references('id')->on('bank_accounts')->onDelete('set null');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
