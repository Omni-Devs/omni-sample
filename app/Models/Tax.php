<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tax extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'name',
        'value',
        'type',
        'status',
        'created_at',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
