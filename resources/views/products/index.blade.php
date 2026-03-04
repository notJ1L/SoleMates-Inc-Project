@extends('layouts.app')

@section('title', 'Shop — SoulMates Inc.')

@section('head')
<style>
        font-family: var(--font-mono);
        font-size: 0.65rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: var(--warm-gray);
        margin-bottom: 1rem;
        padding-bottom: 0.6rem;
        border-bottom: 1px solid rgba(0,0,0,0.07);
    }
    .filter-option {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.3rem 0;
        cursor: pointer;
        font-size: 0.85rem;
    }
    .filter-option input[type="radio"],
    .filter-option input[type="checkbox"] {
        accent-color: var(--accent);
        cursor: pointer;
    }
    .filter-count {
        font-family: var(--font-mono);
        font-size: 0.68rem;
        color: var(--warm-gray);
        margin-left: auto;
    }
    .active-filter {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        background: var(--black);
        color: var(--accent);
        font-family: var(--font-mono);
        font-size: 0.68rem;
        letter-spacing: 0.08em;
        padding: 0.3rem 0.75rem;
        border-radius: 20px;
        text-decoration: none;
    }
    .active-filter:hover { background: var(--accent); color: var(--black); }

    .sort-bar {
        display: flex;
        align-items: center;
        justify-content-between;
        gap: 1rem;
        padding: 1rem 1.25rem;
        background: var(--white);
        border: 1px solid rgba(0,0,0,0.07);
        border-radius: 4px;
        margin-bottom: 1.5rem;
    }
    .sort-bar .result-count {
        font-family: var(--font-mono);
        font-size: 0.75rem;
        color: var(--warm-gray);
    }
    .sort-bar .result-count strong { color: var(--black); }

    /* Product card same as homepage */
    .product-card {
        background: var(--white);
        border: 1px solid rgba(0,0,0,0.07);
        border-radius: 4px;
        overflow: hidden;
        transition: all 0.25s ease;
        text-decoration: none;
        color: var(--black);
        display: block;
        height: 100%;
    }
    .product-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        color: var(--black);
    }
    .product-card:hover .product-img { transform: scale(1.04); }
    .product-img-wrap {
        overflow: hidden;
        background: #F8F5EF;
        aspect-ratio: 4/3;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .product-img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease; }
    .product-img-placeholder { font-size: 3.5rem; opacity: 0.2; }
    .product-badge {
        position: absolute; top: 0.6rem; left: 0.6rem;
        background: var(--black); color: var(--accent);
        font-family: var(--font-mono); font-size: 0.58rem;
        letter-spacing: 0.1em; text-transform: uppercase;
        padding: 2px 8px; border-radius: 2px;
    }
    .product-info { padding: 1rem 1.1rem 1.1rem; }
    .product-brand { font-family: var(--font-mono); font-size: 0.6rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--accent); margin-bottom: 0.2rem; }
    .product-name { font-family: var(--font-display); font-size: 1rem; font-weight: 700; line-height: 1.3; margin-bottom: 0.4rem; }
    .product-price { font-family: var(--font-mono); font-size: 1rem; font-weight: 700; }
    .product-rating { font-size: 0.72rem; color: var(--accent); margin-top: 0.3rem; }
    .product-rating span { color: var(--warm-gray); font-size: 0.68rem; margin-left: 3px; }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: var(--warm-gray);
    }
    .empty-state .empty-icon { font-size: 4rem; opacity: 0.25; margin-bottom: 1rem; }
    .empty-state h5 { font-family: var(--font-display); color: var(--black); }
</style>
@endsection

@section('content')

{{-- Page Header --}}
<div class="page-header">
    <div class="container">
        <nav aria-label="breadcrumb"><ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Shop</li>
        </ol></nav>
        <h1>
            @if(request('search'))
                Results for "{{ request('search') }}"
            @elseif(request('brand'))
                {{ request('brand') }}
            @elseif(request('category'))
                {{ request('category') }}
            @else
                All Products
            @endif
        </h1>
    </div>
</div>

