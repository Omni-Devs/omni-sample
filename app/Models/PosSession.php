<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PosSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_date',
        'transaction_time',
        'branch_id',
        'cashier_id',
        'terminal_no',
        'cash_fund',
        'status',
        'closed_at',
    ];

    // 🔗 Relationships
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function cashier()
    {
        return $this->belongsTo(User::class, 'cashier_id');
    }

    public function summary()
    {
        return $this->hasOne(PosSessionSummary::class, 'session_id');
    }
}
