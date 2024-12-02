<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $table = 'invoice_items';
    protected $primaryKey = 'item_id';
    public $incrementing = true;

    protected $fillable = [
        'invoice_id',
        'item',
        'description',
        'unit_price',
        'quantity',
        'discount',
        'tax_1',
        'tax_2',
        'total',
    ];

    protected $casts = [
        'unit_price' => 'decimal:2',
        'discount' => 'decimal:2',
        'tax_1' => 'decimal:2',
        'tax_2' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

    // إضافة علاقة مع الدفع (PaymentVoucherDetail)
    public function paymentVoucherDetails()
    {
        return $this->hasMany(PaymentVoucherDetail::class, 'invoice_item_id');
    }
}
