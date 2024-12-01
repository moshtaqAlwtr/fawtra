<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceCustomFieldsTable extends Migration
{
    public function up()
    {
        Schema::create('invoice_custom_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained()->onDelete('cascade');
            $table->string('field_name');
            $table->string('field_type');
            $table->text('field_value')->nullable();
            $table->string('field_label');
            $table->timestamps();
            
            // Index for faster searches
            $table->index(['invoice_id', 'field_name']);
            $table->index(['field_name', 'field_value']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoice_custom_fields');
    }
}
