<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // رقم السند
            $table->decimal('amount', 15, 2); // المبلغ
            $table->text('description')->nullable(); // الوصف
            $table->string('currency')->default('SAR'); // العملة
            $table->date('date'); // تاريخ السند
            $table->foreignId('unit_id')->constrained(); // جدول الوحدات
            $table->foreignId('employee_id')->constrained(); // جدول الموظفين
            $table->foreignId('treasury_id')->constrained(); // جدول الخزائن
            $table->enum('classification', ['default', 'custom'])->default('default'); // التصنيف
            $table->boolean('is_recurring')->default(false); // هل السند مكرر؟
            $table->enum('recurrence_type', ['daily', 'weekly', 'monthly'])->nullable(); // نوع التكرار
            $table->date('recurrence_start_date')->nullable(); // تاريخ بدء التكرار
            $table->date('recurrence_end_date')->nullable(); // تاريخ انتهاء التكرار (اختياري)
            $table->foreignId('account_id')->constrained(); // جدول الحسابات
            $table->foreignId('client_id')->constrained(); // العلاقة مع جدول العملاء
            $table->json('attachments')->nullable(); // المرفقات (تخزينها بصيغة JSON لحفظ روابط الملفات)
            $table->timestamps(); // تواريخ الإنشاء والتحديث
        });

        // جدول pivot لعلاقة عديدة إلى عديدة مع الضرائب
        Schema::create('receipt_tax', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receipt_id')->constrained(); // مفتاح خارجي إلى سند القبض
            $table->foreignId('tax_id')->constrained(); // مفتاح خارجي إلى الضرائب
            $table->timestamps();
        });

        // جدول pivot لعلاقة عديدة إلى عديدة مع القيود المحاسبية
        Schema::create('receipt_journal_entry', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receipt_id')->constrained(); // مفتاح خارجي إلى سند القبض
            $table->foreignId('journal_entry_id')->constrained(); // مفتاح خارجي إلى القيود
            $table->timestamps();
        });
    }
















}