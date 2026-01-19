<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalaryMethod extends Model
{
    protected $fillable = [
        'user_id',
        'method_id',
        'period_id',
        'account',
        'shift_id',
        'custom_time_start',
        'custom_time_end',
        'custom_break_start',
        'custom_break_end',
        'custom_work_days',
        'custom_rest_days',
        'custom_open_time',
    ];

    protected $casts = [
        'custom_work_days' => 'array',
        'custom_rest_days' => 'array',
        'custom_open_time' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shift()
    {
        return $this->belongsTo(WorkforceShift::class);
    }

    // Helper: Get effective times (custom if set, else from template)
    public function getEffectiveTimeStartAttribute()
    {
        return $this->custom_time_start ?? $this->shift?->time_start;
    }

    public function getEffectiveTimeEndAttribute()
    {
        return $this->custom_time_end ?? $this->shift?->time_end;
    }

    public function getEffectiveBreakStartAttribute()
    {
        return $this->custom_break_start ?? $this->shift?->break_start;
    }

    public function getEffectiveBreakEndAttribute()
    {
        return $this->custom_break_end ?? $this->shift?->break_end;
    }
}
