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
        Schema::table('receipts', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_id'); // إضافة عمود مفتاح خارجي
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade'); // ربط المفتاح الخارجي
        });
    }

    public function down()
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->dropForeign(['employee_id']); // حذف العلاقة
            $table->dropColumn('employee_id'); // حذف العمود
        });
    }

    /**
     * Reverse the migrations.
     */
    }
;
