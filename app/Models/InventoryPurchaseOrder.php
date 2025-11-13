<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryPurchaseOrder extends Model
{
    protected $fillable = [
        'po_number',
        'user_id',
        'department',
        'supplier_id',
        'prf_reference_number',
        'proforma_reference_number',
        'type_of_request',
        'select_origin',
        'status',
        'created_at',
        'branch_id',
        'attachments',
        'delivery_dr',
        'approved_by',
        'approved_at',
        'archived_by',
        'archived_at',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function details()
    {
        return $this->hasMany(PoDetail::class, 'inventory_purchase_order_id');
    }

    
    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function archivedBy()
    {
        return $this->belongsTo(User::class, 'archived_by');
    }

    public function items() { return $this->hasMany(PurchaseOrderItem::class, 'purchase_order_id'); }
}
