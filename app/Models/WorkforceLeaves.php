<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkforceLeaves extends Model
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
     * Always store the name in lowercase.
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->name = strtolower($model->name);
        });
    }

    /**
     * Relationship: Created by (User)
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
