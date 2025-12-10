<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NightDifferential extends Model
{
    protected $fillable = [
        'time_from',
        'time_to',
        'percentage',
    ];

}
