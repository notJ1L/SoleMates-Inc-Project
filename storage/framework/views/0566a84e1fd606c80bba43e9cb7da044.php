<?php $__env->startSection('title', 'SoleMates Footwear — Find Your Perfect Pair'); ?>

<?php $__env->startSection('head'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<section class="hero-section">
    <div class="container hero-inner">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <p class="hero-kicker">SoleMates Footwear · 2026 Collection</p>
                <h1 class="hero-title">
                    Step into your
                    <span class="hero-highlight">perfect pair.</span>
                </h1>
                <p class="hero-subtitle mb-4">
                    Discover thoughtfully curated footwear for every walk of life—from everyday errands
                    to milestone moments. Lightweight comfort, elevated style, and pairs that really last.
                </p>

                <div class="d-flex flex-wrap align-items-center gap-3 hero-cta mb-3">
                    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary">
                        Shop all products
                    </a>
                    <a href="#featured" class="btn btn-outline-dark">
                        Browse featured picks
                    </a>
                </div>

                
                <form action="<?php echo e(route('search')); ?>" method="GET"
                      class="d-flex align-items-center gap-2 mt-3"
                      style="max-width:480px;">
                    <input type="text" name="search"
                           value="<?php echo e(request('search')); ?>"
                           placeholder="Search products, brands..."
                           class="form-control"
                           style="border-radius:4px;font-size:0.9rem;">
                    <button type="submit" class="btn btn-primary" style="white-space:nowrap;">
                        <i class="bi bi-search"></i> Search
                    </button>
                </form>

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


<?php if(isset($results)): ?>
<section class="homepage-section" style="padding-bottom:0;">
    <div class="container">
        <h4 style="font-family:var(--font-display);font-weight:700;">
            Results for &ldquo;<?php echo e($query); ?>&rdquo;
            <span style="font-size:0.9rem;color:var(--sm-muted);"> (<?php echo e($results->total()); ?> found)</span>
        </h4>

        <?php if($results->count()): ?>
            <div class="row g-3 mt-2">
                <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6 col-md-4 col-xl-3">
                        <a href="<?php echo e(route('products.show', $product->id)); ?>" class="product-card">
                            <div class="product-img-wrap">
                                <?php $thumb = $product->thumbnailUrl(); ?>
                                <?php if($thumb): ?>
                                    <img src="<?php echo e($thumb); ?>" alt="<?php echo e($product->name); ?>" class="product-img">
                                <?php else: ?>
                                    <span class="product-img-placeholder">&#128095;</span>
                                <?php endif; ?>
                                <?php if($product->created_at && $product->created_at->diffInDays() < 14): ?>
                                    <span class="product-badge">New</span>
                                <?php endif; ?>
                            </div>
                            <div class="product-info">
                                <div class="product-brand">
                                    <?php echo e(optional($product->brand)->name ?? 'SoleMates'); ?>

                                </div>
                                <div class="product-name"><?php echo e($product->name); ?></div>
                                <div class="d-flex justify-content-between align-items-center mt-1">
                                    <div class="product-price">&#8369;<?php echo e(number_format($product->price, 2)); ?></div>
                                    <?php if($product->stock !== null): ?>
                                        <?php if($product->stock <= 5 && $product->stock > 0): ?>
                                            <span class="product-stock">Only <?php echo e($product->stock); ?> left</span>
                                        <?php elseif($product->stock == 0): ?>
                                            <span class="product-stock" style="color:var(--sm-muted);">Out of stock</span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="mt-4"><?php echo e($results->links()); ?></div>
        <?php else: ?>
            <p class="text-muted mt-3">No products found for &ldquo;<?php echo e($query); ?>&rdquo;. Try a different search term.</p>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>


<section class="homepage-section">
    <div class="container">
        <div class="section-heading">
            <h2>Shop by vibe</h2>
            <span>Browse by category or brand</span>
        </div>

        
        <?php if(isset($categories) && $categories->count()): ?>
            <div class="chip-row mb-2">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('products.index', ['category_id' => $category->id])); ?>" class="chip-link">
                        <?php echo e($category->name); ?>

                        <small><?php echo e($category->products_count ?? $category->products?->count() ?? 0); ?></small>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        
        <?php if(isset($brands) && $brands->count()): ?>
            <div class="chip-row">
                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('products.index', ['brand_id' => $brand->id])); ?>" class="chip-link">
                        <?php echo e($brand->name); ?>

                        <small><?php echo e($brand->products_count ?? $brand->products?->count() ?? 0); ?></small>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
</section>


<section id="featured" class="homepage-section" style="padding-top:0;">
    <div class="container">
        <div class="section-heading">
            <h2>Featured picks</h2>
            <span>Hand‑picked pairs just for you</span>
        </div>

        <?php if(isset($featuredProducts) && $featuredProducts->count()): ?>
            <div class="row g-3">
                <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6 col-md-4 col-xl-3">
                        <a href="<?php echo e(route('products.show', $product->id)); ?>" class="product-card">
                            <div class="product-img-wrap">
                <?php $thumb = $product->thumbnailUrl(); ?>
                                <?php if($thumb): ?>
                                    <img
                                        src="<?php echo e($thumb); ?>"
                                        alt="<?php echo e($product->name); ?>"
                                        class="product-img"
                                    >
                                <?php else: ?>
                                    <span class="product-img-placeholder">👟</span>
                                <?php endif; ?>

                                <?php if($product->created_at && $product->created_at->diffInDays() < 14): ?>
                                    <span class="product-badge">New</span>
                                <?php endif; ?>
                            </div>
                            <div class="product-info">
                                <div class="product-brand">
                                    <?php echo e(optional($product->brand)->name ?? 'SoleMates'); ?>

                                </div>
                                <div class="product-name">
                                    <?php echo e($product->name); ?>

                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-1">
                                    <div class="product-price">
                                        ₱<?php echo e(number_format($product->price, 2)); ?>

                                    </div>
                                    <?php if($product->stock !== null): ?>
                                        <?php if($product->stock <= 5 && $product->stock > 0): ?>
                                            <span class="product-stock">Only <?php echo e($product->stock); ?> left</span>
                                        <?php elseif($product->stock == 0): ?>
                                            <span class="product-stock" style="color:var(--sm-muted);">
                                                Out of stock
                                            </span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="empty-featured">
                <div>We’re still curating featured pairs.</div>
                <div class="mt-2">
                    In the meantime, you can explore everything in our
                    <a href="<?php echo e(route('products.index')); ?>">shop</a>.
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\SoulMates-Inc-Project\resources\views/home.blade.php ENDPATH**/ ?>