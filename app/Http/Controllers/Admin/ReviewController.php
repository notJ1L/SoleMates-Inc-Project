<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
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

    public function data(Request $request)
    {
        $trashed = $request->boolean('trashed');

        $query = Review::withTrashed()
            ->with(['user', 'product'])
            ->when($trashed,  fn($q) => $q->onlyTrashed())
            ->when(!$trashed, fn($q) => $q->whereNull('deleted_at'))
            ->when($request->filled('rating_filter'), fn($q) => $q->where('rating', $request->rating_filter));

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
                if ($review->trashed()) {
                    return '<div style="display:flex;align-items:center;justify-content:flex-end;gap:0.375rem;">'
                        . '<form action="' . route('admin.reviews.restore', $review->id) . '" method="POST" style="display:inline;">'
                        . csrf_field()
                        . '<button type="submit" class="action-btn success" title="Restore"><i class="bi bi-arrow-counterclockwise"></i></button>'
                        . '</form>'
                        . '<form action="' . route('admin.reviews.forceDelete', $review->id) . '" method="POST" onsubmit="return confirm(\'Permanently delete this review? This cannot be undone.\')" style="display:inline;">'
                        . csrf_field() . method_field('DELETE')
                        . '<button type="submit" class="action-btn danger" title="Delete Permanently"><i class="bi bi-trash3-fill"></i></button>'
                        . '</form></div>';
                }
                return '<div style="display:flex;align-items:center;justify-content:flex-end;">'
                    . '<form action="' . route('admin.reviews.destroy', $review) . '" method="POST" style="display:inline;" onsubmit="return confirm(\'Move this review to trash?\')">'
                    . csrf_field() . method_field('DELETE')
                    . '<button type="submit" class="action-btn danger" title="Move to Trash"><i class="bi bi-trash3"></i></button>'
                    . '</form></div>';
            })
            ->rawColumns(['user_col', 'product_col', 'rating_col', 'body_col', 'date_col', 'actions'])
            ->make(true);
    }

    public function destroy(Review $review)
    {
        $review->delete(); // soft delete
        return redirect()->route('admin.reviews.index')->with('success', 'Review moved to trash.');
    }

    public function restore($id)
    {
        Review::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.reviews.index')->with('success', 'Review restored successfully.');
    }

    public function forceDelete($id)
    {
        Review::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('admin.reviews.index')->with('success', 'Review permanently deleted.');
    }
}
