<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.reviews.index');
    }

    public function data()
    {
        $query = Review::with(['user', 'product']);

        return DataTables::of($query)
            ->addColumn('user_col', function (Review $review) {
                return '<div style="font-weight:600;">' . e($review->user->name ?? '—') . '</div>'
                    . '<div style="font-size:0.75rem;color:#A09A94;">' . e($review->user->email ?? '') . '</div>';
            })
            ->addColumn('product_col', function (Review $review) {
                return '<span style="font-size:0.838rem;">' . e($review->product->name ?? '—') . '</span>';
            })
            ->addColumn('rating_col', function (Review $review) {
                $stars = '';
                for ($i = 1; $i <= 5; $i++) {
                    $color = $i <= $review->rating ? '#F59E0B' : '#D1D5DB';
                    $stars .= '<i class="bi bi-star-fill" style="color:' . $color . ';font-size:0.75rem;"></i>';
                }
                return $stars . ' <span style="font-size:0.75rem;color:#A09A94;">(' . $review->rating . '/5)</span>';
            })
            ->addColumn('body_col', function (Review $review) {
                return '<span style="font-size:0.838rem;">' . e(Str::limit($review->body, 80)) . '</span>';
            })
            ->addColumn('date_col', function (Review $review) {
                return '<div style="font-size:0.813rem;">' . $review->created_at->format('M d, Y') . '</div>'
                    . '<div style="font-size:0.72rem;color:#A09A94;">' . $review->created_at->diffForHumans() . '</div>';
            })
            ->addColumn('actions', function (Review $review) {
                return '<div style="display:flex;align-items:center;justify-content:flex-end;">'
                    . '<form action="' . route('admin.reviews.destroy', $review) . '" method="POST" style="display:inline;" onsubmit="return confirm(\'Delete this review? This cannot be undone.\')">'
                    . csrf_field() . method_field('DELETE')
                    . '<button type="submit" class="action-btn danger" title="Delete"><i class="bi bi-trash3"></i></button>'
                    . '</form></div>';
            })
            ->rawColumns(['user_col', 'product_col', 'rating_col', 'body_col', 'date_col', 'actions'])
            ->make(true);
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
    }
}
