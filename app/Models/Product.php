<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'code', 'name', 'price', 'status', 'image', 'category_id', 'subcategory_id'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }
    
    public function recipes() {
        return $this->hasMany(Recipe::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}