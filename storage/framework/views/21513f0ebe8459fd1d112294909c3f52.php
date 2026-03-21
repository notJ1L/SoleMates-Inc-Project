<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('topbar-actions'); ?>
    <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-sm" style="background:var(--accent);color:var(--black);font-size:0.78rem;font-weight:700;border-radius:3px;padding:0.4rem 1rem;border:none;">
        <i class="bi bi-plus-lg me-1"></i> Add Product
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-bag"></i></div>
            <div class="stat-value"><?php echo e($totalOrders ?? 0); ?></div>
            <div class="stat-label">Total Orders</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-box-seam"></i></div>
            <div class="stat-value"><?php echo e($totalProducts ?? 0); ?></div>
            <div class="stat-label">Products</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-people"></i></div>
            <div class="stat-value"><?php echo e($totalUsers ?? 0); ?></div>
            <div class="stat-label">Registered Users</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-currency-dollar"></i></div>
            <div class="stat-value">₱<?php echo e(number_format($totalRevenue ?? 0, 0)); ?></div>
            <div class="stat-label">Total Revenue</div>
        </div>
    </div>
</div>

<div class="row g-3">

    
    <div class="col-lg-7">
        <div style="background:var(--white);border-radius:6px;border:1px solid rgba(0,0,0,0.07);overflow:hidden;">
            <div style="padding:1.1rem 1.5rem; border-bottom:1px solid rgba(0,0,0,0.07); display:flex; justify-content:space-between; align-items:center;">
                <div style="font-family:var(--font-display);font-size:1.05rem;font-weight:700;">Recent Orders</div>
                <a href="<?php echo e(route('admin.orders.index')); ?>" style="font-size:0.75rem;color:var(--accent);text-decoration:none;">View all →</a>
            </div>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $recentOrders ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><span style="font-family:var(--font-mono);font-size:0.75rem;">#<?php echo e($order->id); ?></span></td>
                            <td>
                                <div style="font-size:0.85rem;font-weight:600;"><?php echo e($order->user->name); ?></div>
                                <div style="font-size:0.72rem;color:var(--warm-gray);"><?php echo e($order->user->email); ?></div>
                            </td>
                            <td><span style="font-family:var(--font-mono);font-size:0.85rem;">₱<?php echo e(number_format($order->total, 2)); ?></span></td>
                            <td>
                                <span class="badge-status badge-<?php echo e($order->status); ?>"><?php echo e(ucfirst($order->status)); ?></span>
                            </td>
                            <td><span style="font-size:0.75rem;color:var(--warm-gray);"><?php echo e($order->created_at->format('M d')); ?></span></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="5" style="text-align:center;color:var(--warm-gray);padding:2rem;font-size:0.85rem;">No orders yet.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    
    <div class="col-lg-5">
        
        <?php if(($pendingOrders ?? 0) > 0): ?>
        <div style="background:rgba(200,169,110,0.12);border:1px solid rgba(200,169,110,0.3);border-radius:6px;padding:1.25rem;margin-bottom:1rem;display:flex;align-items:center;gap:1rem;">
            <div style="width:44px;height:44px;background:var(--accent);border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0;">
                <i class="bi bi-clock"></i>
            </div>
            <div>
                <div style="font-weight:700;font-size:0.9rem;"><?php echo e($pendingOrders); ?> Pending Order<?php echo e($pendingOrders > 1 ? 's' : ''); ?></div>
                <div style="font-size:0.78rem;color:var(--warm-gray);margin-top:2px;">Need your attention</div>
            </div>
            <a href="<?php echo e(route('admin.orders.index')); ?>?status=pending" style="margin-left:auto;font-size:0.75rem;color:var(--accent);text-decoration:none;white-space:nowrap;">View →</a>
        </div>
        <?php endif; ?>

        
        <?php if(isset($lowStockProducts) && $lowStockProducts->count() > 0): ?>
        <div style="background:var(--white);border-radius:6px;border:1px solid rgba(0,0,0,0.07);overflow:hidden;">
            <div style="padding:1rem 1.5rem;border-bottom:1px solid rgba(0,0,0,0.07);display:flex;justify-content:space-between;align-items:center;">
                <div style="font-family:var(--font-display);font-size:1rem;font-weight:700;">Low Stock Alert</div>
                <span style="font-family:var(--font-mono);font-size:0.65rem;background:rgba(192,57,43,0.12);color:var(--red);padding:3px 10px;border-radius:20px;"><?php echo e($lowStockProducts->count()); ?> items</span>
            </div>
            <div style="padding:0.5rem 0;">
                <?php $__currentLoopData = $lowStockProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div style="display:flex;align-items:center;gap:0.75rem;padding:0.6rem 1.25rem;border-bottom:1px solid rgba(0,0,0,0.04);">
                    <div style="flex:1;">
                        <div style="font-size:0.83rem;font-weight:600;"><?php echo e($p->name); ?></div>
                        <div style="font-size:0.7rem;color:var(--warm-gray);"><?php echo e($p->brand); ?></div>
                    </div>
                    <span style="font-family:var(--font-mono);font-size:0.75rem;color:<?php echo e($p->stock == 0 ? 'var(--red)' : '#c09b00'); ?>;">
                        <?php echo e($p->stock); ?> left
                    </span>
                    <a href="<?php echo e(route('admin.products.edit', $p->id)); ?>" style="font-size:0.75rem;color:var(--accent);">Edit</a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>

        
        <div style="background:var(--white);border-radius:6px;border:1px solid rgba(0,0,0,0.07);overflow:hidden;margin-top:1rem;">
            <div style="padding:1rem 1.5rem;border-bottom:1px solid rgba(0,0,0,0.07);display:flex;justify-content:space-between;align-items:center;">
                <div style="font-family:var(--font-display);font-size:1rem;font-weight:700;">New Users</div>
                <a href="<?php echo e(route('admin.users.index')); ?>" style="font-size:0.75rem;color:var(--accent);text-decoration:none;">View all →</a>
            </div>
            <div style="padding:0.5rem 0;">
                <?php $__empty_1 = true; $__currentLoopData = $recentUsers ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div style="display:flex;align-items:center;gap:0.75rem;padding:0.6rem 1.25rem;border-bottom:1px solid rgba(0,0,0,0.04);">
                    <div style="width:34px;height:34px;border-radius:50%;background:var(--accent);display:flex;align-items:center;justify-content:center;font-size:0.85rem;font-weight:700;color:var(--black);flex-shrink:0;">
                        <?php echo e(strtoupper(substr($user->name, 0, 1))); ?>

                    </div>
                    <div style="flex:1;min-width:0;">
                        <div style="font-size:0.83rem;font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php echo e($user->name); ?></div>
                        <div style="font-size:0.7rem;color:var(--warm-gray);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php echo e($user->email); ?></div>
                    </div>
                    <span style="font-size:0.68rem;color:var(--warm-gray);"><?php echo e($user->created_at->diffForHumans()); ?></span>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div style="text-align:center;padding:1.5rem;color:var(--warm-gray);font-size:0.83rem;">No users yet.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp_system\htdocs\SoulMates-Inc-Project\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>