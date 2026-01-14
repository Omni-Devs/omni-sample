<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryTransferSendOut extends Model
{
    protected $fillable = [
        'inventory_transfer_id',
        'delivery_request_no',
        'personel_name',
        'items_onload',
        'received_by',
        'received_datetime',
    ];

    protected $casts = [
        'items_onload' => 'array',
        'received_datetime' => 'datetime',
    ];

    public function transfer()
    {
        return $this->belongsTo(InventoryTransfer::class, 'inventory_transfer_id');
    }
    public function receiver()
{
    return $this->belongsTo(User::class, 'received_by');
}
}
