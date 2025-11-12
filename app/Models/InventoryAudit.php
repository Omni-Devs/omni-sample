<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventoryAudit extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_no',
        'audited_by',
        'type',
        'entry_datetime',
        'audit_datetime',
        'remarks',
    ];

    public function auditor()
    {
        return $this->belongsTo(User::class, 'audited_by');
    }

    public function items()
    {
        return $this->hasMany(InventoryAuditItem::class);
    }
}
