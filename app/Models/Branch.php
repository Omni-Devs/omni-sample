<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mobile_number',
        'phone_number',
        'email',
        'tin',
        'address',
        'contact_person',
        'permit_number',
        'dti_issued',
        'pos_sn',
        'min_number',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
