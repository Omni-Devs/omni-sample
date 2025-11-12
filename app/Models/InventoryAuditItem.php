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
        'quantity',
    ];

    public function audit()
    {
        return $this->belongsTo(InventoryAudit::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
