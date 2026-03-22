<?php $__env->startSection('title', 'Forgot Password — SoleMates Footwear'); ?>

<?php $__env->startSection('head'); ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
  /* ── Hide nav/footer on auth pages ── */
  nav.sm-nav,
  footer.sm-footer { display: none !important; }
  .main-content { margin-top: 0 !important; }

  :root {
    --c-black:      #0A0A0A;
    --c-charcoal:   #1A1A1A;
    --c-dark-panel: #111111;
    --c-gold:       #C8A96E;
    --c-gold-hover: #D4B87A;
    --c-gold-dark:  #A8893E;
    --c-white:      #FFFFFF;
    --c-off-white:  #F9F8F5;
    --c-border:     #E4E2DC;
    --c-text:       #0A0A0A;
    --c-text-mid:   #3A3A3A;
    --c-text-muted: #999994;
    --c-error:      #C0392B;
    --c-error-bg:   #FFF5F5;
    --c-success:    #219653;
    --f-head: 'Montserrat', sans-serif;
    --f-body: 'Inter', sans-serif;
    --ease:   cubic-bezier(0.4, 0, 0.2, 1);
  }

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    font-family: var(--f-body);
    -webkit-font-smoothing: antialiased;
  }

  /* ── Wrapper ── */
  .auth-page {
    min-height: 100vh;
    display: flex;
  }

  /* ════ LEFT — Visual Panel ════ */
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

  .auth-visual::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
      radial-gradient(ellipse 70% 55% at 10% 105%, rgba(200,169,110,0.22) 0%, transparent 55%),
      radial-gradient(ellipse 55% 45% at 90% -5%,  rgba(200,169,110,0.10) 0%, transparent 55%);
    pointer-events: none;
  }

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

  /* Brand */
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
    transition: background 0.2s var(--ease);
  }

  .auth-brand:hover .auth-brand-mark { background: var(--c-gold-hover); }

  .auth-brand-name {
    font-family: var(--f-head);
    font-weight: 800;
    font-size: 1.1rem;
    color: var(--c-white);
    letter-spacing: 0.025em;
  }

  .auth-brand-name em { font-style: normal; color: var(--c-gold); }

  /* Visual body */
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
    font-size: clamp(2.2rem, 3.6vw, 3.3rem);
    font-weight: 900;
    line-height: 1.06;
    color: var(--c-white);
    letter-spacing: -0.03em;
    margin-bottom: 1.5rem;
  }

  .auth-visual-headline .line-gold {
    display: block;
    color: var(--c-gold);
  }

  .auth-visual-subtext {
    font-size: 0.92rem;
    line-height: 1.75;
    color: rgba(255,255,255,0.48);
    max-width: 330px;
    margin-bottom: 2.25rem;
  }

  /* Steps list */
  .auth-steps {
    display: flex;
    flex-direction: column;
    gap: 0.85rem;
    list-style: none;
    padding: 0;
  }

  .auth-step-item {
    display: flex;
    align-items: flex-start;
    gap: 0.85rem;
  }

  .auth-step-num {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background: rgba(200,169,110,0.15);
    border: 1px solid rgba(200,169,110,0.35);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-family: var(--f-head);
    font-size: 0.65rem;
    font-weight: 900;
    color: var(--c-gold);
    margin-top: 1px;
  }

  .auth-step-text {
    font-size: 0.84rem;
    color: rgba(255,255,255,0.58);
    line-height: 1.5;
  }

  .auth-visual-foot {
    font-size: 0.74rem;
    color: rgba(255,255,255,0.2);
    letter-spacing: 0.02em;
  }

  /* ════ RIGHT — Form Panel ════ */
  .auth-form-panel {
    width: 490px;
    min-width: 490px;
    background: var(--c-white);
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 4rem 3.5rem;
    overflow-y: auto;
    box-shadow: -24px 0 80px rgba(0,0,0,0.08);
    animation: panelSlideIn 0.45s var(--ease) both;
  }

  @keyframes panelSlideIn {
    from { opacity: 0; transform: translateX(28px); }
    to   { opacity: 1; transform: translateX(0); }
  }

  /* Form header */
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
    font-size: 2rem;
    font-weight: 900;
    color: var(--c-text);
    letter-spacing: -0.035em;
    line-height: 1.1;
    margin-bottom: 0.45rem;
  }

  .auth-form-subtitle {
    font-size: 0.88rem;
    color: var(--c-text-muted);
    line-height: 1.55;
  }

  /* Success alert */
  .auth-alert-success {
    display: flex;
    align-items: flex-start;
    gap: 0.6rem;
    padding: 0.9rem 1.1rem;
    background: rgba(33,150,83,0.08);
    border: 1.5px solid rgba(33,150,83,0.25);
    border-radius: 10px;
    font-size: 0.85rem;
    color: var(--c-success);
    line-height: 1.5;
    margin-bottom: 1.5rem;
  }

  .auth-alert-success i { flex-shrink: 0; margin-top: 1px; }

  /* Form fields */
  .form-field { margin-bottom: 1.25rem; }

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
    z-index: 0;
  }

  .field-wrap:focus-within .field-icon { color: var(--c-gold-dark); }

  .field-wrap input {
    width: 100%;
    padding: 13px 14px 13px 38px;
    background: var(--c-off-white);
    border: 1.5px solid var(--c-border);
    border-radius: 8px;
    font-family: var(--f-body);
    font-size: 0.9rem;
    color: var(--c-text);
    outline: none;
    transition: border-color 0.18s ease, background 0.18s ease, box-shadow 0.18s ease;
    -webkit-appearance: none;
  }

  .field-wrap input::placeholder { color: #C0BEB8; }

  .field-wrap input:focus {
    background: var(--c-white);
    border-color: var(--c-gold);
    box-shadow: 0 0 0 3.5px rgba(200,169,110,0.13);
  }

  .field-wrap input.is-invalid {
    border-color: var(--c-error);
    background: var(--c-error-bg);
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

  /* Primary CTA */
  .btn-auth-primary {
    width: 100%;
    padding: 14px 20px;
    background: var(--c-black);
    color: var(--c-white);
    border: none;
    border-radius: 8px;
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
    margin-top: 0.5rem;
    margin-bottom: 1.5rem;
    transition: background 0.18s ease, transform 0.2s ease, box-shadow 0.2s ease;
    position: relative;
    overflow: hidden;
  }

  .btn-auth-primary::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.07) 0%, transparent 60%);
    pointer-events: none;
  }

  .btn-auth-primary:hover {
    background: var(--c-charcoal);
    transform: translateY(-2px);
    box-shadow: 0 14px 34px rgba(0,0,0,0.22);
  }

  .btn-auth-primary:active { transform: translateY(0); box-shadow: none; }

  /* Back to login link */
  .auth-back-link {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.45rem;
    font-size: 0.85rem;
    color: var(--c-text-muted);
    text-decoration: none;
    transition: color 0.18s ease;
  }

  .auth-back-link:hover { color: var(--c-black); }
  .auth-back-link i { font-size: 0.72rem; transition: transform 0.18s ease; }
  .auth-back-link:hover i { transform: translateX(-3px); }

  /* ── Responsive ── */
  @media (max-width: 960px) {
    .auth-page { flex-direction: column; }
    .auth-visual { padding: 2.25rem 2rem; min-height: 260px; }
    .auth-visual-body { padding: 1.25rem 0; }
    .auth-visual-headline { font-size: 2rem; margin-bottom: 0; }
    .auth-visual-subtext,
    .auth-steps { display: none; }
    .auth-visual-kicker { margin-bottom: 0.75rem; }
    .auth-form-panel {
      width: 100%;
      min-width: 0;
      padding: 2.75rem 2rem;
      box-shadow: none;
    }
  }

  @media (max-width: 540px) {
    .auth-visual { min-height: 210px; padding: 1.75rem 1.5rem; }
    .auth-form-panel { padding: 2.25rem 1.5rem; }
    .auth-form-title { font-size: 1.7rem; }
  }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="auth-page">

  
  <aside class="auth-visual">
    <div class="auth-visual-inner">

      <a href="<?php echo e(route('home')); ?>" class="auth-brand">
        <div class="auth-brand-mark"><i class="fas fa-shoe-prints"></i></div>
        <span class="auth-brand-name">Sole<em>Mates</em></span>
      </a>

      <div class="auth-visual-body">
        <span class="auth-visual-kicker">Account Recovery</span>

        <h1 class="auth-visual-headline">
          No worries —
          <span class="line-gold">we've got you.</span>
        </h1>

        <p class="auth-visual-subtext">
          Forgot your password? It happens to the best of us.
          Enter your email and we'll send you a secure link
          to get back into your account in seconds.
        </p>

        <ol class="auth-steps" role="list">
          <li class="auth-step-item">
            <span class="auth-step-num">1</span>
            <span class="auth-step-text">Enter the email linked to your account</span>
          </li>
          <li class="auth-step-item">
            <span class="auth-step-num">2</span>
            <span class="auth-step-text">Check your inbox for our reset email</span>
          </li>
          <li class="auth-step-item">
            <span class="auth-step-num">3</span>
            <span class="auth-step-text">Click the link and create a new password</span>
          </li>
        </ol>
      </div>

      <p class="auth-visual-foot">
        &copy; <?php echo e(date('Y')); ?> SoleMates Footwear &nbsp;·&nbsp; All rights reserved
      </p>

    </div>
  </aside>

  
  <section class="auth-form-panel" aria-label="Password reset form">

    <header class="auth-form-header">
      <p class="auth-form-eyebrow">Forgot password</p>
      <h2 class="auth-form-title">Reset Password</h2>
      <p class="auth-form-subtitle">
        Enter your email address and we'll send you a link
        to reset your password.
      </p>
    </header>

    
    <?php if(session('status')): ?>
      <div class="auth-alert-success" role="alert">
        <i class="fas fa-check-circle" aria-hidden="true"></i>
        <span><?php echo e(session('status')); ?></span>
      </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('password.email')); ?>" novalidate>
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
            aria-required="true"
          >
        </div>
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <p class="field-error" role="alert">
            <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
            <?php echo e($message); ?>

          </p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <button type="submit" class="btn-auth-primary">
        <i class="fas fa-paper-plane" aria-hidden="true"></i>
        Send Reset Link
      </button>

    </form>

    <a href="<?php echo e(route('login')); ?>" class="auth-back-link">
      <i class="fas fa-arrow-left" aria-hidden="true"></i>
      Back to Sign In
    </a>

  </section>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\SoulMates-Inc-Project\resources\views\auth\passwords\email.blade.php ENDPATH**/ ?>