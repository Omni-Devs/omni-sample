<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CashAudit extends Model
{
    use HasFactory;

    protected $table = 'cash_audit';

    protected $fillable = [
        'branch_id',
        'cashier_id',
        'terminal_no',
        'transaction_date',
        'transaction_time',
        'starting_fund',
        'cash_sales',
        'gcash_sales',
        'bdo_sales',
        'bpi_sales',
        'other',
        'total_sales',
        'receivable_bpi',
        'tip',
        'shortage',
        'overage',
        'transfer_to',
        'transfer_amount',
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
        'transaction_date' => 'date',
        'transaction_time' => 'datetime:H:i:s',
        'starting_fund' => 'decimal:2',
        'cash_sales' => 'decimal:2',
        'gcash_sales' => 'decimal:2',
        'bdo_sales' => 'decimal:2',
        'bpi_sales' => 'decimal:2',
        'receivable_bpi' => 'decimal:2',
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

    /**
     * 🔹 Example relationships (optional)
     * Uncomment or adjust based on your actual setup
     */
    // public function branch()
    // {
    //     return $this->belongsTo(Branch::class);
    // }

    public function cashier()
    {
        return $this->belongsTo(User::class, 'cashier_id');
    }
}
