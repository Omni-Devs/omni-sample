<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkforceShift extends Model
{
    use HasFactory;

    protected $table = 'workforce_shifts';

    protected $fillable = [
        'name',
        'time_start',
        'time_end',
        'break_start',
        'break_end',
        'work_days',
        'rest_days',
        'open_time',
        'status',
        'remarks',
    ];

    protected $casts = [
        'time_start' => 'datetime:H:i',
        'time_end' => 'datetime:H:i',
        'break_start' => 'datetime:H:i',
        'break_end' => 'datetime:H:i',

        'work_days' => 'array',
        'rest_days' => 'array',
        'open_time' => 'array',
    ];
}
