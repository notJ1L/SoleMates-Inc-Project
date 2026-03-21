<?php $__env->startSection('title', 'Checkout — SoleMates Footwear'); ?>

<?php $__env->startSection('head'); ?>
<style>
/* ════ CHECKOUT PAGE ════ */
.checkout-page { padding: 2.5rem 0 5rem; }

.page-eyebrow {
    font-family: var(--font-display);
    font-size: 0.68rem; font-weight: 700;
    letter-spacing: 0.16em; text-transform: uppercase;
    color: var(--c-gold-dark); margin-bottom: 0.5rem;
}
.page-title {
    font-family: var(--font-display);
    font-size: clamp(1.6rem, 2.5vw, 2.2rem);
    font-weight: 900; color: var(--c-black);
    letter-spacing: -0.03em; margin-bottom: 1.75rem;
}

/* ── Progress steps ── */
.checkout-steps {
    display: flex; align-items: center;
    gap: 0; margin-bottom: 2.5rem;
}
.step {
    display: flex; align-items: center; gap: 0.6rem;
    font-family: var(--font-display); font-size: 0.75rem;
    font-weight: 700; letter-spacing: 0.04em;
}
.step-num {
    width: 28px; height: 28px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 0.7rem; font-weight: 900; flex-shrink: 0;
}
.step.active .step-num { background: var(--c-black); color: var(--c-white); }
.step.done   .step-num { background: var(--c-success); color: var(--c-white); }
.step.inactive .step-num { background: var(--c-border); color: var(--c-text-muted); }
.step.active { color: var(--c-black); }
.step.inactive { color: var(--c-text-muted); }
.step-line {
    flex: 1; height: 1.5px;
    background: var(--c-border); margin: 0 0.75rem;
    min-width: 24px;
}

/* ── Section card ── */
.co-card {
    background: var(--c-white);
    border: 1.5px solid var(--c-border);
    border-radius: 14px; overflow: hidden;
    margin-bottom: 1.25rem;
}
.co-card-header {
    padding: 1.1rem 1.5rem;
    background: var(--c-off-white);
    border-bottom: 1px solid var(--c-border);
    display: flex; align-items: center; gap: 0.75rem;
}
.co-card-header-icon {
    width: 32px; height: 32px; border-radius: 8px;
    background: var(--c-black); color: var(--c-white);
    display: flex; align-items: center; justify-content: center;
    font-size: 0.82rem; flex-shrink: 0;
}
.co-card-header h5 {
    font-family: var(--font-display); font-size: 0.82rem;
    font-weight: 800; letter-spacing: 0.06em;
    text-transform: uppercase; margin: 0; color: var(--c-black);
}
.co-card-body { padding: 1.5rem; }

