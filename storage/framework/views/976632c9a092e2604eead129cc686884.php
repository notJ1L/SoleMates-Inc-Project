<?php $__env->startSection('page-title', 'Order #' . $order->id); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="mb-1">Order #<?php echo e($order->id); ?></h3>
        <p class="text-muted mb-0"><?php echo e($order->created_at->format('M d, Y h:i A')); ?></p>
    </div>
    <a href="<?php echo e(route('admin.orders.index')); ?>" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Orders
    </a>
</div>

<div class="admin-form-card">
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-6">
                <h6 class="fw-semibold mb-3">Customer Information</h6>
                <table class="table table-sm">
                    <tr>
                        <td class="text-muted" style="width: 120px;">Name:</td>
                        <td><?php echo e($order->user->name); ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Email:</td>
                        <td><?php echo e($order->user->email); ?></td>
                    </tr>
                    <?php if($order->user->phone): ?>
                    <tr>
                        <td class="text-muted">Phone:</td>
                        <td><?php echo e($order->user->phone); ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if($order->user->address): ?>
                    <tr>
                        <td class="text-muted">Address:</td>
                        <td><?php echo e($order->user->address); ?></td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
            <div class="col-md-6">
                <h6 class="fw-semibold mb-3">Order Information</h6>
                <table class="table table-sm">
                    <tr>
                        <td class="text-muted" style="width: 120px;">Order #:</td>
                        <td class="font-mono"><?php echo e($order->order_number ?? '#' . $order->id); ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Status:</td>
                        <td>
                            <span class="badge-status badge-<?php echo e($order->status); ?>">
                                <?php echo e(ucfirst($order->status)); ?>

                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Shipping address:</td>
                        <td><?php echo e($order->shipping_address ?? '—'); ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Phone:</td>
                        <td><?php echo e($order->phone ?? '—'); ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Payment:</td>
                        <td><?php echo e(ucfirst(str_replace('_', ' ', $order->payment_method ?? '—'))); ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <h6 class="fw-semibold mb-3">Order Items</h6>
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <div class="fw-semibold"><?php echo e($item->product->name ?? 'Product'); ?></div>
                                <?php if($item->product && $item->product->category): ?>
                                    <div class="text-muted small"><?php echo e($item->product->category->name); ?></div>
                                <?php endif; ?>
                            </td>
                            <td class="font-mono">₱<?php echo e(number_format($item->price, 2)); ?></td>
                            <td><?php echo e($item->quantity); ?></td>
                            <td class="font-mono fw-semibold">₱<?php echo e(number_format($item->subtotal ?? ($item->price * $item->quantity), 2)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <div class="row justify-content-end mt-4">
            <div class="col-md-4">
                <table class="table table-sm">
                    <?php if(isset($order->shipping) && $order->shipping > 0): ?>
                    <tr>
                        <td class="text-muted">Subtotal:</td>
                        <td class="text-end font-mono">₱<?php echo e(number_format($order->subtotal ?? $order->total, 2)); ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Shipping:</td>
                        <td class="text-end font-mono">₱<?php echo e(number_format($order->shipping ?? 0, 2)); ?></td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <td class="fw-semibold">Total:</td>
                        <td class="text-end font-mono fw-bold">₱<?php echo e(number_format($order->total, 2)); ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <?php if($order->status !== 'completed' && $order->status !== 'cancelled'): ?>
        <div class="mt-4 p-3 bg-light rounded">
            <h6 class="fw-semibold mb-3">Update Order Status</h6>
            <form action="<?php echo e(route('admin.orders.updateStatus', $order)); ?>" method="POST" class="d-flex gap-2 align-items-end">
                <?php echo csrf_field(); ?>
                <div class="flex-grow-1">
                    <select name="status" class="form-select" required>
                        <option value="pending" <?php echo e($order->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                        <option value="processing" <?php echo e($order->status == 'processing' ? 'selected' : ''); ?>>Processing</option>
                        <option value="shipped" <?php echo e($order->status == 'shipped' ? 'selected' : ''); ?>>Shipped</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled" <?php echo e($order->status == 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-sync me-2"></i>Update Status
                </button>
            </form>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\SoulMates-Inc-Project\resources\views\admin\orders\show.blade.php ENDPATH**/ ?>