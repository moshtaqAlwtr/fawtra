<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InvoiceItem
 * 
 * @property int $item_id
 * @property int $invoice_id
 * @property string|null $description
 * @property float|null $unit_price
 * @property int|null $quantity
 * @property float|null $discount
 * @property float|null $tax_1
 * @property float|null $tax_2
 * @property float|null $total
 * 
 * @property Invoice $invoice
 *
 * @package App\Models
 */
class InvoiceItem extends Model
{
	protected $table = 'invoice_items';
	protected $primaryKey = 'item_id';
	public $timestamps = false;

	protected $casts = [
		'invoice_id' => 'int',
		'unit_price' => 'float',
		'quantity' => 'int',
		'discount' => 'float',
		'tax_1' => 'float',
		'tax_2' => 'float',
		'total' => 'float'
	];

	protected $fillable = [
		'invoice_id',
		'description',
		'unit_price',
		'quantity',
		'discount',
		'tax_1',
		'tax_2',
		'total'
	];

	public function invoice()
	{
		return $this->belongsTo(Invoice::class);
	}
}
