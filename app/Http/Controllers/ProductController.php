<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    // SIMPLE product listing without CSS/filters
    public function simpleIndex()
    {
        $products = Product::with(['category', 'brand'])->get();
        return view('products.simple-index', compact('products'));
    }

    // SIMPLE product detail without CSS
    public function simpleShow(Product $product)
    {
        $product->load(['category', 'brand', 'photos']);
        return view('products.simple-show', compact('product'));
    }

    public function index(Request $request)
    {
        $query = Product::with(['category', 'brand', 'photos'])
                        ->withCount('reviews')
                        ->withAvg('reviews', 'rating');

        // Search
        if ($request->filled('search')) {
            $search = trim((string) $request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhereHas('brand', function ($bq) use ($search) {
                      $bq->where('name', 'like', '%' . $search . '%');
                  });
            });
        }

        // Category filter
        if ($request->filled('category_id') && is_numeric($request->input('category_id'))) {
            $query->where('category_id', (int) $request->input('category_id'));
        }

        // Brand filter
        if ($request->filled('brand_id') && is_numeric($request->input('brand_id'))) {
            $query->where('brand_id', (int) $request->input('brand_id'));
        }

        // Price range filter
        if ($request->filled('price_min') && is_numeric($request->input('price_min'))) {
            $query->where('price', '>=', (float) $request->input('price_min'));
        }
        if ($request->filled('price_max') && is_numeric($request->input('price_max'))) {
            $query->where('price', '<=', (float) $request->input('price_max'));
        }

        // Sort
        match ($request->input('sort', 'latest')) {
            'price_asc'  => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            'name'       => $query->orderBy('name', 'asc'),
            default      => $query->orderBy('created_at', 'desc'),
        };

        $products   = $query->paginate(12)->withQueryString();
        $categories = Category::withCount('products')->having('products_count', '>', 0)->get();
        $brands     = Brand::withCount('products')->having('products_count', '>', 0)->get();

        // Price bounds for the slider (across unfiltered products)
        $priceMin = Product::min('price') ?? 0;
        $priceMax = Product::max('price') ?? 10000;

        return view('products.index', compact('products', 'categories', 'brands', 'priceMin', 'priceMax'));
    }

    public function show(Product $product)
    {
        $product->load(['category', 'brand', 'photos', 'reviews.user']);
        $relatedProducts = Product::with(['photos'])
                                 ->where('category_id', $product->category_id)
                                 ->where('id', '!=', $product->id)
                                 ->take(4)
                                 ->get();
        $canReview = false;
        $hasReviewed = false;
        if (Auth::check()) {
            $hasPurchased = \App\Models\Order::where('user_id', Auth::id())
                ->whereHas('orderItems', function($query) use ($product) {
                    $query->where('product_id', $product->id);
                })
                ->exists();
            $hasReviewed = \App\Models\Review::where('user_id', Auth::id())
                ->where('product_id', $product->id)
                ->exists();
            $canReview = $hasPurchased && !$hasReviewed;
        }

        return view('products.show', compact('product', 'relatedProducts', 'canReview', 'hasReviewed'));
    }
}

