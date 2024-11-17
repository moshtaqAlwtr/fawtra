<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';

    // الأعمدة القابلة للتعبئة
    protected $fillable = [
        'product_name',
        'description',
        'category',

        'stock_quantity',
        'reorder_level',
        'serial_number',
        'brand',
        'supplier',
        'barcode',
        'available_online',
        'featured_product',
        'track_inventory',
        'inventory_type',
        'low_stock_alert',
        'notes',
        'tags',
        'status',
        'purchase_price',
        'sale_price',
        'tax1',
        'tax2',
        'min_sale_price',
        'discount',
        'discount_type',
        'profit_margin',
    ];
        // إذا لم يكن هناك updated_at
    const UPDATED_AT = null;

    // تحويل البيانات
    protected $casts = [

        'stock_quantity' => 'int',
        'reorder_level' => 'int',
        'available_online' => 'boolean',
        'featured_product' => 'boolean',
        'track_inventory' => 'boolean',
        'purchase_price' => 'float',
        'sale_price' => 'float',
        'tax1' => 'float',
        'tax2' => 'float',
        'min_sale_price' => 'float',
        'discount' => 'float',
        'profit_margin' => 'float',
    ];
}
