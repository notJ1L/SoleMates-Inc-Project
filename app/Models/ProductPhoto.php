<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class ProductPhoto extends Model
{
    protected $fillable = [
        'product_id',
        'image_path',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /** Returns the public URL for this gallery photo. */
    public function url(): string
    {
        return Storage::disk('public')->url($this->image_path);
    }
}
