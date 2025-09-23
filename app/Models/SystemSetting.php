<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
        protected $fillable = [
        'default_currency',
        'company_name',
        'default_language',
        'time_zone',
    ];
}
