<?php $__env->startSection('title', 'Order Confirmed — SoleMates Footwear'); ?>

<?php $__env->startSection('head'); ?>
<style>
/* ════ SUCCESS PAGE ════ */
.success-page { padding: 3rem 0 5rem; }

/* ── Cart/checkout breadcrumb shared style ── */
.cart-breadcrumb { background: var(--c-off-white); border-bottom: 1px solid var(--c-border); padding: 0.75rem 0; }
.breadcrumb { margin: 0; font-size: 0.8rem; }
.breadcrumb-item a { color: var(--c-gold-dark); text-decoration: none; }
.breadcrumb-item.active { color: var(--c-text-muted); }

/* ── Checkmark animation ── */
.success-icon-wrap {
    width: 80px; height: 80px; border-radius: 50%;
    background: linear-gradient(135deg, #219653, #27AE60);
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 1.75rem;
    box-shadow: 0 8px 30px rgba(33,150,83,0.3);
    animation: popIn 0.5s cubic-bezier(0.34, 1.56, 0.64, 1) both;
}
@keyframes popIn {
    from { opacity: 0; transform: scale(0.5); }
    to   { opacity: 1; transform: scale(1); }
}
.success-icon-wrap i { color: #fff; font-size: 2rem; }

.success-title {
    font-family: var(--font-display); font-size: clamp(1.6rem, 2.5vw, 2.1rem);
    font-weight: 900; color: var(--c-black); letter-spacing: -0.03em;
    margin-bottom: 0.6rem;
}
.success-subtitle { font-size: 0.925rem; color: var(--c-text-soft); line-height: 1.65; max-width: 440px; margin: 0 auto 2.25rem; }

/* ── Order card ── */
.order-card {
    background: var(--c-white); border: 1.5px solid var(--c-border);
    border-radius: 16px; overflow: hidden;
}
.order-card-header {
    padding: 1.1rem 1.5rem; background: var(--c-off-white);
    border-bottom: 1px solid var(--c-border);
    display: flex; align-items: center; justify-content: space-between; gap: 1rem; flex-wrap: wrap;
}
.order-number {
    font-family: var(--font-mono); font-size: 0.82rem;
    font-weight: 700; color: var(--c-black);
}
.order-status-badge {
    display: inline-flex; align-items: center; gap: 0.35rem;
    padding: 4px 12px; border-radius: 99px;
    font-family: var(--font-display); font-size: 0.68rem; font-weight: 800;
    letter-spacing: 0.08em; text-transform: uppercase;
}
.order-status-badge.pending  { background: rgba(212,136,14,0.12); color: #D4880E; border: 1px solid rgba(212,136,14,0.25); }
.order-status-badge.paid     { background: rgba(33,150,83,0.12); color: #219653; border: 1px solid rgba(33,150,83,0.25); }

.order-card-body { padding: 1.5rem; }

/* ── Meta grid ── */
.order-meta-grid {
    display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
    gap: 1rem; margin-bottom: 1.5rem;
}
.order-meta-item { display: flex; flex-direction: column; gap: 0.3rem; }
.order-meta-label {
    font-family: var(--font-mono); font-size: 0.62rem;
    letter-spacing: 0.14em; text-transform: uppercase; color: var(--c-text-muted);
}
.order-meta-value { font-family: var(--font-display); font-size: 0.9rem; font-weight: 700; color: var(--c-black); }

/* ── Order items list ── */
.order-items-title {
    font-family: var(--font-display); font-size: 0.72rem; font-weight: 800;
    letter-spacing: 0.12em; text-transform: uppercase; color: var(--c-text-muted);
    margin-bottom: 0.85rem; padding-bottom: 0.5rem; border-bottom: 1px solid var(--c-border);
}
.order-line {
    display: flex; align-items: center; justify-content: space-between;
    gap: 1rem; padding: 0.65rem 0;
    border-bottom: 1px solid var(--c-border);
}
.order-line:last-child { border-bottom: none; }
.order-line-name { font-family: var(--font-display); font-size: 0.88rem; font-weight: 600; color: var(--c-black); }
.order-line-meta { font-size: 0.75rem; color: var(--c-text-muted); font-family: var(--font-mono); }
.order-line-price { font-family: var(--font-mono); font-size: 0.9rem; font-weight: 700; flex-shrink: 0; }

.order-total-row {
    display: flex; justify-content: space-between; align-items: center;
    padding: 1rem 0 0; border-top: 1.5px solid var(--c-border); margin-top: 0.5rem;
}
.order-total-label { font-family: var(--font-display); font-size: 0.82rem; font-weight: 800; letter-spacing: 0.06em; text-transform: uppercase; }
.order-total-amount { font-family: var(--font-display); font-size: 1.45rem; font-weight: 900; letter-spacing: -0.02em; }

/* ── Shipping info ── */
.shipping-info {
    background: var(--c-off-white); border-radius: 10px;
    padding: 1.1rem 1.25rem; margin-top: 1.25rem;
}
.shipping-info-title {
    font-family: var(--font-display); font-size: 0.72rem; font-weight: 800;
    letter-spacing: 0.12em; text-transform: uppercase; color: var(--c-text-muted);
    margin-bottom: 0.6rem;
}
.shipping-info-row { font-size: 0.875rem; color: var(--c-text-mid); margin-bottom: 0.2rem; }
.shipping-info-row strong { color: var(--c-black); }

/* ── Action buttons ── */
.btn-shop-more {
    display: inline-flex; align-items: center; gap: 0.5rem;
    padding: 13px 26px; background: var(--c-black); color: var(--c-white);
    border-radius: 9px; font-family: var(--font-display); font-size: 0.8rem;
    font-weight: 800; letter-spacing: 0.08em; text-transform: uppercase;
    text-decoration: none; transition: background 0.18s ease, transform 0.18s ease, box-shadow 0.18s ease;
}
.btn-shop-more:hover { background: var(--c-charcoal); color: var(--c-white); transform: translateY(-2px); box-shadow: 0 10px 26px rgba(0,0,0,0.18); }
.btn-view-orders {
    display: inline-flex; align-items: center; gap: 0.5rem;
    padding: 12px 22px; background: transparent; color: var(--c-text-mid);
    border: 1.5px solid var(--c-border); border-radius: 9px;
    font-family: var(--font-display); font-size: 0.78rem; font-weight: 700;
    text-decoration: none; transition: border-color 0.18s ease, color 0.18s ease, background 0.18s ease;
}
.btn-view-orders:hover { border-color: var(--c-black); color: var(--c-black); background: var(--c-off-white); }

.email-notice {
    display: flex; align-items: center; justify-content: center; gap: 0.45rem;
    font-size: 0.8rem; color: var(--c-text-muted); margin-top: 1.5rem;
}
.email-notice i { color: var(--c-gold-dark); }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="cart-breadcrumb">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Order Confirmed</li>
      </ol>
    </nav>
  </div>
</div>

<div class="success-page">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7">

        
        <div class="text-center mb-4" data-reveal="up">
          <div class="success-icon-wrap" aria-hidden="true">
            <i class="fas fa-check"></i>
          </div>
          <h1 class="success-title">Order Confirmed!</h1>
          <p class="success-subtitle">
            Thank you for your purchase! We've received your order and
            are getting it ready. You'll receive updates as it progresses.
          </p>
        </div>

        
        <div class="order-card" data-reveal="up" data-delay="1">

          <div class="order-card-header">
            <div>
              <div style="font-size:0.7rem;color:var(--c-text-muted);font-family:var(--font-mono);letter-spacing:0.1em;text-transform:uppercase;margin-bottom:3px;">Order Number</div>
              <div class="order-number"><?php echo e($order->order_number); ?></div>
            </div>
            <div class="d-flex gap-2 flex-wrap">
              <span class="order-status-badge pending">
                <i class="fas fa-clock" aria-hidden="true"></i>
                <?php echo e(ucfirst($order->status)); ?>

              </span>
              <span class="order-status-badge <?php echo e($order->payment_status === 'paid' ? 'paid' : 'pending'); ?>">
                <i class="fas fa-<?php echo e($order->payment_status === 'paid' ? 'check-circle' : 'hourglass-half'); ?>" aria-hidden="true"></i>
                <?php echo e(ucfirst($order->payment_status)); ?>

              </span>
            </div>
          </div>

          <div class="order-card-body">

            
            <div class="order-meta-grid">
              <div class="order-meta-item">
                <span class="order-meta-label">Order Date</span>
                <span class="order-meta-value"><?php echo e($order->created_at->format('M d, Y')); ?></span>
              </div>
              <div class="order-meta-item">
                <span class="order-meta-label">Total Amount</span>
                <span class="order-meta-value">&#8369;<?php echo e(number_format($order->total, 2)); ?></span>
              </div>
              <div class="order-meta-item">
                <span class="order-meta-label">Payment Method</span>
                <span class="order-meta-value"><?php echo e(ucfirst(str_replace('_', ' ', $order->payment_method))); ?></span>
              </div>
              <div class="order-meta-item">
                <span class="order-meta-label">Items</span>
                <span class="order-meta-value"><?php echo e($order->orderItems->count()); ?> item<?php echo e($order->orderItems->count() !== 1 ? 's' : ''); ?></span>
              </div>
            </div>

            
            <div class="order-items-title">Items Ordered</div>
            <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="order-line">
                <div>
                  <div class="order-line-name"><?php echo e($item->product->name); ?></div>
                  <div class="order-line-meta">&#8369;<?php echo e(number_format($item->price, 2)); ?> &times; <?php echo e($item->quantity); ?></div>
                </div>
                <div class="order-line-price">&#8369;<?php echo e(number_format($item->subtotal, 2)); ?></div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="order-total-row">
              <span class="order-total-label">Order Total</span>
              <span class="order-total-amount">&#8369;<?php echo e(number_format($order->total, 2)); ?></span>
            </div>

            
            <div class="shipping-info">
              <div class="shipping-info-title">Delivery Details</div>
              <div class="shipping-info-row"><strong>Name:</strong> <?php echo e($order->user->name); ?></div>
              <div class="shipping-info-row"><strong>Phone:</strong> <?php echo e($order->phone); ?></div>
              <div class="shipping-info-row"><strong>Address:</strong> <?php echo e($order->shipping_address); ?></div>
            </div>

          </div>
        </div>

        
        <div class="d-flex justify-content-center gap-3 flex-wrap mt-4" data-reveal="up" data-delay="2">
          <a href="<?php echo e(route('products.index')); ?>" class="btn-shop-more">
            <i class="fas fa-store" aria-hidden="true"></i>
            Continue Shopping
          </a>
          <a href="<?php echo e(route('profile.orders')); ?>" class="btn-view-orders">
            <i class="fas fa-box" aria-hidden="true"></i>
            View My Orders
          </a>
        </div>

        <div class="email-notice" data-reveal="up" data-delay="3">
          <i class="fas fa-envelope" aria-hidden="true"></i>
          A confirmation has been sent to <strong><?php echo e($order->user->email); ?></strong>
        </div>

      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp_ITCP226\htdocs\SoulMates-Inc-Project\resources\views/checkout/success.blade.php ENDPATH**/ ?>