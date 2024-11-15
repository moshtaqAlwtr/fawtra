<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier
 * 
 * @property int $supplier_id
 * @property string $trade_name
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $phone
 * @property string|null $mobile
 * @property string|null $email
 * @property string|null $city
 * @property string|null $region
 * @property string|null $postal_code
 * @property string|null $country
 * @property string|null $tax_number
 * @property string|null $commercial_registration
 * @property string|null $currency
 * @property float|null $opening_balance
 * @property Carbon|null $opening_balance_date
 * @property string|null $notes
 * @property string|null $attachments
 * @property Carbon|null $created_at
 * 
 * @property Collection|PurchaseOrder[] $purchase_orders
 *
 * @package App\Models
 */
class Supplier extends Model
{
	protected $table = 'suppliers';
	protected $primaryKey = 'supplier_id';
	public $timestamps = false;

	protected $casts = [
		'opening_balance' => 'float',
		'opening_balance_date' => 'datetime'
	];

	protected $fillable = [
		'trade_name',
		'first_name',
		'last_name',
		'phone',
		'mobile',
		'email',
		'city',
		'region',
		'postal_code',
		'country',
		'tax_number',
		'commercial_registration',
		'currency',
		'opening_balance',
		'opening_balance_date',
		'notes',
		'attachments'
	];

	public function purchase_orders()
	{
		return $this->hasMany(PurchaseOrder::class);
	}
}
