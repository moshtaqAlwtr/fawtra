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
        Schema::create('journal_entry_details', function (Blueprint $table) {
            $table->id(); // رقم التفاصيل
            $table->unsignedBigInteger('journal_entry_id'); // القيد المرتبط
            $table->unsignedBigInteger('account_id'); // الحساب المرتبط
            $table->string('description')->nullable(); // وصف تفصيلي للبند
            $table->decimal('debit', 15, 2)->default(0); // المبلغ المدين
            $table->decimal('credit', 15, 2)->default(0); // المبلغ الدائن
            $table->timestamps();

            // العلاقات الخارجية
            $table->foreign('journal_entry_id')->references('id')->on('journal_entries')->onDelete('cascade');
            $table->foreign('account_id')->references('id')->on('chart_of_accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('journal_entry_details');
    }
};
