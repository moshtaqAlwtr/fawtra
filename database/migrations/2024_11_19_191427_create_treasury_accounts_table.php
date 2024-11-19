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
        Schema::create('treasury_accounts', function (Blueprint $table) {
            $table->id(); // رقم الربط
            $table->unsignedBigInteger('treasury_id'); // الخزينة المرتبطة
            $table->unsignedBigInteger('account_id'); // الحساب المرتبط
            $table->timestamps();

            $table->foreign('treasury_id')->references('id')->on('treasuries')->onDelete('cascade');
            $table->foreign('account_id')->references('id')->on('chart_of_accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treasury_accounts');
    }
};
