<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceCustomField extends Model
{
    protected $fillable = [
        'invoice_id',
        'field_name',
        'field_type',
        'field_value',
        'field_label'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
