<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Bad words list for regex filter
    private function filterBadWords(string $text): string
    {
        $badWords = ['fuck', 'shit', 'ass', 'bitch', 'bastard', 'damn', 'crap', 'piss', 'dick', 'cunt'];

        foreach ($badWords as $word) {
            $masked = str_repeat('*', strlen($word));
            $text = preg_replace('/\b' . preg_quote($word, '/') . '\b/i', $masked, $text);
        }

        return $text;
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating'     => 'required|integer|min:1|max:5',
            'body'       => 'required|string|min:5|max:1000',
        ]);

        // Must have purchased the product (any non-cancelled order counts)
        $hasPurchased = Order::where('user_id', Auth::id())
            ->where('status', '!=', 'cancelled')
            ->whereHas('orderItems', fn($q) => $q->where('product_id', $request->product_id))
            ->exists();

        if (!$hasPurchased) {
            return redirect()->back()->with('error', 'You must purchase this product before reviewing it.');
        }

        // Prevent duplicate reviews
        $alreadyReviewed = Review::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->exists();

        if ($alreadyReviewed) {
            return redirect()->back()->with('error', 'You have already reviewed this product.');
        }

        Review::create([
            'user_id'    => Auth::id(),
            'product_id' => $request->product_id,
            'rating'     => $request->rating,
            'body'       => $this->filterBadWords($request->body),
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }

    public function edit(Review $review)
    {
        // Only the review owner can edit
        if ($review->user_id !== Auth::id()) {
            abort(403);
        }

        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        if ($review->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'body'   => 'required|string|min:5|max:1000',
        ]);

        $review->update([
            'rating' => $request->rating,
            'body'   => $this->filterBadWords($request->body),
        ]);

        return redirect()->route('products.show', $review->product_id)->with('success', 'Review updated successfully!');
    }
}
