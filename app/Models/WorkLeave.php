<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkLeave extends Model
{
    use HasFactory;

    protected $table = 'workforce_leaves';

    protected $fillable = [
        'created_by',
        'name',
        'notice_period',
        'remarks',
        'status',
    ];
    
    /**
     * Relationship: Created by (User)
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
