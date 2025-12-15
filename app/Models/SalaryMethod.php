<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalaryMethod extends Model
{
    protected $fillable = ['user_id', 'method_id', 'period_id', 'account'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
