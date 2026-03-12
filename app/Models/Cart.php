<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get cart items for a user
     */
    public static function getUserCart($userId)
    {
        return self::with('product')
                   ->where('user_id', $userId)
                   ->get();
    }

    /**
     * Add item to cart
     */
    public static function addItem($userId, $productId, $quantity = 1)
    {
        $cartItem = self::where('user_id', $userId)
                        ->where('product_id', $productId)
                        ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            self::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        return true;
    }

    /**
     * Update cart item quantity
     */
    public static function updateItem($userId, $productId, $quantity)
    {
        $cartItem = self::where('user_id', $userId)
                        ->where('product_id', $productId)
                        ->first();

        if ($cartItem) {
            if ($quantity <= 0) {
                $cartItem->delete();
            } else {
                $cartItem->quantity = $quantity;
                $cartItem->save();
            }
        }

        return true;
    }

    /**
     * Remove item from cart
     */
    public static function removeItem($userId, $productId)
    {
        return self::where('user_id', $userId)
                   ->where('product_id', $productId)
                   ->delete();
    }

    /**
     * Clear user's cart
     */
    public static function clearUserCart($userId)
    {
        return self::where('user_id', $userId)->delete();
    }
}
