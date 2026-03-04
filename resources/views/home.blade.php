@extends('layouts.app')

@section('title', 'SoulMates Footwear — Find Your Perfect Pair')

@section('head')
<style>
    :root {
        --sm-black: #111;
        --sm-cream: #f8f5ef;
        --sm-accent: #f4a300;
        --sm-muted: #6f6f6f;
    }

    .hero-section {
        background: radial-gradient(circle at top left, #ffe9b8 0, #f8f5ef 40%, #ffffff 100%);
        border-bottom: 1px solid rgba(0,0,0,0.03);
    }

    .hero-inner {
        padding: 3.5rem 0 2.5rem;
    }

    .hero-kicker {
        font-family: var(--font-mono, ui-monospace);
        font-size: 0.7rem;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: var(--sm-muted);
    }

    .hero-title {
        font-family: var(--font-display, system-ui);
        font-weight: 700;
        font-size: clamp(2rem, 3vw + 1rem, 3rem);
        line-height: 1.1;
        margin: 0.75rem 0;
    }

    .hero-highlight {
        display: inline-block;
        padding: 0.15rem 0.4rem;
        background: #111;
        color: #ffe7b8;
        border-radius: 0.2rem;
    }

    .hero-subtitle {
        max-width: 32rem;
        color: var(--sm-muted);
        font-size: 0.97rem;
    }

    .hero-cta .btn-primary {
        background: var(--sm-black);
        border-color: var(--sm-black);
        font-family: var(--font-mono, ui-monospace);
        letter-spacing: 0.16em;
        text-transform: uppercase;
        font-size: 0.7rem;
        padding-inline: 1.9rem;
    }

    .hero-cta .btn-outline-dark {
        font-size: 0.78rem;
        border-radius: 999px;
    }

    .hero-meta {
        font-size: 0.78rem;
        color: var(--sm-muted);
        font-family: var(--font-mono, ui-monospace);
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.35rem 0.7rem;
        border-radius: 999px;
        background: #fff;
        border: 1px solid rgba(0,0,0,0.06);
        font-size: 0.7rem;
    }

    .hero-badge-icon {
        width: 22px;
        height: 22px;
        border-radius: 999px;
        background: linear-gradient(135deg, #111 0, #f4a300 100%);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 0.9rem;
    }

    .hero-image-card {
        background: #111;
        color: #fff;
        border-radius: 1rem;
        padding: 1.5rem 1.75rem;
        position: relative;
        overflow: hidden;
        min-height: 240px;
    }

    .hero-tagline {
        font-size: 0.7rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        opacity: 0.7;
        font-family: var(--font-mono, ui-monospace);
    }

    .hero-image-title {
        font-size: 1.55rem;
        font-weight: 700;
        margin-top: 0.75rem;
        max-width: 11rem;
    }

    .hero-pill {
        position: absolute;
        right: 1.5rem;
        bottom: 1.5rem;
        background: #f4a300;
        color: #111;
        border-radius: 999px;
        padding: 0.45rem 0.9rem;
        font-size: 0.7rem;
        font-family: var(--font-mono, ui-monospace);
        letter-spacing: 0.15em;
        text-transform: uppercase;
    }

    .hero-accent-circle {
        position: absolute;
        right: -4rem;
        top: -4rem;
        width: 9rem;
        height: 9rem;
        border-radius: 999px;
        background: radial-gradient(circle at 30% 40%, #ffe7b8 0, #f4a300 40%, #111 100%);
        opacity: 0.7;
    }

    .section-heading {
        display: flex;
        justify-content: space-between;
        align-items: baseline;
        margin-bottom: 0.75rem;
    }

    .section-heading h2 {
        font-size: 1.25rem;
        font-weight: 700;
        margin: 0;
    }

    .section-heading span {
        font-size: 0.8rem;
        color: var(--sm-muted);
    }

    .chip-row {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1.25rem;
    }

    .chip-link {
        border-radius: 999px;
        border: 1px solid rgba(0,0,0,0.08);
        padding: 0.3rem 0.8rem;
        font-size: 0.78rem;
        text-decoration: none;
        color: #222;
        background: #fff;
    }

    .chip-link small {
        font-size: 0.7rem;
        opacity: 0.7;
        margin-left: 0.2rem;
    }

    .chip-link:hover {
        border-color: #111;
        color: #111;
    }

    .homepage-section {
        padding-top: 2rem;
        padding-bottom: 2rem;
    }

    /* Product card reused from shop grid (simplified) */
    .product-card {
        background: #ffffff;
        border: 1px solid rgba(0,0,0,0.07);
        border-radius: 4px;
        overflow: hidden;
        transition: all 0.25s ease;
        text-decoration: none;
        color: #111;
        display: block;
        height: 100%;
    }
    .product-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        color: #111;
    }
    .product-img-wrap {
        overflow: hidden;
        background: var(--sm-cream);
        aspect-ratio: 4/3;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .product-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .product-card:hover .product-img {
        transform: scale(1.04);
    }
    .product-img-placeholder {
        font-size: 3.2rem;
        opacity: 0.25;
    }
    .product-badge {
        position: absolute;
        top: 0.6rem;
        left: 0.6rem;
        background: #111;
        color: #ffe7b8;
        font-family: var(--font-mono, ui-monospace);
        font-size: 0.58rem;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        padding: 2px 8px;
        border-radius: 2px;
    }
    .product-info {
        padding: 0.9rem 1rem 1rem;
    }
    .product-brand {
        font-family: var(--font-mono, ui-monospace);
        font-size: 0.6rem;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: var(--sm-muted);
        margin-bottom: 0.15rem;
    }
    .product-name {
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 0.15rem;
    }
    .product-price {
        font-family: var(--font-mono, ui-monospace);
        font-size: 0.95rem;
        font-weight: 700;
    }
    .product-stock {
        font-size: 0.7rem;
        color: #b02a37;
    }

    .empty-featured {
        padding: 2rem 1.5rem;
        text-align: center;
        color: var(--sm-muted);
        border-radius: 6px;
        border: 1px dashed rgba(0,0,0,0.1);
        background: #fcfbf8;
        font-size: 0.9rem;
    }

    @media (max-width: 767.98px) {
        .hero-inner {
            padding: 2.6rem 0 1.8rem;
        }
        .hero-image-card {
            margin-top: 1.75rem;
        }
    }
</style>
@endsection

@section('content')

{{-- ===== HERO / LANDING ===== --}}
<section class="hero-section">
    <div class="container hero-inner">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <p class="hero-kicker">SoulMates Footwear · 2026 Collection</p>
                <h1 class="hero-title">
                    Step into your
                    <span class="hero-highlight">perfect pair.</span>
                </h1>
                <p class="hero-subtitle mb-4">
                    Discover thoughtfully curated footwear for every walk of life—from everyday errands
                    to milestone moments. Lightweight comfort, elevated style, and pairs that really last.
                </p>

                <div class="d-flex flex-wrap align-items-center gap-3 hero-cta mb-3">
                    <a href="{{ route('products.index') }}" class="btn btn-primary">
                        Shop all products
                    </a>
                    <a href="#featured" class="btn btn-outline-dark">
                        Browse featured picks
                    </a>
                </div>

                <div class="d-flex flex-wrap align-items-center gap-3 hero-meta mt-2">
                    <span class="hero-badge">
                        <span class="hero-badge-icon">👟</span>
                        Loved by shoppers across the city
                    </span>
                    <span>Secure checkout · Fast local shipping</span>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="hero-image-card">
                    <div class="hero-accent-circle"></div>
                    <div class="hero-tagline">Weekend-ready comfort</div>
                    <div class="hero-image-title">
                        Slip into cloud–soft cushioning.
                    </div>
                    <p class="mt-3 mb-0" style="font-size:0.82rem; max-width:14rem; opacity:0.85;">
                        From classic sneakers to polished loafers, every pair is hand‑checked for quality
                        so you can wear them on repeat.
                    </p>
                    <div class="hero-pill">
                        New arrivals weekly
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== CATEGORIES / BRANDS STRIP ===== --}}
<section class="homepage-section">
    <div class="container">
        <div class="section-heading">
            <h2>Shop by vibe</h2>
            <span>Browse by category or brand</span>
        </div>

        {{-- Categories --}}
        @if(isset($categories) && $categories->count())
            <div class="chip-row mb-2">
                @foreach($categories as $category)
                    <a href="{{ route('products.index', ['category' => $category->name]) }}" class="chip-link">
                        {{ $category->name }}
                        <small>{{ $category->products_count ?? $category->products?->count() ?? 0 }}</small>
                    </a>
                @endforeach
            </div>
        @endif

        {{-- Brands --}}
        @if(isset($brands) && $brands->count())
            <div class="chip-row">
                @foreach($brands as $brand)
                    <a href="{{ route('products.index', ['brand' => $brand->name]) }}" class="chip-link">
                        {{ $brand->name }}
                        <small>{{ $brand->products_count ?? $brand->products?->count() ?? 0 }}</small>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>

{{-- ===== FEATURED PRODUCTS ===== --}}
<section id="featured" class="homepage-section" style="padding-top:0;">
    <div class="container">
        <div class="section-heading">
            <h2>Featured picks</h2>
            <span>Hand‑picked pairs just for you</span>
        </div>

        @if(isset($featuredProducts) && $featuredProducts->count())
            <div class="row g-3">
                @foreach($featuredProducts as $product)
                    <div class="col-6 col-md-4 col-xl-3">
                        <a href="{{ route('products.show', $product->id) }}" class="product-card">
                            <div class="product-img-wrap">
                                @if($product->photos && $product->photos->first())
                                    <img
                                        src="{{ url('/images/' . $product->photos->first()->image_path) }}"
                                        alt="{{ $product->name }}"
                                        class="product-img"
                                    >
                                @else
                                    <span class="product-img-placeholder">👟</span>
                                @endif

                                @if($product->created_at && $product->created_at->diffInDays() < 14)
                                    <span class="product-badge">New</span>
                                @endif
                            </div>
                            <div class="product-info">
                                <div class="product-brand">
                                    {{ optional($product->brand)->name ?? 'SoulMates' }}
                                </div>
                                <div class="product-name">
                                    {{ $product->name }}
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-1">
                                    <div class="product-price">
                                        ₱{{ number_format($product->price, 2) }}
                                    </div>
                                    @if($product->stock !== null)
                                        @if($product->stock <= 5 && $product->stock > 0)
                                            <span class="product-stock">Only {{ $product->stock }} left</span>
                                        @elseif($product->stock == 0)
                                            <span class="product-stock" style="color:var(--sm-muted);">
                                                Out of stock
                                            </span>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-featured">
                <div>We’re still curating featured pairs.</div>
                <div class="mt-2">
                    In the meantime, you can explore everything in our
                    <a href="{{ route('products.index') }}">shop</a>.
                </div>
            </div>
        @endif
    </div>
</section>

@endsection
