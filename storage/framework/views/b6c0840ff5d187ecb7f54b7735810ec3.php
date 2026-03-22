<?php $__env->startSection('title', 'My Profile — SoleMates Footwear'); ?>

<?php $__env->startSection('head'); ?>
<style>
/* ════ PROFILE PAGE ════ */
.profile-page { padding: 2.5rem 0 5rem; }

/* Breadcrumb */
.profile-breadcrumb {
    background: var(--c-off-white);
    border-bottom: 1px solid var(--c-border);
    padding: 0.75rem 0;
}
.breadcrumb { margin: 0; font-size: 0.8rem; }
.breadcrumb-item a { color: var(--c-gold-dark); text-decoration: none; }
.breadcrumb-item a:hover { color: var(--c-black); }
.breadcrumb-item.active { color: var(--c-text-muted); }

/* Page title */
.profile-page-title {
    font-family: var(--font-display);
    font-size: clamp(1.6rem, 2.5vw, 2.1rem);
    font-weight: 900;
    color: var(--c-black);
    letter-spacing: -0.03em;
    margin-bottom: 0.25rem;
}
.profile-page-sub { font-size: 0.875rem; color: var(--c-text-muted); margin-bottom: 0; }

/* Sidebar user card */
.profile-id-card {
    background: var(--c-black);
    border-radius: 16px;
    padding: 2rem 1.75rem;
    position: relative;
    overflow: hidden;
    margin-bottom: 1.25rem;
}
.profile-id-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 80% 60% at 15% 110%, rgba(200,169,110,0.22) 0%, transparent 60%);
}
.profile-id-card::after {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(circle, rgba(255,255,255,0.05) 1px, transparent 1px);
    background-size: 22px 22px;
}
.profile-id-inner { position: relative; z-index: 2; text-align: center; }

.profile-avatar-wrap {
    position: relative;
    display: inline-block;
    margin-bottom: 1.1rem;
}
.profile-avatar-img {
    width: 96px;
    height: 96px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid var(--c-gold);
    display: block;
}
.profile-avatar-placeholder {
    width: 96px;
    height: 96px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--c-gold), var(--c-gold-dark));
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: var(--font-display);
    font-size: 2.2rem;
    font-weight: 900;
    color: var(--c-white);
    border: 3px solid rgba(255,255,255,0.2);
    text-transform: uppercase;
}
.profile-avatar-edit-btn {
    position: absolute;
    bottom: 2px;
    right: 2px;
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background: var(--c-gold);
    border: 2px solid var(--c-black);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    color: var(--c-black);
    font-size: 0.62rem;
    transition: background 0.18s ease;
}
.profile-avatar-edit-btn:hover { background: var(--c-gold-dark); }

