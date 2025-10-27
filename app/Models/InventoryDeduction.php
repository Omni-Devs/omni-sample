<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventoryDeduction extends Model
{
    use HasFactory;

    protected $fillable = [
        'component_id',
        'order_detail_id',
        'quantity_deducted',
        'prev_quantity',
        'new_quantity',
        'deduction_type',
        'notes',
        'user_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // 🔗 Each deduction belongs to a component
    public function component()
    {
        return $this->belongsTo(Component::class);
    }

    // 🔗 Each deduction may belong to an order detail (nullable for waste)
    public function orderDetail()
    {
        return $this->belongsTo(OrderDetail::class);
    }

    // 🔗 Each deduction is performed by a user (waiter, admin, etc.)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
