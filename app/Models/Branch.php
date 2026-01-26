<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    // migrations create a `branches` table; ensure model uses the same lower-case table name
    protected $table = 'branches';

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

    /**
     * Permissions assigned to this branch (many-to-many with Spatie Permission model).
     */
    /**
     * Roles assigned to this branch (many-to-many with Role model).
     *
     * Replaces the legacy branch -> permission pivot with branch -> role pivot.
     */
    public function roles()
    {
        return $this->belongsToMany(\App\Models\Role::class, 'branch_role', 'branch_id', 'role_id');
    }

    public function accountsReceivables()
    {
        return $this->hasMany(AccountsReceivables::class, 'branch_id');
    }

    public function products()
    {
        return $this->hasMany(BranchProduct::class);
    }

    public function components()
    {
        return $this->hasMany(BranchComponent::class);
    }
}
