<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'code', 'cost', 'price', 'unit', 'onhand', 'status', 'image', 'for_sale', 'category_id', 'subcategory_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    public function remarks()
    {
        return $this->hasMany(Remark::class);
    }

}
