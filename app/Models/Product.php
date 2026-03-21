<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use SoftDeletes, Searchable;
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

    public function toSearchableArray(): array
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'description' => $this->description,
            'price'       => $this->price,
            'brand'       => optional($this->brand)->name ?? '',
            'category'    => optional($this->category)->name ?? '',
        ];
    }

    public function shouldBeSearchable(): bool
    {
        return !$this->trashed();
    }

    /** Best thumbnail URL: cover photo first, else first gallery photo, else null. */
    public function thumbnailUrl(): ?string
    {
        if ($this->image) {
            return asset('storage/' . ltrim($this->image, '/'));
        }
        $first = $this->photos->first();
        return $first ? $first->url() : null;
    }
}
