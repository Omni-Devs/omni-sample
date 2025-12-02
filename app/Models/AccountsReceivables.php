<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Branch;
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
        'approved_by', 'approved_at',
        'completed_by', 'completed_at',
        'disapproved_by', 'disapproved_at',
        'archived_by', 'archived_at',
    ];

    public function items()
    {
        return $this->hasMany(AccountsReceivableDetail::class, 'accounts_receivable_id', 'id');
    }

    public function payments()
    {
        return $this->hasMany(AccountsReceivablesPayment::class, 'account_receivable_id', 'id');
    }
    
     public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function branch()
    {
        return $this->belongsTo(\App\Models\Branch::class, 'branch_id');
    }
    public function approvedBy()    
    { 
        return $this->belongsTo(User::class, 'approved_by'); 
    }
    public function completedBy()   
    { 
        return $this->belongsTo(User::class, 'completed_by'); 
    }
    public function disapprovedBy() 
    { 
        return $this->belongsTo(User::class, 'disapproved_by'); 
    }
    public function archivedBy()    
    { 
        return $this->belongsTo(User::class, 'archived_by'); 
    }

    protected static function booted()
    {
        static::creating(function ($ar) {
            // Get the branch of the currently logged-in user
            $user = auth()->user();

            if ($user) {
                // Option A: User belongs to one branch only (most common)
                $branch = $user->branches()->first();

                // Option B: If user can belong to many branches, pick active one
                // $branch = $user->branches()->wherePivot('is_active', true)->first();

                if ($branch) {
                    $ar->branch_id = $branch->id;
                }
            }
        });
    }
}
