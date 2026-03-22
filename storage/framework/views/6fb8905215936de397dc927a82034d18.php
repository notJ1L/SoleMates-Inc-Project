<?php $__env->startSection('title', 'Create Account — SoleMates Footwear'); ?>

<?php $__env->startSection('head'); ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
  /* ════════════════════════════════════════════
     LAYOUT RESET — hide nav/footer on auth pages
  ════════════════════════════════════════════ */
  nav.sm-nav,
  footer.sm-footer { display: none !important; }
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
    --c-success-bg:  #F0FBF4;
    --c-warn:        #D4880E;

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
    font-size: clamp(2.2rem, 3.5vw, 3.4rem);
    font-weight: 900;
    line-height: 1.05;
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
    color: rgba(255, 255, 255, 0.48);
    max-width: 330px;
    margin-bottom: 2.25rem;
  }

  /* ── Feature list ── */
  .auth-features {
    display: flex;
    flex-direction: column;
    gap: 0.65rem;
    list-style: none;
    padding: 0;
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

  /* ── Testimonial / trust card ── */
  .auth-trust-card {
    background: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: var(--r-md);
    padding: 1.25rem;
    margin-top: 2rem;
  }

  .auth-trust-card p {
    font-size: 0.82rem;
    line-height: 1.65;
    color: rgba(255, 255, 255, 0.5);
    margin-bottom: 0.65rem;
    font-style: italic;
  }

  .auth-trust-meta {
    display: flex;
    align-items: center;
    gap: 0.6rem;
  }

  .auth-trust-avatar {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--c-gold), var(--c-gold-dark));
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--c-black);
    font-size: 0.65rem;
    font-weight: 700;
    flex-shrink: 0;
  }

  .auth-trust-name {
    font-size: 0.75rem;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.55);
    letter-spacing: 0.02em;
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
    width: 560px;
    min-width: 560px;
    background: var(--c-white);
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    padding: 3.25rem 3.5rem;
    overflow-y: auto;
    box-shadow: -24px 0 80px rgba(0, 0, 0, 0.08);
    animation: panelSlideIn 0.45s var(--ease) both;
  }

  @keyframes panelSlideIn {
    from { opacity: 0; transform: translateX(28px); }
    to   { opacity: 1; transform: translateX(0); }
  }

  /* ── Header ── */
  .auth-form-header { margin-bottom: 2rem; }

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
    font-size: 1.95rem;
    font-weight: 900;
    color: var(--c-text);
    letter-spacing: -0.035em;
    line-height: 1.1;
    margin-bottom: 0.4rem;
  }

  .auth-form-subtitle {
    font-size: 0.87rem;
    color: var(--c-text-muted);
    line-height: 1.5;
  }

  /* ── Section Headings ── */
  .form-section-label {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 0.68rem;
    font-weight: 800;
    letter-spacing: 0.13em;
    text-transform: uppercase;
    color: var(--c-text-muted);
    margin: 1.5rem 0 0.9rem;
  }

  .form-section-label::after {
    content: '';
    flex: 1;
    height: 1px;
    background: var(--c-border);
  }

  /* ── Avatar Upload ── */
  .avatar-upload-area {
    display: flex;
    align-items: center;
    gap: 1.1rem;
    padding: 1rem 1.15rem;
    border: 1.5px dashed var(--c-border);
    border-radius: var(--r-md);
    cursor: pointer;
    transition: border-color var(--t-base), background var(--t-base);
    background: var(--c-off-white);
    margin-bottom: 0.25rem;
  }

  .avatar-upload-area:hover {
    border-color: var(--c-gold);
    background: rgba(200, 169, 110, 0.04);
  }

  .avatar-upload-area:hover .avatar-thumb { border-color: var(--c-gold); }

  .avatar-thumb {
    width: 54px;
    height: 54px;
    border-radius: 50%;
    border: 2px solid var(--c-border);
    background: var(--c-light);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    flex-shrink: 0;
    color: var(--c-text-muted);
    font-size: 1.2rem;
    transition: border-color var(--t-base);
    position: relative;
  }

  .avatar-thumb img {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
    display: none;
  }

  .avatar-upload-text h5 {
    font-size: 0.84rem;
    font-weight: 600;
    color: var(--c-text-mid);
    margin-bottom: 0.2rem;
  }

  .avatar-upload-text p {
    font-size: 0.74rem;
    color: var(--c-text-muted);
    margin: 0;
    line-height: 1.4;
  }

  .avatar-badge {
    margin-left: auto;
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: var(--c-text-muted);
    background: var(--c-light);
    border: 1px solid var(--c-border);
    border-radius: 99px;
    padding: 3px 9px;
    flex-shrink: 0;
  }

  /* ── Two-column grid ── */
  .form-row-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0.85rem;
  }

  /* ── Form Fields ── */
  .form-field {
    margin-bottom: 0;
  }

  .form-field > label {
    display: block;
    font-size: 0.73rem;
    font-weight: 700;
    letter-spacing: 0.07em;
    text-transform: uppercase;
    color: var(--c-text-mid);
    margin-bottom: 0.42rem;
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
    font-size: 0.82rem;
    pointer-events: none;
    transition: color var(--t-fast);
    z-index: 1;
  }

  .field-wrap:focus-within .field-icon { color: var(--c-gold-dark); }

  .field-wrap input {
    width: 100%;
    padding: 11.5px 40px 11.5px 37px;
    background: var(--c-off-white);
    border: 1.5px solid var(--c-border);
    border-radius: var(--r-sm);
    font-family: var(--f-body);
    font-size: 0.88rem;
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

  .field-wrap input.is-valid {
    border-color: var(--c-success);
    background: var(--c-success-bg);
  }

  .field-error {
    font-size: 0.74rem;
    color: var(--c-error);
    margin-top: 0.28rem;
    display: flex;
    align-items: flex-start;
    gap: 0.32rem;
    line-height: 1.4;
  }

  .field-error i { font-size: 0.62rem; margin-top: 2px; flex-shrink: 0; }

  .field-hint {
    font-size: 0.74rem;
    color: var(--c-text-muted);
    margin-top: 0.28rem;
    line-height: 1.4;
    display: none;
  }

  /* ── Password Toggle ── */
  .btn-eye {
    position: absolute;
    right: 11px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    padding: 4px;
    cursor: pointer;
    color: var(--c-text-muted);
    font-size: 0.82rem;
    line-height: 1;
    display: flex;
    align-items: center;
    transition: color var(--t-fast);
    z-index: 1;
  }

  .btn-eye:hover { color: var(--c-gold-dark); }

  /* ── Password Strength Meter ── */
  .pwd-meter {
    margin-top: 0.5rem;
    display: none;
  }

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
    transition: width var(--t-slow), background-color var(--t-slow);
  }

  .pwd-meter-label {
    font-size: 0.71rem;
    font-weight: 600;
    letter-spacing: 0.04em;
    color: var(--c-text-muted);
    transition: color var(--t-base);
  }

  /* strength level colours defined by JS */
  .pwd-meter-fill[data-level="1"] { background: #E53E3E; }
  .pwd-meter-fill[data-level="2"] { background: #DD6B20; }
  .pwd-meter-fill[data-level="3"] { background: #D69E2E; }
  .pwd-meter-fill[data-level="4"] { background: var(--c-success); }

  /* ── Match Hint ── */
  .match-hint {
    font-size: 0.74rem;
    font-weight: 600;
    margin-top: 0.3rem;
    display: none;
    align-items: center;
    gap: 0.3rem;
    line-height: 1.3;
  }

  .match-hint.match-ok    { color: var(--c-success); display: flex; }
  .match-hint.match-fail  { color: var(--c-error);   display: flex; }

  /* ── Primary CTA Button ── */
  .btn-primary-cta {
    width: 100%;
    padding: 13.5px 20px;
    background: var(--c-black);
    color: var(--c-white);
    border: none;
    border-radius: var(--r-sm);
    font-family: var(--f-head);
    font-size: 0.84rem;
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
    margin-top: 1.5rem;
    margin-bottom: 1rem;
  }

  .btn-primary-cta::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.07) 0%, transparent 60%);
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
    font-size: 0.84rem;
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
    font-size: 0.82rem;
    margin-bottom: 1.15rem;
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
  @media (max-width: 1040px) {
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
    .auth-features,
    .auth-trust-card { display: none; }

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

  @media (max-width: 620px) {
    .form-row-2 { grid-template-columns: 1fr; gap: 0; }
    .form-row-2 .form-field { margin-bottom: 0.85rem; }
  }

  @media (max-width: 540px) {
    .auth-visual { min-height: 210px; padding: 1.75rem 1.5rem; }
    .auth-form-panel { padding: 2.25rem 1.5rem; }
    .auth-form-title { font-size: 1.65rem; }
    .avatar-badge { display: none; }
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
        <span class="auth-visual-kicker">Join the community</span>

        <h1 class="auth-visual-headline">
          Start Your
          <span class="line-gold">Journey.</span>
        </h1>

        <p class="auth-visual-subtext">
          Create your free account and join thousands of shoe enthusiasts who
          trust SoleMates to find their perfect pair — every time.
        </p>

        <ul class="auth-features" role="list">
          <li class="auth-feature-item">
            <span class="auth-feature-dot"><i class="fas fa-check" aria-hidden="true"></i></span>
            Personalised shoe recommendations
          </li>
          <li class="auth-feature-item">
            <span class="auth-feature-dot"><i class="fas fa-check" aria-hidden="true"></i></span>
            Exclusive member discounts up to 30%
          </li>
          <li class="auth-feature-item">
            <span class="auth-feature-dot"><i class="fas fa-check" aria-hidden="true"></i></span>
            Real-time order tracking &amp; history
          </li>
          <li class="auth-feature-item">
            <span class="auth-feature-dot"><i class="fas fa-check" aria-hidden="true"></i></span>
            Priority customer support
          </li>
        </ul>

        
        <div class="auth-trust-card" aria-hidden="true">
          <p>"SoleMates made it so easy to find shoes I actually love. The
          recommendations are spot-on and delivery was lightning fast!"</p>
          <div class="auth-trust-meta">
            <div class="auth-trust-avatar">MC</div>
            <span class="auth-trust-name">Maria C. &nbsp;·&nbsp; Verified Customer</span>
          </div>
        </div>
      </div>

      <p class="auth-visual-foot">
        &copy; <?php echo e(date('Y')); ?> SoleMates Footwear &nbsp;·&nbsp; All rights reserved
      </p>

    </div>
  </aside>

  
  <section class="auth-form-panel" aria-label="Create account form">

    <header class="auth-form-header">
      <p class="auth-form-eyebrow">Get started for free</p>
      <h2 class="auth-form-title">Create Account</h2>
      <p class="auth-form-subtitle">Fill in the details below to join our community</p>
    </header>

    
    <?php if($errors->any()): ?>
      <div class="auth-alert auth-alert-error" role="alert">
        <i class="fas fa-exclamation-circle" style="margin-top:2px;flex-shrink:0;" aria-hidden="true"></i>
        <span>Please review the errors below and try again.</span>
      </div>
    <?php endif; ?>

    <form
      method="POST"
      action="<?php echo e(route('register')); ?>"
      enctype="multipart/form-data"
      novalidate
      id="registerForm"
    >
      <?php echo csrf_field(); ?>

      
      <p class="form-section-label">Profile Photo</p>

      <div
        class="avatar-upload-area"
        id="avatarUploadArea"
        onclick="document.getElementById('profile_photo').click()"
        role="button"
        tabindex="0"
        aria-label="Upload profile photo (optional)"
        onkeydown="if(event.key==='Enter'||event.key===' ')this.click()"
      >
        <div class="avatar-thumb" id="avatarThumb">
          <i class="fas fa-user" id="avatarIcon" aria-hidden="true"></i>
          <img id="avatarImg" src="" alt="Profile preview">
        </div>
        <div class="avatar-upload-text">
          <h5>Upload a profile photo</h5>
          <p>JPG, PNG or GIF &nbsp;·&nbsp; Max 2 MB &nbsp;·&nbsp; Click to browse</p>
        </div>
        <span class="avatar-badge">Optional</span>
      </div>

      <input
        type="file"
        id="profile_photo"
        name="profile_photo"
        accept="image/*"
        style="display:none;"
        onchange="handleAvatarChange(this)"
      >

      <?php $__errorArgs = ['profile_photo'];
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

      
      <p class="form-section-label">Personal Information</p>

      <div class="form-row-2" style="margin-bottom: 0.85rem;">

        
        <div class="form-field">
          <label for="name">Full Name <span style="color:var(--c-error);" aria-hidden="true">*</span></label>
          <div class="field-wrap">
            <i class="fas fa-user field-icon" aria-hidden="true"></i>
            <input
              type="text"
              id="name"
              name="name"
              value="<?php echo e(old('name')); ?>"
              placeholder="Juan Dela Cruz"
              autocomplete="name"
              autofocus
              required
              class="<?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>"
              aria-required="true"
              aria-describedby="<?php echo e($errors->has('name') ? 'name-error' : ''); ?>"
            >
          </div>
          <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="field-error" id="name-error" role="alert">
              <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
              <?php echo e($message); ?>

            </p>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div class="form-field">
          <label for="email">Email Address <span style="color:var(--c-error);" aria-hidden="true">*</span></label>
          <div class="field-wrap">
            <i class="fas fa-envelope field-icon" aria-hidden="true"></i>
            <input
              type="email"
              id="email"
              name="email"
              value="<?php echo e(old('email')); ?>"
              placeholder="you@example.com"
              autocomplete="email"
              required
              class="<?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>"
              aria-required="true"
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

      </div>

      <div class="form-row-2" style="margin-bottom: 0.5rem;">

        
        <div class="form-field">
          <label for="phone">Phone Number</label>
          <div class="field-wrap">
            <i class="fas fa-phone field-icon" aria-hidden="true"></i>
            <input
              type="tel"
              id="phone"
              name="phone"
              value="<?php echo e(old('phone')); ?>"
              placeholder="+63 912 345 6789"
              autocomplete="tel"
              class="<?php echo e($errors->has('phone') ? 'is-invalid' : ''); ?>"
              aria-describedby="<?php echo e($errors->has('phone') ? 'phone-error' : ''); ?>"
            >
          </div>
          <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="field-error" id="phone-error" role="alert">
              <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
              <?php echo e($message); ?>

            </p>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div class="form-field">
          <label for="address">Address</label>
          <div class="field-wrap">
            <i class="fas fa-map-marker-alt field-icon" aria-hidden="true"></i>
            <input
              type="text"
              id="address"
              name="address"
              value="<?php echo e(old('address')); ?>"
              placeholder="City, Province"
              autocomplete="street-address"
              class="<?php echo e($errors->has('address') ? 'is-invalid' : ''); ?>"
              aria-describedby="<?php echo e($errors->has('address') ? 'address-error' : ''); ?>"
            >
          </div>
          <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="field-error" id="address-error" role="alert">
              <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
              <?php echo e($message); ?>

            </p>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

      </div>

      
      <p class="form-section-label">Security</p>

      <div class="form-row-2">

        
        <div class="form-field">
          <label for="password">
            Password <span style="color:var(--c-error);" aria-hidden="true">*</span>
          </label>
          <div class="field-wrap">
            <i class="fas fa-lock field-icon" aria-hidden="true"></i>
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Min. 8 characters"
              autocomplete="new-password"
              required
              oninput="handlePasswordInput(this.value)"
              class="<?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>"
              aria-required="true"
              aria-describedby="pwd-meter-label <?php echo e($errors->has('password') ? 'pwd-error' : ''); ?>"
            >
            <button
              type="button"
              class="btn-eye"
              aria-label="Show password"
              onclick="togglePassword('password', this)"
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
            <p class="field-error" id="pwd-error" role="alert">
              <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
              <?php echo e($message); ?>

            </p>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div class="form-field">
          <label for="password_confirmation">
            Confirm Password <span style="color:var(--c-error);" aria-hidden="true">*</span>
          </label>
          <div class="field-wrap">
            <i class="fas fa-lock field-icon" aria-hidden="true"></i>
            <input
              type="password"
              id="password_confirmation"
              name="password_confirmation"
              placeholder="Repeat your password"
              autocomplete="new-password"
              required
              oninput="handleConfirmInput(this.value)"
              class="<?php echo e($errors->has('password_confirmation') ? 'is-invalid' : ''); ?>"
              aria-required="true"
              aria-describedby="confirm-match <?php echo e($errors->has('password_confirmation') ? 'confirm-error' : ''); ?>"
            >
            <button
              type="button"
              class="btn-eye"
              aria-label="Show confirm password"
              onclick="togglePassword('password_confirmation', this)"
            >
              <i class="fas fa-eye" aria-hidden="true"></i>
            </button>
          </div>

          
          <p class="match-hint" id="confirm-match" aria-live="polite"></p>

          <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="field-error" id="confirm-error" role="alert">
              <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
              <?php echo e($message); ?>

            </p>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

      </div>

      
      <button type="submit" class="btn-primary-cta">
        <i class="fas fa-user-plus" aria-hidden="true"></i>
        Create My Account
      </button>

    </form>

    <p class="auth-switch">
      Already have an account?
      <a href="<?php echo e(route('login')); ?>">Sign in</a>
    </p>

  </section>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
  /* ─────────────────────────────────────────────
     Toggle password field visibility
  ───────────────────────────────────────────── */
  function togglePassword(fieldId, btn) {
    const field = document.getElementById(fieldId);
    const icon  = btn.querySelector('i');
    if (!field) return;

    const nowVisible = field.type === 'password';
    field.type = nowVisible ? 'text' : 'password';

    icon.classList.toggle('fa-eye',       !nowVisible);
    icon.classList.toggle('fa-eye-slash',  nowVisible);

    btn.setAttribute('aria-label', nowVisible ? 'Hide password' : 'Show password');
  }

  /* ─────────────────────────────────────────────
     Password strength meter
  ───────────────────────────────────────────── */
  const STRENGTH_LEVELS = [
    { label: 'Weak',   pct: '25%',  color: '#E53E3E', lvl: 1 },
    { label: 'Fair',   pct: '50%',  color: '#DD6B20', lvl: 2 },
    { label: 'Good',   pct: '75%',  color: '#D69E2E', lvl: 3 },
    { label: 'Strong', pct: '100%', color: var_success(), lvl: 4 },
  ];

  function var_success() {
    return getComputedStyle(document.documentElement)
      .getPropertyValue('--c-success').trim() || '#219653';
  }

  function calcStrength(val) {
    if (!val) return 0;
    let score = 0;
    if (val.length >= 8)              score++;
    if (/[A-Z]/.test(val))            score++;
    if (/[0-9]/.test(val))            score++;
    if (/[^A-Za-z0-9]/.test(val))    score++;
    return score;
  }

  function handlePasswordInput(val) {
    const meter = document.getElementById('pwdMeter');
    const fill  = document.getElementById('pwdMeterFill');
    const lbl   = document.getElementById('pwd-meter-label');

    if (!val) {
      meter.style.display = 'none';
      return;
    }

    meter.style.display = 'block';

    const score = calcStrength(val);
    const level = STRENGTH_LEVELS[score - 1] || STRENGTH_LEVELS[0];

    fill.style.width           = level.pct;
    fill.style.backgroundColor = level.color;
    fill.setAttribute('data-level', level.lvl);

    lbl.textContent  = 'Password strength: ' + level.label;
    lbl.style.color  = level.color;

    // re-evaluate confirm match
    const confirm = document.getElementById('password_confirmation').value;
    if (confirm) handleConfirmInput(confirm);
  }

  /* ─────────────────────────────────────────────
     Confirm-password match feedback
  ───────────────────────────────────────────── */
  function handleConfirmInput(confirmVal) {
    const pwdVal = document.getElementById('password').value;
    const hint   = document.getElementById('confirm-match');
    const input  = document.getElementById('password_confirmation');

    if (!confirmVal) {
      hint.className   = 'match-hint';
      hint.textContent = '';
      input.classList.remove('is-valid', 'is-invalid');
      return;
    }

    if (pwdVal === confirmVal) {
      hint.className   = 'match-hint match-ok';
      hint.innerHTML   = '<i class="fas fa-check-circle" aria-hidden="true"></i> Passwords match';
      input.classList.add('is-valid');
      input.classList.remove('is-invalid');
    } else {
      hint.className   = 'match-hint match-fail';
      hint.innerHTML   = '<i class="fas fa-times-circle" aria-hidden="true"></i> Passwords do not match';
      input.classList.add('is-invalid');
      input.classList.remove('is-valid');
    }
  }

  /* ─────────────────────────────────────────────
     Avatar preview
  ───────────────────────────────────────────── */
  function handleAvatarChange(input) {
    if (!input.files || !input.files[0]) return;

    const file       = input.files[0];
    const MAX_BYTES  = 2 * 1024 * 1024; // 2 MB

    if (file.size > MAX_BYTES) {
      alert('The selected image exceeds the 2 MB limit. Please choose a smaller file.');
      input.value = '';
      return;
    }

    const reader = new FileReader();

    reader.onload = function (e) {
      const img  = document.getElementById('avatarImg');
      const icon = document.getElementById('avatarIcon');

      img.src           = e.target.result;
      img.style.display = 'block';
      if (icon) icon.style.display = 'none';

      // Update the upload area label
      const label = document.querySelector('.avatar-upload-text h5');
      if (label) label.textContent = 'Photo selected — click to change';
    };

    reader.readAsDataURL(file);
  }

  /* ─────────────────────────────────────────────
     Prevent accidental form submit when pressing
     Enter inside avatar upload area
  ───────────────────────────────────────────── */
  document.addEventListener('DOMContentLoaded', function () {
    const area = document.getElementById('avatarUploadArea');
    if (area) {
      area.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') e.preventDefault();
      });
    }
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp_ITCP226\htdocs\SoulMates-Inc-Project\resources\views/auth/register.blade.php ENDPATH**/ ?>