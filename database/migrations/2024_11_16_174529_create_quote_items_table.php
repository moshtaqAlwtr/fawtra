<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuoteItemsTable extends Migration
{
    public function up()
    {
        Schema::create('quote_items', function (Blueprint $table) {
            $table->id('quote_item_id');
            $table->unsignedBigInteger('quote_id'); // الربط مع جدول quotes
            $table->unsignedBigInteger('product_id'); // الربط مع جدول products
            $table->integer('quantity');
            $table->decimal('unit_price', 10, 2);
            $table->decimal('total_price', 10, 2);

            // تعريف علاقات الربط
            $table->foreign('quote_id')
                  ->references('quote_id')
                  ->on('quotes')
                  ->onDelete('cascade');

            $table->foreign('product_id')
                  ->references('product_id')
                  ->on('products')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('quote_items');
    }
}
