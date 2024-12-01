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
            
            // العلاقات الأساسية
            $table->unsignedBigInteger('employee_id'); // جدول الموظفين
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('restrict');
            
            $table->foreignId('treasury_id')->constrained('treasuries')->onDelete('restrict'); // جدول الخزائن
            $table->foreignId('account_id')->constrained('chart_of_accounts')->onDelete('restrict'); // جدول الحسابات
            $table->foreignId('client_id')->constrained('clients')->onDelete('restrict'); // جدول العملاء
            
            $table->enum('status', ['draft', 'approved', 'cancelled'])->default('draft'); // حالة السند
            $table->text('notes')->nullable(); // ملاحظات
            $table->string('reference')->nullable(); // رقم المرجع
            $table->timestamps(); // تواريخ الإنشاء والتحديث
        });
    }

    public function down()
    {
        Schema::dropIfExists('receipts');
    }
}
