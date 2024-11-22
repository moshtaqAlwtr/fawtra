<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'description',
        'currency',
        'attachment',
        'client_id',
        'employee_id',
        'invoice_id',
    ];
    public function details()
    {
        return $this->hasMany(JournalEntryDetail::class, 'journal_entry_id');
    }

   public function client()
{
    return $this->belongsTo(Client::class, 'client_id');
}

public function employee()
{
    return $this->belongsTo(Employee::class, 'employee_id');
}

public function invoice()
{
    return $this->belongsTo(Invoice::class, 'invoice_id');
}

}
