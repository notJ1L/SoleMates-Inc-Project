<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // 8 random products for the featured carousel
        $featuredProducts = Product::with(["category", "brand", "photos"])
            ->inRandomOrder()
            ->take(8)
            ->get();

        // 8 newest products for the "New Arrivals" section
        $newArrivals = Product::with(["category", "brand", "photos"])
            ->latest()
            ->take(8)
            ->get();

        $categories = Category::withCount("products")
            ->having("products_count", ">", 0)
            ->get();

        $brands = Brand::withCount("products")
            ->having("products_count", ">", 0)
            ->get();

        return view(
            "home",
            compact("featuredProducts", "newArrivals", "categories", "brands"),
        );
    }

    public function search(Request $request)
    {
        $query = trim($request->get("search", ""));

        if ($query === "") {
            return redirect()->route("home");
        }

        $results = Product::search($query)
            ->query(
                fn($q) => $q
                    ->with(["category", "brand", "photos"])
                    ->withCount("reviews")
                    ->withAvg("reviews", "rating"),
            )
            ->paginate(12)
            ->withQueryString();

        $featuredProducts = collect();
        $newArrivals = collect();
        $categories = Category::withCount("products")
            ->having("products_count", ">", 0)
            ->get();
        $brands = Brand::withCount("products")
            ->having("products_count", ">", 0)
            ->get();

        return view(
            "home",
            compact(
                "results",
                "query",
                "featuredProducts",
                "newArrivals",
                "categories",
                "brands",
            ),
        );
    }
}
