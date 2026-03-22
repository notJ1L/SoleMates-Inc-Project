<?php $__env->startSection('title', 'Shop — SoleMates Footwear'); ?>

<?php $__env->startSection('head'); ?>
<style>
    .filter-title {
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
        justify-content: space-between;
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
    .product-card:hover { color: var(--black); }
    .product-card:hover .product-img { transform: scale(1.04); }
    .prod-actions {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0 1.1rem 1.1rem;
    }
    .btn-prod-view {
        flex: 1;
        text-align: center;
        padding: 0.45rem 0.75rem;
        border: 1px solid rgba(0,0,0,0.18);
        border-radius: 4px;
        font-size: 0.78rem;
        font-weight: 500;
        color: var(--black);
        text-decoration: none;
        background: transparent;
        transition: background 0.2s;
    }
    .btn-prod-view:hover { background: var(--black); color: var(--white); }
    .btn-prod-cart {
        width: 36px; height: 36px;
        display: flex; align-items: center; justify-content: center;
        background: var(--black); color: #fff;
        border: none; border-radius: 4px; cursor: pointer;
        font-size: 0.9rem; flex-shrink: 0;
        text-decoration: none;
        transition: background 0.2s;
    }
    .btn-prod-cart:hover { background: var(--accent); color: var(--black); }
    .btn-prod-cart:disabled { opacity: 0.4; cursor: not-allowed; }
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php
    $activeCat   = $categories->firstWhere('id', request('category_id'));
    $activeBrand = $brands->firstWhere('id', request('brand_id'));
    $hasFilters  = request('search') || request('category_id') || request('brand_id') || request('price_min') || request('price_max');
?>


<div class="page-header">
    <div class="container">
        <nav aria-label="breadcrumb"><ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li class="breadcrumb-item active">Shop</li>
        </ol></nav>
        <h1>
            <?php if(request('search')): ?>
                Results for "<?php echo e(request('search')); ?>"
            <?php elseif(request('brand_id') && isset($activeBrand)): ?>
                <?php echo e($activeBrand->name); ?>

            <?php elseif(request('category_id') && isset($activeCat)): ?>
                <?php echo e($activeCat->name); ?>

            <?php else: ?>
                All Products
            <?php endif; ?>
        </h1>
    </div>
</div>

<div class="container py-4">
    <div class="row g-4">

        
        <div class="col-lg-3">
            <div class="filter-sidebar">
                <form method="GET" action="<?php echo e(route('products.index')); ?>" id="filterForm">
                    <?php if(request('search')): ?>
                        <input type="hidden" name="search" value="<?php echo e(request('search')); ?>">
                    <?php endif; ?>

                    
                    <?php if($hasFilters): ?>
                        <div class="mb-3 d-flex flex-wrap gap-2 align-items-center">
                            <span style="font-size:0.75rem;color:var(--warm-gray);">Active:</span>
                            <?php if(request('search')): ?>
                                <a href="<?php echo e(route('products.index')); ?>" class="active-filter">"<?php echo e(request('search')); ?>" <i class="bi bi-x"></i></a>
                            <?php endif; ?>
                            <?php if($activeCat): ?>
                                <a href="<?php echo e(route('products.index', array_merge(request()->except('category_id'), []))); ?>" class="active-filter"><?php echo e($activeCat->name); ?> <i class="bi bi-x"></i></a>
                            <?php endif; ?>
                            <?php if($activeBrand): ?>
                                <a href="<?php echo e(route('products.index', array_merge(request()->except('brand_id'), []))); ?>" class="active-filter"><?php echo e($activeBrand->name); ?> <i class="bi bi-x"></i></a>
                            <?php endif; ?>
                            <?php if(request('price_min') || request('price_max')): ?>
                                <a href="<?php echo e(route('products.index', array_merge(request()->except(['price_min','price_max']), []))); ?>" class="active-filter">
                                    ₱<?php echo e(number_format(request('price_min', $priceMin))); ?>–<?php echo e(number_format(request('price_max', $priceMax))); ?> <i class="bi bi-x"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    
                    <div class="filter-card">
                        <div class="filter-title">Sort By</div>
                        <?php $__currentLoopData = ['latest' => 'Newest First', 'price_asc' => 'Price: Low to High', 'price_desc' => 'Price: High to Low', 'name' => 'Name A–Z']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="filter-option">
                                <input type="radio" name="sort" value="<?php echo e($val); ?>"
                                       <?php echo e(request('sort', 'latest') === $val ? 'checked' : ''); ?>

                                       onchange="this.form.submit()">
                                <?php echo e($label); ?>

                            </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    
                    <div class="filter-card">
                        <div class="filter-title">Price Range</div>
                        <div class="d-flex gap-2 align-items-center mb-2">
                            <input type="number" name="price_min" id="price_min"
                                   value="<?php echo e(request('price_min', '')); ?>"
                                   placeholder="₱ Min" min="0"
                                   class="form-control form-control-sm"
                                   style="font-size:0.8rem;">
                            <span style="color:var(--warm-gray);">—</span>
                            <input type="number" name="price_max" id="price_max"
                                   value="<?php echo e(request('price_max', '')); ?>"
                                   placeholder="₱ Max" min="0"
                                   class="form-control form-control-sm"
                                   style="font-size:0.8rem;">
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline-secondary w-100" style="font-size:0.75rem;">Apply Price</button>
                    </div>

                    
                    <?php if($categories->count() > 0): ?>
                    <div class="filter-card">
                        <div class="filter-title">Category</div>
                        <label class="filter-option">
                            <input type="radio" name="category_id" value=""
                                   <?php echo e(!request('category_id') ? 'checked' : ''); ?>

                                   onchange="this.form.submit()"> All
                        </label>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="filter-option">
                                <input type="radio" name="category_id" value="<?php echo e($cat->id); ?>"
                                       <?php echo e(request('category_id') == $cat->id ? 'checked' : ''); ?>

                                       onchange="this.form.submit()">
                                <?php echo e($cat->name); ?>

                                <span class="filter-count"><?php echo e($cat->products_count); ?></span>
                            </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>

                    
                    <?php if($brands->count() > 0): ?>
                    <div class="filter-card">
                        <div class="filter-title">Brand</div>
                        <label class="filter-option">
                            <input type="radio" name="brand_id" value=""
                                   <?php echo e(!request('brand_id') ? 'checked' : ''); ?>

                                   onchange="this.form.submit()"> All
                        </label>
                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $br): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="filter-option">
                                <input type="radio" name="brand_id" value="<?php echo e($br->id); ?>"
                                       <?php echo e(request('brand_id') == $br->id ? 'checked' : ''); ?>

                                       onchange="this.form.submit()">
                                <?php echo e($br->name); ?>

                                <span class="filter-count"><?php echo e($br->products_count); ?></span>
                            </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>

                </form>
            </div>
        </div>

        
        <div class="col-lg-9">
            <div class="sort-bar d-flex justify-content-between align-items-center">
                <span class="result-count">
                    <strong><?php echo e($products->total()); ?></strong> product<?php echo e($products->total() !== 1 ? 's' : ''); ?> found
                </span>
                <a href="<?php echo e(route('products.index')); ?>" class="btn btn-sm btn-outline-secondary" style="font-size:0.75rem;">
                    <i class="bi bi-arrow-counterclockwise me-1"></i>Clear Filters
                </a>
            </div>

            <?php if($products->count() > 0): ?>
                <div class="row g-3">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 col-xl-4">
                            <div class="product-card">
                                <a href="<?php echo e(route('products.show', $product->id)); ?>" style="text-decoration:none;color:inherit;">
                                <div class="product-img-wrap">
                                    <?php $thumb = $product->thumbnailUrl(); ?>
                                    <?php if($thumb): ?>
                                        <img src="<?php echo e($thumb); ?>"
                                             alt="<?php echo e($product->name); ?>" class="product-img">
                                    <?php else: ?>
                                        <span class="product-img-placeholder">👟</span>
                                    <?php endif; ?>
                                    <?php if($product->created_at->diffInDays() < 14): ?>
                                        <span class="product-badge">New</span>
                                    <?php endif; ?>
                                </div>
                                <div class="product-info">
                                    <div class="product-brand"><?php echo e($product->brand->name ?? 'SoleMates'); ?></div>
                                    <div class="product-name"><?php echo e($product->name); ?></div>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <div class="product-price">₱<?php echo e(number_format($product->price, 2)); ?></div>
                                        <?php if($product->stock <= 5 && $product->stock > 0): ?>
                                            <small style="font-size:0.68rem; color:var(--red);">Only <?php echo e($product->stock); ?> left</small>
                                        <?php elseif($product->stock == 0): ?>
                                            <small style="font-size:0.68rem; color:var(--warm-gray);">Out of stock</small>
                                        <?php endif; ?>
                                    </div>
                                    <?php if($product->reviews_count > 0): ?>
                                        <div class="product-rating">
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                <i class="bi bi-star<?php echo e($i <= round($product->reviews_avg_rating) ? '-fill' : ''); ?>"></i>
                                            <?php endfor; ?>
                                            <span>(<?php echo e($product->reviews_count); ?>)</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                </a>
                                <div class="prod-actions">
                                    <a href="<?php echo e(route('products.show', $product->id)); ?>" class="btn-prod-view">View Details</a>
                                    <?php if($product->stock > 0): ?>
                                        <?php if(auth()->guard()->check()): ?>
                                            <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST" style="display:contents;">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="btn-prod-cart" title="Add to cart" aria-label="Add <?php echo e($product->name); ?> to cart">
                                                    <i class="fas fa-shopping-bag"></i>
                                                </button>
                                            </form>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('login')); ?>" class="btn-prod-cart" title="Sign in to add to cart">
                                                <i class="fas fa-shopping-bag"></i>
                                            </a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <button class="btn-prod-cart" disabled title="Out of stock">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                
                <?php if($products->hasPages()): ?>
                    <div class="mt-4">
                        <?php echo e($products->links()); ?>

                    </div>
                <?php endif; ?>

            <?php else: ?>
                <div class="empty-state">
                    <div class="empty-icon">🔍</div>
                    <h5>No products found</h5>
                    <p class="mt-2" style="font-size:0.88rem;">
                        Try adjusting your search or filters.
                    </p>
                    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary mt-3">Browse All</a>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\SoulMates-Inc-Project\resources\views\products\index.blade.php ENDPATH**/ ?>