<?php $__env->startSection('title', 'Checkout — SoulMates Inc.'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="mb-4">
                <i class="fas fa-credit-card me-2"></i>Checkout
            </h2>
            
            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('checkout.process')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                
                <!-- Order Summary -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Order Summary</h6>
                    </div>
                    <div class="card-body">
                        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productId => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row align-items-center mb-3 pb-3 border-bottom">
                                <div class="col-md-2">
                                    <?php if($item['image']): ?>
                                        <img src="<?php echo e(url('/images/' . $item['image'])); ?>" 
                                             alt="<?php echo e($item['name']); ?>" 
                                             class="img-fluid rounded">
                                    <?php else: ?>
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 60px;">
                                            <i class="fas fa-shoe-prints fa-lg text-muted"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="mb-1"><?php echo e($item['name']); ?></h6>
                                    <p class="text-muted mb-0">₱<?php echo e(number_format($item['price'], 2)); ?> × <?php echo e($item['quantity']); ?></p>
                                </div>
                                <div class="col-md-4 text-end">
                                    <strong>₱<?php echo e(number_format($item['price'] * $item['quantity'], 2)); ?></strong>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        <div class="row mt-3">
                            <div class="col-md-8">
                                <strong>Subtotal:</strong>
                            </div>
                            <div class="col-md-4 text-end">
                                <strong>₱<?php echo e(number_format($cartTotal, 2)); ?></strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <span>Shipping:</span>
                            </div>
                            <div class="col-md-4 text-end">
                                <span>Free</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-8">
                                <h5>Total:</h5>
                            </div>
                            <div class="col-md-4 text-end">
                                <h5>₱<?php echo e(number_format($cartTotal, 2)); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shipping Information -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Shipping Information</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" value="<?php echo e($user->name); ?>" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" value="<?php echo e($user->email); ?>" readonly>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   id="phone" name="phone" value="<?php echo e(old('phone', $user->phone)); ?>" required>
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="mb-3">
                            <label for="shipping_address" class="form-label">Shipping Address</label>
                            <textarea class="form-control <?php $__errorArgs = ['shipping_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                      id="shipping_address" name="shipping_address" rows="3" required><?php echo e(old('shipping_address', $user->address)); ?></textarea>
                            <?php $__errorArgs = ['shipping_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Payment Method</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" 
                                       id="cod" value="cod" checked>
                                <label class="form-check-label" for="cod">
                                    <i class="fas fa-money-bill-wave me-2"></i>Cash on Delivery (COD)
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" 
                                       id="gcash" value="gcash">
                                <label class="form-check-label" for="gcash">
                                    <i class="fas fa-mobile-alt me-2"></i>GCash
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" 
                                       id="bank_transfer" value="bank_transfer">
                                <label class="form-check-label" for="bank_transfer">
                                    <i class="fas fa-university me-2"></i>Bank Transfer
                                </label>
                            </div>
                        </div>
                        <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?php echo e(route('cart.index')); ?>" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Cart
                    </a>
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-check-circle me-2"></i>Place Order
                    </button>
                </div>
            </form>
        </div>
        
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Order Total</h6>
                </div>
                <div class="card-body text-center">
                    <h3 class="text-primary">₱<?php echo e(number_format($cartTotal, 2)); ?></h3>
                    <p class="text-muted">Including tax and free shipping</p>
                    
                    <div class="mt-3">
                        <small class="text-muted">
                            <i class="fas fa-lock me-1"></i>Secure checkout powered by SoulMates Inc.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp_ITCP226\htdocs\SoulMates-Inc-Project\resources\views/checkout/index.blade.php ENDPATH**/ ?>