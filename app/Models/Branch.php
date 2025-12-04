<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'Branches';

    protected $fillable = [
        'name',
        'mobile_number',
        'phone_number',
        'email',
        'tin',
        'address',
        'contact_person',
        'permit_number',
        'dti_issued',
        'pos_sn',
        'min_number',
        'status',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'branch_user', 'branch_id', 'user_id');
    }

    public function accountsReceivables()
    {
        return $this->hasMany(AccountsReceivables::class, 'branch_id');
    }
}
