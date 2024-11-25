<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id('invoice_id'); // Primary Key
            $table->unsignedBigInteger('client_id'); // Foreign Key
            $table->date('invoice_date')->nullable();
            $table->string('sales_manager', 100)->nullable();
            $table->date('issue_date')->nullable();
            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
