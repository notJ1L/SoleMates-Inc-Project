<?php $__env->startSection('title', 'My Cart — SoleMates Footwear'); ?>

<?php $__env->startSection('head'); ?>
<style>
/* ════ CART PAGE ════ */
.cart-page { padding: 2.5rem 0 5rem; }

.page-eyebrow {
    font-family: var(--font-display);
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 0.16em;
    text-transform: uppercase;
    color: var(--c-gold-dark);
    margin-bottom: 0.5rem;
}
.page-title {
    font-family: var(--font-display);
    font-size: clamp(1.6rem, 2.5vw, 2.2rem);
    font-weight: 900;
    color: var(--c-black);
    letter-spacing: -0.03em;
    margin-bottom: 0.25rem;
}
.page-subtitle { font-size: 0.875rem; color: var(--c-text-muted); }

/* ── Cart item card ── */
.cart-item-wrap {
    background: var(--c-white);
    border: 1.5px solid var(--c-border);
    border-radius: 14px;
    overflow: hidden;
    margin-bottom: 1rem;
    transition: box-shadow 0.22s ease, border-color 0.22s ease;
}
.cart-item-wrap:hover { box-shadow: 0 8px 28px rgba(0,0,0,0.07); border-color: rgba(200,169,110,0.4); }

.cart-item {
    display: flex;
    align-items: center;
    gap: 1.25rem;
    padding: 1.25rem 1.5rem;
}

.cart-item-img {
    width: 88px;
    height: 88px;
    flex-shrink: 0;
    border-radius: 10px;
    overflow: hidden;
    background: var(--c-off-white);
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1.5px solid var(--c-border);
}
.cart-item-img img { width: 100%; height: 100%; object-fit: cover; }
.cart-item-img-placeholder { font-size: 1.8rem; opacity: 0.2; }

.cart-item-info { flex: 1; min-width: 0; }

.cart-item-name {
    font-family: var(--font-display);
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--c-black);
    margin-bottom: 0.2rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.cart-item-price {
    font-family: var(--font-mono);
    font-size: 0.85rem;
    color: var(--c-text-muted);
}

/* Qty control */
.qty-group {
    display: flex;
    align-items: center;
    border: 1.5px solid var(--c-border);
    border-radius: 8px;
    overflow: hidden;
    background: var(--c-white);
    flex-shrink: 0;
}
.qty-btn {
    width: 32px;
    height: 32px;
    background: var(--c-off-white);
    border: none;
    color: var(--c-text-mid);
    font-size: 0.8rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.15s ease;
}
.qty-btn:hover { background: var(--c-border); }
.qty-input {
    width: 44px;
    height: 32px;
    border: none;
    text-align: center;
    font-family: var(--font-mono);
    font-size: 0.82rem;
    font-weight: 700;
    color: var(--c-black);
    background: transparent;
    outline: none;
    -moz-appearance: textfield;
}
.qty-input::-webkit-outer-spin-button,
.qty-input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }

.cart-item-subtotal {
    font-family: var(--font-mono);
    font-size: 1rem;
    font-weight: 700;
    color: var(--c-black);
    text-align: right;
    min-width: 90px;
    flex-shrink: 0;
}

.btn-remove {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border-radius: 7px;
    background: none;
    border: 1.5px solid var(--c-border);
    color: var(--c-text-muted);
    font-size: 0.75rem;
    cursor: pointer;
    flex-shrink: 0;
    transition: background 0.15s ease, border-color 0.15s ease, color 0.15s ease;
}
.btn-remove:hover { background: #FFF0EE; border-color: #C0392B; color: #C0392B; }

.stock-warn {
    font-size: 0.72rem;
    color: #D4880E;
    font-family: var(--font-mono);
    padding: 0 1.5rem 0.75rem;
    margin-top: -0.5rem;
}

/* ── Empty state ── */
.cart-empty {
    text-align: center;
    padding: 5rem 2rem;
    background: var(--c-white);
    border: 1.5px dashed var(--c-border);
    border-radius: 16px;
}
.cart-empty-icon { font-size: 3.5rem; opacity: 0.15; margin-bottom: 1.25rem; }
.cart-empty h3 { font-family: var(--font-display); font-weight: 900; font-size: 1.4rem; letter-spacing: -0.02em; margin-bottom: 0.5rem; }
.cart-empty p { color: var(--c-text-muted); font-size: 0.875rem; margin-bottom: 1.75rem; }

/* ── Summary card ── */
.summary-card {
    background: var(--c-white);
    border: 1.5px solid var(--c-border);
    border-radius: 16px;
    overflow: hidden;
    position: sticky;
    top: calc(var(--nav-h) + 1.5rem);
}
.summary-header {
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid var(--c-border);
    background: var(--c-off-white);
}
.summary-header h5 {
    font-family: var(--font-display);
    font-size: 0.78rem;
    font-weight: 800;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    margin: 0;
    color: var(--c-black);
}
.summary-body { padding: 1.5rem; }

.summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.875rem;
    color: var(--c-text-soft);
    margin-bottom: 0.65rem;
}
.summary-row strong { color: var(--c-black); font-weight: 600; }
.summary-row.free { color: var(--c-success); font-weight: 600; }

