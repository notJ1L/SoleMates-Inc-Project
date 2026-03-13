

<?php $__env->startSection('title', 'My Orders — SoulMates Inc.'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <h2 class="mb-4" style="font-family: var(--font-display); font-weight: 800;">My Orders</h2>

    <?php if($orders->count() > 0): ?>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mb-3 border-0 shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <div>
                        <strong><?php echo e($order->order_number); ?></strong>
                        <span class="text-muted ms-3" style="font-size:0.82rem;">
                            <?php echo e($order->created_at->format('M d, Y')); ?>

                        </span>
                    </div>
                    <span class="badge rounded-pill
                        <?php if($order->status === 'completed'): ?> bg-success
                        <?php elseif($order->status === 'cancelled'): ?> bg-danger
                        <?php elseif($order->status === 'shipped'): ?> bg-info text-dark
                        <?php elseif($order->status === 'processing'): ?> bg-primary
                        <?php else: ?> bg-warning text-dark
                        <?php endif; ?>">
                        <?php echo e(ucfirst($order->status)); ?>

                    </span>
                </div>
                <div class="card-body p-3">
                    <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-flex justify-content-between align-items-center py-2
                             <?php echo e(!$loop->last ? 'border-bottom' : ''); ?>">
                            <div class="d-flex align-items-center gap-3">
                                <?php if($item->product && $item->product->photos->first()): ?>
                                    <img src="<?php echo e(asset('product_photos/' . $item->product->photos->first()->image_path)); ?>"
                                         style="width:50px; height:50px; object-fit:cover; border-radius:3px;">
                                <?php else: ?>
                                    <div style="width:50px; height:50px; background:#f3f0ea; border-radius:3px;
                                                display:flex; align-items:center; justify-content:center;">👟</div>
                                <?php endif; ?>
                                <div>
                                    <div style="font-weight:600; font-size:0.9rem;">
                                        <?php echo e($item->product->name ?? 'Product unavailable'); ?>

                                    </div>
                                    <div class="text-muted" style="font-size:0.78rem;">Qty: <?php echo e($item->quantity); ?></div>
                                </div>
                            </div>
                            <div style="font-family: var(--font-mono); font-weight:700;">
                                ₱<?php echo e(number_format($item->subtotal, 2)); ?>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="d-flex justify-content-end mt-3 pt-2 border-top">
                        <strong>Total: ₱<?php echo e(number_format($order->orderItems->sum('subtotal'), 2)); ?></strong>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php echo e($orders->links()); ?>

    <?php else: ?>
        <div class="text-center py-5 text-muted">
            <div style="font-size:4rem; opacity:0.2;">📦</div>
            <p class="mt-3">You haven't placed any orders yet.</p>
            <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary mt-2">Start Shopping</a>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp_ITCP226\htdocs\SoulMates-Inc-Project\resources\views/profile/orders.blade.php ENDPATH**/ ?>