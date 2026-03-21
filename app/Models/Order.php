<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_number',
        'total_amount',
        'status',
        'payment_method',
        'payment_status',
        'shipping_address',
        'phone',
        'shipping',
        'notes',
        'shipping_city',
        'shipping_postcode',
        'shipping_country',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItems::class);
    }

    /**
     * Calculate total amount dynamically from order items + shipping
     */
    public function getTotalAttribute()
    {
        return $this->orderItems->sum('subtotal') + $this->shipping;
    }

    /**
     * Get items subtotal (without shipping)
     */
    public function getSubtotalAttribute()
    {
        return $this->orderItems->sum('subtotal');
    }
}
