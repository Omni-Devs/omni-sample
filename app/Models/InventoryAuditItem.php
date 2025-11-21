<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventoryAuditItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_audit_id',
        'product_id',
        'component_id',
        'quantity',
        'system_qty',
        'audit_qty',
        'variance',
        'variance_percentage',
    ];

    // append computed attributes to JSON
    protected $appends = [
        'system_qty',
        'audit_qty',
        'variance',
        'variance_percentage',
    ];

    public function audit()
    {
        return $this->belongsTo(InventoryAudit::class, 'inventory_audit_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function component()
    {
        return $this->belongsTo(Component::class);
    }

    public function getSystemQtyAttribute()
    {
        if ($this->component) {
            return (float) $this->component->onhand;
        }

        if ($this->product) {
            return 0;
        }

        return 0;
    }

    public function getAuditQtyAttribute()
    {
        return (float) $this->quantity;
    }

    public function getVarianceAttribute()
    {
        return $this->audit_qty - $this->system_qty;
    }

    public function getVariancePercentageAttribute()
    {
        if ($this->system_qty == 0) {
            return 0;
        }

        return round(($this->variance / $this->system_qty) * 100, 2);
    }
}
