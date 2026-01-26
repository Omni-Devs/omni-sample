<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationalBackground extends Model
{
    protected $fillable = ['user_id', 'name_of_school', 'level', 'tenure_start', 'tenure_end'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
