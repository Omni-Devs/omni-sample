<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeWorkInformation extends Model
{
    protected $table = 'employee_work_informations';

    protected $fillable = [
        'user_id', 'hire_date', 'employment_status_id', 'regularization', 'designation_id', 'department_id',
        'direct_supervisor', 'monthly_rate', 'daily_rate', 'hourly_rate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