/* ── Form inputs ── */
.co-label {
    display: block; font-size: 0.73rem; font-weight: 700;
    letter-spacing: 0.07em; text-transform: uppercase;
    color: var(--c-text-muted); margin-bottom: 0.42rem;
}
.co-input {
    width: 100%; padding: 11.5px 14px;
    background: var(--c-off-white); border: 1.5px solid var(--c-border);
    border-radius: 8px; font-family: var(--font-body); font-size: 0.9rem;
    color: var(--c-black); outline: none;
    transition: border-color 0.18s ease, background 0.18s ease, box-shadow 0.18s ease;
    -webkit-appearance: none;
}
.co-input::placeholder { color: #C0BEB8; }
.co-input:focus {
    border-color: var(--c-gold); background: var(--c-white);
    box-shadow: 0 0 0 3px rgba(200,169,110,0.12);
}
.co-input:read-only {
    background: var(--c-off-white); color: var(--c-text-muted);
    cursor: not-allowed;
}
.co-input.is-invalid { border-color: #C0392B; background: #FFF5F5; }
.co-input.is-invalid:focus { box-shadow: 0 0 0 3px rgba(192,57,43,0.1); }
.co-feedback { font-size: 0.75rem; color: #C0392B; margin-top: 0.3rem; }
.co-textarea { resize: vertical; min-height: 90px; }

/* ── Payment method cards ── */
.payment-options { display: flex; flex-direction: column; gap: 0.65rem; }
.payment-option { position: relative; }
.payment-option input[type="radio"] { position: absolute; opacity: 0; width: 0; height: 0; }
.payment-label {
    display: flex; align-items: center; gap: 1rem;
    padding: 1rem 1.25rem; border: 1.5px solid var(--c-border);
    border-radius: 10px; cursor: pointer; background: var(--c-white);
    transition: border-color 0.18s ease, background 0.18s ease, box-shadow 0.18s ease;
}
.payment-label:hover { border-color: var(--c-gold); background: rgba(200,169,110,0.03); }
.payment-option input[type="radio"]:checked + .payment-label {
    border-color: var(--c-black); background: var(--c-off-white);
    box-shadow: inset 0 0 0 1px var(--c-black);
}
.payment-radio-dot {
    width: 18px; height: 18px; border-radius: 50%;
    border: 2px solid var(--c-border); flex-shrink: 0;
    display: flex; align-items: center; justify-content: center;
    transition: border-color 0.15s ease;
}
.payment-option input[type="radio"]:checked + .payment-label .payment-radio-dot {
    border-color: var(--c-black);
}
.payment-option input[type="radio"]:checked + .payment-label .payment-radio-dot::after {
    content: ''; width: 8px; height: 8px; background: var(--c-black); border-radius: 50%;
}
.payment-icon {
    width: 36px; height: 36px; border-radius: 8px;
    background: var(--c-off-white); border: 1px solid var(--c-border);
    display: flex; align-items: center; justify-content: center;
    color: var(--c-gold-dark); font-size: 0.95rem; flex-shrink: 0;
}
.payment-text h6 { font-family: var(--font-display); font-size: 0.875rem; font-weight: 700; margin: 0 0 0.1rem; }
.payment-text p { font-size: 0.75rem; color: var(--c-text-muted); margin: 0; }

/* ── Summary sidebar ── */
.co-summary {
    background: var(--c-white); border: 1.5px solid var(--c-border);
    border-radius: 16px; overflow: hidden;
    position: sticky; top: calc(var(--nav-h) + 1.5rem);
}
.co-summary-header {
    padding: 1.1rem 1.5rem; background: var(--c-off-white);
    border-bottom: 1px solid var(--c-border);
}
.co-summary-header h5 {
    font-family: var(--font-display); font-size: 0.78rem;
    font-weight: 800; letter-spacing: 0.12em; text-transform: uppercase; margin: 0;
}
.co-summary-body { padding: 1.25rem 1.5rem; }

.co-order-item {
    display: flex; align-items: center; gap: 0.85rem;
    margin-bottom: 0.9rem; padding-bottom: 0.9rem;
    border-bottom: 1px solid var(--c-border);
}
.co-order-item:last-of-type { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
.co-order-img {
    width: 48px; height: 48px; border-radius: 8px;
    background: var(--c-off-white); border: 1px solid var(--c-border);
    display: flex; align-items: center; justify-content: center;
    overflow: hidden; flex-shrink: 0;
}
.co-order-img img { width: 100%; height: 100%; object-fit: cover; }
.co-order-img-ph { font-size: 1.1rem; opacity: 0.2; }
.co-order-name { font-family: var(--font-display); font-size: 0.8rem; font-weight: 700; }
.co-order-meta { font-size: 0.72rem; color: var(--c-text-muted); font-family: var(--font-mono); }
.co-order-price { font-family: var(--font-mono); font-size: 0.82rem; font-weight: 700; margin-left: auto; flex-shrink: 0; }

.co-totals { margin-top: 1rem; padding-top: 1rem; border-top: 1px solid var(--c-border); }
.co-total-row {
    display: flex; justify-content: space-between; align-items: center;
    font-size: 0.85rem; color: var(--c-text-muted); margin-bottom: 0.5rem;
}
.co-total-row.free { color: #219653; }
.co-total-row strong { color: var(--c-black); }
.co-grand-divider { border: none; border-top: 1.5px solid var(--c-border); margin: 0.75rem 0; }
.co-grand-total {
    display: flex; justify-content: space-between; align-items: center;
}
.co-grand-label { font-family: var(--font-display); font-size: 0.82rem; font-weight: 800; letter-spacing: 0.06em; text-transform: uppercase; }
.co-grand-amount { font-family: var(--font-display); font-size: 1.45rem; font-weight: 900; letter-spacing: -0.02em; }

.co-secure {
    display: flex; align-items: center; justify-content: center; gap: 0.4rem;
    font-size: 0.71rem; color: var(--c-text-muted);
    padding-top: 1rem; border-top: 1px solid var(--c-border); margin-top: 1.25rem;
}
.co-secure i { color: var(--c-gold-dark); }

/* ── Action buttons ── */
.btn-place-order {
    display: flex; align-items: center; justify-content: center; gap: 0.5rem;
    padding: 14px 28px; background: var(--c-black); color: var(--c-white);
    border: none; border-radius: 9px;
    font-family: var(--font-display); font-size: 0.82rem; font-weight: 800;
    letter-spacing: 0.08em; text-transform: uppercase;
    cursor: pointer; transition: background 0.18s ease, transform 0.18s ease, box-shadow 0.18s ease;
}
.btn-place-order:hover {
    background: var(--c-charcoal); transform: translateY(-2px);
    box-shadow: 0 10px 26px rgba(0,0,0,0.18);
}
.btn-back-cart {
    display: inline-flex; align-items: center; gap: 0.5rem;
    padding: 12px 20px; background: transparent; color: var(--c-text-muted);
    border: 1.5px solid var(--c-border); border-radius: 9px;
    font-family: var(--font-display); font-size: 0.78rem; font-weight: 700;
    text-decoration: none; transition: border-color 0.18s ease, color 0.18s ease, background 0.18s ease;
}
.btn-back-cart:hover { border-color: var(--c-black); color: var(--c-black); background: var(--c-off-white); }

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
        <li class="breadcrumb-item"><a href="<?php echo e(route('cart.index')); ?>">Cart</a></li>
        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
      </ol>
    </nav>
  </div>
</div>

<div class="checkout-page">
  <div class="container">

    <div data-reveal="up">
      <p class="page-eyebrow">Almost there</p>
      <h1 class="page-title">Checkout</h1>
    </div>

    
    <div class="checkout-steps" data-reveal="up" data-delay="1" aria-label="Checkout progress">
      <div class="step active">
        <div class="step-num">1</div>
        <span>Shipping</span>
      </div>
      <div class="step-line"></div>
      <div class="step active">
        <div class="step-num">2</div>
        <span>Payment</span>
      </div>
      <div class="step-line"></div>
      <div class="step inactive">
        <div class="step-num">3</div>
        <span>Confirm</span>
      </div>
    </div>

    <form action="<?php echo e(route('checkout.process')); ?>" method="POST" id="checkoutForm">
      <?php echo csrf_field(); ?>
      <div class="row g-4">

        
        <div class="col-lg-8">

          
          <div class="co-card" data-reveal="up" data-delay="1">
            <div class="co-card-header">
              <div class="co-card-header-icon"><i class="fas fa-map-marker-alt" aria-hidden="true"></i></div>
              <h5>Delivery Information</h5>
            </div>
            <div class="co-card-body">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="co-label" for="co_name">Full Name</label>
                  <input type="text" id="co_name" class="co-input" value="<?php echo e($user->name); ?>" readonly aria-label="Full name (auto-filled)">
                </div>
                <div class="col-md-6">
                  <label class="co-label" for="co_email">Email Address</label>
                  <input type="email" id="co_email" class="co-input" value="<?php echo e($user->email); ?>" readonly aria-label="Email (auto-filled)">
                </div>
                <div class="col-12">
                  <label class="co-label" for="phone">Phone Number <span style="color:#C0392B;">*</span></label>
                  <input type="tel" id="phone" name="phone"
                         class="co-input <?php echo e($errors->has('phone') ? 'is-invalid' : ''); ?>"
                         value="<?php echo e(old('phone', $user->phone)); ?>"
                         placeholder="+63 912 345 6789"
                         required
                         aria-required="true">
                  <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="co-feedback" role="alert"><?php echo e($message); ?></p>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col-12">
                  <label class="co-label" for="shipping_address">Shipping Address <span style="color:#C0392B;">*</span></label>
                  <textarea id="shipping_address" name="shipping_address"
                            class="co-input co-textarea <?php echo e($errors->has('shipping_address') ? 'is-invalid' : ''); ?>"
                            placeholder="House/Unit no., Street, Barangay, City, Province"
                            required
                            aria-required="true"><?php echo e(old('shipping_address', $user->address)); ?></textarea>
                  <?php $__errorArgs = ['shipping_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="co-feedback" role="alert"><?php echo e($message); ?></p>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
              </div>
            </div>
          </div>

          
          <div class="co-card" data-reveal="up" data-delay="2">
            <div class="co-card-header">
              <div class="co-card-header-icon"><i class="fas fa-credit-card" aria-hidden="true"></i></div>
              <h5>Payment Method</h5>
            </div>
            <div class="co-card-body">
              <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="co-feedback mb-3" role="alert"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              <div class="payment-options" role="group" aria-label="Choose payment method">

                <div class="payment-option">
                  <input type="radio" name="payment_method" id="pm_cod" value="cod" checked>
                  <label class="payment-label" for="pm_cod">
                    <div class="payment-radio-dot"></div>
                    <div class="payment-icon"><i class="fas fa-money-bill-wave" aria-hidden="true"></i></div>
                    <div class="payment-text">
                      <h6>Cash on Delivery</h6>
                      <p>Pay in cash when your order arrives</p>
                    </div>
                  </label>
                </div>

                <div class="payment-option">
                  <input type="radio" name="payment_method" id="pm_gcash" value="gcash">
                  <label class="payment-label" for="pm_gcash">
                    <div class="payment-radio-dot"></div>
                    <div class="payment-icon"><i class="fas fa-mobile-alt" aria-hidden="true"></i></div>
                    <div class="payment-text">
                      <h6>GCash</h6>
                      <p>Pay via GCash e-wallet</p>
                    </div>
                  </label>
                </div>

                <div class="payment-option">
                  <input type="radio" name="payment_method" id="pm_bank" value="bank_transfer">
                  <label class="payment-label" for="pm_bank">
                    <div class="payment-radio-dot"></div>
                    <div class="payment-icon"><i class="fas fa-university" aria-hidden="true"></i></div>
                    <div class="payment-text">
                      <h6>Bank Transfer</h6>
                      <p>Direct bank deposit or online transfer</p>
                    </div>
                  </label>
                </div>

              </div>
            </div>
          </div>

          
          <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap" data-reveal="up" data-delay="3">
            <a href="<?php echo e(route('cart.index')); ?>" class="btn-back-cart">
              <i class="fas fa-arrow-left" aria-hidden="true"></i>
              Back to Cart
            </a>
            <button type="submit" class="btn-place-order">
              <i class="fas fa-lock" aria-hidden="true"></i>
              Place Order
            </button>
          </div>

        </div>

        
        <div class="col-lg-4" data-reveal="up" data-delay="2">
          <div class="co-summary">
            <div class="co-summary-header">
              <h5>Order Summary</h5>
            </div>
            <div class="co-summary-body">

              
              <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productId => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="co-order-item">
                  <div class="co-order-img">
                    <?php if($item['image']): ?>
                      <img src="<?php echo e($item['image']); ?>" alt="<?php echo e($item['name']); ?>">
                    <?php else: ?>
                      <span class="co-order-img-ph" aria-hidden="true">&#128095;</span>
                    <?php endif; ?>
                  </div>
                  <div style="flex:1;min-width:0;">
                    <div class="co-order-name" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                      <?php echo e($item['name']); ?>

                    </div>
                    <div class="co-order-meta">Qty: <?php echo e($item['quantity']); ?></div>
                  </div>
                  <div class="co-order-price">&#8369;<?php echo e(number_format($item['price'] * $item['quantity'], 2)); ?></div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              
              <div class="co-totals">
                <div class="co-total-row">
                  <span>Subtotal</span>
                  <strong>&#8369;<?php echo e(number_format($cartTotal, 2)); ?></strong>
                </div>
                <div class="co-total-row free">
                  <span>Shipping</span>
                  <strong>Free</strong>
                </div>
                <hr class="co-grand-divider">
                <div class="co-grand-total">
                  <span class="co-grand-label">Total</span>
                  <span class="co-grand-amount">&#8369;<?php echo e(number_format($cartTotal, 2)); ?></span>
                </div>
              </div>

              <div class="co-secure">
                <i class="fas fa-lock" aria-hidden="true"></i>
                256-bit SSL encrypted checkout
              </div>

            </div>
          </div>
        </div>

      </div>
    </form>

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\SoulMates-Inc-Project\resources\views/checkout/index.blade.php ENDPATH**/ ?>