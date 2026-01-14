<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventoryTransferItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_transfer_id',
        'product_id',
        'component_id',
        'quantity_requested',
        'quantity_sent'
        
    ];

    protected $casts = [
    'quantity_requested' => 'decimal:2',
    'quantity_sent'      => 'decimal:2',
];

    /**
     * The parent inventory transfer.
     */
    public function transfer()
    {
        return $this->belongsTo(InventoryTransfer::class, 'inventory_transfer_id');
    }

    /**
     * If this item is a product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * If this item is a component.
     */
    public function component()
    {
        return $this->belongsTo(Component::class, 'component_id');
    }

    /**
     * Helper to get the "item" regardless of type.
     */
    public function getItemAttribute()
    {
        return $this->product ?? $this->component;
    }

    /**
     * Boot method to enforce only one of product_id or component_id is set.
     */
    protected static function booted()
    {
        static::creating(function ($item) {
            if (!$item->product_id && !$item->component_id) {
                throw new \Exception('Either product_id or component_id must be set.');
            }
            if ($item->product_id && $item->component_id) {
                throw new \Exception('Cannot set both product_id and component_id.');
            }
        });
    }
}
