<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountsReceivablesPayment extends Model
{
    protected $fillable = [
        'account_receivable_id',
        'cash_equivalent_id',
        'payment_method_id',
        'amount',
        'transaction_datetime',
    ];

    public function accountReceivable()
    {
        return $this->belongsTo(AccountsReceivables::class);
    }

    public function cashEquivalent()
    {
        return $this->belongsTo(CashEquivalent::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(Payment::class, 'payment_method_id');
    }
}
