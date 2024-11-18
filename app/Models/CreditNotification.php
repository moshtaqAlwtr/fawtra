<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditNotification extends Model
{
    use HasFactory;

    // اسم الجدول في قاعدة البيانات
    protected $table = 'credit_notifications';

    // الحقول المسموح بملئها (fillable)
    protected $fillable = [
        'client_name',
        'city',
        'tax_number',
        'amount',
        'notification_number',
        'created_by'
    ];
}
