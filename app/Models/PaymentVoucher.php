<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentVoucher extends Model
{
    use HasFactory;

    // اسم الجدول
    protected $table = 'payment_vouchers';
    protected $primaryKey = 'payment_id';

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
        'employee_name', // اسم الموظف الجديد
        'employee_id', // معرف الموظف الجديد
        'tax_id', // معرف الضريبة الجديد
        'category',
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
        return $this->hasMany(Expense::class, '');
    }

    public function revenues()
    {
        return $this->hasMany(Revenue::class, 'payment_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id'); // علاقة مع جدول الموظفين
    }

    public function tax()
    {
        return $this->belongsTo(Tax::class, 'tax_id'); // علاقة مع جدول الضرائب
    }public function details()
    {
        return $this->hasMany(PaymentVoucherDetail::class, 'payment_id');
    }

public function treasury()
{
    return $this->belongsTo(Treasury::class, 'treasury_id');
}

protected static function booted()
{
    static::creating(function ($paymentVoucher) {
        if (is_null($paymentVoucher->voucher_date)) {
            $paymentVoucher->voucher_date = now(); // تعيين التاريخ الحالي
        }
    });
}


    // يمكنك إضافة أي علاقات إضافية هنا حسب متطلباتك
}
