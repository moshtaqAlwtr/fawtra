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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id(); // رقم العملية
            $table->unsignedBigInteger('account_id'); // الحساب المرتبط بالعملية
            $table->decimal('amount', 15, 2); // مبلغ العملية
            $table->date('transaction_date'); // تاريخ العملية
            $table->enum('transaction_type', ['debit', 'credit']); // نوع العملية (مدين/دائن)
            $table->text('description')->nullable(); // وصف العملية
            $table->timestamps();

            $table->foreign('account_id')->references('id')->on('chart_of_accounts')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
