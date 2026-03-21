<?php $__env->startSection('title', 'Order ' . $order->order_number . ' — SoleMates Footwear'); ?>

<?php $__env->startSection('head'); ?>
<style>
/* ════ ORDER DETAIL PAGE ════ */
.order-detail-page { padding: 2.5rem 0 5rem; }

.profile-breadcrumb {
    background: var(--c-off-white);
    border-bottom: 1px solid var(--c-border);
    padding: 0.75rem 0;
}
.breadcrumb { margin: 0; font-size: 0.8rem; }
.breadcrumb-item a { color: var(--c-gold-dark); text-decoration: none; }
.breadcrumb-item a:hover { color: var(--c-black); }
.breadcrumb-item.active { color: var(--c-text-muted); }

/* ── Page header ── */
.od-page-head {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 1rem;
    flex-wrap: wrap;
    margin-bottom: 2rem;
}
.od-order-num {
    font-family: var(--font-mono);
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--c-text-muted);
    margin-bottom: 0.3rem;
}
.od-page-title {
    font-family: var(--font-display);
    font-size: clamp(1.5rem, 2.5vw, 2rem);
    font-weight: 900;
    color: var(--c-black);
    letter-spacing: -0.03em;
    margin: 0;
}
.od-placed-date {
    font-size: 0.8rem;
    color: var(--c-text-muted);
    margin-top: 0.35rem;
}

/* Back link */
.od-back {
    display: inline-flex;
    align-items: center;
    gap: 0.45rem;
    font-size: 0.82rem;
    font-weight: 600;
    color: var(--c-text-soft);
    text-decoration: none;
    transition: color 0.18s ease;
    margin-bottom: 1.5rem;
}
.od-back:hover { color: var(--c-black); }
.od-back i { font-size: 0.7rem; transition: transform 0.18s ease; }
.od-back:hover i { transform: translateX(-3px); }

