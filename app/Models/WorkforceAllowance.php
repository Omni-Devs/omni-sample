<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkforceAllowance extends Model
{
    use HasFactory;

    protected $table = 'workforce_allowances';

    protected $fillable = [
        'created_by',
        'name',
        'remarks',
        'status',
    ];

    // Relationship: creator
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
