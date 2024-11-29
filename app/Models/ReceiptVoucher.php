<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    // اسم الجدول في قاعدة البيانات
    protected $table = 'receipts';

    // الأعمدة القابلة للتعديل
    protected $fillable = [
        'code',
        'amount',
        'description',
        'currency',
        'date',
        'payment_detail_id',
        'employee_id',
        'treasury_id',
        'bank_account_id',
        'journal_entry_id',
        'classification',
        'is_recurring',
        'recurrence_type',
        'recurrence_start_date',
        'recurrence_end_date',
        'client_id',
        'attachments',
        'created_by',
    ];

    // العلاقات مع الجداول الأخرى

    // علاقة مع جدول PaymentVoucherDetails
    public function paymentVoucherDetail()
    {
        return $this->belongsTo(PaymentVoucherDetail::class, 'payment_detail_id');
    }

    // علاقة مع جدول Employees
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    // علاقة مع جدول Treasuries
    public function treasury()
    {
        return $this->belongsTo(Treasury::class, 'treasury_id');
    }

    // علاقة مع جدول BankAccounts
    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class, 'bank_account_id');
    }

    // علاقة مع جدول JournalEntries
    public function journalEntry()
    {
        return $this->belongsTo(JournalEntry::class, 'journal_entry_id');
    }

    // علاقة مع جدول Clients
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
