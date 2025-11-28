<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccountsReceivables extends Model
{
    use HasFactory;

    protected $table = 'accounts_receivables';

    protected $fillable = [
        'transaction_datetime',
        'reference_no',
        'payor_name',
        'company',
        'address',
        'mobile_no',
        'email',
        'tin',
        'payee_details',
        'due_date',
        'user_id',
        'branch_id',   
        'transaction_type',
        'amount_due',
        'total_received',
        'balance',
        'status',
    ];

    public function items()
    {
        return $this->hasMany(AccountsReceivableDetail::class, 'accounts_receivable_id', 'id');
    }
    
     public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
