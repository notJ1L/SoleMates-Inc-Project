<?php $__env->startSection('title', 'SoleMates Footwear — Find Your Perfect Pair'); ?>

<?php $__env->startSection('head'); ?>
<style>
/* ════════════════════════════════════════════════════════════
   HOME PAGE — CSS
════════════════════════════════════════════════════════════ */

/* ── Shared section spacing ── */
.hp-section {
    padding: 4.5rem 0;
}
.hp-section-alt {
    background: var(--c-off-white);
}

/* ── Section Header ── */
.hp-sec-head {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 1rem;
    margin-bottom: 2.25rem;
    flex-wrap: wrap;
}
.hp-sec-kicker {
    font-family: var(--font-display);
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 0.16em;
    text-transform: uppercase;
    color: var(--c-gold-dark);
    margin-bottom: 0.4rem;
}
.hp-sec-title {
    font-family: var(--font-display);
    font-size: clamp(1.4rem, 2vw, 1.85rem);
    font-weight: 900;
    color: var(--c-black);
    letter-spacing: -0.03em;
    line-height: 1.15;
    margin: 0;
}
.hp-sec-link {
    font-family: var(--font-display);
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: var(--c-text-soft);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    white-space: nowrap;
    transition: color 0.18s ease;
}
.hp-sec-link:hover { color: var(--c-black); }
.hp-sec-link i { font-size: 0.7rem; transition: transform 0.18s ease; }
.hp-sec-link:hover i { transform: translateX(3px); }

/* ════════════════════════════════════════════════════════════
   HERO
════════════════════════════════════════════════════════════ */
.hero {
    background: linear-gradient(140deg, #fffdf8 0%, #f9f6ef 55%, #f1ede3 100%);
    border-bottom: 1px solid var(--c-border);
    overflow: hidden;
}

.hero-inner {
    padding: 4.5rem 0 3.5rem;
}

.hero-kicker {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    font-family: var(--font-mono);
    font-size: 0.68rem;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: var(--c-text-muted);
    margin-bottom: 1.1rem;
}
.hero-kicker::before {
    content: '';
    display: inline-block;
    width: 18px;
    height: 1.5px;
    background: var(--c-gold);
    border-radius: 2px;
    flex-shrink: 0;
}

.hero-title {
    font-family: var(--font-display);
    font-weight: 900;
    font-size: clamp(2.4rem, 4vw + 0.5rem, 3.75rem);
    line-height: 1.05;
    letter-spacing: -0.04em;
    color: var(--c-black);
    margin-bottom: 1.25rem;
}

.hero-highlight {
    display: inline-block;
    background: var(--c-black);
    color: #ffe9b0;
    padding: 0.05em 0.3em;
    border-radius: 4px;
}

.hero-subtitle {
    font-size: 1rem;
    line-height: 1.75;
    color: var(--c-text-soft);
    max-width: 480px;
    margin-bottom: 2rem;
}

/* CTA Buttons */
.hero-cta {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 2.25rem;
}

.btn-hero-primary {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 13px 26px;
    background: var(--c-black);
    color: var(--c-white);
    border: none;
    border-radius: 8px;
    font-family: var(--font-display);
    font-size: 0.8rem;
    font-weight: 800;
    letter-spacing: 0.09em;
    text-transform: uppercase;
    text-decoration: none;
    transition: background 0.18s ease, transform 0.2s ease, box-shadow 0.2s ease;
}
.btn-hero-primary:hover {
    background: var(--c-charcoal);
    color: var(--c-white);
    transform: translateY(-2px);
    box-shadow: 0 10px 28px rgba(0,0,0,0.18);
}

.btn-hero-secondary {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 12px 22px;
    background: transparent;
    color: var(--c-black);
    border: 1.5px solid var(--c-border);
    border-radius: 8px;
    font-family: var(--font-display);
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 0.05em;
    text-decoration: none;
    transition: border-color 0.18s ease, background 0.18s ease;
}
.btn-hero-secondary:hover {
    border-color: var(--c-black);
    background: rgba(0,0,0,0.04);
    color: var(--c-black);
}

/* Hero trust bar */
.hero-trust {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 1.25rem;
}

.hero-trust-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.45rem;
    font-size: 0.78rem;
    color: var(--c-text-muted);
}
.hero-trust-badge i {
    color: var(--c-gold-dark);
    font-size: 0.85rem;
}

