<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentVouchersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('payment_vouchers', function (Blueprint $table) {
            $table->id('payment_id'); // المفتاح الأساسي
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('treasury_id');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->unsignedBigInteger('tax_id')->nullable();
            $table->date('voucher_date');
            $table->string('payee_name');
            $table->decimal('amount', 15, 2);
            $table->decimal('tax_amount', 15, 2)->default(0);
            $table->enum('voucher_type', ['expense', 'income'])->default('expense');
            $table->text('description')->nullable();
            $table->string('attachment')->nullable();
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->timestamps();

            // تعريف العلاقات
            $table->foreign('account_id')->references('id')->on('chart_of_accounts')->onDelete('cascade');
            $table->foreign('treasury_id')->references('id')->on('treasuries')->onDelete('cascade');
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('set null');
            $table->foreign('tax_id')->references('id')->on('taxes')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('payment_vouchers');
    }
}
