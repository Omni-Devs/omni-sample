<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountsReceivableDetail extends Model
{
    protected $table = 'accounts_receivable_details';

    protected $fillable = [
        'accounts_receivable_id',
        'type_id',
        'description',
        'qty',
        'unit_price',
        'tax_id',  
        'tax_amount',
        'sub_total',
        'total_amount',
        'attachments',
    ];

    protected $casts = [
        'attachments' => 'array',
    ];

    public function parent()
    {
        return $this->belongsTo(AccountsReceivables::class, 'accounts_receivable_id');
    }

    public function type()
    {
        return $this->belongsTo(AccountingCategory::class, 'type_id');
    }

}
