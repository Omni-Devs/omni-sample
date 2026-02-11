<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'code', 'name', 'price', 'status', 'image', 'category_id', 'subcategory_id', 'quantity', 'unit_id', 'station_id'
    ];

    protected $casts = [
        'quantity' => 'decimal:2',
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


    public function remarks()
    {
        return $this->hasMany(Remark::class);
    }

    public function branchStocks()
    {
        return $this->hasMany(BranchProduct::class);
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    
}