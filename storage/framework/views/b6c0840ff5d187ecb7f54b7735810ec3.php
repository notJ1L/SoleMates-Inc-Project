

<?php $__env->startSection('title', 'My Profile — SoulMates Inc.'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5" style="max-width: 680px;">
    <h2 class="mb-4" style="font-family: var(--font-display); font-weight: 800;">My Profile</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('profile.update')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-body p-4">
                <h5 class="mb-4">Profile Photo</h5>
                <div class="d-flex flex-column align-items-center text-center">
                    <?php if($user->profilePhotoUrl()): ?>
                        <img id="profilePreview"
                             src="<?php echo e($user->profilePhotoUrl()); ?>"
                             alt="Profile Photo"
                             style="width:220px; height:220px; border-radius:50%; object-fit:cover; border:4px solid var(--accent); box-shadow:0 8px 18px rgba(0,0,0,0.08);">
                    <?php else: ?>
                        <div id="profilePlaceholder"
                             style="width:220px; height:220px; border-radius:50%; background:#f3f0ea; border:2px dashed #d3c8b7; display:flex; align-items:center; justify-content:center; color:#746754; font-weight:700; letter-spacing:0.06em;">
                            PHOTO
                        </div>
                        <img id="profilePreview"
                             src=""
                             alt="Profile Photo"
                             style="display:none; width:220px; height:220px; border-radius:50%; object-fit:cover; border:4px solid var(--accent); box-shadow:0 8px 18px rgba(0,0,0,0.08);">
                    <?php endif; ?>

                    <input type="file" name="profile_photo" id="profile_photo"
                           class="d-none <?php $__errorArgs = ['profile_photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           accept="image/*">

                    <label for="profile_photo" class="btn btn-outline-primary mt-4 px-4 py-2">
                        Change Photo
                    </label>

                    <small id="profileFileName" class="text-muted mt-2">JPG, PNG, GIF - max 2MB</small>
                    <?php $__errorArgs = ['profile_photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-2"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>

        
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-body p-4">
                <h5 class="mb-3">Personal Information</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Full Name</label>
                    <input type="text" name="name" value="<?php echo e(old('name', auth()->user()->name)); ?>"
                           class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email Address</label>
                    <input type="email" name="email" value="<?php echo e(old('email', auth()->user()->email)); ?>"
                           class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Phone Number</label>
                    <input type="text" name="phone" value="<?php echo e(old('phone', auth()->user()->phone)); ?>"
                           class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-0">
                    <label class="form-label fw-semibold">Address</label>
                    <textarea name="address" rows="2"
                              class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('address', auth()->user()->address)); ?></textarea>
                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>

        
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <h5 class="mb-0">Change Password</h5>
                    <button type="button" id="togglePasswordBtn" class="btn btn-sm btn-outline-secondary"
                            onclick="togglePasswordFields()">Change Password</button>
                </div>

                <div id="passwordFields" style="display: none;" class="mt-3">
                    <small class="text-muted d-block mb-3">Leave blank to keep your current password.</small>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Current Password</label>
                        <input type="password" name="current_password" id="current_password"
                               class="form-control <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">New Password</label>
                        <input type="password" name="new_password" id="new_password"
                               class="form-control <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-semibold">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" class="form-control">
                    </div>
                </div>
            </div>
        </div>

                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
        <a href="<?php echo e(route('home')); ?>" class="btn btn-outline-secondary ms-2">Cancel</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    <?php if($errors->hasAny(['current_password', 'new_password'])): ?>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('passwordFields').style.display = 'block';
            var btn = document.getElementById('togglePasswordBtn');
            btn.textContent = 'Cancel';
            btn.classList.replace('btn-outline-secondary', 'btn-outline-danger');
        });
    <?php endif; ?>

    function togglePasswordFields() {
        const fields = document.getElementById('passwordFields');
        const btn = document.getElementById('togglePasswordBtn');
        if (fields.style.display === 'none') {
            fields.style.display = 'block';
            btn.textContent = 'Cancel';
            btn.classList.replace('btn-outline-secondary', 'btn-outline-danger');
        } else {
            fields.style.display = 'none';
            btn.textContent = 'Change Password';
            btn.classList.replace('btn-outline-danger', 'btn-outline-secondary');
            document.getElementById('current_password').value = '';
            document.getElementById('new_password').value = '';
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('profile_photo');
        const preview = document.getElementById('profilePreview');
        const placeholder = document.getElementById('profilePlaceholder');
        const fileName = document.getElementById('profileFileName');

        if (!input || !preview || !fileName) {
            return;
        }

        input.addEventListener('change', function () {
            const file = this.files && this.files[0] ? this.files[0] : null;
            if (!file) {
                fileName.textContent = 'JPG, PNG, GIF - max 2MB';
                return;
            }

            fileName.textContent = file.name;
            const objectUrl = URL.createObjectURL(file);
            preview.src = objectUrl;
            preview.style.display = 'block';
            if (placeholder) {
                placeholder.style.display = 'none';
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp_ITCP226\htdocs\SoulMates-Inc-Project\resources\views/profile/edit.blade.php ENDPATH**/ ?>