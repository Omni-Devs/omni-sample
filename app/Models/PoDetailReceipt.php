<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoDetailReceipt extends Model
{
    use HasFactory;

    protected $table = 'po_detail_receipts';

    protected $fillable = [
        'po_detail_id',
        'inventory_purchase_order_id',
        'component_id',
        'qty_received',
        'delivery_dr',
        'received_by',
        'received_at',
    ];

    public function detail()
    {
        return $this->belongsTo(PoDetail::class, 'po_detail_id');
    }

    public function component()
    {
        return $this->belongsTo(Component::class);
    }
}
