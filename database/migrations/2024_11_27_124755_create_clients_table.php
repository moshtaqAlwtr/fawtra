<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('trade_name', 255);
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('region', 100)->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('tax_number', 50)->nullable();
            $table->string('commercial_registration', 100)->nullable();
            $table->decimal('credit_limit', 10, 2)->nullable();
            $table->integer('credit_period')->nullable();
            $table->enum('printing_method', ['طباعة', 'cash'])->nullable();
            $table->decimal('opening_balance', 10, 2)->nullable();
            $table->date('opening_balance_date')->nullable();
            $table->string('currency', 50)->nullable();
            $table->string('email', 255)->nullable();
            $table->enum('client_type', ['عميل نقدي', 'عميل آجل'])->nullable();
            $table->text('notes')->nullable();
            $table->text('attachments')->nullable();
            $table->text('account_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
