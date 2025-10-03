<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'value',
        'created_by',
        'status',
    ];

    /**
     * Get the user who created the discount.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function discountEntries()
    {
        return $this->hasMany(DiscountEntry::class);
    }
}
