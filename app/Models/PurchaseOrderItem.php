<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PurchaseOrderItem
 * 
 * @property int $item_id
 * @property int $order_id
 * @property int $product_id
 * @property int $quantity
 * @property float|null $unit_price
 * @property float|null $total_price
 * 
 * @property PurchaseOrder $purchase_order
 *
 * @package App\Models
 */
class PurchaseOrderItem extends Model
{
	protected $table = 'purchase_order_items';
	protected $primaryKey = 'item_id';
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int',
		'product_id' => 'int',
		'quantity' => 'int',
		'unit_price' => 'float',
		'total_price' => 'float'
	];

	protected $fillable = [
		'order_id',
		'product_id',
		'quantity',
		'unit_price',
		'total_price'
	];

	public function purchase_order()
	{
		return $this->belongsTo(PurchaseOrder::class, 'order_id');
	}
}
