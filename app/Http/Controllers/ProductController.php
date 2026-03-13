<?php

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

namespace App\Http\Controllers;


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
        $query = Product::with(['category', 'brand', 'photos']);

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhereHas('brand', function($brandQuery) use ($search) {
                      $brandQuery->where('name', 'like', '%' . $search . '%');
                  });
            });
        }

        // category
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // brand
        if ($request->has('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        $products = $query->paginate(12);
        $categories = Category::all();
        $brands = Brand::all();

        return view('products.index', compact('products', 'categories', 'brands'));
    }

    public function show(Product $product)
    {
        $product->load(['category', 'brand', 'photos', 'reviews.user']);
        $relatedProducts = Product::where('category_id', $product->category_id)
                                 ->where('id', '!=', $product->id)
                                 ->take(4)
                                 ->get();
        $canReview = false;
        $hasReviewed = false;
        if (auth()->check()) {
            $hasPurchased = \App\Models\Order::where('user_id', auth()->id())
                ->whereHas('orderItems', function($query) use ($product) {
                    $query->where('product_id', $product->id);
                })
                ->exists();
            $hasReviewed = \App\Models\Review::where('user_id', auth()->id())
                ->where('product_id', $product->id)
                ->exists();
            $canReview = $hasPurchased && !$hasReviewed;
        }

        return view('products.show', compact('product', 'relatedProducts', 'canReview', 'hasReviewed'));
    }
}
