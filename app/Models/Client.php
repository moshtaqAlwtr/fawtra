<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients'; // تأكد أن اسم الجدول صحيح
    protected $primaryKey = 'client_id'; // إذا كان لديك حقل مفتاح أساسي غير الحقل الافتراضي `id`

    public $timestamps = false; // إذا لم يكن لديك حقول created_at و updated_at

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
      //  'display_language'
    ];
    public function creditNotifications()
    {
        return $this->hasMany(CreditNotification::class, 'client_id');
    }

    public function journalEntries()
    {
        return $this->hasMany(JournalEntry::class, 'client_id');
    }
}
