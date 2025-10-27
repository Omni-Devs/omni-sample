<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'component_id',
        'quantity',
        'price',
        'discount',
        'notes',
        'status',
    ];

     // 🔹 Automatically update parent order when detail status changes
    protected static function booted()
    {
        static::saved(function ($detail) {
            $order = $detail->order;
            if ($order) $order->refreshStatusBasedOnDetails();
        });

        static::deleted(function ($detail) {
            $order = $detail->order;
            if ($order) $order->refreshStatusBasedOnDetails();
        });
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function component()
    {
        return $this->belongsTo(Component::class, 'component_id');
    }

    // Helper: return either product or component name
    public function getItemNameAttribute()
    {
        return $this->product->name ?? $this->component->name ?? 'Unknown Item';
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_detail_id');
    }
    public function inventoryDeductions()
    {
        return $this->hasMany(InventoryDeduction::class);
    }

}
