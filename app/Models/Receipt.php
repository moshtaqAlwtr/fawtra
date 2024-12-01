<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = [
        'code',
        'amount',
        'description',
        'currency',
        'date',
        'payment_detail_id',  // هذا الحقل مطلوب
        'employee_id',
        'treasury_id',
        'classification',
        'client_id',
        'account_id',
        'created_at',
        'updated_at'
    ];
    protected $casts = [
        'date' => 'date',
        'amount' => 'decimal:2'
    ];

    // العلاقة مع الموظف
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    // العلاقة مع الخزينة
    public function treasury()
    {
        return $this->belongsTo(Treasury::class);
    }

    // العلاقة مع الحساب
    public function account()
    {
        return $this->belongsTo(ChartOfAccount::class, 'account_id');
    }

    // العلاقة مع العميل
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Scope للبحث عن السندات حسب الحالة
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Scope للبحث عن السندات في فترة معينة
    public function scopeInPeriod($query, $startDate, $endDate)
    {
        return $query->whereBetween('date', [$startDate, $endDate]);
    }

    // دالة لإنشاء رقم سند تلقائي
    public static function generateCode()
    {
        $lastReceipt = self::latest()->first();
        $lastNumber = $lastReceipt ? intval(substr($lastReceipt->code, 3)) : 0;
        $newNumber = $lastNumber + 1;
        return 'RCP' . str_pad($newNumber, 7, '0', STR_PAD_LEFT);
    }
}
