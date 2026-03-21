<?php $__env->startSection('title', 'My Orders — SoleMates Footwear'); ?>

<?php $__env->startSection('head'); ?>
<style>
/* ════ ORDERS PAGE ════ */
.orders-page { padding: 2.5rem 0 5rem; }

.profile-breadcrumb {
    background: var(--c-off-white);
    border-bottom: 1px solid var(--c-border);
    padding: 0.75rem 0;
}
.breadcrumb { margin: 0; font-size: 0.8rem; }
.breadcrumb-item a { color: var(--c-gold-dark); text-decoration: none; }
.breadcrumb-item a:hover { color: var(--c-black); }
.breadcrumb-item.active { color: var(--c-text-muted); }

.orders-page-title {
    font-family: var(--font-display);
    font-size: clamp(1.6rem, 2.5vw, 2.1rem);
    font-weight: 900;
    color: var(--c-black);
    letter-spacing: -0.03em;
    margin-bottom: 0.25rem;
}
.orders-page-sub { font-size: 0.875rem; color: var(--c-text-muted); }

/* ── Order Card ── */
.order-card {
    background: var(--c-white);
    border: 1.5px solid var(--c-border);
    border-radius: 14px;
    overflow: hidden;
    margin-bottom: 1rem;
    transition: border-color 0.22s ease, box-shadow 0.22s ease;
}
.order-card:hover {
    border-color: rgba(200,169,110,0.45);
    box-shadow: 0 8px 28px rgba(0,0,0,0.07);
}

.order-card-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    padding: 1rem 1.5rem;
    background: var(--c-off-white);
    border-bottom: 1px solid var(--c-border);
    flex-wrap: wrap;
}

.order-num {
    font-family: var(--font-mono);
    font-size: 0.85rem;
    font-weight: 700;
    color: var(--c-black);
}
.order-date {
    font-size: 0.75rem;
    color: var(--c-text-muted);
    margin-top: 0.1rem;
}

