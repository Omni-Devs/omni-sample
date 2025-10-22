<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

        protected $dates = ['created_at', 'updated_at'];
        protected $fillable = [
        'user_id',
        'order_type',
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
        'total_payment_rendered',
        'change_amount',
        'time_submitted',
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

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function refreshStatusBasedOnDetails()
    {
        $statuses = $this->details()->pluck('status')->unique();

        // 🧠 Business logic:
        if ($statuses->contains('cancelled') && $statuses->count() === 1) {
            $this->status = 'cancelled';
        }
        elseif ($statuses->every(fn($s) => $s === 'served')) {
            $this->status = 'served';
        }
        elseif ($statuses->contains('serving')) {
            $this->status = 'serving';
        }
        elseif ($statuses->contains('walked')) {
            $this->status = 'walked';
        }
        else {
            $this->status = 'serving'; // default
        }

        $this->save();
    }

    /**
     * Payment details associated with this order
     */
    public function paymentDetails()
    {
        return $this->hasMany(PaymentDetail::class, 'order_id');
    }
}
