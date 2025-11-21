<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountingCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'mode',                    // payable or receivable
        'category_payable',        // enum list for payable
        'category_receivable',     // enum list for receivable
        'type_payable',
        'type_receivable',
        'created_by',
        'status',
    ];
}
