<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoDelivery extends Model
{
    use HasFactory;

    protected $table = 'po_delivery';

    protected $fillable = [
        'inventory_purchase_order_id',
        'user_id',
        'delivery_receipt',
        'received_at',
    ];

    public function items()
    {
        return $this->hasMany(PoDeliveryItem::class, 'po_delivery_id');
    }
}
