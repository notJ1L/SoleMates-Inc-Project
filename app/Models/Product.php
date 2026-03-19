<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'price',
        'slug',
        'category_id',
        'brand_id',
        'stock',
        'image',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(ProductPhoto::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItems::class);
    }

    /** Best thumbnail URL: cover photo first, else first gallery photo, else null. */
    public function thumbnailUrl(): ?string
    {
        if ($this->image) {
            return \Illuminate\Support\Facades\Storage::disk('public')->url($this->image);
        }
        $first = $this->photos->first();
        return $first ? $first->url() : null;
    }
}
