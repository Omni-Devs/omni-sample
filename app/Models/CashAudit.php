<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CashAudit extends Model
{
    use HasFactory;

    protected $table = 'cash_audits';

    protected $fillable = [
        'branch_id',
        'cashier_id',
        'terminal_no',
        'reference_no',

        // Combined datetime field
        'transaction_datetime',

        'starting_fund',

        // New JSON field
        'payment_breakdown',

        // New computed sales total
        'total_sales',

        // Renamed field
        'receivable',

        'tip',
        'shortage',
        'overage',

        'transfer_to',
        'transfer_amount',

        // Denominations
        'd_1000',
        'd_500',
        'd_200',
        'd_100',
        'd_50',
        'd_20',
        'd_10',
        'd_5',
        'd_1',
        'd_050',
        'd_025',
        'd_010',
        'd_005',

        'remarks',
        'status',
        'closed_at',
    ];

    protected $casts = [
        'transaction_datetime' => 'datetime',

        'starting_fund' => 'decimal:2',

        // JSON breakdown
        'payment_breakdown' => 'array',

        'total_sales' => 'decimal:2',
        'receivable' => 'decimal:2',

        'tip' => 'decimal:2',
        'shortage' => 'decimal:2',
        'overage' => 'decimal:2',

        'transfer_amount' => 'decimal:2',

        'closed_at' => 'datetime',
    ];

    /**
     * 🔹 Compute total cash counted from denominations
     */
    public function getTotalCashCountedAttribute()
    {
        return
            ($this->d_1000 ?? 0) * 1000 +
            ($this->d_500 ?? 0) * 500 +
            ($this->d_200 ?? 0) * 200 +
            ($this->d_100 ?? 0) * 100 +
            ($this->d_50 ?? 0) * 50 +
            ($this->d_20 ?? 0) * 20 +
            ($this->d_10 ?? 0) * 10 +
            ($this->d_5 ?? 0) * 5 +
            ($this->d_1 ?? 0) * 1 +
            ($this->d_050 ?? 0) * 0.5 +
            ($this->d_025 ?? 0) * 0.25 +
            ($this->d_010 ?? 0) * 0.10 +
            ($this->d_005 ?? 0) * 0.05;
    }

    public function cashier()
    {
        return $this->belongsTo(User::class, 'cashier_id');
    }
    public function transferTo()
    {
        return $this->belongsTo(CashEquivalent::class, 'transfer_to');
    }
    public function auditRecord()
    {
        return $this->belongsTo(CashAuditRecord::class, 'cash_audit_record_id');
    }
}
