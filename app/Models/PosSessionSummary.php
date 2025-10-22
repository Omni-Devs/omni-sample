<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PosSessionSummary extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'cash_sales',
        'charge_sales',
        'cash_out',
        'short_over',
        'tip',
    ];

    // 💵 Helpful casting for numeric accuracy
    protected $casts = [
        'cash_sales' => 'decimal:2',
        'charge_sales' => 'decimal:2',
        'cash_out' => 'decimal:2',
        'short_over' => 'decimal:2',
        'tip' => 'decimal:2',
    ];

    // 🔗 Relationships
    public function session()
    {
        return $this->belongsTo(PosSession::class, 'session_id');
    }
}
