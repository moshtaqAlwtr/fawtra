<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treasury extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'treasury_status',
        'description',
        'permissions',
        'balance',
    ];

    public function accounts()
    {
        return $this->hasMany(TreasuryAccount::class, 'treasury_id');
    }
    public function payments()
    {
        return $this->hasMany(ClientPayment::class, 'treasury_id', 'treasury_id');
    }
}
