<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

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

        // Search functionality
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

        // Filter by category
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filter by brand
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

        // Check if user can review (must be authenticated and have purchased the product)
        $canReview = false;
        $hasReviewed = false;
        
        if (auth()->check()) {
            $user = auth()->user();
            
            // Check if user has already reviewed this product
            $hasReviewed = $product->reviews()->where('user_id', $user->id)->exists();
            
            // Check if user has ordered this product (you can modify this logic based on your requirements)
            $hasOrdered = $user->orders()
                              ->whereHas('orderItems', function($query) use ($product) {
                                  $query->where('product_id', $product->id);
                              })
                              ->where('status', 'completed')
                              ->exists();
            
            // User can review if they haven't reviewed yet and have ordered the product
            $canReview = !$hasReviewed && $hasOrdered;
        }

        return view('products.show', compact('product', 'relatedProducts', 'canReview', 'hasReviewed'));
    }
}
