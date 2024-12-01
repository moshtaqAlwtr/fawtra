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
            $table->unsignedBigInteger('client_id')->nullable(); // العميل
            $table->unsignedBigInteger('employee_id')->nullable(); // الموظف المسؤول
            $table->date('quote_date');
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->enum('status', ['مبدئي', 'مقبول', 'مرفوض'])->default('مبدئي');
            $table->timestamps();

            // المفتاح الأجنبي للعميل
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');

            // المفتاح الأجنبي للموظف
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('quotes'); // حذف جدول العروض عند التراجع عن التهجير
    }
}
