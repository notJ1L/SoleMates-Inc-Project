<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        // Remove auth middleware to allow public access to homepage
    }

    public function index()
    {
        $featuredProducts = Product::with(['category', 'brand', 'photos'])
                                  ->inRandomOrder()
                                  ->take(10)
                                  ->get();
        
        $categories = Category::withCount('products')->get();
        $brands = Brand::withCount('products')->get();

        return view('home', compact('featuredProducts', 'categories', 'brands'));
    }

    public function search(Request $request)
    {
        $query = trim($request->get('search', ''));

        if ($query === '') {
            return redirect()->route('home');
        }

        $results = Product::search($query)
            ->query(fn ($q) => $q->with(['category', 'brand', 'photos'])
                                 ->withCount('reviews')
                                 ->withAvg('reviews', 'rating'))
            ->paginate(12)
            ->withQueryString();

        $featuredProducts = collect();
        $categories = Category::withCount('products')->having('products_count', '>', 0)->get();
        $brands     = Brand::withCount('products')->having('products_count', '>', 0)->get();

        return view('home', compact('results', 'query', 'featuredProducts', 'categories', 'brands'));
    }
}
