<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoDeliveryItem extends Model
{
    use HasFactory;

    protected $table = 'po_delivery_items';

    protected $fillable = [
        'po_delivery_id',
        'po_detail_id',
        'component_id',
        'qty_received',
    ];

    public function delivery()
    {
        return $this->belongsTo(PoDelivery::class, 'po_delivery_id');
    }

    public function detail()
    {
        return $this->belongsTo(PoDetail::class, 'po_detail_id');
    }
}
