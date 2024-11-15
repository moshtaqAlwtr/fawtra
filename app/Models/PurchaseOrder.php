<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PurchaseOrder
 * 
 * @property int $order_id
 * @property int $supplier_id
 * @property Carbon $order_date
 * @property Carbon|null $expected_delivery_date
 * @property float|null $total_amount
 * @property string|null $status
 * @property Carbon|null $created_at
 * 
 * @property Supplier $supplier
 * @property Collection|PurchaseOrderItem[] $purchase_order_items
 *
 * @package App\Models
 */
class PurchaseOrder extends Model
{
	protected $table = 'purchase_orders';
	protected $primaryKey = 'order_id';
	public $timestamps = false;

	protected $casts = [
		'supplier_id' => 'int',
		'order_date' => 'datetime',
		'expected_delivery_date' => 'datetime',
		'total_amount' => 'float'
	];

	protected $fillable = [
		'supplier_id',
		'order_date',
		'expected_delivery_date',
		'total_amount',
		'status'
	];

	public function supplier()
	{
		return $this->belongsTo(Supplier::class);
	}

	public function purchase_order_items()
	{
		return $this->hasMany(PurchaseOrderItem::class, 'order_id');
	}
}