/* Hero Right Card */
.hero-card {
    background: var(--c-black);
    border-radius: 18px;
    padding: 2.5rem 2rem;
    min-height: 340px;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.hero-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(ellipse 80% 65% at 15% 115%, rgba(200,169,110,0.22) 0%, transparent 55%),
        radial-gradient(ellipse 60% 50% at 85% -5%, rgba(200,169,110,0.10) 0%, transparent 55%);
    pointer-events: none;
}

.hero-card::after {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(circle, rgba(255,255,255,0.05) 1px, transparent 1px);
    background-size: 24px 24px;
    pointer-events: none;
}

.hero-card-inner {
    position: relative;
    z-index: 2;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.hero-card-tag {
    font-family: var(--font-mono);
    font-size: 0.63rem;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: rgba(255,255,255,0.45);
    margin-bottom: 0.75rem;
}

.hero-card-headline {
    font-family: var(--font-display);
    font-size: 1.5rem;
    font-weight: 900;
    color: var(--c-white);
    line-height: 1.2;
    letter-spacing: -0.02em;
    margin-bottom: 1rem;
    max-width: 14rem;
}

.hero-card-desc {
    font-size: 0.82rem;
    line-height: 1.65;
    color: rgba(255,255,255,0.5);
    max-width: 16rem;
}

.hero-card-stats {
    display: flex;
    gap: 1.5rem;
    margin-top: 2rem;
    padding-top: 1.25rem;
    border-top: 1px solid rgba(255,255,255,0.08);
}

.hero-stat-num {
    font-family: var(--font-display);
    font-size: 1.55rem;
    font-weight: 900;
    color: var(--c-gold);
    line-height: 1;
}

.hero-stat-label {
    font-size: 0.72rem;
    color: rgba(255,255,255,0.38);
    margin-top: 0.2rem;
}

.hero-card-pill {
    position: absolute;
    top: 1.5rem;
    right: 1.5rem;
    background: rgba(200,169,110,0.18);
    border: 1px solid rgba(200,169,110,0.35);
    border-radius: 99px;
    padding: 5px 12px;
    font-family: var(--font-mono);
    font-size: 0.62rem;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--c-gold);
    z-index: 2;
}

/* ════════════════════════════════════════════════════════════
   SEARCH RESULTS (conditional)
════════════════════════════════════════════════════════════ */
.search-results-section {
    padding: 3rem 0 2rem;
    border-bottom: 1px solid var(--c-border);
}

.search-results-title {
    font-family: var(--font-display);
    font-size: 1.35rem;
    font-weight: 800;
    color: var(--c-black);
    letter-spacing: -0.02em;
    margin-bottom: 0.3rem;
}

/* ════════════════════════════════════════════════════════════
   CATEGORY BROWSE STRIP
════════════════════════════════════════════════════════════ */
.cat-strip {
    background: var(--c-white);
    border-bottom: 1px solid var(--c-border);
    padding: 0.85rem 0;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: none;
}
.cat-strip::-webkit-scrollbar { display: none; }

.cat-strip-inner {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    min-width: max-content;
    padding: 0 1rem;
}

.cat-strip-label {
    font-family: var(--font-mono);
    font-size: 0.65rem;
    letter-spacing: 0.16em;
    text-transform: uppercase;
    color: var(--c-text-muted);
    white-space: nowrap;
    margin-right: 0.25rem;
}

.cat-chip {
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
    padding: 5px 13px;
    background: var(--c-off-white);
    border: 1.5px solid var(--c-border);
    border-radius: 99px;
    font-size: 0.8rem;
    font-weight: 500;
    color: var(--c-text-mid);
    text-decoration: none;
    white-space: nowrap;
    transition: border-color 0.18s ease, background 0.18s ease, color 0.18s ease;
}
.cat-chip:hover {
    border-color: var(--c-black);
    background: var(--c-black);
    color: var(--c-white);
}

.cat-chip-count {
    font-size: 0.68rem;
    color: var(--c-text-muted);
    font-family: var(--font-mono);
    transition: color 0.18s ease;
}
.cat-chip:hover .cat-chip-count { color: rgba(255,255,255,0.5); }

.cat-chip-all {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    padding: 5px 14px;
    background: var(--c-black);
    border: 1.5px solid var(--c-black);
    border-radius: 99px;
    font-size: 0.8rem;
    font-weight: 700;
    font-family: var(--font-display);
    color: var(--c-white);
    text-decoration: none;
    letter-spacing: 0.03em;
    white-space: nowrap;
    transition: background 0.18s ease;
    margin-left: 0.25rem;
}
.cat-chip-all:hover { background: var(--c-charcoal); color: var(--c-white); }

