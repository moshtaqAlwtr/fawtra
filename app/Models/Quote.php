<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    // تحديد المفتاح الأساسي إذا كان غير افتراضي
    protected $primaryKey = 'quote_id';

    // الحقول القابلة للتعبئة
    protected $fillable = [
        'client_id',
        'quote_date',
        'total_amount',
        'status',
        'created_by',
    ];

    // العلاقات
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(Employee::class, 'created_by', 'employee_id');
    }
}
