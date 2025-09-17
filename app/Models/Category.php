<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'description'];

    public function subcategories() {
        return $this->hasMany(Subcategory::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function components() {
        return $this->hasMany(Component::class);
    }
}
