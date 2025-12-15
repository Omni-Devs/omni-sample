<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    protected $fillable = ['user_id', 'name', 'birthdate', 'age', 'gender', 'relationship'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