.summary-divider { border: none; border-top: 1px solid var(--c-border); margin: 1rem 0; }

.summary-total {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
}
.summary-total-label {
    font-family: var(--font-display);
    font-size: 0.85rem;
    font-weight: 800;
    letter-spacing: 0.04em;
    text-transform: uppercase;
    color: var(--c-black);
}
.summary-total-amount {
    font-family: var(--font-display);
    font-size: 1.5rem;
    font-weight: 900;
    color: var(--c-black);
    letter-spacing: -0.02em;
}

.btn-checkout {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    width: 100%;
    padding: 14px;
    background: var(--c-black);
    color: var(--c-white);
    border: none;
    border-radius: 9px;
    font-family: var(--font-display);
    font-size: 0.82rem;
    font-weight: 800;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    text-decoration: none;
    cursor: pointer;
    margin-bottom: 0.65rem;
    transition: background 0.18s ease, transform 0.18s ease, box-shadow 0.18s ease;
}
.btn-checkout:hover {
    background: var(--c-charcoal);
    color: var(--c-white);
    transform: translateY(-2px);
    box-shadow: 0 10px 26px rgba(0,0,0,0.18);
}
.btn-continue {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    width: 100%;
    padding: 12px;
    background: transparent;
    color: var(--c-text-mid);
    border: 1.5px solid var(--c-border);
    border-radius: 9px;
    font-family: var(--font-display);
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 0.04em;
    text-decoration: none;
    transition: border-color 0.18s ease, color 0.18s ease, background 0.18s ease;
    margin-bottom: 0.65rem;
}
.btn-continue:hover { border-color: var(--c-black); color: var(--c-black); background: var(--c-off-white); }

