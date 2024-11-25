<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('client_payments')) {
            Schema::create('client_payments', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('client_id');
                $table->unsignedBigInteger('invoice_id');
                $table->unsignedBigInteger('employee_id')->nullable();
                $table->unsignedBigInteger('entry_id')->nullable();
                $table->unsignedBigInteger('treasury_id')->nullable();
                $table->date('payment_date');
                $table->decimal('amount', 15, 2);
                $table->enum('payment_method', ['Cash', 'Bank Transfer', 'Credit Card', 'Other'])->default('Cash');
                $table->decimal('discount_amount', 15, 2)->default(0);
                $table->decimal('partial_payment_amount', 15, 2)->default(0);
                $table->enum('status', ['Paid', 'Pending', 'Failed'])->default('Pending');
                $table->text('notes')->nullable();
                $table->timestamps();

                $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
                $table->foreign('invoice_id')->references('invoice_id')->on('invoices')->onDelete('cascade');
                $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('set null');
                $table->foreign('entry_id')->references('id')->on('journal_entries')->onDelete('set null');
                $table->foreign('treasury_id')->references('id')->on('treasuries')->onDelete('set null');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('client_payments');
    }
}
