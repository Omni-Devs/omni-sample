<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferenceCounter extends Model
{
    protected $fillable = ['branch_id', 'prefix', 'last_number'];
}
