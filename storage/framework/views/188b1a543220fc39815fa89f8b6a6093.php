<?php $__env->startSection('title', 'Shopping Cart — SoleMates Footwear'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="mb-4">
                <i class="fas fa-shopping-cart me-2"></i>Shopping Cart
            </h2>
            
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            
            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if(empty($cart)): ?>
                <div class="text-center py-5">
                    <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                    <h4>Your cart is empty</h4>
                    <p class="text-muted">Looks like you haven't added any products to your cart yet.</p>
                    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary">
                        <i class="fas fa-shopping-bag me-2"></i>Continue Shopping
                    </a>
                </div>
            <?php else: ?>
                <div class="card">
                    <div class="card-body">
                        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productId => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row align-items-center mb-3 pb-3 border-bottom">
                                <div class="col-md-2">
                                    <?php if($item['image']): ?>
                                        <img src="<?php echo e($item['image']); ?>" 
                                             alt="<?php echo e($item['name']); ?>" 
                                             class="img-fluid rounded">
                                    <?php else: ?>
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 80px;">
                                            <i class="fas fa-shoe-prints fa-2x text-muted"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="mb-1"><?php echo e($item['name']); ?></h6>
                                    <p class="text-muted mb-0">₱<?php echo e(number_format($item['price'], 2)); ?></p>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group" style="max-width: 150px;">
                                        <form action="<?php echo e(route('cart.update')); ?>" method="POST" class="d-flex">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <input type="hidden" name="product_id" value="<?php echo e($productId); ?>">
                                            <input type="number" name="quantity" value="<?php echo e($item['quantity']); ?>" 
                                                   class="form-control form-control-sm" min="1" max="<?php echo e($item['stock']); ?>">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-sync"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <?php if($item['stock'] <= 5): ?>
                                        <small class="text-warning">Only <?php echo e($item['stock']); ?> left in stock</small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-2">
                                    <strong>₱<?php echo e(number_format($item['price'] * $item['quantity'], 2)); ?></strong>
                                </div>
                                <div class="col-md-1">
                                    <form action="<?php echo e(route('cart.remove', $productId)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                onclick="return confirm('Remove this item from cart?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <?php if(!empty($cart)): ?>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Order Summary</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal:</span>
                        <strong>₱<?php echo e(number_format($cartTotal, 2)); ?></strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Shipping:</span>
                        <strong>Free</strong>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <h5>Total:</h5>
                        <h5>₱<?php echo e(number_format($cartTotal, 2)); ?></h5>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <a href="<?php echo e(route('checkout.index')); ?>" class="btn btn-primary">
                            <i class="fas fa-credit-card me-2"></i>Proceed to Checkout
                        </a>
                        <a href="<?php echo e(route('products.index')); ?>" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                        </a>
                        <form action="<?php echo e(route('cart.clear')); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-outline-danger w-100" 
                                    onclick="return confirm('Clear entire cart?')">
                                <i class="fas fa-trash me-2"></i>Clear Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp_ITCP226\htdocs\SoulMates-Inc-Project\resources\views/cart/index.blade.php ENDPATH**/ ?>