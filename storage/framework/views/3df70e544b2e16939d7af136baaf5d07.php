<?php $__env->startSection('page-title', 'Users'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="mb-1">User Management</h3>
        <p class="text-muted mb-0">Manage all registered users</p>
    </div>
    <div>
        <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-primary">
            <i class="fas fa-user-plus me-2"></i>Add New User
        </a>
    </div>
</div>

<!-- Users Table -->
<div class="admin-form-card">
    <div class="card-body p-0">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="admin-avatar me-3">
                                    <?php if($user->profile_photo): ?>
                                        <img src="<?php echo e(asset('storage/profile_photos/' . $user->profile_photo)); ?>" alt="">
                                    <?php else: ?>
                                        <?php echo e(strtoupper(substr($user->name, 0, 1))); ?>

                                    <?php endif; ?>
                                </div>
                                <div>
                                    <div class="fw-semibold"><?php echo e($user->name); ?></div>
                                    <?php if($user->phone): ?>
                                        <div class="text-muted small"><?php echo e($user->phone); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                        <td><?php echo e($user->email); ?></td>
                        <td>
                            <span class="badge-status badge-<?php echo e($user->role); ?>">
                                <?php echo e(ucfirst($user->role)); ?>

                            </span>
                        </td>
                        <td>
                            <span class="badge-status badge-<?php echo e($user->is_active ? 'active' : 'inactive'); ?>">
                                <?php echo e($user->is_active ? 'Active' : 'Inactive'); ?>

                            </span>
                        </td>
                        <td>
                            <div><?php echo e($user->created_at->format('M d, Y')); ?></div>
                            <div class="text-muted small"><?php echo e($user->created_at->diffForHumans()); ?></div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="<?php echo e(route('admin.users.edit', $user)); ?>" 
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                <?php if($user->is_active): ?>
                                    <form action="<?php echo e(route('admin.users.deactivate', $user)); ?>" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to deactivate this user?')">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" 
                                                class="btn btn-sm btn-outline-warning"
                                                <?php echo e($user->id === auth()->id() ? 'disabled' : ''); ?>>
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    </form>
                                <?php else: ?>
                                    <form action="<?php echo e(route('admin.users.activate', $user)); ?>" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to activate this user?')">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-sm btn-outline-success">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-users fa-2x text-muted mb-2"></i>
                            <p class="text-muted mb-0">No users found</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
<?php if($users->hasPages()): ?>
    <div class="d-flex justify-content-center mt-4">
        <?php echo e($users->links()); ?>

    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp_system\htdocs\SoulMates-Inc-Project\resources\views/admin/users/index.blade.php ENDPATH**/ ?>