<?php $__env->startSection('page-title', 'Products'); ?>

<?php $__env->startSection('topbar-actions'); ?>
    <a href="<?php echo e(route('admin.products.create')); ?>" class="btn-primary-admin">
        <i class="bi bi-plus-lg"></i> New Product
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="panel">
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:0.75rem;">
                            <?php if($product->photos->first()): ?>
                                <img src="<?php echo e(asset('product_photos/' . $product->photos->first()->image_path)); ?>"
                                     alt="<?php echo e($product->name); ?>"
                                     style="width:42px;height:42px;object-fit:cover;border-radius:var(--radius-sm);border:1px solid var(--border);flex-shrink:0;">
                            <?php else: ?>
                                <div style="width:42px;height:42px;background:var(--surface-2);border-radius:var(--radius-sm);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;flex-shrink:0;color:var(--text-muted);">
                                    <i class="bi bi-image"></i>
                                </div>
                            <?php endif; ?>
                            <div>
                                <div style="font-weight:600;"><?php echo e($product->name); ?></div>
                                <div class="subtext"><?php echo e(Str::limit($product->description, 45)); ?></div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge-pill badge-user"><?php echo e($product->category->name ?? 'Uncategorized'); ?></span>
                    </td>
                    <td>
                        <span style="font-size:0.838rem;color:var(--text-secondary);"><?php echo e($product->brand->name ?? '—'); ?></span>
                    </td>
                    <td><span class="mono">₱<?php echo e(number_format($product->price, 2)); ?></span></td>
                    <td>
                        <span class="mono" style="color:<?php echo e(($product->stock ?? 0) <= 5 ? 'var(--amber)' : 'inherit'); ?>">
                            <?php echo e($product->stock ?? 0); ?>

                        </span>
                    </td>
                    <td>
                        <?php if(($product->stock ?? 0) == 0): ?>
                            <span class="badge-pill badge-outofstock">Out of Stock</span>
                        <?php elseif(($product->stock ?? 0) <= 5): ?>
                            <span class="badge-pill badge-lowstock">Low Stock</span>
                        <?php else: ?>
                            <span class="badge-pill badge-instock">In Stock</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div style="display:flex;align-items:center;justify-content:flex-end;gap:0.375rem;">
                            <a href="<?php echo e(route('admin.products.edit', $product)); ?>" class="action-btn" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="<?php echo e(route('admin.products.destroy', $product)); ?>" method="POST"
                                  onsubmit="return confirm('Delete this product? This cannot be undone.')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="action-btn danger" title="Delete">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7">
                        <div class="empty-state">
                            <i class="bi bi-box-seam"></i>
                            <p>No products yet.</p>
                            <a href="<?php echo e(route('admin.products.create')); ?>" class="btn-primary-admin">
                                <i class="bi bi-plus-lg"></i> Add First Product
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php if($products->hasPages()): ?>
<div style="display:flex;justify-content:center;margin-top:1.25rem;">
    <?php echo e($products->links()); ?>

</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="admin-form-card">
    <div class="card-body p-0">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <?php if($product->photos->first()): ?>
                                    <img src="<?php echo e(asset('product_photos/' . $product->photos->first()->image_path)); ?>" 
                                         alt="<?php echo e($product->name); ?>" 
                                         class="me-3" 
                                         style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                                <?php else: ?>
                                    <div class="me-3 bg-light d-flex align-items-center justify-content-center" 
                                         style="width: 50px; height: 50px; border-radius: 6px;">
                                        <i class="fas fa-box text-muted"></i>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <div class="fw-semibold"><?php echo e($product->name); ?></div>
                                    <div class="text-muted small"><?php echo e(Str::limit($product->description, 50)); ?></div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark">
                                <?php echo e($product->category->name ?? 'Uncategorized'); ?>

                            </span>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark">
                                <?php echo e($product->brand->name ?? 'No Brand'); ?>

                            </span>
                        </td>
                        <td>
                            <span class="font-mono fw-semibold">$<?php echo e(number_format($product->price, 2)); ?></span>
                        </td>
                        <td>
                            <span class="font-mono <?php echo e(($product->stock ?? 0) <= 5 ? 'text-warning' : ''); ?>">
                                <?php echo e($product->stock ?? 0); ?>

                            </span>
                        </td>
                        <td>
                            <span class="badge-status <?php echo e(($product->stock ?? 0) > 0 ? 'badge-active' : 'badge-inactive'); ?>">
                                <?php echo e(($product->stock ?? 0) > 0 ? 'In Stock' : 'Out of Stock'); ?>

                            </span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="<?php echo e(route('admin.products.edit', $product)); ?>" 
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="<?php echo e(route('admin.products.destroy', $product)); ?>" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this product?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <i class="fas fa-box-open fa-2x text-muted mb-2"></i>
                            <p class="text-muted mb-0">No products found</p>
                            <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary mt-2">
                                <i class="fas fa-plus me-2"></i>Add Your First Product
                            </a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
<?php if($products->hasPages()): ?>
    <div class="d-flex justify-content-center mt-4">
        <?php echo e($products->links()); ?>

    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp_ITCP226\htdocs\SoulMates-Inc-Project\resources\views/admin/products/index.blade.php ENDPATH**/ ?>