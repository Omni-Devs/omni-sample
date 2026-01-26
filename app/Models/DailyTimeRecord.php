<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DailyTimeRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'user_id',
        'salary_method_id',
        'activity',
        'time',
        'time_in_reports',
        'other_reports',
        'time_out_reports',
        'status',
        'created_by',
    ];

    protected $casts = [
        'date' => 'date',
        'time_in_reports' => 'array',
        'other_reports' => 'array',
        'time_out_reports' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function salaryMethod()
    {
        return $this->belongsTo(SalaryMethod::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
