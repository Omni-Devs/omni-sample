<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

        protected $fillable = [
        'user_id',
        'table_no',
        'number_pax',
        'status',
        'gross_amount',
        'sr_pwd_discount',
        'other_discounts',
        'net_amount',
        'vatable',
        'vat_12',
        'non_taxable',
        'total_charge',
        'discount_total',
        'charges_description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function discountEntries()
    {
        return $this->hasMany(DiscountEntry::class);
    }
    
    public function orderDetails()
{
    return $this->hasMany(OrderDetail::class, 'order_id');
}

    /**
     * Payment details associated with this order
     */
    public function paymentDetails()
    {
        return $this->hasMany(\App\Models\PaymentDetail::class, 'order_id');
    }
}
