<?php $__env->startSection('title', 'Shop — SoulMates Inc.'); ?>

<?php $__env->startSection('head'); ?>
<style>
    .filter-sidebar {
        position: sticky;
        top: 90px;
    }
    .filter-card {
        background: white;
        border: 1px solid rgba(0,0,0,0.08);
        border-radius: 8px;
        padding: 1.5rem;
        margin-bottom: 1rem;
    }
    .product-card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }
    .product-image {
        height: 250px;
        object-fit: cover;
        width: 100%;
    }
    .product-name {
        font-size: 1.1rem;
        font-weight: 600;
        color: #0D0D0D;
        margin-bottom: 0.5rem;
        line-height: 1.3;
    }
    .product-price {
        font-size: 1.25rem;
        font-weight: 700;
        color: #C8A96E;
    }
    .filter-title {
        font-size: 0.9rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #6B6560;
        margin-bottom: 1rem;
    }
    .brand-item, .category-item {
        display: block;
        padding: 0.5rem 0;
        color: #0D0D0D;
        text-decoration: none;
        transition: all 0.2s ease;
        border-left: 3px solid transparent;
        padding-left: 0.75rem;
    }
    .brand-item:hover, .category-item:hover {
        color: #C8A96E;
        background: rgba(200, 169, 110, 0.05);
        border-left-color: #C8A96E;
    }
    .brand-item.active, .category-item.active {
        color: #C8A96E;
        border-left-color: #C8A96E;
        font-weight: 600;
    }
    .results-count {
        background: #f8f9fa;
        padding: 0.75rem 1rem;
        border-radius: 8px;
        font-size: 0.9rem;
        color: #6B6560;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="row">
        <!-- Filter Sidebar -->
        <div class="col-lg-3">
            <div class="filter-sidebar">
                <!-- Search Results -->
                <?php if(request('search')): ?>
                    <div class="filter-card">
                        <h5 class="filter-title">Search Results</h5>
                        <p class="text-muted small">
                            Showing results for "<strong><?php echo e(request('search')); ?></strong>"
                        </p>
                        <a href="<?php echo e(route('products.index')); ?>" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-times me-1"></i>Clear Search
                        </a>
                    </div>
                <?php endif; ?>

                <!-- Categories Filter -->
                <div class="filter-card">
                    <h5 class="filter-title">Categories</h5>
                    <div class="mb-3">
                        <a href="<?php echo e(route('products.index')); ?>" 
                           class="category-item <?php echo e(!request('category_id') ? 'active' : ''); ?>">
                            All Categories
                        </a>
                        <?php $__empty_1 = true; $__currentLoopData = $categories ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <a href="<?php echo e(route('products.index', ['category_id' => $category->id])); ?>" 
                               class="category-item <?php echo e(request('category_id') == $category->id ? 'active' : ''); ?>">
                                <?php echo e($category->name); ?> (<?php echo e($category->products_count ?? 0); ?>)
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p class="text-muted small">No categories available</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Brands Filter -->
                <div class="filter-card">
                    <h5 class="filter-title">Brands</h5>
                    <div class="mb-3">
                        <a href="<?php echo e(route('products.index')); ?>" 
                           class="brand-item <?php echo e(!request('brand_id') ? 'active' : ''); ?>">
                            All Brands
                        </a>
                        <?php $__empty_1 = true; $__currentLoopData = $brands ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <a href="<?php echo e(route('products.index', ['brand_id' => $brand->id])); ?>" 
                               class="brand-item <?php echo e(request('brand_id') == $brand->id ? 'active' : ''); ?>">
                                <?php echo e($brand->name); ?> (<?php echo e($brand->products_count ?? 0); ?>)
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p class="text-muted small">No brands available</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="col-lg-9">
            <!-- Results Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="results-count">
                    <?php if(request('search')): ?>
                        Found <?php echo e($products->total()); ?> results for "<?php echo e(request('search')); ?>"
                    <?php else: ?>
                        Showing <?php echo e($products->count()); ?> of <?php echo e($products->total()); ?> products
                    <?php endif; ?>
                </div>
                
                <!-- Sort Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-sort me-2"></i>Sort By
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo e(request()->fullUrlWithQuery(['sort' => 'name'])); ?>">Name</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(request()->fullUrlWithQuery(['sort' => 'price_low'])); ?>">Price: Low to High</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(request()->fullUrlWithQuery(['sort' => 'price_high'])); ?>">Price: High to Low</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(request()->fullUrlWithQuery(['sort' => 'newest'])); ?>">Newest First</a></li>
                    </ul>
                </div>
            </div>

            <!-- Products Grid -->
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card product-card">
                        <?php if($product->photos->first()): ?>
                            <img src="<?php echo e(asset('storage/' . $product->photos->first()->image_path)); ?>" 
                                 alt="<?php echo e($product->name); ?>" 
                                 class="product-image">
                        <?php else: ?>
                            <img src="<?php echo e(asset('images/default-product.jpg')); ?>" 
                                 alt="<?php echo e($product->name); ?>" 
                                 class="product-image">
                        <?php endif; ?>
                        
                        <div class="card-body">
                            <div class="mb-2">
                                <small class="text-muted"><?php echo e($product->category->name ?? 'Uncategorized'); ?></small>
                            </div>
                            <h5 class="product-name"><?php echo e($product->name); ?></h5>
                            <p class="text-muted small mb-3"><?php echo e(Str::limit($product->description, 80)); ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price">$<?php echo e(number_format($product->price, 2)); ?></span>
                                <div>
                                    <a href="<?php echo e(route('products.show', $product)); ?>" 
                                       class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye me-1"></i>View
                                    </a>
                                    <button class="btn btn-sm btn-outline-success ms-1" onclick="addToCart(<?php echo e($product->id); ?>)">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12 text-center py-5">
                    <i class="fas fa-search fa-3x text-muted mb-3"></i>
                    <h4>No products found</h4>
                    <p class="text-muted">
                        <?php if(request('search')): ?>
                            Try adjusting your search terms or browse our categories.
                        <?php else: ?>
                            No products available in this category.
                        <?php endif; ?>
                    </p>
                    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary">
                        <i class="fas fa-redo me-2"></i>Browse All Products
                    </a>
                </div>
            <?php endif; ?>

            <!-- Pagination -->
            <?php if($products->hasPages()): ?>
                <div class="d-flex justify-content-center mt-5">
                    <?php echo e($products->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
function addToCart(productId) {
    // TODO: Implement cart functionality
    alert('Cart functionality will be implemented in the next phase.');
}
</script>
<?php $__env->stopSection(); ?>
    }
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="page-header">
    <div class="container">
        <nav aria-label="breadcrumb"><ol class="breadcrumb mb-2">
            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li class="breadcrumb-item active">Shop</li>
        </ol></nav>
        <h1>
            <?php if(request('search')): ?>
                Results for "<?php echo e(request('search')); ?>"
            <?php elseif(request('brand')): ?>
                <?php echo e(request('brand')); ?>

            <?php elseif(request('category')): ?>
                <?php echo e(request('category')); ?>

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

                    
                    <?php if(request('brand') || request('category') || request('search')): ?>
                        <div class="mb-3 d-flex flex-wrap gap-2 align-items-center">
                            <span style="font-size:0.75rem; color:var(--warm-gray);">Active:</span>
                            <?php if(request('search')): ?>
                                <a href="<?php echo e(route('products.index')); ?>" class="active-filter">
                                    "<?php echo e(request('search')); ?>" <i class="bi bi-x"></i>
                                </a>
                            <?php endif; ?>
                            <?php if(request('brand')): ?>
                                <a href="<?php echo e(route('products.index', array_merge(request()->except('brand'), []))); ?>" class="active-filter">
                                    <?php echo e(request('brand')); ?> <i class="bi bi-x"></i>
                                </a>
                            <?php endif; ?>
                            <?php if(request('category')): ?>
                                <a href="<?php echo e(route('products.index', array_merge(request()->except('category'), []))); ?>" class="active-filter">
                                    <?php echo e(request('category')); ?> <i class="bi bi-x"></i>
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

                    
                    <?php if(isset($categories) && $categories->count() > 0): ?>
                    <div class="filter-card">
                        <div class="filter-title">Category</div>
                        <label class="filter-option">
                            <input type="radio" name="category" value=""
                                   <?php echo e(!request('category') ? 'checked' : ''); ?>

                                   onchange="this.form.submit()"> All
                        </label>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="filter-option">
                                <input type="radio" name="category" value="<?php echo e($cat->category); ?>"
                                       <?php echo e(request('category') === $cat->category ? 'checked' : ''); ?>

                                       onchange="this.form.submit()">
                                <?php echo e($cat->category); ?>

                                <span class="filter-count"><?php echo e($cat->total); ?></span>
                            </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>

                    
                    <?php if(isset($brands) && $brands->count() > 0): ?>
                    <div class="filter-card">
                        <div class="filter-title">Brand</div>
                        <label class="filter-option">
                            <input type="radio" name="brand" value=""
                                   <?php echo e(!request('brand') ? 'checked' : ''); ?>

                                   onchange="this.form.submit()"> All
                        </label>
                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $br): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="filter-option">
                                <input type="radio" name="brand" value="<?php echo e($br->brand); ?>"
                                       <?php echo e(request('brand') === $br->brand ? 'checked' : ''); ?>

                                       onchange="this.form.submit()">
                                <?php echo e($br->brand); ?>

                                <span class="filter-count"><?php echo e($br->total); ?></span>
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
                            <a href="<?php echo e(route('products.show', $product->id)); ?>" class="product-card">
                                <div class="product-img-wrap">
                                    <?php if($product->photos && $product->photos->first()): ?>
                                        <img src="<?php echo e(asset('storage/product_photos/' . $product->photos->first()->filename)); ?>"
                                             alt="<?php echo e($product->name); ?>" class="product-img">
                                    <?php else: ?>
                                        <span class="product-img-placeholder">👟</span>
                                    <?php endif; ?>
                                    <?php if($product->created_at->diffInDays() < 14): ?>
                                        <span class="product-badge">New</span>
                                    <?php endif; ?>
                                </div>
                                <div class="product-info">
                                    <div class="product-brand"><?php echo e($product->brand); ?></div>
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp_system\htdocs\SoulMates-Inc-Project\resources\views/products/index.blade.php ENDPATH**/ ?>