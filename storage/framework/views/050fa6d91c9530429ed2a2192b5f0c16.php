<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('topbar-actions'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-bag"></i></div>
            <div class="stat-value"><?php echo e($stats['total_orders'] ?? 0); ?></div>
            <div class="stat-label">Total Orders</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-box-seam"></i></div>
            <div class="stat-value"><?php echo e($stats['total_products'] ?? 0); ?></div>
            <div class="stat-label">Products</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-people"></i></div>
            <div class="stat-value"><?php echo e($stats['total_users'] ?? 0); ?></div>
            <div class="stat-label">Registered Users</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-currency-dollar"></i></div>
            <div class="stat-value">₱<?php echo e(number_format($stats['total_revenue'] ?? 0, 0)); ?></div>
            <div class="stat-label">Total Revenue</div>
        </div>
    </div>
</div>

<div class="row g-3">

    
    <div class="col-lg-7">
        <div class="panel h-100">
            <div class="panel-header">
                <span class="panel-title">Recent Orders</span>
                <a href="<?php echo e(route('admin.orders.index')); ?>" style="font-size:0.775rem;color:var(--accent);text-decoration:none;font-weight:500;">View all →</a>
            </div>
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $recentOrders ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><span class="mono">#<?php echo e($order->id); ?></span></td>
                            <td>
                                <div style="font-weight:600;"><?php echo e($order->user->name); ?></div>
                                <div class="subtext"><?php echo e($order->user->email); ?></div>
                            </td>
                            <td><span class="mono">₱<?php echo e(number_format($order->total, 2)); ?></span></td>
                            <td><span class="badge-pill badge-<?php echo e($order->status); ?>"><?php echo e(ucfirst($order->status)); ?></span></td>
                            <td><span style="font-size:0.775rem;color:var(--text-muted);"><?php echo e($order->created_at->format('M d, Y')); ?></span></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">
                                    <i class="bi bi-bag"></i>
                                    <p>No orders yet.</p>
                                </div>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    <div class="col-lg-5">
        
        <?php if(($stats['pending_orders'] ?? 0) > 0): ?>
        <div style="background:rgba(200,169,110,0.12);border:1px solid rgba(200,169,110,0.3);border-radius:6px;padding:1.25rem;margin-bottom:1rem;display:flex;align-items:center;gap:1rem;">
            <div style="width:44px;height:44px;background:var(--accent);border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0;">
                <i class="bi bi-clock"></i>
            </div>
            <div>
                <div style="font-weight:700;font-size:0.9rem;"><?php echo e($stats['pending_orders']); ?> Pending Order<?php echo e($stats['pending_orders'] > 1 ? 's' : ''); ?></div>
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


<div class="row g-3 mt-1">

    
    <div class="col-lg-7">
        <div class="panel">
            <div class="panel-header">
                <span class="panel-title">
                    <i class="bi bi-bar-chart-line" style="color:var(--accent);margin-right:6px;"></i>
                    Yearly Sales — <?php echo e($currentYear ?? now()->year); ?>

                </span>
                <a href="<?php echo e(route('admin.charts.index')); ?>" style="font-size:0.775rem;color:var(--accent);text-decoration:none;font-weight:500;">Full report →</a>
            </div>
            <div style="padding:1rem 1.25rem 0.75rem;position:relative;height:240px;">
                <canvas id="dashYearlyChart"></canvas>
            </div>
        </div>
    </div>

    
    <div class="col-lg-5">
        <div class="panel">
            <div class="panel-header">
                <span class="panel-title">
                    <i class="bi bi-pie-chart" style="color:var(--purple);margin-right:6px;"></i>
                    Sales by Product
                </span>
                <span style="font-size:0.75rem;color:var(--text-muted);">% of total revenue</span>
            </div>
            <div style="padding:1rem 1.25rem 0.75rem;display:flex;align-items:center;justify-content:center;height:240px;">
                <?php if(isset($productSales) && $productSales->isNotEmpty()): ?>
                    <canvas id="dashPieChart"></canvas>
                <?php else: ?>
                    <div class="empty-state">
                        <i class="bi bi-pie-chart" style="font-size:2rem;opacity:0.3;"></i>
                        <p>No completed orders yet.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php
    $dashMonthNames = $monthNames ?? ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    $dashYearlyData = $yearlyData ?? array_fill(0, 12, 0);
    $dashYear       = $currentYear ?? now()->year;
?>
<script src="<?php echo e(asset('js/chart.umd.js')); ?>"></script>
<script>
    Chart.defaults.font.family = "'Inter', -apple-system, sans-serif";
    Chart.defaults.color       = '#6B6560';

    /* Yearly Sales Bar */
    new Chart(document.getElementById('dashYearlyChart'), {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($dashMonthNames, 15, 512) ?>,
            datasets: [{
                label: 'Revenue (₱)',
                data:  <?php echo json_encode($dashYearlyData, 15, 512) ?>,
                backgroundColor: 'rgba(200,169,110,0.78)',
                borderColor:     '#C8A96E',
                borderWidth:     1,
                borderRadius:    4,
                borderSkipped:   false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: ctx => ' ₱' + ctx.parsed.y.toLocaleString('en-PH', { minimumFractionDigits: 2 })
                    }
                }
            },
            scales: {
                x: { grid: { display: false } },
                y: {
                    beginAtZero: true,
                    ticks: { callback: v => '₱' + (v >= 1000 ? (v / 1000).toFixed(1) + 'k' : v) }
                }
            }
        }
    });

    /* Product Pie */
    <?php if(isset($productSales) && $productSales->isNotEmpty()): ?>
    const _pieColors = [
        '#C8A96E','#2563EB','#16A34A','#7C3AED','#D97706',
        '#DC2626','#0891B2','#DB2777','#65A30D','#EA580C',
    ];
    new Chart(document.getElementById('dashPieChart'), {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($productSales->pluck('name'), 15, 512) ?>,
            datasets: [{
                data: <?php echo json_encode($productSales->pluck('total')->map(fn($v) => round((float)$v, 2))->values(), 512) ?>,
                backgroundColor: _pieColors.slice(0, <?php echo e($productSales->count()); ?>),
                borderColor: '#fff',
                borderWidth: 2,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom', labels: { padding: 10, boxWidth: 12, font: { size: 10 } } },
                tooltip: {
                    callbacks: {
                        label: ctx => {
                            const total = ctx.dataset.data.reduce((a,b) => a+b, 0);
                            const pct   = total > 0 ? (ctx.parsed / total * 100).toFixed(1) : '0.0';
                            return ` ₱${ctx.parsed.toLocaleString('en-PH',{minimumFractionDigits:2})} (${pct}%)`;
                        }
                    }
                }
            }
        }
    });
    <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\SoulMates-Inc-Project\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>