/* ════════════════════════════════════════════════════════════
   PRODUCT CARD (shared by carousel + grid)
════════════════════════════════════════════════════════════ */
.prod-card {
    background: var(--c-white);
    border: 1.5px solid var(--c-border);
    border-radius: 12px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    height: 100%;
    transition: transform 0.26s ease, box-shadow 0.26s ease, border-color 0.26s ease;
}
.prod-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 18px 40px rgba(0,0,0,0.09);
    border-color: rgba(200,169,110,0.4);
}

.prod-img-wrap {
    position: relative;
    overflow: hidden;
    background: var(--c-off-white);
    aspect-ratio: 1 / 1;
    display: flex;
    align-items: center;
    justify-content: center;
}

.prod-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.45s ease;
}
.prod-card:hover .prod-img { transform: scale(1.06); }

.prod-img-placeholder {
    font-size: 3.5rem;
    opacity: 0.18;
    user-select: none;
}

.prod-badge {
    position: absolute;
    top: 0.65rem;
    left: 0.65rem;
    background: var(--c-black);
    color: #ffe9b0;
    font-family: var(--font-mono);
    font-size: 0.56rem;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    padding: 3px 9px;
    border-radius: 3px;
    line-height: 1.4;
}

.prod-badge-new { background: var(--c-black); color: #ffe9b0; }
.prod-badge-sale { background: #C0392B; color: #fff; }
.prod-badge-hot  { background: var(--c-gold-dark); color: #fff; }

.prod-info {
    padding: 1rem 1rem 0.85rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.prod-brand {
    font-family: var(--font-mono);
    font-size: 0.6rem;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: var(--c-gold-dark);
    margin-bottom: 0.25rem;
}

.prod-name {
    font-family: var(--font-display);
    font-size: 0.92rem;
    font-weight: 700;
    color: var(--c-black);
    line-height: 1.35;
    margin-bottom: 0.5rem;
    flex: 1;

    /* Clamp to 2 lines */
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.prod-price {
    font-family: var(--font-mono);
    font-size: 0.98rem;
    font-weight: 700;
    color: var(--c-black);
    margin-bottom: 0.25rem;
}

.prod-stock-low {
    font-size: 0.68rem;
    color: #C0392B;
    font-family: var(--font-mono);
}
.prod-stock-out {
    font-size: 0.68rem;
    color: var(--c-text-muted);
    font-family: var(--font-mono);
}

/* ── Card Action Row ── */
.prod-actions {
    display: flex;
    gap: 0.5rem;
    padding: 0 1rem 1rem;
    margin-top: auto;
}

.btn-prod-view {
    flex: 1;
    padding: 8px 12px;
    background: var(--c-off-white);
    border: 1.5px solid var(--c-border);
    border-radius: 7px;
    font-family: var(--font-display);
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.04em;
    color: var(--c-text-mid);
    text-align: center;
    text-decoration: none;
    transition: background 0.18s ease, border-color 0.18s ease, color 0.18s ease;
    white-space: nowrap;
}
.btn-prod-view:hover {
    background: var(--c-black);
    border-color: var(--c-black);
    color: var(--c-white);
}

.btn-prod-cart {
    flex-shrink: 0;
    width: 36px;
    height: 36px;
    border-radius: 7px;
    background: var(--c-black);
    border: none;
    color: var(--c-white);
    font-size: 0.85rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.18s ease, transform 0.18s ease;
    text-decoration: none;
}
.btn-prod-cart:hover {
    background: var(--c-gold-dark);
    transform: scale(1.06);
    color: var(--c-white);
}
.btn-prod-cart:disabled {
    background: var(--c-border);
    color: var(--c-text-muted);
    cursor: not-allowed;
    transform: none;
}

/* ════════════════════════════════════════════════════════════
   FEATURED CAROUSEL
════════════════════════════════════════════════════════════ */
.carousel-outer {
    position: relative;
}

.carousel-viewport {
    overflow: hidden;
    border-radius: 4px;
}

.carousel-track {
    display: flex;
    gap: 1.25rem;
    transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    will-change: transform;
}

/* Card widths — 4/3/2/1.3 columns */
.carousel-card {
    flex: 0 0 calc((100% - 3 * 1.25rem) / 4);
    min-width: 0;
}

@media (max-width: 991.98px) {
    .carousel-card { flex: 0 0 calc((100% - 2 * 1.25rem) / 3); }
}
@media (max-width: 767.98px) {
    .carousel-card { flex: 0 0 calc((100% - 1 * 1.25rem) / 2); }
}
@media (max-width: 479.98px) {
    .carousel-card { flex: 0 0 78%; }
    .carousel-track { gap: 1rem; }
}

/* Arrows */
.carousel-arrows {
    display: flex;
    gap: 0.5rem;
}

.c-arrow {
    width: 38px;
    height: 38px;
    border-radius: 8px;
    background: var(--c-white);
    border: 1.5px solid var(--c-border);
    color: var(--c-text-mid);
    font-size: 0.8rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.18s ease, border-color 0.18s ease, color 0.18s ease, transform 0.18s ease;
    flex-shrink: 0;
}
.c-arrow:hover:not(:disabled) {
    background: var(--c-black);
    border-color: var(--c-black);
    color: var(--c-white);
    transform: scale(1.05);
}
.c-arrow:disabled {
    opacity: 0.35;
    cursor: not-allowed;
}

/* Dots */
.carousel-dots {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    margin-top: 1.5rem;
}

.c-dot {
    width: 7px;
    height: 7px;
    border-radius: 99px;
    background: var(--c-border);
    border: none;
    padding: 0;
    cursor: pointer;
    transition: background 0.22s ease, width 0.22s ease;
}
.c-dot.active {
    background: var(--c-black);
    width: 20px;
}

/* ════════════════════════════════════════════════════════════
   NEW ARRIVALS GRID
════════════════════════════════════════════════════════════ */
.arrivals-grid .prod-card {
    /* Slightly lighter card for the alt background */
    background: var(--c-white);
}

/* ════════════════════════════════════════════════════════════
   EMPTY STATES
════════════════════════════════════════════════════════════ */
.hp-empty {
    text-align: center;
    padding: 3rem 2rem;
    border: 1.5px dashed var(--c-border);
    border-radius: 12px;
    background: var(--c-white);
}
.hp-empty-icon {
    font-size: 3rem;
    opacity: 0.18;
    margin-bottom: 0.75rem;
}
.hp-empty p { color: var(--c-text-muted); font-size: 0.9rem; }

/* ════════════════════════════════════════════════════════════
   RESPONSIVE HERO
════════════════════════════════════════════════════════════ */
@media (max-width: 991.98px) {
    .hero-inner { padding: 3rem 0 2.5rem; }
    .hero-card  { min-height: 240px; margin-top: 2rem; }
    .hero-title { font-size: clamp(2rem, 5vw, 2.6rem); }
}
@media (max-width: 575.98px) {
    .hero-inner { padding: 2.5rem 0 2rem; }
    .hp-section { padding: 3rem 0; }
}
</style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


<section class="hero" aria-label="Hero banner">
    <div class="container hero-inner">
        <div class="row align-items-center g-4">

            
            <div class="col-lg-7">
                <p class="hero-kicker ha ha-1">SoleMates Footwear &nbsp;·&nbsp; <?php echo e(date('Y')); ?> Collection</p>

                <h1 class="hero-title ha ha-2">
                    Step into your<br>
                    <span class="hero-highlight">perfect pair.</span>
                </h1>

                <p class="hero-subtitle ha ha-3">
                    Thoughtfully curated footwear for every walk of life — from everyday errands
                    to milestone moments. Lightweight comfort, elevated style, pairs that truly last.
                </p>

                <div class="hero-cta ha ha-4">
                    <a href="<?php echo e(route('products.index')); ?>" class="btn-hero-primary">
                        <i class="fas fa-store" aria-hidden="true"></i>
                        Shop All Products
                    </a>
                    <a href="#featured" class="btn-hero-secondary">
                        <i class="fas fa-star" aria-hidden="true"></i>
                        Featured Picks
                    </a>
                </div>

                <div class="hero-trust ha ha-5">
                    <span class="hero-trust-badge">
                        <i class="fas fa-shield-alt" aria-hidden="true"></i>
                        Secure checkout
                    </span>
                    <span class="hero-trust-badge">
                        <i class="fas fa-shipping-fast" aria-hidden="true"></i>
                        Fast local shipping
                    </span>
                    <span class="hero-trust-badge">
                        <i class="fas fa-undo" aria-hidden="true"></i>
                        30-day returns
                    </span>
                </div>
            </div>

            
            <div class="col-lg-5">
                <div class="hero-card ha-right" aria-hidden="true">
                    <div class="hero-card-pill">New arrivals weekly</div>
                    <div class="hero-card-inner">
                        <div>
                            <p class="hero-card-tag">Weekend-ready comfort</p>
                            <h2 class="hero-card-headline">
                                Slip into cloud&#8209;soft cushioning.
                            </h2>
                            <p class="hero-card-desc">
                                From classic sneakers to polished loafers, every pair is
                                hand&#8209;checked for quality so you can wear them on repeat.
                            </p>
                        </div>
                        <div class="hero-card-stats">
                            <div>
                                <div class="hero-stat-num">500+</div>
                                <div class="hero-stat-label">Products</div>
                            </div>
                            <div>
                                <div class="hero-stat-num">2K+</div>
                                <div class="hero-stat-label">Happy customers</div>
                            </div>
                            <div>
                                <div class="hero-stat-num">100%</div>
                                <div class="hero-stat-label">Quality checked</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



<?php if(isset($results)): ?>
<section class="search-results-section" aria-label="Search results">
    <div class="container">
        <h2 class="search-results-title">
            Results for &ldquo;<?php echo e($query); ?>&rdquo;
        </h2>
        <p class="text-muted mb-4" style="font-size:0.85rem;">
            <?php echo e($results->total()); ?> product<?php echo e($results->total() !== 1 ? 's' : ''); ?> found
        </p>

        <?php if($results->count()): ?>
            <div class="row g-3">
                <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6 col-md-4 col-xl-3">
                        <div class="prod-card">
                            <a href="<?php echo e(route('products.show', $product->id)); ?>" style="text-decoration:none;color:inherit;">
                                <div class="prod-img-wrap">
                                    <?php $thumb = $product->thumbnailUrl(); ?>
                                    <?php if($thumb): ?>
                                        <img src="<?php echo e($thumb); ?>" alt="<?php echo e($product->name); ?>" class="prod-img">
                                    <?php else: ?>
                                        <span class="prod-img-placeholder" aria-hidden="true">&#128095;</span>
                                    <?php endif; ?>
                                    <?php if($product->created_at && $product->created_at->diffInDays() < 14): ?>
                                        <span class="prod-badge prod-badge-new">New</span>
                                    <?php endif; ?>
                                </div>
                                <div class="prod-info">
                                    <div class="prod-brand"><?php echo e(optional($product->brand)->name ?? 'SoleMates'); ?></div>
                                    <div class="prod-name"><?php echo e($product->name); ?></div>
                                    <div class="prod-price">&#8369;<?php echo e(number_format($product->price, 2)); ?></div>
                                    <?php if($product->stock !== null): ?>
                                        <?php if($product->stock <= 5 && $product->stock > 0): ?>
                                            <div class="prod-stock-low">Only <?php echo e($product->stock); ?> left</div>
                                        <?php elseif($product->stock == 0): ?>
                                            <div class="prod-stock-out">Out of stock</div>
                                        <?php endif; ?>
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
                                                <i class="fas fa-shopping-bag" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('login')); ?>" class="btn-prod-cart" title="Sign in to add to cart" aria-label="Sign in to add to cart">
                                            <i class="fas fa-shopping-bag" aria-hidden="true"></i>
                                        </a>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <button class="btn-prod-cart" disabled aria-label="Out of stock">
                                        <i class="fas fa-ban" aria-hidden="true"></i>
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="mt-4"><?php echo e($results->links()); ?></div>
        <?php else: ?>
            <div class="hp-empty">
                <div class="hp-empty-icon">&#128269;</div>
                <p>No products matched &ldquo;<?php echo e($query); ?>&rdquo;. Try a broader search term.</p>
                <a href="<?php echo e(route('home')); ?>" class="btn btn-dark btn-sm mt-2" style="font-family:var(--font-display);font-size:0.75rem;letter-spacing:0.06em;">Clear Search</a>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>



<?php if(!isset($results) && isset($categories) && $categories->count()): ?>
<div class="cat-strip" data-reveal="fade" role="navigation" aria-label="Browse by category">
    <div class="container">
        <div class="cat-strip-inner">
            <span class="cat-strip-label">Browse:</span>
            <?php $__currentLoopData = $categories->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('products.index', ['category_id' => $category->id])); ?>" class="cat-chip">
                    <?php echo e($category->name); ?>

                    <span class="cat-chip-count"><?php echo e($category->products_count); ?></span>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('products.index')); ?>" class="cat-chip-all">
                View All <i class="fas fa-arrow-right" style="font-size:0.65rem;" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>
<?php endif; ?>



<?php if(!isset($results)): ?>
<section id="featured" class="hp-section" aria-label="Featured picks">
    <div class="container">

        <div class="hp-sec-head" data-reveal="up">
            <div>
                <p class="hp-sec-kicker">Handpicked</p>
                <h2 class="hp-sec-title">Featured Picks</h2>
            </div>
            <div class="d-flex align-items-center gap-3">
                
                <div class="carousel-arrows" id="featuredArrows">
                    <button class="c-arrow" id="featPrev" aria-label="Previous featured products">
                        <i class="fas fa-chevron-left" aria-hidden="true"></i>
                    </button>
                    <button class="c-arrow" id="featNext" aria-label="Next featured products">
                        <i class="fas fa-chevron-right" aria-hidden="true"></i>
                    </button>
                </div>
                <a href="<?php echo e(route('products.index')); ?>" class="hp-sec-link">
                    View all <i class="fas fa-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>

        <?php if(isset($featuredProducts) && $featuredProducts->count()): ?>

            
            <div class="carousel-outer" id="featuredCarousel" data-reveal="up" data-delay="1">
                <div class="carousel-viewport">
                    <div class="carousel-track" id="featuredTrack">
                        <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="carousel-card">
                                <div class="prod-card">

                                    
                                    <a href="<?php echo e(route('products.show', $product->id)); ?>"
                                       style="text-decoration:none;color:inherit;"
                                       tabindex="-1"
                                       aria-hidden="true">
                                        <div class="prod-img-wrap">
                                            <?php $thumb = $product->thumbnailUrl(); ?>
                                            <?php if($thumb): ?>
                                                <img src="<?php echo e($thumb); ?>"
                                                     alt="<?php echo e($product->name); ?>"
                                                     class="prod-img"
                                                     loading="lazy">
                                            <?php else: ?>
                                                <span class="prod-img-placeholder" aria-hidden="true">&#128095;</span>
                                            <?php endif; ?>

                                            <?php if($product->created_at && $product->created_at->diffInDays() < 14): ?>
                                                <span class="prod-badge prod-badge-new">New</span>
                                            <?php endif; ?>
                                        </div>
                                    </a>

                                    
                                    <div class="prod-info">
                                        <div class="prod-brand">
                                            <?php echo e(optional($product->brand)->name ?? 'SoleMates'); ?>

                                        </div>
                                        <div class="prod-name">
                                            <a href="<?php echo e(route('products.show', $product->id)); ?>"
                                               style="text-decoration:none;color:inherit;">
                                                <?php echo e($product->name); ?>

                                            </a>
                                        </div>
                                        <div class="prod-price">&#8369;<?php echo e(number_format($product->price, 2)); ?></div>
                                        <?php if($product->stock !== null): ?>
                                            <?php if($product->stock <= 5 && $product->stock > 0): ?>
                                                <div class="prod-stock-low">Only <?php echo e($product->stock); ?> left</div>
                                            <?php elseif($product->stock == 0): ?>
                                                <div class="prod-stock-out">Out of stock</div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>

                                    
                                    <div class="prod-actions">
                                        <a href="<?php echo e(route('products.show', $product->id)); ?>"
                                           class="btn-prod-view">
                                            View Details
                                        </a>

                                        <?php if(!isset($product->stock) || $product->stock > 0): ?>
                                            <?php if(auth()->guard()->check()): ?>
                                                <form action="<?php echo e(route('cart.add', $product->id)); ?>"
                                                      method="POST"
                                                      style="display:contents;">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="quantity" value="1">
                                                    <button type="submit"
                                                            class="btn-prod-cart"
                                                            title="Add to cart"
                                                            aria-label="Add <?php echo e($product->name); ?> to cart">
                                                        <i class="fas fa-shopping-bag" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('login')); ?>"
                                                   class="btn-prod-cart"
                                                   title="Sign in to add to cart"
                                                   aria-label="Sign in to add <?php echo e($product->name); ?> to cart">
                                                    <i class="fas fa-shopping-bag" aria-hidden="true"></i>
                                                </a>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <button class="btn-prod-cart" disabled aria-label="Out of stock">
                                                <i class="fas fa-ban" aria-hidden="true"></i>
                                            </button>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            
            <div class="carousel-dots" id="featuredDots" role="tablist" aria-label="Carousel position"></div>

        <?php else: ?>
            <div class="hp-empty" data-reveal="scale">
                <div class="hp-empty-icon" aria-hidden="true">&#128095;</div>
                <p>
                    We're still curating our featured picks.<br>
                    <a href="<?php echo e(route('products.index')); ?>">Explore all products</a> in the meantime.
                </p>
            </div>
        <?php endif; ?>

    </div>
</section>
<?php endif; ?> 



<?php if(!isset($results) && isset($newArrivals) && $newArrivals->count()): ?>
<section class="hp-section hp-section-alt arrivals-grid" aria-label="New arrivals">
    <div class="container">

        <div class="hp-sec-head" data-reveal="up">
            <div>
                <p class="hp-sec-kicker">Just Dropped</p>
                <h2 class="hp-sec-title">New Arrivals</h2>
            </div>
            <a href="<?php echo e(route('products.index', ['sort' => 'latest'])); ?>" class="hp-sec-link">
                See all new <i class="fas fa-arrow-right" aria-hidden="true"></i>
            </a>
        </div>

        <div class="row g-3">
            <?php $__currentLoopData = $newArrivals->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-6 col-md-4 col-lg-3"
                     data-reveal="scale"
                     data-delay="<?php echo e(($loop->index % 4) + 1); ?>">
                    <div class="prod-card">

                        <a href="<?php echo e(route('products.show', $product->id)); ?>"
                           style="text-decoration:none;color:inherit;"
                           aria-label="<?php echo e($product->name); ?>">
                            <div class="prod-img-wrap">
                                <?php $thumb = $product->thumbnailUrl(); ?>
                                <?php if($thumb): ?>
                                    <img src="<?php echo e($thumb); ?>"
                                         alt="<?php echo e($product->name); ?>"
                                         class="prod-img"
                                         loading="lazy">
                                <?php else: ?>
                                    <span class="prod-img-placeholder" aria-hidden="true">&#128095;</span>
                                <?php endif; ?>
                                <span class="prod-badge prod-badge-new">New</span>
                            </div>
                        </a>

                        <div class="prod-info">
                            <div class="prod-brand">
                                <?php echo e(optional($product->brand)->name ?? 'SoleMates'); ?>

                            </div>
                            <div class="prod-name">
                                <a href="<?php echo e(route('products.show', $product->id)); ?>"
                                   style="text-decoration:none;color:inherit;">
                                    <?php echo e($product->name); ?>

                                </a>
                            </div>
                            <div class="prod-price">&#8369;<?php echo e(number_format($product->price, 2)); ?></div>
                            <?php if($product->stock !== null && $product->stock <= 5 && $product->stock > 0): ?>
                                <div class="prod-stock-low">Only <?php echo e($product->stock); ?> left</div>
                            <?php elseif($product->stock !== null && $product->stock == 0): ?>
                                <div class="prod-stock-out">Out of stock</div>
                            <?php endif; ?>
                        </div>

                        <div class="prod-actions">
                            <a href="<?php echo e(route('products.show', $product->id)); ?>" class="btn-prod-view">View Details</a>
                            <?php if(!isset($product->stock) || $product->stock > 0): ?>
                                <?php if(auth()->guard()->check()): ?>
                                    <form action="<?php echo e(route('cart.add', $product->id)); ?>"
                                          method="POST"
                                          style="display:contents;">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit"
                                                class="btn-prod-cart"
                                                title="Add to cart"
                                                aria-label="Add <?php echo e($product->name); ?> to cart">
                                            <i class="fas fa-shopping-bag" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                <?php else: ?>
                                    <a href="<?php echo e(route('login')); ?>"
                                       class="btn-prod-cart"
                                       title="Sign in to add to cart"
                                       aria-label="Sign in to add <?php echo e($product->name); ?> to cart">
                                        <i class="fas fa-shopping-bag" aria-hidden="true"></i>
                                    </a>
                                <?php endif; ?>
                            <?php else: ?>
                                <button class="btn-prod-cart" disabled aria-label="Out of stock">
                                    <i class="fas fa-ban" aria-hidden="true"></i>
                                </button>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="text-center mt-4" data-reveal="up">
            <a href="<?php echo e(route('products.index', ['sort' => 'latest'])); ?>"
               class="btn-hero-secondary d-inline-flex">
                <i class="fas fa-th" aria-hidden="true"></i>
                Browse All Products
            </a>
        </div>

    </div>
</section>
<?php endif; ?> 

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script>
/**
 * SoleMates — Featured Products Carousel
 * Auto-play · Prev/Next arrows · Dot indicators · Pause on hover · Responsive
 */
(function () {
    'use strict';

    var AUTOPLAY_MS = 4000;

    /* ── Find elements ── */
    var outer    = document.getElementById('featuredCarousel');
    var track    = document.getElementById('featuredTrack');
    var dotsWrap = document.getElementById('featuredDots');
    var btnPrev  = document.getElementById('featPrev');
    var btnNext  = document.getElementById('featNext');

    if (!outer || !track) return;

    var cards  = Array.from(track.children);
    var total  = cards.length;
    if (total === 0) return;

    var current  = 0;
    var timer    = null;
    var trackGap = 0; /* will be read from computed style */

    /* ── Responsive column count ── */
    function getCols() {
        var w = window.innerWidth;
        if (w >= 992) return 4;
        if (w >= 768) return 3;
        if (w >= 480) return 2;
        return 1;
    }

    /* ── Max slide index (no empty space at end) ── */
    function maxIdx() {
        return Math.max(0, total - getCols());
    }

    /* ── Read actual gap from computed style ── */
    function readGap() {
        var style = window.getComputedStyle(track);
        var col   = style.columnGap || style.gap || '0px';
        trackGap  = parseFloat(col) || 20;
    }

    /* ── Slide to index ── */
    function go(idx) {
        readGap();
        current = Math.max(0, Math.min(idx, maxIdx()));

        var cardW   = cards[0].offsetWidth + trackGap;
        track.style.transform = 'translateX(-' + (current * cardW) + 'px)';

        /* Arrows */
        if (btnPrev) btnPrev.disabled = current === 0;
        if (btnNext) btnNext.disabled = current >= maxIdx();

        /* Dots */
        updateDots();
    }

    /* ── Build / rebuild dot buttons ── */
    function buildDots() {
        if (!dotsWrap) return;
        var cols   = getCols();
        var nDots  = Math.ceil(total / cols);
        dotsWrap.innerHTML = '';
        for (var i = 0; i < nDots; i++) {
            (function (dotIdx) {
                var btn = document.createElement('button');
                btn.className   = 'c-dot' + (dotIdx === 0 ? ' active' : '');
                btn.setAttribute('role', 'tab');
                btn.setAttribute('aria-label', 'Go to slide group ' + (dotIdx + 1));
                btn.addEventListener('click', function () {
                    stopAuto();
                    go(dotIdx * getCols());
                    startAuto();
                });
                dotsWrap.appendChild(btn);
            })(i);
        }
    }

    /* ── Highlight correct dot ── */
    function updateDots() {
        if (!dotsWrap) return;
        var cols      = getCols();
        var activeDot = Math.round(current / cols);
        var dots      = dotsWrap.querySelectorAll('.c-dot');
        dots.forEach(function (d, i) {
            d.classList.toggle('active', i === activeDot);
            d.setAttribute('aria-selected', i === activeDot ? 'true' : 'false');
        });
    }

    /* ── Auto-play ── */
    function startAuto() {
        stopAuto();
        timer = setInterval(function () {
            go(current >= maxIdx() ? 0 : current + 1);
        }, AUTOPLAY_MS);
    }

    function stopAuto() {
        clearInterval(timer);
    }

    /* ── Arrow events ── */
    if (btnPrev) {
        btnPrev.addEventListener('click', function () {
            stopAuto();
            go(current <= 0 ? maxIdx() : current - 1);
            startAuto();
        });
    }

    if (btnNext) {
        btnNext.addEventListener('click', function () {
            stopAuto();
            go(current >= maxIdx() ? 0 : current + 1);
            startAuto();
        });
    }

    /* ── Pause on hover ── */
    outer.addEventListener('mouseenter', stopAuto);
    outer.addEventListener('mouseleave', startAuto);

    /* ── Touch/swipe support ── */
    var touchX = null;
    outer.addEventListener('touchstart', function (e) {
        touchX = e.touches[0].clientX;
    }, { passive: true });

    outer.addEventListener('touchend', function (e) {
        if (touchX === null) return;
        var diff = touchX - e.changedTouches[0].clientX;
        if (Math.abs(diff) > 45) {
            stopAuto();
            go(diff > 0 ? current + 1 : current - 1);
            startAuto();
        }
        touchX = null;
    }, { passive: true });

    /* ── Resize: rebuild dots and reposition ── */
    var resizeTimer;
    window.addEventListener('resize', function () {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function () {
            buildDots();
            go(Math.min(current, maxIdx()));
        }, 150);
    });

    /* ── Init ── */
    buildDots();
    go(0);
    startAuto();

})();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\SoulMates-Inc-Project\resources\views/home.blade.php ENDPATH**/ ?>