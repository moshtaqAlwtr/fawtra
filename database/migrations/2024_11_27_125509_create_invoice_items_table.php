<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id('item_id'); // Primary Key
            $table->unsignedBigInteger('invoice_id')->nullable(); // مفتاح خارجي للفواتير
            $table->string('item'); // إضافة حقل 'item' لتخزين اسم العنصر
            $table->text('description')->nullable(); // الوصف
            $table->decimal('unit_price', 10, 2)->nullable(); // سعر الوحدة
            $table->integer('quantity')->nullable(); // الكمية
            $table->decimal('discount', 10, 2)->nullable(); // الخصم
            $table->string('discount_type', 50)->nullable(); // نوع الخصم (إن وجد)
            $table->decimal('tax_1', 5, 2)->nullable(); // الضريبة 1
            $table->decimal('tax_2', 5, 2)->nullable(); // الضريبة 2
            $table->decimal('total', 10, 2)->nullable(); // الإجمالي
            $table->timestamps(); // created_at, updated_at

            // Foreign key constraint
            $table->foreign('invoice_id')->references('invoice_id')->on('invoices')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_items');
    }
}
