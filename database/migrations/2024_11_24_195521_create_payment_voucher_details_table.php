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
        Schema::create('payment_voucher_details', function (Blueprint $table) {
    $table->id(); // المفتاح الأساسي
    $table->unsignedBigInteger('payment_id'); // المفتاح الخارجي
    $table->string('unit', 100)->nullable(); // الوحدة
    $table->decimal('amount', 15, 2); // المبلغ
    $table->string('category', 255)->nullable(); // التصنيف
    $table->unsignedBigInteger('tax_id')->nullable(); // المفتاح الخارجي للضرائب
    $table->unsignedBigInteger('account_id'); // المفتاح الخارجي للحسابات
    $table->text('description')->nullable(); // الوصف
    $table->timestamps(); // وقت الإنشاء والتحديث

    // تعريف العلاقات
    $table->foreign('payment_id')->references('payment_id')->on('payment_vouchers')->onDelete('cascade');
    $table->foreign('tax_id')->references('id')->on('taxes')->onDelete('set null');
    $table->foreign('account_id')->references('id')->on('chart_of_accounts')->onDelete('cascade');
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_voucher_details');
    }
};
