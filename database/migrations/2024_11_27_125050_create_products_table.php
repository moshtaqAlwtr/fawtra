<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id'); // المفتاح الأساسي
            $table->string('product_name', 255); // الاسم
            $table->text('description')->nullable(); // الوصف
            $table->string('category', 100)->nullable(); // التصنيف

            $table->integer('stock_quantity')->default(0); // الكمية
            $table->integer('reorder_level')->default(0); // مستوى إعادة الطلب
            $table->string('serial_number', 255)->nullable(); // الرقم التسلسلي
            $table->string('image_path')->nullable(); // مسار الصورة
            $table->string('brand', 100)->nullable(); // الماركة
            $table->string('supplier', 100)->nullable(); // المورد
            $table->string('barcode', 255)->nullable(); // الباركود
            $table->boolean('available_online')->default(false); // متاح أون لاين
            $table->boolean('featured_product')->default(false); // منتج مميز
            $table->boolean('track_inventory')->default(false); // تتبع المخزون
            $table->string('inventory_type')->nullable(); // نوع التتبع
            $table->integer('low_stock_alert')->nullable(); // تنبيه عند انخفاض الكمية
            $table->text('notes')->nullable(); // ملاحظات
            $table->string('tags', 255)->nullable(); // الوسوم
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('active'); // الحالة
            $table->decimal('purchase_price', 10, 2)->nullable(); // سعر الشراء
            $table->decimal('sale_price', 10, 2)->nullable(); // سعر البيع
            $table->decimal('tax1', 10, 2)->nullable(); // الضريبة الأولى
            $table->decimal('tax2', 10, 2)->nullable(); // الضريبة الثانية
            $table->decimal('min_sale_price', 10, 2)->nullable(); // أقل سعر بيع
            $table->decimal('discount', 10, 2)->nullable(); // الخصم
            $table->enum('discount_type', ['percentage', 'currency'])->nullable(); // نوع الخصم
            $table->decimal('profit_margin', 10, 2)->nullable(); // هامش الربح
            $table->timestamps(); // created_at و updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
