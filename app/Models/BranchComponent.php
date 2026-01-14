<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BranchComponent extends Model
{
    use HasFactory;

    protected $table = 'branch_components';

    protected $fillable = [
        'branch_id',
        'component_id',
        'onhand',
        'cost',
        'price',
        'status',
        'for_sale',
        'supplier_id',
    ];

    protected $casts = [
        'onhand' => 'string',
        'cost' => 'string',
        'price' => 'string',
        'status' => 'string',
        'for_sale' => 'boolean',
    ];

    /* ======================
     |  Relationships
     |======================*/

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function component()
    {
        return $this->belongsTo(Component::class);
    }
}
