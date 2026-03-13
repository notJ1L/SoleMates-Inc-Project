<?php $__env->startSection('title', 'Order Success — SoulMates Inc.'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-check-circle fa-5x text-success"></i>
                    </div>
                    
                    <h2 class="mb-3">Order Placed Successfully!</h2>
                    <p class="text-muted mb-4">
                        Thank you for your order. We've received your order and will process it shortly.
                    </p>
                    
                    <div class="alert alert-info">
                        <h6 class="alert-heading">Order Details</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Order Number:</strong> <?php echo e($order->order_number); ?><br>
                                <strong>Date:</strong> <?php echo e($order->created_at->format('F d, Y')); ?><br>
                                <strong>Status:</strong> 
                                <span class="badge bg-warning"><?php echo e(ucfirst($order->status)); ?></span>
                            </div>
                            <div class="col-md-6">
                                <strong>Total Amount:</strong> ₱<?php echo e(number_format($order->total, 2)); ?><br>
                                <strong>Payment Method:</strong> <?php echo e(ucfirst(str_replace('_', ' ', $order->payment_method))); ?><br>
                                <strong>Payment Status:</strong> 
                                <span class="badge bg-secondary"><?php echo e(ucfirst($order->payment_status)); ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Items -->
                    <div class="text-start">
                        <h6 class="mb-3">Order Items:</h6>
                        <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom">
                                <div>
                                    <strong><?php echo e($item->product->name); ?></strong><br>
                                    <small class="text-muted">₱<?php echo e(number_format($item->price, 2)); ?> × <?php echo e($item->quantity); ?></small>
                                </div>
                                <strong>₱<?php echo e(number_format($item->subtotal, 2)); ?></strong>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    
                    <!-- Shipping Information -->
                    <div class="text-start mt-4">
                        <h6 class="mb-3">Shipping Information:</h6>
                        <p class="mb-1"><strong>Name:</strong> <?php echo e($order->user->name); ?></p>
                        <p class="mb-1"><strong>Phone:</strong> <?php echo e($order->phone); ?></p>
                        <p class="mb-1"><strong>Address:</strong> <?php echo e($order->shipping_address); ?></p>
                    </div>
                    
                    <div class="d-flex justify-content-center gap-2 mt-4">
                        <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary">
                            <i class="fas fa-shopping-bag me-2"></i>Continue Shopping
                        </a>
                        <a href="<?php echo e(route('home')); ?>" class="btn btn-outline-secondary">
                            <i class="fas fa-home me-2"></i>Back to Home
                        </a>
                    </div>
                    
                    <div class="mt-4">
                        <small class="text-muted">
                            <i class="fas fa-envelope me-1"></i>
                            You will receive an email confirmation at <?php echo e($order->user->email); ?>

                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp_ITCP226\htdocs\SoulMates-Inc-Project\resources\views/checkout/success.blade.php ENDPATH**/ ?>