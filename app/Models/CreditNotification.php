<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditNotification extends Model
{
    use HasFactory;

    protected $table = 'credit_notifications';

    protected $fillable = [
        'notification_number',
        'notification_date',
        'sales_responsible',
        'issue_date',
        'client_id',
        'employee_id', // تأكد من إضافة هذا الحقل في الميجريشن
        'method',
    ];

    // العلاقة مع جدول العملاء
    public function client()
{
    return $this->belongsTo(Client::class, 'id');
}

public function employee()
{
    return $this->belongsTo(Employee::class,  'employee_id');
}

}