/* Status badges */
.order-status {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    padding: 4px 12px;
    border-radius: 99px;
    font-family: var(--font-display);
    font-size: 0.68rem;
    font-weight: 800;
    letter-spacing: 0.07em;
    text-transform: uppercase;
    white-space: nowrap;
}
.status-pending    { background: rgba(212,136,14,0.12);  color: #D4880E; border: 1px solid rgba(212,136,14,0.3); }
.status-processing { background: rgba(37,99,235,0.10);   color: #2563EB; border: 1px solid rgba(37,99,235,0.25); }
.status-shipped    { background: rgba(8,145,178,0.10);   color: #0891B2; border: 1px solid rgba(8,145,178,0.25); }
.status-completed  { background: rgba(33,150,83,0.10);   color: #219653; border: 1px solid rgba(33,150,83,0.25); }
.status-cancelled  { background: rgba(192,57,43,0.10);   color: var(--c-error); border: 1px solid rgba(192,57,43,0.25); }
.status-default    { background: rgba(0,0,0,0.06);       color: var(--c-text-soft); border: 1px solid var(--c-border); }

.order-card-body { padding: 1.25rem 1.5rem; }

/* Product thumbnails preview */
.order-thumbs {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    flex-wrap: wrap;
    margin-bottom: 1rem;
}
.order-thumb {
    width: 56px;
    height: 56px;
    border-radius: 8px;
    overflow: hidden;
    background: var(--c-off-white);
    border: 1.5px solid var(--c-border);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    flex-shrink: 0;
}
.order-thumb img { width: 100%; height: 100%; object-fit: cover; }
.order-thumb-more {
    background: var(--c-cream);
    border: 1.5px solid var(--c-border);
    color: var(--c-text-muted);
    font-family: var(--font-display);
    font-size: 0.72rem;
    font-weight: 700;
}

/* Order footer: total + CTA */
.order-card-foot {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    padding-top: 1rem;
    border-top: 1px solid var(--c-border);
    flex-wrap: wrap;
}
.order-total-label { font-size: 0.78rem; color: var(--c-text-muted); margin-bottom: 0.1rem; }
.order-total-amount {
    font-family: var(--font-mono);
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--c-black);
}

.btn-view-order {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 9px 20px;
    background: var(--c-black);
    color: var(--c-white);
    border: none;
    border-radius: 8px;
    font-family: var(--font-display);
    font-size: 0.76rem;
    font-weight: 800;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    text-decoration: none;
    transition: background 0.18s ease, transform 0.18s ease;
}
.btn-view-order:hover {
    background: var(--c-charcoal);
    color: var(--c-white);
    transform: translateY(-1px);
}

/* Empty state */
.orders-empty {
    text-align: center;
    padding: 5rem 2rem;
    background: var(--c-white);
    border: 1.5px dashed var(--c-border);
    border-radius: 16px;
}
.orders-empty-icon { font-size: 3.5rem; opacity: 0.15; margin-bottom: 1.25rem; }
.orders-empty h3 {
    font-family: var(--font-display);
    font-size: 1.3rem;
    font-weight: 900;
    letter-spacing: -0.02em;
    margin-bottom: 0.5rem;
}
.orders-empty p { color: var(--c-text-muted); font-size: 0.875rem; margin-bottom: 1.75rem; }
.btn-start-shopping {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 12px 26px;
    background: var(--c-black);
    color: var(--c-white);
    border-radius: 9px;
    font-family: var(--font-display);
    font-size: 0.8rem;
    font-weight: 800;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    text-decoration: none;
    transition: background 0.18s ease, transform 0.18s ease;
}
.btn-start-shopping:hover { background: var(--c-charcoal); color: var(--c-white); transform: translateY(-2px); }

/* Item list inside card body */
.order-item-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 0.75rem;
    padding: 0.55rem 0;
    border-bottom: 1px solid var(--c-border);
    font-size: 0.875rem;
}
.order-item-row:last-child { border-bottom: none; }
.order-item-name { font-weight: 600; color: var(--c-black); }
.order-item-qty { font-size: 0.75rem; color: var(--c-text-muted); font-family: var(--font-mono); }
.order-item-price { font-family: var(--font-mono); font-weight: 700; flex-shrink: 0; }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="profile-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('profile.edit')); ?>">My Account</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Orders</li>
            </ol>
        </nav>
    </div>
</div>

<div class="orders-page">
    <div class="container">

        
        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap mb-4">
            <div>
                <h1 class="orders-page-title">My Orders</h1>
                <p class="orders-page-sub">
                    <?php echo e($orders->total()); ?> order<?php echo e($orders->total() !== 1 ? 's' : ''); ?> placed
                </p>
            </div>
            <a href="<?php echo e(route('products.index')); ?>" class="btn-view-order" style="background:transparent;color:var(--c-text-mid);border:1.5px solid var(--c-border);">
                <i class="fas fa-store" aria-hidden="true"></i>
                Continue Shopping
            </a>
        </div>

        <?php if($orders->count() > 0): ?>

            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                
                <?php
                    $statusClass = match($order->status) {
                        'pending'    => 'status-pending',
                        'processing' => 'status-processing',
                        'shipped'    => 'status-shipped',
                        'completed'  => 'status-completed',
                        'cancelled'  => 'status-cancelled',
                        default      => 'status-default',
                    };
                    $statusIcon = match($order->status) {
                        'pending'    => 'fa-hourglass-half',
                        'processing' => 'fa-cog',
                        'shipped'    => 'fa-shipping-fast',
                        'completed'  => 'fa-check-circle',
                        'cancelled'  => 'fa-times-circle',
                        default      => 'fa-circle',
                    };
                ?>

                <div class="order-card" aria-label="Order <?php echo e($order->order_number); ?>">

                    
                    <div class="order-card-head">
                        <div>
                            <div class="order-num"><?php echo e($order->order_number); ?></div>
                            <div class="order-date">
                                <i class="fas fa-calendar-alt me-1" aria-hidden="true"></i>
                                <?php echo e($order->created_at->format('M d, Y')); ?>

                                &nbsp;·&nbsp;
                                <?php echo e($order->orderItems->count()); ?> item<?php echo e($order->orderItems->count() !== 1 ? 's' : ''); ?>

                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <span class="order-status <?php echo e($statusClass); ?>">
                                <i class="fas <?php echo e($statusIcon); ?>" aria-hidden="true"></i>
                                <?php echo e(ucfirst($order->status)); ?>

                            </span>
                            <a href="<?php echo e(route('profile.orders.show', $order)); ?>" class="btn-view-order">
                                View Details
                                <i class="fas fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    
                    <div class="order-card-body">
                        <?php $__currentLoopData = $order->orderItems->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="order-item-row">
                                <div style="display:flex;align-items:center;gap:0.75rem;min-width:0;">
                                    <?php
                                        $thumb = $item->product ? $item->product->thumbnailUrl() : null;
                                    ?>
                                    <div class="order-thumb">
                                        <?php if($thumb): ?>
                                            <img src="<?php echo e($thumb); ?>" alt="<?php echo e($item->product->name); ?>">
                                        <?php else: ?>
                                            &#128095;
                                        <?php endif; ?>
                                    </div>
                                    <div style="min-width:0;">
                                        <div class="order-item-name" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:260px;">
                                            <?php echo e($item->product->name ?? 'Product unavailable'); ?>

                                        </div>
                                        <div class="order-item-qty">Qty: <?php echo e($item->quantity); ?> &nbsp;·&nbsp; &#8369;<?php echo e(number_format($item->price, 2)); ?> each</div>
                                    </div>
                                </div>
                                <div class="order-item-price">&#8369;<?php echo e(number_format($item->subtotal, 2)); ?></div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($order->orderItems->count() > 3): ?>
                            <div style="font-size:0.78rem;color:var(--c-text-muted);margin-top:0.5rem;">
                                +<?php echo e($order->orderItems->count() - 3); ?> more item<?php echo e(($order->orderItems->count() - 3) !== 1 ? 's' : ''); ?>

                                &mdash; <a href="<?php echo e(route('profile.orders.show', $order)); ?>" style="color:var(--c-gold-dark);text-decoration:none;">view all</a>
                            </div>
                        <?php endif; ?>

                        
                        <div class="order-card-foot">
                            <div>
                                <div class="order-total-label">Order Total</div>
                                <div class="order-total-amount">&#8369;<?php echo e(number_format($order->orderItems->sum('subtotal'), 2)); ?></div>
                            </div>
                            <div style="display:flex;align-items:center;gap:0.6rem;font-size:0.78rem;color:var(--c-text-muted);">
                                <?php if($order->payment_status === 'paid'): ?>
                                    <span style="color:var(--c-success);font-weight:600;"><i class="fas fa-check-circle me-1"></i>Paid</span>
                                <?php else: ?>
                                    <span><i class="fas fa-clock me-1"></i>Payment <?php echo e(ucfirst($order->payment_status ?? 'pending')); ?></span>
                                <?php endif; ?>
                                &nbsp;·&nbsp;
                                <?php echo e(ucfirst(str_replace('_', ' ', $order->payment_method ?? '—'))); ?>

                            </div>
                        </div>
                    </div>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <div class="mt-3">
                <?php echo e($orders->links()); ?>

            </div>

        <?php else: ?>

            <div class="orders-empty">
                <div class="orders-empty-icon" aria-hidden="true">
                    <i class="fas fa-box-open"></i>
                </div>
                <h3>No orders yet</h3>
                <p>You haven't placed any orders. Browse our collection<br>and find your perfect pair!</p>
                <a href="<?php echo e(route('products.index')); ?>" class="btn-start-shopping">
                    <i class="fas fa-store" aria-hidden="true"></i>
                    Start Shopping
                </a>
            </div>

        <?php endif; ?>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp_ITCP226\htdocs\SoulMates-Inc-Project\resources\views/profile/orders.blade.php ENDPATH**/ ?>