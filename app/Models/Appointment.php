<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // تحديد الحقول القابلة للتعبئة
    protected $fillable = [
        'client', // العميل
        'date', // التاريخ
        'time', // الوقت
        'duration', // المدة
        'notes', // الملاحظات
        'status', // الحالة أو الإجراءات
        'share_with_client', // مشاركة مع العميل
        'is_recurring', // موعد متكرر
        'assigned_employees' // تعيين إلى موظفين (إذا كان هناك موظفين مرتبطين)
    ];
}
