<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'mobile_no',
        'landline_no',
        'email',
        'supplier_since',
        'company',
        'tin',
        'supplier_type',
        'address',
        'status',
    ];
}