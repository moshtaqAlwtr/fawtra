<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClientPayment
 * 
 * @property int $payment_id
 * @property int|null $client_id
 * @property int|null $invoice_id
 * @property Carbon $payment_date
 * @property float $amount
 * @property string $payment_method
 * @property float|null $discount_amount
 * @property float|null $partial_payment_amount
 * @property string|null $status
 * @property string|null $notes
 * 
 * @property Client|null $client
 * @property Invoice|null $invoice
 *
 * @package App\Models
 */
class ClientPayment extends Model
{
	protected $table = 'client_payments';
	protected $primaryKey = 'payment_id';
	public $timestamps = false;

	protected $casts = [
		'client_id' => 'int',
		'invoice_id' => 'int',
		'payment_date' => 'datetime',
		'amount' => 'float',
		'discount_amount' => 'float',
		'partial_payment_amount' => 'float'
	];

	protected $fillable = [
		'client_id',
		'invoice_id',
		'payment_date',
		'amount',
		'payment_method',
		'discount_amount',
		'partial_payment_amount',
		'status',
		'notes'
	];

	public function client()
	{
		return $this->belongsTo(Client::class);
	}

	public function invoice()
	{
		return $this->belongsTo(Invoice::class);
	}
}
