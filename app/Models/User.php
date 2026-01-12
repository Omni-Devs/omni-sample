<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Branch;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'last_name',        // Add last_name
        'first_name',       // Add first_name
        'middle_name',      // Add middle_name
        'name',
        'email',
        'password',
        'username',
        'image',
        'mobile_number',
        'address',
        'status',
        // profile / HR fields
        'avatar',
        'biometric_number',
        'id_number',
        'tin',
        'sss_number',
        'phil_health_number',
        'pag_ibig_number',
        'blood_type_id',
        'date_of_birth',
        'age',
        'civil_status_id',
        'allow_timekeeper_access',
        'allow_prf_access',
        'allow_inventory_request',
        'allow_processed_goods_logging',
        'allow_sales_report',
        'allow_fund_transfer',
        'allow_liquidation',
        'landline_number',
        'gender_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * The branches that belong to the user (pivot table `branch_user`).
     */
    public function branches()
    {
        return $this->belongsToMany(Branch::class, 'branch_user', 'user_id', 'branch_id');
    }

    // HR related relationships
    public function spouseDetail()
    {
        return $this->hasOne(\App\Models\SpouseDetail::class);
    }

    public function contactPerson()
    {
        return $this->hasOne(\App\Models\ContactPerson::class);
    }

    public function salaryMethod()
    {
        return $this->hasOne(\App\Models\SalaryMethod::class);
    }

    public function educationalBackgrounds()
    {
        return $this->hasMany(\App\Models\EducationalBackground::class);
    }

    public function dependents()
    {
        return $this->hasMany(\App\Models\Dependent::class);
    }

    public function employeeWorkInformations()
    {
        return $this->hasMany(\App\Models\EmployeeWorkInformation::class);
    }

    /**
     * Allowances assigned to the user (pivot table `user_allowances`).
     */
    public function allowances()
    {
        return $this->belongsToMany(\App\Models\WorkforceAllowance::class, 'user_allowances', 'user_id', 'allowance_id')
                    ->withPivot('amount', 'monthly_count')
                    ->withTimestamps();
    }

    /**
     * Leaves assigned to the user (pivot table `user_leaves`).
     */
    public function leaves()
    {
        return $this->belongsToMany(\App\Models\WorkLeave::class, 'user_leaves', 'user_id', 'leave_id')
                    ->withPivot('days', 'effective_date')
                    ->withTimestamps();
    }

    // direct supervisor relationship (employee_work_informations uses direct_supervisor id)
    public function supervisor()
    {
        return $this->belongsTo(\App\Models\User::class, 'direct_supervisor');
    }

    public function attachments()
    {
        return $this->hasMany(\App\Models\Attachment::class);
    }
}
