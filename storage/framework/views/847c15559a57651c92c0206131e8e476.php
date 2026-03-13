

<?php $__env->startSection('page-title', 'Users'); ?>

<?php $__env->startSection('topbar-actions'); ?>
    <a href="<?php echo e(route('admin.users.create')); ?>" class="btn-primary-admin">
        <i class="bi bi-person-plus"></i> New User
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="panel">
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Joined</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:0.75rem;">
                            <div class="user-avatar">
                                <?php if($user->profile_photo): ?>
                                    <img src="<?php echo e(asset('storage/profile_photos/' . $user->profile_photo)); ?>" alt="">
                                <?php else: ?>
                                    <?php echo e(strtoupper(substr($user->name, 0, 1))); ?>

                                <?php endif; ?>
                            </div>
                            <div>
                                <div style="font-weight:600;"><?php echo e($user->name); ?></div>
                                <?php if($user->phone): ?>
                                    <div class="subtext"><?php echo e($user->phone); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </td>
                    <td style="font-size:0.838rem;color:var(--text-secondary);"><?php echo e($user->email); ?></td>
                    <td><span class="badge-pill badge-<?php echo e($user->role); ?>"><?php echo e(ucfirst($user->role)); ?></span></td>
                    <td><span class="badge-pill badge-<?php echo e($user->is_active ? 'active' : 'inactive'); ?>"><?php echo e($user->is_active ? 'Active' : 'Inactive'); ?></span></td>
                    <td>
                        <div style="font-size:0.813rem;"><?php echo e($user->created_at->format('M d, Y')); ?></div>
                        <div class="subtext"><?php echo e($user->created_at->diffForHumans()); ?></div>
                    </td>
                    <td>
                        <div style="display:flex;align-items:center;justify-content:flex-end;gap:0.375rem;">
                            <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="action-btn" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <?php if($user->is_active): ?>
                                <form action="<?php echo e(route('admin.users.deactivate', $user)); ?>" method="POST" class="d-inline"
                                      onsubmit="return confirm('Deactivate this user?')">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="action-btn warning" title="Deactivate"
                                            <?php echo e($user->id === auth()->id() ? 'disabled' : ''); ?>>
                                        <i class="bi bi-person-dash"></i>
                                    </button>
                                </form>
                            <?php else: ?>
                                <form action="<?php echo e(route('admin.users.activate', $user)); ?>" method="POST" class="d-inline"
                                      onsubmit="return confirm('Activate this user?')">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="action-btn success" title="Activate">
                                        <i class="bi bi-person-check"></i>
                                    </button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6">
                        <div class="empty-state">
                            <i class="bi bi-people"></i>
                            <p>No users found.</p>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php if($users->hasPages()): ?>
<div style="display:flex;justify-content:center;margin-top:1.25rem;">
    <?php echo e($users->links()); ?>

</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp_ITCP226\htdocs\SoulMates-Inc-Project\resources\views/admin/users/index.blade.php ENDPATH**/ ?>