<div class="container py-4">
    <div class="row g-4">

        {{-- ===== SIDEBAR FILTERS ===== --}}
        <div class="col-lg-3">
            <div class="filter-sidebar">
                <form method="GET" action="{{ route('products.index') }}" id="filterForm">
                    @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif

                    {{-- Active filters --}}
                    @if(request('brand') || request('category') || request('search'))
                        <div class="mb-3 d-flex flex-wrap gap-2 align-items-center">
                            <span style="font-size:0.75rem; color:var(--warm-gray);">Active:</span>
                            @if(request('search'))
                                <a href="{{ route('products.index') }}" class="active-filter">
                                    "{{ request('search') }}" <i class="bi bi-x"></i>
                                </a>
                            @endif
                            @if(request('brand'))
                                <a href="{{ route('products.index', array_merge(request()->except('brand'), [])) }}" class="active-filter">
                                    {{ request('brand') }} <i class="bi bi-x"></i>
                                </a>
                            @endif
                            @if(request('category'))
                                <a href="{{ route('products.index', array_merge(request()->except('category'), [])) }}" class="active-filter">
                                    {{ request('category') }} <i class="bi bi-x"></i>
                                </a>
                            @endif
                        </div>
                    @endif

                    {{-- Sort --}}
                    <div class="filter-card">
                        <div class="filter-title">Sort By</div>
                        @foreach(['latest' => 'Newest First', 'price_asc' => 'Price: Low to High', 'price_desc' => 'Price: High to Low', 'name' => 'Name A–Z'] as $val => $label)
                            <label class="filter-option">
                                <input type="radio" name="sort" value="{{ $val }}"
                                       {{ request('sort', 'latest') === $val ? 'checked' : '' }}
                                       onchange="this.form.submit()">
                                {{ $label }}
                            </label>
                        @endforeach
                    </div>

                    {{-- Category --}}
                    @if(isset($categories) && $categories->count() > 0)
                    <div class="filter-card">
                        <div class="filter-title">Category</div>
                        <label class="filter-option">
                            <input type="radio" name="category" value=""
                                   {{ !request('category') ? 'checked' : '' }}
                                   onchange="this.form.submit()"> All
                        </label>
                        @foreach($categories as $cat)
                            <label class="filter-option">
                                <input type="radio" name="category" value="{{ $cat->category }}"
                                       {{ request('category') === $cat->category ? 'checked' : '' }}
                                       onchange="this.form.submit()">
                                {{ $cat->category }}
                                <span class="filter-count">{{ $cat->total }}</span>
                            </label>
                        @endforeach
                    </div>
                    @endif

                    {{-- Brand --}}
                    @if(isset($brands) && $brands->count() > 0)
                    <div class="filter-card">
                        <div class="filter-title">Brand</div>
                        <label class="filter-option">
                            <input type="radio" name="brand" value=""
                                   {{ !request('brand') ? 'checked' : '' }}
                                   onchange="this.form.submit()"> All
                        </label>
                        @foreach($brands as $br)
                            <label class="filter-option">
                                <input type="radio" name="brand" value="{{ $br->brand }}"
                                       {{ request('brand') === $br->brand ? 'checked' : '' }}
                                       onchange="this.form.submit()">
                                {{ $br->brand }}
                                <span class="filter-count">{{ $br->total }}</span>
                            </label>
                        @endforeach
                    </div>
                    @endif

                </form>
            </div>
        </div>

        {{-- ===== PRODUCT GRID ===== --}}
        <div class="col-lg-9">
            <div class="sort-bar d-flex justify-content-between align-items-center">
                <span class="result-count">
                    <strong>{{ $products->total() }}</strong> product{{ $products->total() !== 1 ? 's' : '' }} found
                </span>
                <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-secondary" style="font-size:0.75rem;">
                    <i class="bi bi-arrow-counterclockwise me-1"></i>Clear Filters
                </a>
            </div>

            @if($products->count() > 0)
                <div class="row g-3">
                    @foreach($products as $product)
                        <div class="col-sm-6 col-xl-4">
                            <a href="{{ route('products.show', $product->id) }}" class="product-card">
                                <div class="product-img-wrap">
                                    @if($product->photos && $product->photos->first())
                                        <img src="{{ asset('storage/' . $product->photos->first()->image_path) }}"
                                             alt="{{ $product->name }}" class="product-img">
                                    @else
                                        <span class="product-img-placeholder">👟</span>
                                    @endif
                                    @if($product->created_at->diffInDays() < 14)
                                        <span class="product-badge">New</span>
                                    @endif
                                </div>
                                <div class="product-info">
                                    <div class="product-brand">{{ $product->brand }}</div>
                                    <div class="product-name">{{ $product->name }}</div>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <div class="product-price">₱{{ number_format($product->price, 2) }}</div>
                                        @if($product->stock <= 5 && $product->stock > 0)
                                            <small style="font-size:0.68rem; color:var(--red);">Only {{ $product->stock }} left</small>
                                        @elseif($product->stock == 0)
                                            <small style="font-size:0.68rem; color:var(--warm-gray);">Out of stock</small>
                                        @endif
                                    </div>
                                    @if($product->reviews_count > 0)
                                        <div class="product-rating">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="bi bi-star{{ $i <= round($product->reviews_avg_rating) ? '-fill' : '' }}"></i>
                                            @endfor
                                            <span>({{ $product->reviews_count }})</span>
                                        </div>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                @if($products->hasPages())
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                @endif

            @else
                <div class="empty-state">
                    <div class="empty-icon">🔍</div>
                    <h5>No products found</h5>
                    <p class="mt-2" style="font-size:0.88rem;">
                        Try adjusting your search or filters.
                    </p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Browse All</a>
                </div>
            @endif
        </div>

    </div>
</div>

@endsection
