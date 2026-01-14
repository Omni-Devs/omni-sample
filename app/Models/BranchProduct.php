<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BranchProduct extends Model
{
    use HasFactory;

    protected $table = 'branch_products';

    protected $fillable = [
        'branch_id',
        'product_id',
        'onhand',
    ];

    protected $casts = [
        'onhand' => 'decimal:4',
    ];

    /* ======================
     |  Relationships
     |======================*/

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
