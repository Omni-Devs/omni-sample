<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CashAuditRecord extends Model
{
    use HasFactory;

    protected $table = 'cash_audit_records';

    protected $fillable = [
        'entry_datetime',
        'reference_no',
        'submitted_by',
        'total_amount',
        'transfer_to',
        'transfer_amount',
        'status',
    ];

    protected $casts = [
        'entry_datetime' => 'datetime',
        'total_amount'   => 'array',
        'transfer_amount' => 'decimal:2',
    ];

    /* ======================
     |  Relationships
     |======================*/

    public function audits()
    {
        return $this->hasMany(CashAudit::class);
    }

    public function submittedBy()
    {
        return $this->belongsTo(User::class, 'submitted_by');
    }

    public function transferTo()
    {
        return $this->belongsTo(CashEquivalent::class, 'transfer_to');
    }
}
