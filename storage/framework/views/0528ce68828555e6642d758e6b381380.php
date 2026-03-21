<?php $__env->startSection('title', 'Sign In — SoleMates Footwear'); ?>

<?php $__env->startSection('head'); ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
  /* ════════════════════════════════════════════
     LAYOUT RESET — hide nav/footer on auth pages
  ════════════════════════════════════════════ */
  nav.navbar,
  footer { display: none !important; }
  .main-content { margin-top: 0 !important; }

  /* ════════════════════════════════════════════
     CSS CUSTOM PROPERTIES
  ════════════════════════════════════════════ */
  :root {
    --c-black:       #0A0A0A;
    --c-charcoal:    #1A1A1A;
    --c-dark-panel:  #111111;
    --c-gold:        #C8A96E;
    --c-gold-hover:  #D4B87A;
    --c-gold-dark:   #A8893E;
    --c-gold-glow:   rgba(200, 169, 110, 0.18);
    --c-white:       #FFFFFF;
    --c-off-white:   #F9F8F5;
    --c-light:       #F2F1EE;
    --c-border:      #E4E2DC;
    --c-border-dark: #D0CEC6;
    --c-text:        #0A0A0A;
    --c-text-mid:    #3A3A3A;
    --c-text-soft:   #6A6A6A;
    --c-text-muted:  #999994;
    --c-error:       #C0392B;
    --c-error-bg:    #FFF5F5;
    --c-success:     #219653;

    --f-head:  'Montserrat', sans-serif;
    --f-body:  'Inter', sans-serif;

    --r-sm:    8px;
    --r-md:    12px;
    --r-lg:    18px;

    --ease:    cubic-bezier(0.4, 0, 0.2, 1);
    --t-fast:  0.18s var(--ease);
    --t-base:  0.26s var(--ease);
    --t-slow:  0.4s  var(--ease);
  }

  /* ════════════════════════════════════════════
     BASE
  ════════════════════════════════════════════ */
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    font-family: var(--f-body);
    background: var(--c-off-white);
    color: var(--c-text);
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }

  /* ════════════════════════════════════════════
     AUTH PAGE WRAPPER
  ════════════════════════════════════════════ */
  .auth-page {
    min-height: 100vh;
    display: flex;
  }

  /* ════════════════════════════════════════════
     LEFT — VISUAL PANEL
  ════════════════════════════════════════════ */
  .auth-visual {
    flex: 1;
    min-width: 0;
    background: var(--c-dark-panel);
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    padding: 3rem;
  }

  /* Radial glow overlays */
  .auth-visual::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
      radial-gradient(ellipse 70% 55% at 10% 105%, rgba(200, 169, 110, 0.22) 0%, transparent 55%),
      radial-gradient(ellipse 55% 45% at 90% -5%,  rgba(200, 169, 110, 0.10) 0%, transparent 55%);
    pointer-events: none;
  }

  /* Dot grid texture */
  .auth-visual::after {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(circle, rgba(255,255,255,0.055) 1px, transparent 1px);
    background-size: 26px 26px;
    pointer-events: none;
  }

  .auth-visual-inner {
    position: relative;
    z-index: 2;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  /* ── Brand ── */
  .auth-brand {
    display: inline-flex;
    align-items: center;
    gap: 11px;
    text-decoration: none;
    user-select: none;
  }

  .auth-brand-mark {
    width: 42px;
    height: 42px;
    background: var(--c-gold);
    border-radius: 11px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--c-black);
    font-size: 1.05rem;
    flex-shrink: 0;
    transition: background var(--t-base);
  }

  .auth-brand:hover .auth-brand-mark { background: var(--c-gold-hover); }

  .auth-brand-name {
    font-family: var(--f-head);
    font-weight: 800;
    font-size: 1.1rem;
    color: var(--c-white);
    letter-spacing: 0.025em;
  }

  .auth-brand-name em {
    font-style: normal;
    color: var(--c-gold);
  }

  /* ── Headline block ── */
  .auth-visual-body {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 2.5rem 0;
  }

  .auth-visual-kicker {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: var(--c-gold);
    margin-bottom: 1.25rem;
  }

  .auth-visual-kicker::before {
    content: '';
    display: block;
    width: 24px;
    height: 1.5px;
    background: var(--c-gold);
    border-radius: 2px;
  }

  .auth-visual-headline {
    font-family: var(--f-head);
    font-size: clamp(2.4rem, 3.8vw, 3.6rem);
    font-weight: 900;
    line-height: 1.05;
    color: var(--c-white);
    letter-spacing: -0.03em;
    margin-bottom: 1.5rem;
  }

  .auth-visual-headline .line-gold {
    display: block;
    color: var(--c-gold);
    -webkit-text-stroke: 0px;
  }

  .auth-visual-subtext {
    font-size: 0.92rem;
    line-height: 1.75;
    color: rgba(255, 255, 255, 0.48);
    max-width: 330px;
    margin-bottom: 2.25rem;
  }

  /* ── Feature pills ── */
  .auth-features {
    display: flex;
    flex-direction: column;
    gap: 0.65rem;
  }

  .auth-feature-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 0.84rem;
    color: rgba(255, 255, 255, 0.58);
  }

  .auth-feature-dot {
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background: rgba(200, 169, 110, 0.15);
    border: 1px solid rgba(200, 169, 110, 0.35);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    color: var(--c-gold);
    font-size: 0.6rem;
  }

  /* ── Footer ── */
  .auth-visual-foot {
    font-size: 0.74rem;
    color: rgba(255, 255, 255, 0.2);
    letter-spacing: 0.02em;
  }

  /* ════════════════════════════════════════════
     RIGHT — FORM PANEL
  ════════════════════════════════════════════ */
  .auth-form-panel {
    width: 490px;
    min-width: 490px;
    background: var(--c-white);
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 4rem 3.5rem;
    overflow-y: auto;
    box-shadow: -24px 0 80px rgba(0, 0, 0, 0.08);
    animation: panelSlideIn 0.45s var(--ease) both;
  }

  @keyframes panelSlideIn {
    from { opacity: 0; transform: translateX(28px); }
    to   { opacity: 1; transform: translateX(0); }
  }

  /* ── Header ── */
  .auth-form-header { margin-bottom: 2.25rem; }

  .auth-form-eyebrow {
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.16em;
    text-transform: uppercase;
    color: var(--c-gold-dark);
    margin-bottom: 0.55rem;
    display: flex;
    align-items: center;
    gap: 7px;
  }

  .auth-form-eyebrow::after {
    content: '';
    display: block;
    width: 20px;
    height: 1.5px;
    background: var(--c-gold);
    border-radius: 2px;
  }

  .auth-form-title {
    font-family: var(--f-head);
    font-size: 2.05rem;
    font-weight: 900;
    color: var(--c-text);
    letter-spacing: -0.035em;
    line-height: 1.1;
    margin-bottom: 0.45rem;
  }

  .auth-form-subtitle {
    font-size: 0.88rem;
    color: var(--c-text-muted);
    line-height: 1.5;
  }



  /* ── Form Fields ── */
  .form-field {
    margin-bottom: 1.15rem;
  }

  .form-field > label {
    display: block;
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 0.07em;
    text-transform: uppercase;
    color: var(--c-text-mid);
    margin-bottom: 0.45rem;
  }

  .field-wrap {
    position: relative;
    display: flex;
    align-items: center;
  }

  .field-icon {
    position: absolute;
    left: 13px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--c-text-muted);
    font-size: 0.85rem;
    pointer-events: none;
    transition: color var(--t-fast);
    z-index: 1;
  }

  .field-wrap:focus-within .field-icon { color: var(--c-gold-dark); }

  .field-wrap input {
    width: 100%;
    padding: 12.5px 42px 12.5px 38px;
    background: var(--c-off-white);
    border: 1.5px solid var(--c-border);
    border-radius: var(--r-sm);
    font-family: var(--f-body);
    font-size: 0.9rem;
    color: var(--c-text);
    transition: border-color var(--t-fast), background var(--t-fast), box-shadow var(--t-fast);
    outline: none;
    -webkit-appearance: none;
  }

  .field-wrap input::placeholder { color: #C0BEB8; }

  .field-wrap input:focus {
    background: var(--c-white);
    border-color: var(--c-gold);
    box-shadow: 0 0 0 3.5px rgba(200, 169, 110, 0.13);
  }

  .field-wrap input.is-invalid {
    border-color: var(--c-error);
    background: var(--c-error-bg);
  }

  .field-wrap input.is-invalid:focus {
    box-shadow: 0 0 0 3.5px rgba(192, 57, 43, 0.1);
  }

  .field-error {
    font-size: 0.76rem;
    color: var(--c-error);
    margin-top: 0.3rem;
    display: flex;
    align-items: flex-start;
    gap: 0.35rem;
    line-height: 1.4;
  }

  .field-error i { font-size: 0.65rem; margin-top: 2px; flex-shrink: 0; }

  /* ── Password Toggle ── */
  .btn-eye {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    padding: 4px;
    cursor: pointer;
    color: var(--c-text-muted);
    font-size: 0.85rem;
    line-height: 1;
    display: flex;
    align-items: center;
    transition: color var(--t-fast);
    z-index: 1;
  }

  .btn-eye:hover { color: var(--c-gold-dark); }

  /* ── Row: Remember + Forgot ── */
  .form-meta-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1.75rem;
    gap: 0.5rem;
  }

  .custom-check {
    display: flex;
    align-items: center;
    gap: 0.45rem;
    cursor: pointer;
    user-select: none;
  }

  .custom-check input[type="checkbox"] {
    width: 15px;
    height: 15px;
    accent-color: var(--c-gold-dark);
    cursor: pointer;
    flex-shrink: 0;
  }

  .custom-check span {
    font-size: 0.83rem;
    color: var(--c-text-soft);
  }

  .link-accent {
    font-size: 0.83rem;
    font-weight: 600;
    color: var(--c-gold-dark);
    text-decoration: none;
    transition: color var(--t-fast);
  }

  .link-accent:hover { color: var(--c-gold); }

  /* ── Primary CTA Button ── */
  .btn-primary-cta {
    width: 100%;
    padding: 14px 20px;
    background: var(--c-black);
    color: var(--c-white);
    border: none;
    border-radius: var(--r-sm);
    font-family: var(--f-head);
    font-size: 0.85rem;
    font-weight: 800;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.55rem;
    transition: background var(--t-fast), transform var(--t-base), box-shadow var(--t-base);
    position: relative;
    overflow: hidden;
  }

  .btn-primary-cta::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.06) 0%, transparent 60%);
    pointer-events: none;
  }

  .btn-primary-cta:hover {
    background: var(--c-charcoal);
    transform: translateY(-2px);
    box-shadow: 0 14px 34px rgba(0, 0, 0, 0.22);
  }

  .btn-primary-cta:active { transform: translateY(0); box-shadow: none; }

  /* ── Switch Link ── */
  .auth-switch {
    text-align: center;
    margin-top: 1.5rem;
    font-size: 0.85rem;
    color: var(--c-text-muted);
  }

  .auth-switch a {
    color: var(--c-text);
    font-weight: 700;
    text-decoration: none;
    border-bottom: 2px solid var(--c-gold);
    padding-bottom: 1px;
    transition: color var(--t-fast), border-color var(--t-fast);
  }

  .auth-switch a:hover { color: var(--c-gold-dark); border-color: var(--c-gold-dark); }

  /* ── Flash alert ── */
  .auth-alert {
    padding: 10px 14px;
    border-radius: var(--r-sm);
    font-size: 0.83rem;
    margin-bottom: 1.25rem;
    display: flex;
    align-items: flex-start;
    gap: 0.5rem;
    line-height: 1.4;
  }

  .auth-alert-error {
    background: var(--c-error-bg);
    border: 1px solid rgba(192,57,43,0.2);
    color: var(--c-error);
  }

  /* ════════════════════════════════════════════
     RESPONSIVE
  ════════════════════════════════════════════ */
  @media (max-width: 960px) {
    .auth-page { flex-direction: column; }

    .auth-visual {
      padding: 2.25rem 2rem;
      min-height: 260px;
    }

    .auth-visual-body { padding: 1.25rem 0; }

    .auth-visual-headline {
      font-size: 2rem;
      margin-bottom: 0;
    }

    .auth-visual-subtext,
    .auth-features { display: none; }

    .auth-visual-kicker { margin-bottom: 0.75rem; }

    .auth-form-panel {
      width: 100%;
      min-width: 0;
      padding: 2.75rem 2rem;
      box-shadow: none;
      animation: panelFadeIn 0.45s var(--ease) both;
    }

    @keyframes panelFadeIn {
      from { opacity: 0; transform: translateY(18px); }
      to   { opacity: 1; transform: translateY(0); }
    }
  }

  @media (max-width: 540px) {
    .auth-visual { min-height: 210px; padding: 1.75rem 1.5rem; }
    .auth-form-panel { padding: 2.25rem 1.5rem; }
    .auth-form-title { font-size: 1.7rem; }
    .form-meta-row { flex-direction: column; align-items: flex-start; gap: 0.75rem; }
  }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="auth-page">

  
  <aside class="auth-visual">
    <div class="auth-visual-inner">

      
      <a href="<?php echo e(route('home')); ?>" class="auth-brand">
        <div class="auth-brand-mark">
          <i class="fas fa-shoe-prints"></i>
        </div>
        <span class="auth-brand-name">Sole<em>Mates</em></span>
      </a>

      
      <div class="auth-visual-body">
        <span class="auth-visual-kicker">Premium Footwear</span>

        <h1 class="auth-visual-headline">
          Step Into
          <span class="line-gold">Your Style.</span>
        </h1>

        <p class="auth-visual-subtext">
          Discover a curated collection of premium footwear crafted for every
          occasion — from city streets to open trails. Your perfect pair is
          waiting.
        </p>

        <ul class="auth-features" role="list">
          <li class="auth-feature-item">
            <span class="auth-feature-dot"><i class="fas fa-check"></i></span>
            Curated premium collections
          </li>
          <li class="auth-feature-item">
            <span class="auth-feature-dot"><i class="fas fa-check"></i></span>
            Free shipping on orders over ₱1,500
          </li>
          <li class="auth-feature-item">
            <span class="auth-feature-dot"><i class="fas fa-check"></i></span>
            Exclusive member-only deals
          </li>
          <li class="auth-feature-item">
            <span class="auth-feature-dot"><i class="fas fa-check"></i></span>
            Hassle-free 30-day returns
          </li>
        </ul>
      </div>

      <p class="auth-visual-foot">
        &copy; <?php echo e(date('Y')); ?> SoleMates Footwear &nbsp;·&nbsp; All rights reserved
      </p>

    </div>
  </aside>

  
  <section class="auth-form-panel" aria-label="Sign in form">

    <header class="auth-form-header">
      <p class="auth-form-eyebrow">Welcome back</p>
      <h2 class="auth-form-title">Sign In</h2>
      <p class="auth-form-subtitle">Enter your credentials to access your account</p>
    </header>

    
    <?php if($errors->any() && !$errors->has('email') && !$errors->has('password')): ?>
      <div class="auth-alert auth-alert-error" role="alert">
        <i class="fas fa-exclamation-circle" style="margin-top:1px;flex-shrink:0;"></i>
        <span><?php echo e($errors->first()); ?></span>
      </div>
    <?php endif; ?>

    
    <form method="POST" action="<?php echo e(route('login')); ?>" novalidate>
      <?php echo csrf_field(); ?>

      
      <div class="form-field">
        <label for="email">Email Address</label>
        <div class="field-wrap">
          <i class="fas fa-envelope field-icon" aria-hidden="true"></i>
          <input
            type="email"
            id="email"
            name="email"
            value="<?php echo e(old('email')); ?>"
            placeholder="you@example.com"
            autocomplete="email"
            autofocus
            class="<?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>"
            aria-describedby="<?php echo e($errors->has('email') ? 'email-error' : ''); ?>"
          >
        </div>
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <p class="field-error" id="email-error" role="alert">
            <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
            <?php echo e($message); ?>

          </p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      
      <div class="form-field">
        <label for="password">Password</label>
        <div class="field-wrap">
          <i class="fas fa-lock field-icon" aria-hidden="true"></i>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Enter your password"
            autocomplete="current-password"
            class="<?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>"
            aria-describedby="<?php echo e($errors->has('password') ? 'pwd-error' : ''); ?>"
          >
          <button
            type="button"
            class="btn-eye"
            id="togglePwdBtn"
            aria-label="Show or hide password"
            onclick="togglePassword('password', this)"
          >
            <i class="fas fa-eye" aria-hidden="true"></i>
          </button>
        </div>
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <p class="field-error" id="pwd-error" role="alert">
            <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
            <?php echo e($message); ?>

          </p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      
      <div class="form-meta-row">
        <label class="custom-check">
          <input
            type="checkbox"
            name="remember"
            id="remember"
            <?php echo e(old('remember') ? 'checked' : ''); ?>

          >
          <span>Keep me signed in</span>
        </label>

        <a href="<?php echo e(route('password.request')); ?>" class="link-accent">
          Forgot password?
        </a>
      </div>

      
      <button type="submit" class="btn-primary-cta">
        <i class="fas fa-arrow-right-to-bracket" aria-hidden="true"></i>
        Sign In
      </button>
    </form>

    <p class="auth-switch">
      New to SoleMates?
      <a href="<?php echo e(route('register')); ?>">Create a free account</a>
    </p>

  </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
  /**
   * Toggle password field visibility.
   * @param {string} fieldId  - The input element's id
   * @param {HTMLElement} btn - The toggle button element
   */
  function togglePassword(fieldId, btn) {
    const field = document.getElementById(fieldId);
    const icon  = btn.querySelector('i');

    if (!field) return;

    const isHidden = field.type === 'password';
    field.type     = isHidden ? 'text' : 'password';

    icon.classList.toggle('fa-eye',       !isHidden);
    icon.classList.toggle('fa-eye-slash',  isHidden);

    btn.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\SoulMates-Inc-Project\resources\views/auth/login.blade.php ENDPATH**/ ?>