.btn-clear-cart {
    display: block;
    width: 100%;
    padding: 10px;
    background: none;
    border: none;
    font-family: var(--font-display);
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: #C0392B;
    cursor: pointer;
    transition: color 0.15s ease;
    text-align: center;
}
.btn-clear-cart:hover { color: #992D22; }

.summary-secure {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.4rem;
    font-size: 0.72rem;
    color: var(--c-text-muted);
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 1px solid var(--c-border);
}
.summary-secure i { color: var(--c-gold-dark); }

/* ── Breadcrumb ── */
.cart-breadcrumb { background: var(--c-off-white); border-bottom: 1px solid var(--c-border); padding: 0.75rem 0; }
.breadcrumb { margin: 0; font-size: 0.8rem; }
.breadcrumb-item a { color: var(--c-gold-dark); text-decoration: none; }
.breadcrumb-item.active { color: var(--c-text-muted); }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="cart-breadcrumb">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
      </ol>
    </nav>
  </div>
</div>

<div class="cart-page">
  <div class="container">

    
    <div class="mb-4" data-reveal="up">
      <p class="page-eyebrow">My Bag</p>
      <h1 class="page-title">Shopping Cart</h1>
      <?php if(!empty($cart)): ?>
        <p class="page-subtitle"><?php echo e(count($cart)); ?> item<?php echo e(count($cart) !== 1 ? 's' : ''); ?> in your cart</p>
      <?php endif; ?>
    </div>

    <?php if(empty($cart)): ?>
      
      <div class="cart-empty" data-reveal="scale">
        <div class="cart-empty-icon" aria-hidden="true"><i class="fas fa-shopping-bag"></i></div>
        <h3>Your cart is empty</h3>
        <p>Looks like you haven't added any shoes yet.<br>Explore our collection and find your perfect pair.</p>
        <a href="<?php echo e(route('products.index')); ?>" class="btn-checkout d-inline-flex" style="width:auto;padding:13px 28px;">
          <i class="fas fa-store" aria-hidden="true"></i>
          Shop All Products
        </a>
      </div>

    <?php else: ?>
      <div class="row g-4">

        
        <div class="col-lg-8">

          <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productId => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="cart-item-wrap" data-reveal="up" data-delay="<?php echo e($loop->index + 1); ?>">
              <div class="cart-item">

                
                <div class="cart-item-img">
                  <?php if($item['image']): ?>
                    <img src="<?php echo e($item['image']); ?>" alt="<?php echo e($item['name']); ?>">
                  <?php else: ?>
                    <span class="cart-item-img-placeholder" aria-hidden="true">&#128095;</span>
                  <?php endif; ?>
                </div>

                
                <div class="cart-item-info">
                  <div class="cart-item-name"><?php echo e($item['name']); ?></div>
                  <div class="cart-item-price">&#8369;<?php echo e(number_format($item['price'], 2)); ?> each</div>
                </div>

                
                <form action="<?php echo e(route('cart.update')); ?>" method="POST" id="form-qty-<?php echo e($productId); ?>">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('PUT'); ?>
                  <input type="hidden" name="product_id" value="<?php echo e($productId); ?>">
                  <div class="qty-group">
                    <button type="button" class="qty-btn"
                            onclick="adjustQty('<?php echo e($productId); ?>', -1)"
                            aria-label="Decrease quantity">
                      <i class="fas fa-minus" aria-hidden="true"></i>
                    </button>
                    <input type="number"
                           name="quantity"
                           id="qty-<?php echo e($productId); ?>"
                           value="<?php echo e($item['quantity']); ?>"
                           class="qty-input"
                           min="1"
                           max="<?php echo e($item['stock']); ?>"
                           onchange="document.getElementById('form-qty-<?php echo e($productId); ?>').submit()"
                           aria-label="Quantity for <?php echo e($item['name']); ?>">
                    <button type="button" class="qty-btn"
                            onclick="adjustQty('<?php echo e($productId); ?>', 1)"
                            aria-label="Increase quantity">
                      <i class="fas fa-plus" aria-hidden="true"></i>
                    </button>
                  </div>
                </form>

                
                <div class="cart-item-subtotal">
                  &#8369;<?php echo e(number_format($item['price'] * $item['quantity'], 2)); ?>

                </div>

                
                <form action="<?php echo e(route('cart.remove', $productId)); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <button type="submit"
                          class="btn-remove"
                          onclick="return confirm('Remove <?php echo e(addslashes($item['name'])); ?> from your cart?')"
                          aria-label="Remove <?php echo e($item['name']); ?>">
                    <i class="fas fa-times" aria-hidden="true"></i>
                  </button>
                </form>

              </div>

              <?php if($item['stock'] <= 5): ?>
                <p class="stock-warn">
                  <i class="fas fa-exclamation-triangle me-1" aria-hidden="true"></i>
                  Only <?php echo e($item['stock']); ?> left in stock — order soon!
                </p>
              <?php endif; ?>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

        
        <div class="col-lg-4" data-reveal="up" data-delay="2">
          <div class="summary-card">
            <div class="summary-header">
              <h5>Order Summary</h5>
            </div>
            <div class="summary-body">

              <div class="summary-row">
                <span>Subtotal (<?php echo e(count($cart)); ?> item<?php echo e(count($cart) !== 1 ? 's' : ''); ?>)</span>
                <strong>&#8369;<?php echo e(number_format($cartTotal, 2)); ?></strong>
              </div>
              <div class="summary-row free">
                <span>Shipping</span>
                <strong><i class="fas fa-check-circle me-1" aria-hidden="true"></i>Free</strong>
              </div>

              <hr class="summary-divider">

              <div class="summary-total">
                <span class="summary-total-label">Total</span>
                <span class="summary-total-amount">&#8369;<?php echo e(number_format($cartTotal, 2)); ?></span>
              </div>

              <a href="<?php echo e(route('checkout.index')); ?>" class="btn-checkout">
                <i class="fas fa-lock" aria-hidden="true"></i>
                Proceed to Checkout
              </a>

              <a href="<?php echo e(route('products.index')); ?>" class="btn-continue">
                <i class="fas fa-arrow-left" aria-hidden="true"></i>
                Continue Shopping
              </a>

              <form action="<?php echo e(route('cart.clear')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit"
                        class="btn-clear-cart"
                        onclick="return confirm('Clear your entire cart?')">
                  Remove All Items
                </button>
              </form>

              <div class="summary-secure">
                <i class="fas fa-lock" aria-hidden="true"></i>
                Secure checkout — SoleMates Footwear
              </div>

            </div>
          </div>
        </div>

      </div>
    <?php endif; ?>

  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
function adjustQty(productId, delta) {
    var input = document.getElementById('qty-' + productId);
    if (!input) return;
    var min  = parseInt(input.min, 10)  || 1;
    var max  = parseInt(input.max, 10)  || 9999;
    var val  = parseInt(input.value, 10) || 1;
    var next = Math.min(max, Math.max(min, val + delta));
    if (next !== val) {
        input.value = next;
        document.getElementById('form-qty-' + productId).submit();
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp_ITCP226\htdocs\SoulMates-Inc-Project\resources\views/cart/index.blade.php ENDPATH**/ ?>