/* ── Status badge ── */
.order-status {
    display: inline-flex;
    align-items: center;
    gap: 0.38rem;
    padding: 6px 16px;
    border-radius: 99px;
    font-family: var(--font-display);
    font-size: 0.72rem;
    font-weight: 800;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    white-space: nowrap;
}
.status-pending    { background: rgba(212,136,14,0.12);  color: #D4880E; border: 1px solid rgba(212,136,14,0.3); }
.status-processing { background: rgba(37,99,235,0.10);   color: #2563EB; border: 1px solid rgba(37,99,235,0.25); }
.status-shipped    { background: rgba(8,145,178,0.10);   color: #0891B2; border: 1px solid rgba(8,145,178,0.25); }
.status-completed  { background: rgba(33,150,83,0.10);   color: #219653; border: 1px solid rgba(33,150,83,0.25); }
.status-cancelled  { background: rgba(192,57,43,0.10);   color: var(--c-error); border: 1px solid rgba(192,57,43,0.25); }
.status-default    { background: rgba(0,0,0,0.06);       color: var(--c-text-soft); border: 1px solid var(--c-border); }

/* ── Progress tracker ── */
.od-tracker {
    background: var(--c-white);
    border: 1.5px solid var(--c-border);
    border-radius: 14px;
    padding: 1.5rem;
    margin-bottom: 1.25rem;
}
.od-tracker-steps {
    display: flex;
    align-items: center;
    gap: 0;
    overflow-x: auto;
    padding-bottom: 0.25rem;
}
.od-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    flex: 1;
    min-width: 80px;
    text-align: center;
    position: relative;
}
.od-step-dot {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.82rem;
    font-weight: 700;
    z-index: 1;
    border: 2px solid var(--c-border);
    background: var(--c-white);
    color: var(--c-text-muted);
    transition: all 0.2s ease;
}
.od-step.done .od-step-dot {
    background: var(--c-success);
    border-color: var(--c-success);
    color: var(--c-white);
}
.od-step.active .od-step-dot {
    background: var(--c-black);
    border-color: var(--c-black);
    color: var(--c-white);
}
.od-step.cancelled .od-step-dot {
    background: var(--c-error);
    border-color: var(--c-error);
    color: var(--c-white);
}
.od-step-label {
    font-family: var(--font-display);
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 0.04em;
    color: var(--c-text-muted);
    margin-top: 0.45rem;
    text-transform: uppercase;
}
.od-step.done .od-step-label,
.od-step.active .od-step-label { color: var(--c-black); }
.od-step.cancelled .od-step-label { color: var(--c-error); }

.od-step-line {
    flex: 1;
    height: 2px;
    background: var(--c-border);
    margin-top: -17px;
    min-width: 20px;
}
.od-step-line.done { background: var(--c-success); }

/* ── Section cards ── */
.od-card {
    background: var(--c-white);
    border: 1.5px solid var(--c-border);
    border-radius: 14px;
    overflow: hidden;
    margin-bottom: 1.25rem;
}
.od-card-header {
    padding: 1rem 1.5rem;
    background: var(--c-off-white);
    border-bottom: 1px solid var(--c-border);
    display: flex;
    align-items: center;
    gap: 0.65rem;
}
.od-card-header-icon {
    width: 30px;
    height: 30px;
    border-radius: 7px;
    background: var(--c-black);
    color: var(--c-white);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    flex-shrink: 0;
}
.od-card-header h5 {
    font-family: var(--font-display);
    font-size: 0.8rem;
    font-weight: 800;
    letter-spacing: 0.07em;
    text-transform: uppercase;
    margin: 0;
    color: var(--c-black);
}
.od-card-body { padding: 1.5rem; }

/* ── Item rows ── */
.od-item-row {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.85rem 0;
    border-bottom: 1px solid var(--c-border);
}
.od-item-row:first-child { padding-top: 0; }
.od-item-row:last-child { border-bottom: none; padding-bottom: 0; }

.od-item-thumb {
    width: 64px;
    height: 64px;
    border-radius: 10px;
    overflow: hidden;
    background: var(--c-off-white);
    border: 1.5px solid var(--c-border);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    flex-shrink: 0;
}
.od-item-thumb img { width: 100%; height: 100%; object-fit: cover; }

.od-item-name {
    font-family: var(--font-display);
    font-size: 0.9rem;
    font-weight: 700;
    color: var(--c-black);
    margin-bottom: 0.2rem;
}
.od-item-meta {
    font-size: 0.75rem;
    color: var(--c-text-muted);
    font-family: var(--font-mono);
}
.od-item-price {
    font-family: var(--font-mono);
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--c-black);
    margin-left: auto;
    flex-shrink: 0;
}

/* ── Totals ── */
.od-total-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.875rem;
    color: var(--c-text-soft);
    padding: 0.35rem 0;
}
.od-total-row strong { color: var(--c-black); }
.od-total-row.free { color: var(--c-success); font-weight: 600; }
.od-grand-divider { border: none; border-top: 1.5px solid var(--c-border); margin: 0.75rem 0; }
.od-grand-total {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.od-grand-label {
    font-family: var(--font-display);
    font-size: 0.85rem;
    font-weight: 800;
    letter-spacing: 0.06em;
    text-transform: uppercase;
}
.od-grand-amount {
    font-family: var(--font-display);
    font-size: 1.5rem;
    font-weight: 900;
    color: var(--c-black);
    letter-spacing: -0.02em;
}

/* ── Info rows (shipping/payment) ── */
.od-info-row {
    display: flex;
    gap: 0.6rem;
    padding: 0.5rem 0;
    border-bottom: 1px solid var(--c-border);
    font-size: 0.875rem;
}
.od-info-row:last-child { border-bottom: none; }
.od-info-label {
    font-family: var(--font-mono);
    font-size: 0.68rem;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--c-text-muted);
    min-width: 100px;
    flex-shrink: 0;
    padding-top: 1px;
}
.od-info-value { color: var(--c-black); font-weight: 500; }

/* ── Payment status badge ── */
.pay-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    padding: 2px 10px;
    border-radius: 99px;
    font-size: 0.68rem;
    font-weight: 800;
    font-family: var(--font-display);
    letter-spacing: 0.06em;
    text-transform: uppercase;
}
.pay-badge-paid    { background: rgba(33,150,83,0.1);  color: #219653; border: 1px solid rgba(33,150,83,0.25); }
.pay-badge-pending { background: rgba(212,136,14,0.1); color: #D4880E; border: 1px solid rgba(212,136,14,0.25); }

/* ── Action buttons ── */
.btn-back-orders {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 11px 22px;
    background: transparent;
    color: var(--c-text-mid);
    border: 1.5px solid var(--c-border);
    border-radius: 9px;
    font-family: var(--font-display);
    font-size: 0.78rem;
    font-weight: 700;
    text-decoration: none;
    transition: border-color 0.18s ease, color 0.18s ease, background 0.18s ease;
}
.btn-back-orders:hover {
    border-color: var(--c-black);
    color: var(--c-black);
    background: var(--c-off-white);
}
.btn-shop-again {
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
    transition: background 0.18s ease, transform 0.18s ease, box-shadow 0.18s ease;
}
.btn-shop-again:hover {
    background: var(--c-charcoal);
    color: var(--c-white);
    transform: translateY(-2px);
    box-shadow: 0 10px 26px rgba(0,0,0,0.18);
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="profile-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('profile.edit')); ?>">My Account</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('profile.orders')); ?>">My Orders</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e($order->order_number); ?></li>
            </ol>
        </nav>
    </div>
</div>

<div class="order-detail-page">
    <div class="container">

        
        <a href="<?php echo e(route('profile.orders')); ?>" class="od-back">
            <i class="fas fa-arrow-left" aria-hidden="true"></i>
            Back to My Orders
        </a>

        
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

        <div class="od-page-head">
            <div>
                <div class="od-order-num">Order Number</div>
                <h1 class="od-page-title"><?php echo e($order->order_number); ?></h1>
                <div class="od-placed-date">
                    <i class="fas fa-calendar-alt me-1" aria-hidden="true"></i>
                    Placed on <?php echo e($order->created_at->format('F d, Y \a\t h:i A')); ?>

                </div>
            </div>
            <span class="order-status <?php echo e($statusClass); ?>">
                <i class="fas <?php echo e($statusIcon); ?>" aria-hidden="true"></i>
                <?php echo e(ucfirst($order->status)); ?>

            </span>
        </div>

        
        <?php if($order->status !== 'cancelled'): ?>
            <?php
                $steps = ['pending', 'processing', 'shipped', 'completed'];
                $currentIdx = array_search($order->status, $steps);
                if ($currentIdx === false) $currentIdx = 0;
            ?>
            <div class="od-tracker">
                <div class="od-tracker-steps">
                    <?php $__currentLoopData = $steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $isDone   = $i < $currentIdx;
                            $isActive = $i === $currentIdx;
                        ?>

                        <div class="od-step <?php echo e($isDone ? 'done' : ($isActive ? 'active' : '')); ?>">
                            <div class="od-step-dot">
                                <?php if($isDone): ?>
                                    <i class="fas fa-check" aria-hidden="true"></i>
                                <?php elseif($isActive): ?>
                                    <i class="fas <?php echo e($statusIcon); ?>" aria-hidden="true"></i>
                                <?php else: ?>
                                    <?php echo e($i + 1); ?>

                                <?php endif; ?>
                            </div>
                            <div class="od-step-label">
                                <?php if($step === 'pending'): ?>    Order Placed
                                <?php elseif($step === 'processing'): ?> Processing
                                <?php elseif($step === 'shipped'): ?>    Shipped
                                <?php elseif($step === 'completed'): ?>  Delivered
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if(!$loop->last): ?>
                            <div class="od-step-line <?php echo e($isDone ? 'done' : ''); ?>"></div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php else: ?>
            <div style="padding:1rem 1.25rem;background:#fff5f5;border:1.5px solid rgba(192,57,43,0.2);border-radius:12px;font-size:0.875rem;color:var(--c-error);display:flex;align-items:center;gap:0.6rem;margin-bottom:1.25rem;">
                <i class="fas fa-times-circle" aria-hidden="true"></i>
                This order was cancelled.
            </div>
        <?php endif; ?>

        <div class="row g-4">

            
            <div class="col-lg-8">

                
                <div class="od-card">
                    <div class="od-card-header">
                        <div class="od-card-header-icon"><i class="fas fa-box" aria-hidden="true"></i></div>
                        <h5>Items Ordered</h5>
                        <span style="margin-left:auto;font-size:0.75rem;color:var(--c-text-muted);">
                            <?php echo e($order->orderItems->count()); ?> item<?php echo e($order->orderItems->count() !== 1 ? 's' : ''); ?>

                        </span>
                    </div>
                    <div class="od-card-body">
                        <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $thumb = $item->product ? $item->product->thumbnailUrl() : null; ?>
                            <div class="od-item-row">
                                <div class="od-item-thumb">
                                    <?php if($thumb): ?>
                                        <img src="<?php echo e($thumb); ?>" alt="<?php echo e($item->product->name ?? 'Product'); ?>">
                                    <?php else: ?>
                                        &#128095;
                                    <?php endif; ?>
                                </div>
                                <div style="min-width:0;flex:1;">
                                    <div class="od-item-name">
                                        <?php echo e($item->product->name ?? 'Product unavailable'); ?>

                                    </div>
                                    <div class="od-item-meta">
                                        &#8369;<?php echo e(number_format($item->price, 2)); ?> &times; <?php echo e($item->quantity); ?>

                                    </div>
                                </div>
                                <div class="od-item-price">&#8369;<?php echo e(number_format($item->subtotal, 2)); ?></div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                        <div style="margin-top:1.25rem;padding-top:1.25rem;border-top:1.5px solid var(--c-border);">
                            <div class="od-total-row">
                                <span>Subtotal</span>
                                <strong>&#8369;<?php echo e(number_format($order->orderItems->sum('subtotal'), 2)); ?></strong>
                            </div>
                            <div class="od-total-row free">
                                <span>Shipping</span>
                                <strong>
                                    <?php if(isset($order->shipping) && $order->shipping > 0): ?>
                                        &#8369;<?php echo e(number_format($order->shipping, 2)); ?>

                                    <?php else: ?>
                                        <i class="fas fa-check-circle me-1" aria-hidden="true"></i>Free
                                    <?php endif; ?>
                                </strong>
                            </div>
                            <hr class="od-grand-divider">
                            <div class="od-grand-total">
                                <span class="od-grand-label">Total</span>
                                <span class="od-grand-amount">
                                    &#8369;<?php echo e(number_format($order->orderItems->sum('subtotal') + ($order->shipping ?? 0), 2)); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                
                <?php if(!empty($order->notes)): ?>
                    <div class="od-card">
                        <div class="od-card-header">
                            <div class="od-card-header-icon"><i class="fas fa-sticky-note" aria-hidden="true"></i></div>
                            <h5>Order Notes</h5>
                        </div>
                        <div class="od-card-body" style="font-size:0.9rem;color:var(--c-text-soft);">
                            <?php echo e($order->notes); ?>

                        </div>
                    </div>
                <?php endif; ?>

            </div>

            
            <div class="col-lg-4">

                
                <div class="od-card">
                    <div class="od-card-header">
                        <div class="od-card-header-icon"><i class="fas fa-map-marker-alt" aria-hidden="true"></i></div>
                        <h5>Delivery Details</h5>
                    </div>
                    <div class="od-card-body">
                        <div class="od-info-row">
                            <span class="od-info-label">Name</span>
                            <span class="od-info-value"><?php echo e($order->user->name); ?></span>
                        </div>
                        <?php if($order->phone): ?>
                            <div class="od-info-row">
                                <span class="od-info-label">Phone</span>
                                <span class="od-info-value"><?php echo e($order->phone); ?></span>
                            </div>
                        <?php endif; ?>
                        <div class="od-info-row">
                            <span class="od-info-label">Address</span>
                            <span class="od-info-value"><?php echo e($order->shipping_address); ?></span>
                        </div>
                        <?php if(!empty($order->shipping_city)): ?>
                            <div class="od-info-row">
                                <span class="od-info-label">City</span>
                                <span class="od-info-value">
                                    <?php echo e($order->shipping_city); ?>

                                    <?php if(!empty($order->shipping_postcode)): ?>, <?php echo e($order->shipping_postcode); ?><?php endif; ?>
                                </span>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($order->shipping_country)): ?>
                            <div class="od-info-row">
                                <span class="od-info-label">Country</span>
                                <span class="od-info-value"><?php echo e($order->shipping_country); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                
                <div class="od-card">
                    <div class="od-card-header">
                        <div class="od-card-header-icon"><i class="fas fa-credit-card" aria-hidden="true"></i></div>
                        <h5>Payment</h5>
                    </div>
                    <div class="od-card-body">
                        <div class="od-info-row">
                            <span class="od-info-label">Method</span>
                            <span class="od-info-value">
                                <?php echo e(ucfirst(str_replace('_', ' ', $order->payment_method ?? '—'))); ?>

                            </span>
                        </div>
                        <div class="od-info-row">
                            <span class="od-info-label">Status</span>
                            <span class="od-info-value">
                                <?php if($order->payment_status === 'paid'): ?>
                                    <span class="pay-badge pay-badge-paid">
                                        <i class="fas fa-check-circle" aria-hidden="true"></i> Paid
                                    </span>
                                <?php else: ?>
                                    <span class="pay-badge pay-badge-pending">
                                        <i class="fas fa-hourglass-half" aria-hidden="true"></i>
                                        <?php echo e(ucfirst($order->payment_status ?? 'Pending')); ?>

                                    </span>
                                <?php endif; ?>
                            </span>
                        </div>
                        <div class="od-info-row">
                            <span class="od-info-label">Date</span>
                            <span class="od-info-value" style="font-size:0.82rem;">
                                <?php echo e($order->created_at->format('M d, Y')); ?>

                            </span>
                        </div>
                    </div>
                </div>

                
                <div class="d-flex flex-column gap-2">
                    <a href="<?php echo e(route('profile.orders')); ?>" class="btn-back-orders">
                        <i class="fas fa-arrow-left" aria-hidden="true"></i>
                        Back to My Orders
                    </a>
                    <a href="<?php echo e(route('products.index')); ?>" class="btn-shop-again">
                        <i class="fas fa-store" aria-hidden="true"></i>
                        Shop Again
                    </a>
                </div>

            </div>

        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp_ITCP226\htdocs\SoulMates-Inc-Project\resources\views/profile/orders-show.blade.php ENDPATH**/ ?>