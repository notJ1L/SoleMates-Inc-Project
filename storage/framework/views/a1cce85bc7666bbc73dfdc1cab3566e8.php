<?php $__env->startSection('page-title', 'Edit User'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-8">
        <div class="admin-form-card">
            <div class="card-head">
                <h5 class="mb-0">
                    <i class="bi bi-person-gear me-2"></i>Edit User: <?php echo e($user->name); ?>

                </h5>
            </div>
            <div class="card-body">
                <form method="POST" action="<?php echo e(route('admin.users.update', $user)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" 
                                   name="name" 
                                   class="form-control" 
                                   value="<?php echo e(old('name', $user->name)); ?>" 
                                   required>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" 
                                   name="email" 
                                   class="form-control" 
                                   value="<?php echo e(old('email', $user->email)); ?>" 
                                   required>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" 
                                   name="phone" 
                                   class="form-control" 
                                   value="<?php echo e(old('phone', $user->phone)); ?>">
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select" required>
                                <option value="user" <?php echo e(old('role', $user->role) == 'user' ? 'selected' : ''); ?>>
                                    User
                                </option>
                                <option value="admin" <?php echo e(old('role', $user->role) == 'admin' ? 'selected' : ''); ?>>
                                    Administrator
                                </option>
                            </select>
                            <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea name="address" 
                                  class="form-control" 
                                  rows="3"><?php echo e(old('address', $user->address)); ?></textarea>
                        <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label">Account Status</label>
                        <div class="form-check">
                            <input type="radio" 
                                   name="is_active" 
                                   value="1" 
                                   id="active" 
                                   <?php echo e(old('is_active', $user->is_active) ? 'checked' : ''); ?>>
                            <label class="form-check-label" for="active">
                                Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="radio" 
                                   name="is_active" 
                                   value="0" 
                                   id="inactive" 
                                   <?php echo e(!old('is_active', $user->is_active) ? 'checked' : ''); ?>>
                            <label class="form-check-label" for="inactive">
                                Inactive
                            </label>
                        </div>
                        <?php $__errorArgs = ['is_active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update User
                        </button>
                        <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i>Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="admin-form-card">
            <div class="card-head">
                <h5 class="mb-0">
                    <i class="bi bi-info-circle me-2"></i>User Information
                </h5>
            </div>
            <div class="card-body">
                <div class="text-center mb-3">
                    <div class="admin-avatar mx-auto" style="width: 80px; height: 80px;">
                        <?php if($user->profile_photo): ?>
                            <img src="<?php echo e(asset('storage/profile_photos/' . $user->profile_photo)); ?>" alt="">
                        <?php else: ?>
                            <?php echo e(strtoupper(substr($user->name, 0, 1))); ?>

                        <?php endif; ?>
                    </div>
                </div>
                
                <table class="table table-sm">
                    <tr>
                        <td class="text-muted" style="width: 100px;">User ID:</td>
                        <td class="font-mono">#<?php echo e($user->id); ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Registered:</td>
                        <td><?php echo e($user->created_at->format('M d, Y')); ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Last Updated:</td>
                        <td><?php echo e($user->updated_at->diffForHumans()); ?></td>
                    </tr>
                    <?php if($user->orders->count() > 0): ?>
                    <tr>
                        <td class="text-muted">Total Orders:</td>
                        <td><?php echo e($user->orders->count()); ?></td>
                    </tr>
                    <?php endif; ?>
                </table>
                
                <?php if($user->id === auth()->id()): ?>
                <div class="alert alert-warning mt-3">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Note:</strong> You cannot deactivate your own account.
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\SoulMates-Inc-Project\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>