<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating'     => 'required|integer|min:1|max:5',
            'body'       => 'required|string|max:2000',
        ]);

        $user = Auth::user();

        // Must have purchased the product
        $hasPurchased = $user->orders()
            ->whereIn('status', ['completed', 'delivered'])
            ->whereHas('orderItems', fn($q) => $q->where('product_id', $request->product_id))
            ->exists();

        if (!$hasPurchased) {
            return back()->with('error', 'You must purchase this product before reviewing it.');
        }

        // Only one active review per product per user
        $existing = Review::withTrashed()
            ->where('user_id', $user->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($existing && !$existing->trashed()) {
            return back()->with('error', 'You have already reviewed this product.');
        }

        if ($existing && $existing->trashed()) {
            // Restore a previously soft-deleted review and update it
            $existing->restore();
            $existing->update([
                'rating' => $request->rating,
                'body'   => $request->body,
            ]);
        } else {
            Review::create([
                'user_id'    => $user->id,
                'product_id' => $request->product_id,
                'rating'     => $request->rating,
                'body'       => $request->body,
            ]);
        }

        return back()->with('success', 'Your review has been submitted. Thank you!');
    }

    public function edit(Review $review)
    {
        abort_unless(Auth::id() === $review->user_id, 403);
        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        abort_unless(Auth::id() === $review->user_id, 403);

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'body'   => 'required|string|max:2000',
        ]);

        $review->update([
            'rating' => $request->rating,
            'body'   => $request->body,
        ]);

        return redirect()->route('products.show', $review->product)
            ->with('success', 'Your review has been updated.');
    }
}
