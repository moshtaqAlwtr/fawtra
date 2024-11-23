<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentVoucher extends Model
{
    use HasFactory;

    // اسم الجدول
    protected $table = 'payment_vouchers';

    // الحقول القابلة للتعبئة
    protected $fillable = [
        'date',
        'payee_name',
        'amount',
        'description',
        'account_id',
        'attachment',
        'unit',
        'vendor',
        'seller',
        'category',
        'min_limit',
        'code_number',
        'created_by',
    ];

    // العلاقات
    public function account()
    {
        return $this->belongsTo(ChartOfAccount::class, 'account_id');
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class, 'payment_voucher_id');
    }

    public function revenues()
    {
        return $this->hasMany(Revenue::class, 'payment_voucher_id');
    }

    // يمكنك إضافة أي علاقات إضافية هنا حسب متطلباتك
}
