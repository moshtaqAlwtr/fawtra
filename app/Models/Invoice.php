<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Invoice
 *
 * @property int $invoice_id
 * @property int $client_id
 * @property string $invoice_number
 * @property Carbon|null $invoice_date
 * @property string|null $sales_manager
 * @property Carbon|null $issue_date
 * @property string|null $payment_terms
 * @property float|null $total
 * @property float|null $grand_total
 * @property string|null $currency
 * @property string|null $payment_status
 * @property Carbon|null $created_at
 *
 * @property Client $client
 * @property Collection|ClientPayment[] $client_payments
 * @property Collection|InvoiceItem[] $invoice_items
 *
 * @package App\Models
 */
class Invoice extends Model
{
	protected $table = 'invoices';
	protected $primaryKey = 'invoice_id';
	public $timestamps = false;

	protected $casts = [
		'client_id' => 'int',
		'invoice_date' => 'datetime',
		'issue_date' => 'datetime',
		'total' => 'float',
		'grand_total' => 'float'
	];

	protected $fillable = [
		'client_id',
		'invoice_number',
		'invoice_date',
		'sales_manager',
		'issue_date',
		'payment_terms'
	];


    public function client()
{
    return $this->belongsTo(Client::class, 'client_id', 'client_id');
}


	public function client_payments()
	{
		return $this->hasMany(ClientPayment::class);
	}

	public function invoice_items()
	{
		return $this->hasMany(InvoiceItem::class);
	}
}
