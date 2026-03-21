<?php $__env->startSection('page-title', 'Orders'); ?>

<?php $__env->startSection('content'); ?>
<!-- Filters -->
<div class="row mb-4">
    <div class="col-md-12">
        <div class="d-flex gap-3 align-items-center">
            <form method="GET" class="d-flex gap-2 align-items-center">
                <?php echo csrf_field(); ?>
                
                <select name="status" class="form-select" onchange="this.form.submit()">
                    <option value="">All Status</option>
                    <option value="pending" <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                    <option value="processing" <?php echo e(request('status') == 'processing' ? 'selected' : ''); ?>>Processing</option>
                    <option value="shipped" <?php echo e(request('status') == 'shipped' ? 'selected' : ''); ?>>Shipped</option>
                    <option value="completed" <?php echo e(request('status') == 'completed' ? 'selected' : ''); ?>>Completed</option>
                    <option value="cancelled" <?php echo e(request('status') == 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                </select>
                
                <input type="text" 
                       name="search" 
                       class="form-control" 
                       placeholder="Search by order ID or customer name..." 
                       value="<?php echo e(request('search')); ?>">
                
                <button type="submit" class="btn btn-outline-primary">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Orders Table -->
<div class="admin-form-card">
    <div class="card-body p-0">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Customer</th>
                    <th>Items</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <div class="fw-semibold font-mono">#<?php echo e($order->id); ?></div>
                            <div class="text-muted small"><?php echo e($order->created_at->format('M d, Y')); ?></div>
                        </td>
                        <td>
                            <div class="fw-semibold"><?php echo e($order->user->name); ?></div>
                            <div class="text-muted small"><?php echo e($order->user->email); ?></div>
                            <?php if($order->user->phone): ?>
                                <div class="text-muted small"><?php echo e($order->user->phone); ?></div>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="fw-semibold"><?php echo e($order->orderItems->count()); ?> items</div>
                            <div class="text-muted small">
                                <?php echo e($order->orderItems->first()->product->name ?? 'No items'); ?>

                                <?php if($order->orderItems->count() > 1): ?>
                                    and <?php echo e($order->orderItems->count() - 1); ?> more
                                <?php endif; ?>
                            </div>
                        </td>
                        <td>
                            <span class="font-mono fw-semibold">$<?php echo e(number_format($order->total, 2)); ?></span>
                        </td>
                        <td>
                            <span class="badge-status badge-<?php echo e($order->status); ?>">
                                <?php echo e(ucfirst($order->status)); ?>

                            </span>
                        </td>
                        <td>
                            <div><?php echo e($order->created_at->format('M d, Y')); ?></div>
                            <div class="text-muted small"><?php echo e($order->created_at->diffForHumans()); ?></div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" 
                                        class="btn btn-sm btn-outline-primary" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#orderModal<?php echo e($order->id); ?>">
                                    <i class="fas fa-eye"></i>
                                </button>
                                
                                <?php if($order->status !== 'completed'): ?>
                                <form action="<?php echo e(route('admin.orders.updateStatus', $order)); ?>" 
                                      method="POST" 
                                      class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="status" value="completed">
                                    <button type="submit" 
                                            class="btn btn-sm btn-outline-success"
                                            title="Mark as Completed"
                                            onclick="return confirm('Mark this order as completed?')">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <i class="fas fa-shopping-bag fa-2x text-muted mb-2"></i>
                            <p class="text-muted mb-0">No orders found</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
<?php if($orders->hasPages()): ?>
    <div class="d-flex justify-content-center mt-4">
        <?php echo e($orders->links()); ?>

    </div>
<?php endif; ?>

<!-- Order Details Modal -->
<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="orderModal<?php echo e($order->id); ?>" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-bag-check me-2"></i>Order #<?php echo e($order->id); ?> Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="fw-semibold mb-3">Customer Information</h6>
                        <table class="table table-sm">
                            <tr>
                                <td class="text-muted" style="width: 100px;">Name:</td>
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
                                <td class="text-muted" style="width: 100px;">Status:</td>
                                <td>
                                    <span class="badge-status badge-<?php echo e($order->status); ?>">
                                        <?php echo e(ucfirst($order->status)); ?>

                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-muted">Order Date:</td>
                                <td><?php echo e($order->created_at->format('M d, Y h:i A')); ?></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Subtotal:</td>
                                <td class="font-mono">$<?php echo e(number_format($order->total, 2)); ?></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Total:</td>
                                <td class="font-mono fw-bold">$<?php echo e(number_format($order->total, 2)); ?></td>
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
                                        <div class="fw-semibold"><?php echo e($item->product->name); ?></div>
                                        <div class="text-muted small"><?php echo e($item->product->category->name ?? 'Uncategorized'); ?></div>
                                    </td>
                                    <td class="font-mono">$<?php echo e(number_format($item->price, 2)); ?></td>
                                    <td><?php echo e($item->quantity); ?></td>
                                    <td class="font-mono fw-semibold">$<?php echo e(number_format($item->price * $item->quantity, 2)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                
                <!-- Status Update Form -->
                <?php if($order->status !== 'completed'): ?>
                <div class="mt-4 p-3 bg-light rounded">
                    <h6 class="fw-semibold mb-3">Update Order Status</h6>
                    <form action="<?php echo e(route('admin.orders.updateStatus', $order)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-8">
                                <select name="status" class="form-select" required>
                                    <option value="pending" <?php echo e($order->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                    <option value="processing" <?php echo e($order->status == 'processing' ? 'selected' : ''); ?>>Processing</option>
                                    <option value="shipped" <?php echo e($order->status == 'shipped' ? 'selected' : ''); ?>>Shipped</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled" <?php echo e($order->status == 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-sync me-2"></i>Update Status
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="<?php echo e(route('admin.orders.index')); ?>" class="btn btn-primary">View All Orders</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\SoulMates-Inc-Project\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>