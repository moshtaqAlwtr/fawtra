<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Inventory
 * 
 * @property int $inventory_id
 * @property int $product_id
 * @property int|null $branch_id
 * @property int $quantity
 * @property string $movement_type
 * @property Carbon $movement_date
 * @property string|null $notes
 * 
 * @property Branch|null $branch
 *
 * @package App\Models
 */
class Inventory extends Model
{
	protected $table = 'inventory';
	protected $primaryKey = 'inventory_id';
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'branch_id' => 'int',
		'quantity' => 'int',
		'movement_date' => 'datetime'
	];

	protected $fillable = [
		'product_id',
		'branch_id',
		'quantity',
		'movement_type',
		'movement_date',
		'notes'
	];

	public function branch()
	{
		return $this->belongsTo(Branch::class);
	}
}
