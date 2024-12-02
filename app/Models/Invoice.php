<?php

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
 * @property Collection|PaymentVoucher[] $paymentVouchers
 * @property Employee $employee  // علاقة الموظف
 *
 * @package App\Models
 */
class Invoice extends Model
{
    protected $table = 'invoices';
    protected $primaryKey = 'invoice_id';
    public $timestamps = true;

    protected $casts = [
        'client_id' => 'int',
        'invoice_date' => 'datetime',
        'issue_date' => 'datetime',
        'total' => 'float',
        'grand_total' => 'float'
    ];

    protected $fillable = [
        'client_id',
        'invoice_date',
        'sales_manager',
        'issue_date',
        'payment_terms',
        'payment_status',
        'currency',
        'total',
        'grand_total',
        'employee_id',  // إضافة employee_id لحفظ الموظف المسؤول
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function invoice_items()
    {
        return $this->hasMany(InvoiceItem::class, 'invoice_id', 'invoice_id');
    }

    public function payments()
    {
        return $this->hasMany(ClientPayment::class, 'invoice_id');
    }

    public function paymentVouchers()
    {
        return $this->hasMany(PaymentVoucher::class, 'invoice_id');
    }

    // إضافة علاقة مع الموظف المسؤول
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    /**
     * العلاقة مع عناصر الفاتورة
     */
    public function items()
    {
        return $this->hasMany(InvoiceItem::class, 'invoice_id');
    }

    public function customFields()
    {
        return $this->hasMany(InvoiceCustomField::class);
    }

}
