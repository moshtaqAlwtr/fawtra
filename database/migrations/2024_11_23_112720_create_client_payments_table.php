<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {if (!Schema::hasTable('client_payments')) {
        Schema::create('client_payments', function (Blueprint $table) {
            $table->increments('payment_id');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('invoice_id');
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('entry_id');
            $table->unsignedInteger('treasury_id');
            $table->date('payment_date');
            $table->decimal('amount', 10, 2);
            $table->enum('payment_method', ['Cash', 'Bank Transfer', 'Credit Card', 'Other']);
            $table->decimal('discount_amount', 10, 2)->default(0);
            $table->decimal('partial_payment_amount', 10, 2)->default(0);
            $table->enum('status', ['Paid', 'Pending', 'Failed'])->default('Pending');
            $table->text('notes')->nullable();

            // المفاتيح الخارجية
            $table->foreign('client_id')->references('client_id')->on('clients')->onDelete('cascade');
            $table->foreign('invoice_id')->references('invoice_id')->on('invoices')->onDelete('cascade');
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');
            $table->foreign('entry_id')->references('entry_id')->on('journal_entries')->onDelete('cascade');
            $table->foreign('treasury_id')->references('treasury_id')->on('treasuries')->onDelete('cascade');
        });
    }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_payments');
    }
}
