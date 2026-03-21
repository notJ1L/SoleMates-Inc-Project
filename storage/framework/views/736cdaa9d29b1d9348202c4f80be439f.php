<?php $__env->startSection('title', 'Set New Password — SoleMates Footwear'); ?>

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

  /* Tips list */
  .auth-tips {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    list-style: none;
    padding: 0;
  }

  .auth-tip-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 0.84rem;
    color: rgba(255,255,255,0.55);
  }

  .auth-tip-dot {
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background: rgba(200,169,110,0.15);
    border: 1px solid rgba(200,169,110,0.35);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    color: var(--c-gold);
    font-size: 0.6rem;
  }

  .auth-visual-foot {
    font-size: 0.74rem;
    color: rgba(255,255,255,0.2);
    letter-spacing: 0.02em;
  }

  /* ════ RIGHT — Form Panel ════ */
  .auth-form-panel {
    width: 510px;
    min-width: 510px;
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

  /* Form fields */
  .form-field { margin-bottom: 1.15rem; }

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
    transition: color 0.18s ease;
    z-index: 1;
  }

  .field-wrap:focus-within .field-icon { color: var(--c-gold-dark); }

  .field-wrap input {
    width: 100%;
    padding: 13px 42px 13px 38px;
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

  .field-wrap input.is-valid {
    border-color: var(--c-success);
    background: rgba(33,150,83,0.04);
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

  /* Eye toggle */
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
    transition: color 0.18s ease;
    z-index: 1;
  }

  .btn-eye:hover { color: var(--c-gold-dark); }

  /* Password strength meter */
  .pwd-meter { margin-top: 0.5rem; display: none; }

  .pwd-meter-track {
    height: 3px;
    background: var(--c-border);
    border-radius: 99px;
    overflow: hidden;
    margin-bottom: 0.3rem;
  }

  .pwd-meter-fill {
    height: 100%;
    width: 0%;
    border-radius: 99px;
    transition: width 0.4s ease, background-color 0.4s ease;
  }

  .pwd-meter-label {
    font-size: 0.72rem;
    font-weight: 600;
    color: var(--c-text-muted);
    transition: color 0.3s ease;
  }

  /* Match hint */
  .match-hint {
    font-size: 0.75rem;
    font-weight: 600;
    margin-top: 0.3rem;
    display: none;
    align-items: center;
    gap: 0.3rem;
    line-height: 1.3;
  }

  .match-hint.match-ok   { color: var(--c-success); display: flex; }
  .match-hint.match-fail { color: var(--c-error);   display: flex; }

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
    margin-top: 0.75rem;
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

  /* Back link */
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

  /* Read-only email field */
  .field-wrap input[readonly] {
    background: var(--c-off-white);
    color: var(--c-text-muted);
    cursor: not-allowed;
  }

  /* ── Responsive ── */
  @media (max-width: 960px) {
    .auth-page { flex-direction: column; }
    .auth-visual { padding: 2.25rem 2rem; min-height: 260px; }
    .auth-visual-body { padding: 1.25rem 0; }
    .auth-visual-headline { font-size: 2rem; margin-bottom: 0; }
    .auth-visual-subtext,
    .auth-tips { display: none; }
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
        <span class="auth-visual-kicker">New Password</span>

        <h1 class="auth-visual-headline">
          Make it strong,
          <span class="line-gold">make it yours.</span>
        </h1>

        <p class="auth-visual-subtext">
          Choose a new password for your account. A strong password
          keeps your orders, profile, and personal details safe.
        </p>

        <ul class="auth-tips" role="list">
          <li class="auth-tip-item">
            <span class="auth-tip-dot"><i class="fas fa-check"></i></span>
            At least 8 characters long
          </li>
          <li class="auth-tip-item">
            <span class="auth-tip-dot"><i class="fas fa-check"></i></span>
            Mix of uppercase &amp; lowercase letters
          </li>
          <li class="auth-tip-item">
            <span class="auth-tip-dot"><i class="fas fa-check"></i></span>
            Include numbers or special characters
          </li>
          <li class="auth-tip-item">
            <span class="auth-tip-dot"><i class="fas fa-check"></i></span>
            Avoid using your name or email
          </li>
        </ul>
      </div>

      <p class="auth-visual-foot">
        &copy; <?php echo e(date('Y')); ?> SoleMates Footwear &nbsp;·&nbsp; All rights reserved
      </p>

    </div>
  </aside>

  
  <section class="auth-form-panel" aria-label="Set new password form">

    <header class="auth-form-header">
      <p class="auth-form-eyebrow">Account Recovery</p>
      <h2 class="auth-form-title">Set New Password</h2>
      <p class="auth-form-subtitle">
        Create a strong new password for your SoleMates account.
      </p>
    </header>

    <form method="POST" action="<?php echo e(route('password.update')); ?>" novalidate>
      <?php echo csrf_field(); ?>
      <input type="hidden" name="token" value="<?php echo e($token); ?>">

      
      <div class="form-field">
        <label for="email">Email Address</label>
        <div class="field-wrap">
          <i class="fas fa-envelope field-icon" aria-hidden="true"></i>
          <input
            type="email"
            id="email"
            name="email"
            value="<?php echo e($email ?? old('email')); ?>"
            autocomplete="email"
            readonly
            class="<?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>"
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

      
      <div class="form-field">
        <label for="password">New Password</label>
        <div class="field-wrap">
          <i class="fas fa-lock field-icon" aria-hidden="true"></i>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Min. 8 characters"
            autocomplete="new-password"
            required
            oninput="handleStrength(this.value)"
            class="<?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>"
            aria-required="true"
            aria-describedby="pwd-meter-label"
          >
          <button
            type="button"
            class="btn-eye"
            aria-label="Show password"
            onclick="togglePwd('password', this)"
          >
            <i class="fas fa-eye" aria-hidden="true"></i>
          </button>
        </div>

        
        <div class="pwd-meter" id="pwdMeter" role="status" aria-live="polite">
          <div class="pwd-meter-track">
            <div class="pwd-meter-fill" id="pwdMeterFill"></div>
          </div>
          <span class="pwd-meter-label" id="pwd-meter-label"></span>
        </div>

        <?php $__errorArgs = ['password'];
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

      
      <div class="form-field">
        <label for="password_confirmation">Confirm New Password</label>
        <div class="field-wrap">
          <i class="fas fa-lock field-icon" aria-hidden="true"></i>
          <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            placeholder="Repeat your new password"
            autocomplete="new-password"
            required
            oninput="handleConfirm(this.value)"
            aria-required="true"
            aria-describedby="confirm-match-hint"
          >
          <button
            type="button"
            class="btn-eye"
            aria-label="Show confirm password"
            onclick="togglePwd('password_confirmation', this)"
          >
            <i class="fas fa-eye" aria-hidden="true"></i>
          </button>
        </div>

        <p class="match-hint" id="confirm-match-hint" aria-live="polite"></p>
      </div>

      <button type="submit" class="btn-auth-primary">
        <i class="fas fa-shield-alt" aria-hidden="true"></i>
        Reset My Password
      </button>

    </form>

    <a href="<?php echo e(route('login')); ?>" class="auth-back-link">
      <i class="fas fa-arrow-left" aria-hidden="true"></i>
      Back to Sign In
    </a>

  </section>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
  /* ── Show / hide password ── */
  function togglePwd(fieldId, btn) {
    var field = document.getElementById(fieldId);
    var icon  = btn.querySelector('i');
    if (!field) return;
    var nowVisible = field.type === 'password';
    field.type = nowVisible ? 'text' : 'password';
    icon.classList.toggle('fa-eye',       !nowVisible);
    icon.classList.toggle('fa-eye-slash',  nowVisible);
    btn.setAttribute('aria-label', nowVisible ? 'Hide password' : 'Show password');
  }

  /* ── Password strength ── */
  var LEVELS = [
    { label: 'Weak',   pct: '25%',  color: '#E53E3E' },
    { label: 'Fair',   pct: '50%',  color: '#DD6B20' },
    { label: 'Good',   pct: '75%',  color: '#D69E2E' },
    { label: 'Strong', pct: '100%', color: '#219653' },
  ];

  function calcStrength(val) {
    if (!val) return 0;
    var score = 0;
    if (val.length >= 8)           score++;
    if (/[A-Z]/.test(val))         score++;
    if (/[0-9]/.test(val))         score++;
    if (/[^A-Za-z0-9]/.test(val)) score++;
    return score;
  }

  function handleStrength(val) {
    var meter = document.getElementById('pwdMeter');
    var fill  = document.getElementById('pwdMeterFill');
    var lbl   = document.getElementById('pwd-meter-label');

    if (!val) { meter.style.display = 'none'; return; }
    meter.style.display = 'block';

    var score = calcStrength(val);
    var lv    = LEVELS[score - 1] || LEVELS[0];

    fill.style.width           = lv.pct;
    fill.style.backgroundColor = lv.color;
    lbl.textContent            = 'Strength: ' + lv.label;
    lbl.style.color            = lv.color;

    /* re-check confirm if already typed */
    var confirmVal = document.getElementById('password_confirmation').value;
    if (confirmVal) handleConfirm(confirmVal);
  }

  /* ── Password match feedback ── */
  function handleConfirm(confirmVal) {
    var pwdVal = document.getElementById('password').value;
    var hint   = document.getElementById('confirm-match-hint');
    var input  = document.getElementById('password_confirmation');

    if (!confirmVal) {
      hint.className   = 'match-hint';
      hint.textContent = '';
      input.classList.remove('is-valid', 'is-invalid');
      return;
    }

    if (pwdVal === confirmVal) {
      hint.className = 'match-hint match-ok';
      hint.innerHTML = '<i class="fas fa-check-circle" aria-hidden="true"></i> Passwords match';
      input.classList.add('is-valid');
      input.classList.remove('is-invalid');
    } else {
      hint.className = 'match-hint match-fail';
      hint.innerHTML = '<i class="fas fa-times-circle" aria-hidden="true"></i> Passwords do not match';
      input.classList.add('is-invalid');
      input.classList.remove('is-valid');
    }
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\SoulMates-Inc-Project\resources\views/auth/passwords/reset.blade.php ENDPATH**/ ?>