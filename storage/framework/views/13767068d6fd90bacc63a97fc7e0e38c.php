<?php $__env->startSection('title', $product->name . ' — SoleMates Footwear'); ?>

<?php $__env->startSection('head'); ?>
<style>
    .product-gallery {
        position: sticky;
        top: 90px;
    }
    .main-photo {
        background: #F8F5EF;
        border-radius: 4px;
        aspect-ratio: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        margin-bottom: 0.75rem;
        border: 1px solid rgba(0,0,0,0.07);
    }
    .main-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .main-photo:hover img { transform: scale(1.05); }
    .main-photo-placeholder { font-size: 8rem; opacity: 0.15; }

    .thumb-strip { display: flex; gap: 0.6rem; flex-wrap: wrap; }
    .thumb {
        width: 72px;
        height: 72px;
        border-radius: 3px;
        overflow: hidden;
        cursor: pointer;
        border: 2px solid transparent;
        background: #F8F5EF;
        transition: border-color 0.2s;
        flex-shrink: 0;
    }
    .thumb.active, .thumb:hover { border-color: var(--accent); }
    .thumb img { width: 100%; height: 100%; object-fit: cover; }

    /* Product info */
    .product-detail-brand {
        font-family: var(--font-mono);
        font-size: 0.7rem;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        color: var(--accent);
        margin-bottom: 0.4rem;
    }
    .product-detail-name {
        font-family: var(--font-display);
        font-size: 2.2rem;
        font-weight: 900;
        line-height: 1.1;
        margin-bottom: 1rem;
    }
    .product-detail-price {
        font-family: var(--font-mono);
        font-size: 2rem;
        font-weight: 700;
        color: var(--black);
        margin-bottom: 0.5rem;
    }

    .rating-summary {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid var(--border);
    }
    .stars-display { color: var(--accent); font-size: 0.9rem; }
    .rating-text { font-size: 0.82rem; color: var(--warm-gray); }

    .stock-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        font-family: var(--font-mono);
        font-size: 0.68rem;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        padding: 0.35rem 0.85rem;
        border-radius: 20px;
        margin-bottom: 1.5rem;
    }
    .stock-badge.in-stock { background: rgba(39,174,96,0.12); color: #1e8a49; }
    .stock-badge.low-stock { background: rgba(241,196,15,0.15); color: #c09b00; }
    .stock-badge.out-stock { background: rgba(192,57,43,0.1); color: var(--red); }

    .product-meta {
        background: rgba(0,0,0,0.03);
        border-radius: 3px;
        padding: 1rem 1.25rem;
        margin-bottom: 1.5rem;
    }
    .meta-row {
        display: flex;
        font-size: 0.83rem;
        padding: 0.3rem 0;
    }
    .meta-row:not(:last-child) { border-bottom: 1px solid rgba(0,0,0,0.05); }
    .meta-label {
        font-weight: 600;
        color: var(--warm-gray);
        width: 90px;
        flex-shrink: 0;
        font-size: 0.78rem;
        letter-spacing: 0.06em;
        text-transform: uppercase;
    }

    .qty-control {
        display: flex;
        align-items: center;
        border: 1.5px solid rgba(0,0,0,0.15);
        border-radius: 2px;
        overflow: hidden;
        width: fit-content;
    }
    .qty-btn {
        width: 40px;
        height: 44px;
        background: #f3f0ea;
        border: none;
        font-size: 1.1rem;
        cursor: pointer;
        transition: background 0.15s;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .qty-btn:hover { background: var(--accent); color: var(--black); }
    .qty-input {
        width: 52px;
        height: 44px;
        border: none;
        border-left: 1.5px solid rgba(0,0,0,0.1);
        border-right: 1.5px solid rgba(0,0,0,0.1);
        text-align: center;
        font-family: var(--font-mono);
        font-size: 0.95rem;
        font-weight: 700;
        background: var(--white);
    }
    .qty-input:focus { outline: none; }

    .btn-add-cart {
        background: var(--black);
        color: var(--white);
        border: 2px solid var(--black);
        padding: 0.9rem 2rem;
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        border-radius: 2px;
        cursor: pointer;
        transition: all 0.22s;
        flex: 1;
    }
    .btn-add-cart:hover { background: var(--accent); border-color: var(--accent); color: var(--black); }
    .btn-add-cart:disabled { opacity: 0.5; cursor: not-allowed; }

    /* ============================================
       REVIEWS
    ============================================ */
    .reviews-section { padding: 3rem 0; background: var(--white); margin-top: 3rem; }

    .review-card {
        border: 1px solid rgba(0,0,0,0.07);
        border-radius: 4px;
        padding: 1.25rem;
        margin-bottom: 1rem;
        background: var(--cream);
    }
    .reviewer-name {
        font-weight: 700;
        font-size: 0.9rem;
        margin-bottom: 0.2rem;
    }
    .review-date {
        font-family: var(--font-mono);
        font-size: 0.65rem;
        color: var(--warm-gray);
        letter-spacing: 0.08em;
    }
    .review-stars { color: var(--accent); font-size: 0.82rem; margin: 0.5rem 0; }
    .review-body { font-size: 0.87rem; line-height: 1.6; color: #3a3530; }

    .review-form-card {
        background: var(--cream);
        border: 1px solid rgba(200,169,110,0.3);
        border-radius: 4px;
        padding: 1.75rem;
    }
    .star-picker { display: flex; gap: 0.25rem; margin-bottom: 0.5rem; }
    .star-picker input { display: none; }
    .star-picker label {
        font-size: 1.6rem;
        cursor: pointer;
        color: #ccc;
        transition: color 0.15s;
        line-height: 1;
    }
    .star-picker input:checked ~ label,
    .star-picker label:hover,
    .star-picker label:hover ~ label { color: var(--accent); }
    .star-picker { flex-direction: row-reverse; }
    .star-picker label:hover,
    .star-picker label:hover ~ label { color: var(--accent); }

    /* Related products */
    .related-card {
        border: 1px solid rgba(0,0,0,0.07);
        border-radius: 4px;
        overflow: hidden;
        text-decoration: none;
        color: var(--black);
        display: block;
        transition: all 0.2s;
        background: var(--white);
    }
    .related-card:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(0,0,0,0.08); color: var(--black); }
    .related-img { aspect-ratio: 4/3; background: #F8F5EF; overflow: hidden; display: flex; align-items: center; justify-content: center; }
    .related-img img { width: 100%; height: 100%; object-fit: cover; }
    .related-info { padding: 0.75rem; }
    .related-name { font-family: var(--font-display); font-size: 0.9rem; font-weight: 700; }
    .related-price { font-family: var(--font-mono); font-size: 0.85rem; margin-top: 0.2rem; }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="page-header" style="padding:1.5rem 0 1.25rem;">
    <div class="container">
        <nav aria-label="breadcrumb"><ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('products.index')); ?>">Shop</a></li>
            <li class="breadcrumb-item active"><?php echo e($product->name); ?></li>
        </ol></nav>
    </div>
</div>

<div class="container py-4">
    <div class="row g-5">

        
        <div class="col-lg-5">
            <div class="product-gallery">
                <div class="main-photo" id="mainPhoto">
<?php
                        $allPhotos = collect();
                        if ($product->image) {
                            $allPhotos->push((object)['src' => asset('storage/' . $product->image)]);
                        }
                        foreach ($product->photos as $p) {
                            $allPhotos->push((object)['src' => $p->url()]);
                        }
                    ?>
                    <?php if($allPhotos->isNotEmpty()): ?>
                        <img src="<?php echo e($allPhotos->first()->src); ?>"
                             alt="<?php echo e($product->name); ?>" id="mainPhotoImg">
                    <?php else: ?>
                        <span class="main-photo-placeholder">👟</span>
                    <?php endif; ?>
                </div>
                <?php if($allPhotos->count() > 1): ?>
                    <div class="thumb-strip">
                        <?php $__currentLoopData = $allPhotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="thumb <?php echo e($i === 0 ? 'active' : ''); ?>"
                                 onclick="switchPhoto(this, '<?php echo e($photo->src); ?>')">
                                <img src="<?php echo e($photo->src); ?>" alt="">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="col-lg-7">
            <div class="product-detail-brand"><?php echo e($product->brand->name ?? 'SoleMates'); ?></div>
            <h1 class="product-detail-name"><?php echo e($product->name); ?></h1>

            
            <div class="rating-summary">
                <div class="stars-display">
                    <?php for($i = 1; $i <= 5; $i++): ?>
                        <i class="bi bi-star<?php echo e($i <= round($product->reviews_avg_rating ?? 0) ? '-fill' : ''); ?>"></i>
                    <?php endfor; ?>
                </div>
                <span class="rating-text">
                    <?php echo e(number_format($product->reviews_avg_rating ?? 0, 1)); ?> / 5.0
                    (<?php echo e($product->reviews_count); ?> review<?php echo e($product->reviews_count !== 1 ? 's' : ''); ?>)
                </span>
            </div>

            <div class="product-detail-price">₱<?php echo e(number_format($product->price, 2)); ?></div>

            
            <?php if($product->stock > 5): ?>
                <span class="stock-badge in-stock"><i class="bi bi-check-circle-fill"></i> In Stock (<?php echo e($product->stock); ?> available)</span>
            <?php elseif($product->stock > 0): ?>
                <span class="stock-badge low-stock"><i class="bi bi-exclamation-circle-fill"></i> Only <?php echo e($product->stock); ?> left!</span>
            <?php else: ?>
                <span class="stock-badge out-stock"><i class="bi bi-x-circle-fill"></i> Out of Stock</span>
            <?php endif; ?>

            
            <?php if($product->description): ?>
                <p style="font-size:0.9rem; line-height:1.75; color:#4a4540; margin-bottom:1.5rem;">
                    <?php echo e($product->description); ?>

                </p>
            <?php endif; ?>

            
            <div class="product-meta">
                <?php if($product->category): ?>
                <div class="meta-row">
                    <span class="meta-label">Category</span>
                    <a href="<?php echo e(route('products.index')); ?>?category=<?php echo e(urlencode($product->category->name ?? '')); ?>"
                       style="color:var(--accent); text-decoration:none;"><?php echo e($product->category->name ?? 'Uncategorized'); ?></a>
                </div>
                <?php endif; ?>
                <?php if($product->size): ?>
                <div class="meta-row">
                    <span class="meta-label">Size</span>
                    <span><?php echo e($product->size); ?></span>
                </div>
                <?php endif; ?>
                <?php if($product->color): ?>
                <div class="meta-row">
                    <span class="meta-label">Color</span>
                    <span><?php echo e($product->color); ?></span>
                </div>
                <?php endif; ?>
            </div>

            
            <?php if(auth()->guard()->check()): ?>
                <?php if($product->stock > 0): ?>
                    <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="qty-control">
                                <button type="button" class="qty-btn" onclick="changeQty(-1)">−</button>
                                <input type="number" name="quantity" id="qtyInput" class="qty-input"
                                       value="1" min="1" max="<?php echo e($product->stock); ?>">
                                <button type="button" class="qty-btn" onclick="changeQty(1)">+</button>
                            </div>
                            <button type="submit" class="btn-add-cart">
                                <i class="bi bi-bag-plus me-2"></i>Add to Cart
                            </button>
                        </div>
                    </form>
                <?php else: ?>
                    <button class="btn-add-cart" disabled>Out of Stock</button>
                <?php endif; ?>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="btn-add-cart d-block text-center text-decoration-none">
                    <i class="bi bi-lock me-2"></i>Login to Purchase
                </a>
            <?php endif; ?>

        </div>
    </div>
</div>


<div class="reviews-section">
    <div class="container">
        <div class="row g-5">

            
            <div class="col-lg-7">
                <span class="section-label">Customer Reviews</span>
                <hr class="divider-accent">
                <h3 style="font-family:var(--font-display); font-size:1.6rem; margin-bottom:1.5rem;">
                    What People Are Saying
                </h3>

                <?php if($product->reviews->count() > 0): ?>
                    <?php $__currentLoopData = $product->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="review-card">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="reviewer-name"><?php echo e($review->user->name); ?></div>
                                    <div class="review-date"><?php echo e($review->created_at->format('M d, Y')); ?></div>
                                </div>
                                <?php if(auth()->guard()->check()): ?>
                                    <?php if(auth()->id() === $review->user_id): ?>
                                        <a href="<?php echo e(route('reviews.edit', $review->id)); ?>"
                                           class="btn btn-sm" style="font-size:0.72rem; color:var(--warm-gray);">
                                            <i class="bi bi-pencil me-1"></i>Edit
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <div class="review-stars">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <i class="bi bi-star<?php echo e($i <= $review->rating ? '-fill' : ''); ?>"></i>
                                <?php endfor; ?>
                            </div>
                            <div class="review-body"><?php echo e($review->body); ?></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div style="text-align:center; padding:3rem 0; color:var(--warm-gray);">
                        <div style="font-size:3rem; opacity:0.2; margin-bottom:0.75rem;">💬</div>
                        <p style="font-size:0.88rem;">No reviews yet. Be the first!</p>
                    </div>
                <?php endif; ?>
            </div>

            
            <div class="col-lg-5">
                <span class="section-label">Leave a Review</span>
                <hr class="divider-accent">

                <?php if(auth()->guard()->check()): ?>
                    <?php if($canReview): ?>
                        <div class="review-form-card">
                            <h5 style="font-family:var(--font-display); margin-bottom:1.25rem;">Share your experience</h5>
                            <form action="<?php echo e(route('reviews.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">

                                <div class="mb-3">
                                    <label class="form-label">Your Rating</label>
                                    <div class="star-picker">
                                        <?php for($i = 5; $i >= 1; $i--): ?>
                                            <input type="radio" name="rating" id="star<?php echo e($i); ?>" value="<?php echo e($i); ?>"
                                                   <?php echo e(old('rating') == $i ? 'checked' : ''); ?>>
                                            <label for="star<?php echo e($i); ?>" title="<?php echo e($i); ?> star<?php echo e($i > 1 ? 's' : ''); ?>">★</label>
                                        <?php endfor; ?>
                                    </div>
                                    <?php $__errorArgs = ['rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger" style="font-size:0.78rem;"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Your Review</label>
                                    <textarea name="body" class="form-control <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                              rows="4" placeholder="Tell us what you think…" required><?php echo e(old('body')); ?></textarea>
                                    <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">
                                    Submit Review
                                </button>
                            </form>
                        </div>
                    <?php elseif($hasReviewed): ?>
                        <div class="review-form-card text-center" style="color:var(--warm-gray);">
                            <i class="bi bi-check-circle" style="font-size:2rem; color:var(--accent);"></i>
                            <p class="mt-2" style="font-size:0.88rem;">You've already reviewed this product.</p>
                        </div>
                    <?php else: ?>
                        <div class="review-form-card text-center" style="color:var(--warm-gray);">
                            <i class="bi bi-bag" style="font-size:2rem; opacity:0.3;"></i>
                            <p class="mt-2" style="font-size:0.87rem;">
                                You must purchase this product before reviewing it.
                            </p>
                            <a href="<?php echo e(route('products.index')); ?>" class="btn btn-sm btn-primary mt-2">Browse Products</a>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="review-form-card text-center" style="color:var(--warm-gray);">
                        <i class="bi bi-lock" style="font-size:2rem; opacity:0.3;"></i>
                        <p class="mt-2" style="font-size:0.87rem;">Please login to leave a review.</p>
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-sm btn-primary mt-2">Login</a>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>


<?php if(isset($relatedProducts) && $relatedProducts->count() > 0): ?>
<div class="container py-4 mb-3">
    <span class="section-label">More like this</span>
    <hr class="divider-accent">
    <h3 style="font-family:var(--font-display); font-size:1.5rem; margin-bottom:1.5rem;">Related Products</h3>
    <div class="row g-3">
        <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-6 col-md-3">
                <a href="<?php echo e(route('products.show', $related->id)); ?>" class="related-card">
                    <div class="related-img">
<?php $relThumb = $related->thumbnailUrl(); ?>
                        <?php if($relThumb): ?>
                            <img src="<?php echo e($relThumb); ?>" alt="<?php echo e($related->name); ?>">
                        <?php else: ?>
                            <span style="font-size:2.5rem; opacity:0.2;">👟</span>
                        <?php endif; ?>
                    </div>
                    <div class="related-info">
                        <div class="related-name"><?php echo e($related->name); ?></div>
                        <div class="related-price">₱<?php echo e(number_format($related->price, 2)); ?></div>
                    </div>
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    function switchPhoto(el, src) {
        document.querySelectorAll('.thumb').forEach(t => t.classList.remove('active'));
        el.classList.add('active');
        const img = document.getElementById('mainPhotoImg');
        if (img) img.src = src;
    }

    function changeQty(delta) {
        const input = document.getElementById('qtyInput');
        const max = parseInt(input.max) || 99;
        let val = parseInt(input.value) + delta;
        val = Math.max(1, Math.min(max, val));
        input.value = val;
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp_ITCP226\htdocs\SoulMates-Inc-Project\resources\views/products/show.blade.php ENDPATH**/ ?>