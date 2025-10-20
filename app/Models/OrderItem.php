<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class OrderItem extends Model
{
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | Mass Assignable Fields
    |--------------------------------------------------------------------------
    */
    protected $fillable = [
        'order_detail_id',
        'cook_id',
        'time_submitted',
    ];

    /*
    |--------------------------------------------------------------------------
    | Casts
    |--------------------------------------------------------------------------
    */
    protected $casts = [
        'time_submitted' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // 🔗 Each item belongs to a cook (optional if you have a Cook/User model)
    public function cook()
    {
        return $this->belongsTo(User::class, 'cook_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors / Helpers
    |--------------------------------------------------------------------------
    */

    // 🕓 Show human-readable submission time
    public function getTimeSubmittedForHumansAttribute()
    {
        return $this->time_submitted
            ? $this->time_submitted->diffForHumans()
            : null;
    }

    // ⏱️ Compute running time (e.g. "05m 12s")
    public function getRunningTimeAttribute()
    {
        if (!$this->time_submitted) {
            return null;
        }

        $diffInSeconds = now()->diffInSeconds($this->time_submitted);
        $mins = floor($diffInSeconds / 60);
        $secs = $diffInSeconds % 60;

        return sprintf('%02dm %02ds', $mins, $secs);
    }

    public function orderDetail()
    {
        return $this->belongsTo(OrderDetail::class, 'order_detail_id');
    }

}
