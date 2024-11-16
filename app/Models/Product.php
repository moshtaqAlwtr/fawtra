<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';

    // إذا كان created_at موجودًا
    const UPDATED_AT = null;

    protected $casts = [
        'price' => 'float',
        'stock_quantity' => 'int',
        'reorder_level' => 'int'
    ];

    protected $fillable = [
        'product_name',
        'description',
        'category',
        'price',
        'stock_quantity',
        'reorder_level'
    ];
}
