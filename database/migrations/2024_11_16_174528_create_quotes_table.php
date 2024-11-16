<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id('quote_id');
            $table->unsignedBigInteger('client_id')->nullable(); // يمكن إضافته إذا كنت تستخدم جدول العملاء
            $table->date('quote_date');
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->enum('status', ['مبدئي', 'مقبول', 'مرفوض'])->default('مبدئي');
            $table->unsignedBigInteger('created_by'); // الربط مع جدول employees
            $table->timestamps();

            // تعريف علاقة الربط مع employees
            $table->foreign('created_by')
                  ->references('employee_id')
                  ->on('employees')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('quotes');
    }
}
