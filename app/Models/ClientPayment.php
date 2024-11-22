<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientPayment extends Model
{
    use HasFactory;

    protected $table = 'client_payments';

    protected $fillable = [
        'client_id',
        'invoice_id',
        'employee_id',
        'entry_id',
        'treasury_id',
        'payment_date',
        'amount',
        'payment_method',
        'discount_amount',
        'partial_payment_amount',
        'status',
        'notes',
    ];

    // العلاقة مع العميل
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    // العلاقة مع الفاتورة
    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

    // العلاقة مع الموظف
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    // العلاقة مع الخزينة
    public function treasury()
    {
        return $this->belongsTo(Treasury::class, 'treasury_id');
    }

    // العلاقة مع قيد اليومية
    public function journalEntry()
    {
        return $this->belongsTo(JournalEntry::class, 'entry_id');
    }
}
