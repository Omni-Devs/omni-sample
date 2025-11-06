<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_purchase_order_id',
        'component_id',
        'qty',
        'tax',
        'sub_total',
    ];

    public function purchaseOrder()
    {
        return $this->belongsTo(InventoryPurchaseOrder::class, 'inventory_purchase_order_id');
    }

    public function component()
    {
        return $this->belongsTo(Component::class);
    }
}
