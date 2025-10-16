<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'payment_id',
        'cash_equivalent_id',
        'transaction_reference_no',
        'amount_paid',
        'total_rendered',
        'change_amount',
    ];

    /**
     * Relationship: each detail belongs to a payment
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class, 'order_id');
    }

    /**
     * Relationship: each detail may belong to a cash equivalent (e.g. cash, GCash, card)
     */
    public function cashEquivalent()
    {
        return $this->belongsTo(CashEquivalent::class);
    }
}
