<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $primaryKey = 'client_id'; // تأكد من أن المفتاح الأساسي معرف
    public $timestamps = false; // إذا لم يكن لديك created_at و updated_at

    protected $fillable = [
        'trade_name',
        'first_name',
        'last_name',
        'phone',
        'mobile',
        'city',
        'region',
        'postal_code',
        'country',
        'tax_number',
        'commercial_registration',
        'credit_limit',
        'credit_period',
        'account_code',
        'printing_method',
        'opening_balance',
        'opening_balance_date',
        'currency',
        'email',
        'client_type',
        'notes',
        'attachments',
    ];

    // العلاقة مع ClientPayment
    public function payments()
    {
        return $this->hasMany(ClientPayment::class, 'client_id', 'client_id');
    }
    public function creditNotifications()
    {
        return $this->hasMany(CreditNotification::class, 'client_id');
    }

    public function journalEntries()
    {
        return $this->hasMany(JournalEntry::class, 'client_id');
    }

    public function invoices()
{
    return $this->hasMany(Invoice::class, 'client_id', 'client_id');
}

}
