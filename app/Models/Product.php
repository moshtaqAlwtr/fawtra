<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $product_id
 * @property string $product_name
 * @property string|null $description
 * @property string|null $category
 * @property float $price
 * @property int|null $stock_quantity
 * @property int|null $reorder_level
 * @property Carbon|null $created_at
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'products';
	protected $primaryKey = 'product_id';
	public $timestamps = false;

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
