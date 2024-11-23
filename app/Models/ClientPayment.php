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
        return $this->belongsTo(Client::class, 'client_id', 'client_id');
    }


    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id', 'invoice_id');
    }

    public function treasury()
    {
        return $this->belongsTo(Treasury::class, 'treasury_id', 'treasury_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }
}