.profile-id-name {
    font-family: var(--font-display);
    font-size: 1.05rem;
    font-weight: 800;
    color: var(--c-white);
    margin-bottom: 0.2rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.profile-id-email {
    font-size: 0.77rem;
    color: rgba(255,255,255,0.45);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Sidebar nav links */
.profile-side-nav { display: flex; flex-direction: column; gap: 0.3rem; }
.profile-side-link {
    display: flex;
    align-items: center;
    gap: 0.65rem;
    padding: 0.65rem 0.9rem;
    border-radius: 9px;
    font-size: 0.875rem;
    font-weight: 500;
    color: var(--c-text-soft);
    text-decoration: none;
    transition: background 0.15s ease, color 0.15s ease;
}
.profile-side-link i {
    width: 16px;
    text-align: center;
    color: var(--c-text-muted);
    font-size: 0.82rem;
    transition: color 0.15s ease;
}
.profile-side-link:hover,
.profile-side-link.active {
    background: var(--c-off-white);
    color: var(--c-black);
}
.profile-side-link:hover i,
.profile-side-link.active i { color: var(--c-gold-dark); }
.profile-side-link.active { font-weight: 700; }

/* Form section cards */
.pf-card {
    background: var(--c-white);
    border: 1.5px solid var(--c-border);
    border-radius: 14px;
    overflow: hidden;
    margin-bottom: 1.1rem;
}
.pf-card-header {
    padding: 1rem 1.5rem;
    background: var(--c-off-white);
    border-bottom: 1px solid var(--c-border);
    display: flex;
    align-items: center;
    gap: 0.65rem;
}
.pf-card-header-icon {
    width: 30px;
    height: 30px;
    border-radius: 7px;
    background: var(--c-black);
    color: var(--c-white);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    flex-shrink: 0;
}
.pf-card-header h5 {
    font-family: var(--font-display);
    font-size: 0.8rem;
    font-weight: 800;
    letter-spacing: 0.07em;
    text-transform: uppercase;
    margin: 0;
    color: var(--c-black);
}
.pf-card-body { padding: 1.5rem; }

/* Form fields */
.pf-label {
    display: block;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.07em;
    text-transform: uppercase;
    color: var(--c-text-mid);
    margin-bottom: 0.4rem;
}
.pf-input {
    width: 100%;
    padding: 11px 13px;
    background: var(--c-off-white);
    border: 1.5px solid var(--c-border);
    border-radius: 8px;
    font-family: var(--font-body);
    font-size: 0.9rem;
    color: var(--c-black);
    outline: none;
    transition: border-color 0.18s ease, background 0.18s ease, box-shadow 0.18s ease;
    -webkit-appearance: none;
}
.pf-input::placeholder { color: #C0BEB8; }
.pf-input:focus {
    border-color: var(--c-gold);
    background: var(--c-white);
    box-shadow: 0 0 0 3px rgba(200,169,110,0.12);
}
.pf-input.is-invalid { border-color: var(--c-error); background: #fff5f5; }
.pf-textarea { resize: vertical; min-height: 80px; }
.pf-error {
    font-size: 0.75rem;
    color: var(--c-error);
    margin-top: 0.28rem;
    display: flex;
    align-items: center;
    gap: 0.3rem;
}

/* Password section toggle */
.pf-pwd-toggle {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-bottom: 0;
}
.pf-pwd-hint {
    font-size: 0.78rem;
    color: var(--c-text-muted);
    margin-bottom: 1.1rem;
}
.btn-toggle-pwd-section {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 6px 14px;
    background: transparent;
    border: 1.5px solid var(--c-border);
    border-radius: 7px;
    font-family: var(--font-display);
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.04em;
    color: var(--c-text-mid);
    cursor: pointer;
    transition: border-color 0.18s ease, color 0.18s ease, background 0.18s ease;
}
.btn-toggle-pwd-section:hover {
    border-color: var(--c-black);
    color: var(--c-black);
    background: var(--c-off-white);
}
.btn-toggle-pwd-section.is-open { border-color: var(--c-error); color: var(--c-error); }
.btn-toggle-pwd-section.is-open:hover { background: #fff5f5; }

/* Action buttons */
.btn-save-profile {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 13px 28px;
    background: var(--c-black);
    color: var(--c-white);
    border: none;
    border-radius: 9px;
    font-family: var(--font-display);
    font-size: 0.82rem;
    font-weight: 800;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    cursor: pointer;
    transition: background 0.18s ease, transform 0.18s ease, box-shadow 0.18s ease;
}
.btn-save-profile:hover {
    background: var(--c-charcoal);
    transform: translateY(-2px);
    box-shadow: 0 10px 26px rgba(0,0,0,0.18);
}
.btn-cancel-profile {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 12px 22px;
    background: transparent;
    color: var(--c-text-mid);
    border: 1.5px solid var(--c-border);
    border-radius: 9px;
    font-family: var(--font-display);
    font-size: 0.8rem;
    font-weight: 700;
    text-decoration: none;
    transition: border-color 0.18s ease, color 0.18s ease, background 0.18s ease;
}
.btn-cancel-profile:hover {
    border-color: var(--c-black);
    color: var(--c-black);
    background: var(--c-off-white);
}

/* Photo upload area */
.pf-photo-upload {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    border: 1.5px dashed var(--c-border);
    border-radius: 10px;
    cursor: pointer;
    transition: border-color 0.18s ease, background 0.18s ease;
    background: var(--c-off-white);
}
.pf-photo-upload:hover { border-color: var(--c-gold); background: rgba(200,169,110,0.04); }
.pf-photo-upload-text h6 {
    font-family: var(--font-display);
    font-size: 0.85rem;
    font-weight: 700;
    color: var(--c-black);
    margin-bottom: 0.15rem;
}
.pf-photo-upload-text p { font-size: 0.74rem; color: var(--c-text-muted); margin: 0; }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="profile-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Profile</li>
            </ol>
        </nav>
    </div>
</div>

<div class="profile-page">
    <div class="container">

        
        <div class="mb-4">
            <h1 class="profile-page-title">My Profile</h1>
            <p class="profile-page-sub">Manage your account information and settings</p>
        </div>

        <form action="<?php echo e(route('profile.update')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="row g-4">

                
                <div class="col-lg-3">

                    
                    <div class="profile-id-card">
                        <div class="profile-id-inner">
                            <div class="profile-avatar-wrap" style="display:inline-block;margin-bottom:1.1rem;">
                                <?php if($user->profilePhotoUrl()): ?>
                                    <img id="profileAvatarImg"
                                         src="<?php echo e($user->profilePhotoUrl()); ?>"
                                         alt="Profile photo"
                                         class="profile-avatar-img">
                                <?php else: ?>
                                    <div class="profile-avatar-placeholder" id="profileAvatarPlaceholder">
                                        <?php echo e(strtoupper(substr($user->name, 0, 1))); ?>

                                    </div>
                                    <img id="profileAvatarImg"
                                         src=""
                                         alt="Profile photo preview"
                                         class="profile-avatar-img"
                                         style="display:none;">
                                <?php endif; ?>
                                <label for="profile_photo" class="profile-avatar-edit-btn" title="Change photo" aria-label="Change profile photo">
                                    <i class="fas fa-camera" aria-hidden="true"></i>
                                </label>
                            </div>
                            <div class="profile-id-name"><?php echo e($user->name); ?></div>
                            <div class="profile-id-email"><?php echo e($user->email); ?></div>
                        </div>
                    </div>

                    
                    <nav class="profile-side-nav" aria-label="Account navigation">
                        <a href="<?php echo e(route('profile.edit')); ?>" class="profile-side-link active">
                            <i class="fas fa-user-circle" aria-hidden="true"></i>
                            My Profile
                        </a>
                        <a href="<?php echo e(route('profile.orders')); ?>" class="profile-side-link">
                            <i class="fas fa-box" aria-hidden="true"></i>
                            My Orders
                        </a>
                        <a href="<?php echo e(route('cart.index')); ?>" class="profile-side-link">
                            <i class="fas fa-shopping-bag" aria-hidden="true"></i>
                            My Cart
                        </a>
                        <div style="height:1px;background:var(--c-border);margin:0.35rem 0;"></div>
                        <button type="button"
                                class="profile-side-link"
                                style="width:100%;text-align:left;border:none;background:none;cursor:pointer;color:var(--c-error);"
                                onclick="document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt" style="color:var(--c-error);" aria-hidden="true"></i>
                            Sign Out
                        </button>
                    </nav>

                </div>

                
                <div class="col-lg-9">

                    
                    <?php if(session('success')): ?>
                        <div style="display:flex;align-items:center;gap:0.6rem;padding:0.85rem 1.1rem;background:#f0fbf4;border:1.5px solid rgba(33,150,83,0.25);border-radius:10px;font-size:0.875rem;color:var(--c-success);margin-bottom:1.1rem;">
                            <i class="fas fa-check-circle" aria-hidden="true"></i>
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    
                    <input type="file"
                           name="profile_photo"
                           id="profile_photo"
                           accept="image/*"
                           class="d-none"
                           onchange="handlePhotoPreview(this)">

                    
                    <div class="pf-card">
                        <div class="pf-card-header">
                            <div class="pf-card-header-icon"><i class="fas fa-user" aria-hidden="true"></i></div>
                            <h5>Personal Information</h5>
                        </div>
                        <div class="pf-card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="pf-label" for="name">Full Name <span style="color:var(--c-error);">*</span></label>
                                    <input type="text"
                                           id="name"
                                           name="name"
                                           value="<?php echo e(old('name', $user->name)); ?>"
                                           class="pf-input <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>"
                                           placeholder="Your full name"
                                           required>
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="pf-error"><i class="fas fa-exclamation-triangle"></i> <?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6">
                                    <label class="pf-label" for="email">Email Address <span style="color:var(--c-error);">*</span></label>
                                    <input type="email"
                                           id="email"
                                           name="email"
                                           value="<?php echo e(old('email', $user->email)); ?>"
                                           class="pf-input <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>"
                                           placeholder="you@example.com"
                                           required>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="pf-error"><i class="fas fa-exclamation-triangle"></i> <?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6">
                                    <label class="pf-label" for="phone">Phone Number</label>
                                    <input type="tel"
                                           id="phone"
                                           name="phone"
                                           value="<?php echo e(old('phone', $user->phone)); ?>"
                                           class="pf-input <?php echo e($errors->has('phone') ? 'is-invalid' : ''); ?>"
                                           placeholder="+63 912 345 6789">
                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="pf-error"><i class="fas fa-exclamation-triangle"></i> <?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6">
                                    <label class="pf-label" for="address">Address</label>
                                    <input type="text"
                                           id="address"
                                           name="address"
                                           value="<?php echo e(old('address', $user->address)); ?>"
                                           class="pf-input <?php echo e($errors->has('address') ? 'is-invalid' : ''); ?>"
                                           placeholder="City, Province">
                                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="pf-error"><i class="fas fa-exclamation-triangle"></i> <?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="pf-card">
                        <div class="pf-card-header">
                            <div class="pf-card-header-icon"><i class="fas fa-image" aria-hidden="true"></i></div>
                            <h5>Profile Photo</h5>
                        </div>
                        <div class="pf-card-body">
                            <label for="profile_photo" class="pf-photo-upload">
                                <div style="width:48px;height:48px;border-radius:50%;background:var(--c-cream);border:1.5px solid var(--c-border);display:flex;align-items:center;justify-content:center;color:var(--c-text-muted);font-size:1.1rem;flex-shrink:0;">
                                    <i class="fas fa-camera" aria-hidden="true"></i>
                                </div>
                                <div class="pf-photo-upload-text">
                                    <h6>Upload a new photo</h6>
                                    <p id="photoFileName">JPG, PNG or GIF &nbsp;·&nbsp; Max 2 MB &nbsp;·&nbsp; Click to browse</p>
                                </div>
                            </label>
                            <?php $__errorArgs = ['profile_photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="pf-error mt-2"><i class="fas fa-exclamation-triangle"></i> <?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    
                    <div class="pf-card">
                        <div class="pf-card-header">
                            <div class="pf-card-header-icon"><i class="fas fa-lock" aria-hidden="true"></i></div>
                            <div class="pf-pwd-toggle">
                                <h5 style="margin:0;">Security &amp; Password</h5>
                                <button type="button"
                                        class="btn-toggle-pwd-section"
                                        id="pwdToggleBtn"
                                        onclick="togglePwdSection()">
                                    <i class="fas fa-key" aria-hidden="true"></i>
                                    Change Password
                                </button>
                            </div>
                        </div>
                        <div class="pf-card-body" id="pwdFields" style="display:none;">
                            <p class="pf-pwd-hint">Leave all fields blank to keep your current password.</p>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="pf-label" for="current_password">Current Password</label>
                                    <input type="password"
                                           id="current_password"
                                           name="current_password"
                                           class="pf-input <?php echo e($errors->has('current_password') ? 'is-invalid' : ''); ?>"
                                           placeholder="Enter your current password"
                                           autocomplete="current-password">
                                    <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="pf-error"><i class="fas fa-exclamation-triangle"></i> <?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6">
                                    <label class="pf-label" for="new_password">New Password</label>
                                    <input type="password"
                                           id="new_password"
                                           name="new_password"
                                           class="pf-input <?php echo e($errors->has('new_password') ? 'is-invalid' : ''); ?>"
                                           placeholder="Min. 8 characters"
                                           autocomplete="new-password">
                                    <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="pf-error"><i class="fas fa-exclamation-triangle"></i> <?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6">
                                    <label class="pf-label" for="new_password_confirmation">Confirm New Password</label>
                                    <input type="password"
                                           id="new_password_confirmation"
                                           name="new_password_confirmation"
                                           class="pf-input"
                                           placeholder="Repeat new password"
                                           autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="d-flex align-items-center gap-3 flex-wrap">
                        <button type="submit" class="btn-save-profile">
                            <i class="fas fa-check" aria-hidden="true"></i>
                            Save Changes
                        </button>
                        <a href="<?php echo e(route('home')); ?>" class="btn-cancel-profile">Cancel</a>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
/* Auto-open password section if server returned errors for password fields */
<?php if($errors->hasAny(['current_password', 'new_password'])): ?>
    document.addEventListener('DOMContentLoaded', function () { togglePwdSection(true); });
<?php endif; ?>

function togglePwdSection(forceOpen) {
    var fields = document.getElementById('pwdFields');
    var btn    = document.getElementById('pwdToggleBtn');
    var isOpen = forceOpen !== undefined ? !forceOpen : fields.style.display !== 'none';

    if (isOpen) {
        fields.style.display = 'none';
        btn.classList.remove('is-open');
        btn.innerHTML = '<i class="fas fa-key"></i> Change Password';
        document.getElementById('current_password').value = '';
        document.getElementById('new_password').value = '';
        document.getElementById('new_password_confirmation').value = '';
    } else {
        fields.style.display = 'block';
        btn.classList.add('is-open');
        btn.innerHTML = '<i class="fas fa-times"></i> Cancel';
    }
}

function handlePhotoPreview(input) {
    if (!input.files || !input.files[0]) return;
    var file   = input.files[0];
    var fileEl = document.getElementById('photoFileName');
    if (fileEl) fileEl.textContent = file.name + ' — selected';

    var reader = new FileReader();
    reader.onload = function (e) {
        var img         = document.getElementById('profileAvatarImg');
        var placeholder = document.getElementById('profileAvatarPlaceholder');
        if (img) { img.src = e.target.result; img.style.display = 'block'; }
        if (placeholder) placeholder.style.display = 'none';
    };
    reader.readAsDataURL(file);
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp_ITCP226\htdocs\SoulMates-Inc-Project\resources\views/profile/edit.blade.php ENDPATH**/ ?>