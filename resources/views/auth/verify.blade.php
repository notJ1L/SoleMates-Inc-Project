@extends('layouts.app')

@section('title', 'Verify Your Email — SoleMates Footwear')

@section('head')
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
    --c-cream:      #F4F2ED;
    --c-border:     #E4E2DC;
    --c-text:       #0A0A0A;
    --c-text-mid:   #3A3A3A;
    --c-text-soft:  #6A6A6A;
    --c-text-muted: #999994;
    --c-error:      #C0392B;
    --c-success:    #219653;
    --f-head: 'Montserrat', sans-serif;
    --f-body: 'Inter', sans-serif;
    --ease:   cubic-bezier(0.4, 0, 0.2, 1);
  }

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    font-family: var(--f-body);
    background: var(--c-off-white);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem 1rem;
    -webkit-font-smoothing: antialiased;
  }

  /* ════ Page wrapper ════ */
  .verify-page {
    width: 100%;
    max-width: 520px;
  }

  /* ── Brand header ── */
  .verify-brand {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    text-decoration: none;
    margin-bottom: 2rem;
    user-select: none;
  }

  .verify-brand-mark {
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

  .verify-brand:hover .verify-brand-mark { background: var(--c-gold-hover); }

  .verify-brand-name {
    font-family: var(--f-head);
    font-weight: 800;
    font-size: 1.15rem;
    color: var(--c-black);
    letter-spacing: 0.02em;
  }

  .verify-brand-name em {
    font-style: normal;
    color: var(--c-gold-dark);
  }

  /* ── Main card ── */
  .verify-card {
    background: var(--c-white);
    border: 1.5px solid var(--c-border);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0,0,0,0.07), 0 4px 16px rgba(0,0,0,0.04);
    animation: cardFadeUp 0.45s var(--ease) both;
  }

  @keyframes cardFadeUp {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  /* ── Card hero strip ── */
  .verify-card-hero {
    background: var(--c-dark-panel);
    padding: 2.5rem 2rem;
    text-align: center;
    position: relative;
    overflow: hidden;
  }

  .verify-card-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
      radial-gradient(ellipse 80% 70% at 50% 130%, rgba(200,169,110,0.22) 0%, transparent 60%),
      radial-gradient(ellipse 60% 50% at 80% -10%,  rgba(200,169,110,0.10) 0%, transparent 55%);
    pointer-events: none;
  }

  .verify-card-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(circle, rgba(255,255,255,0.05) 1px, transparent 1px);
    background-size: 24px 24px;
    pointer-events: none;
  }

  .verify-icon-wrap {
    position: relative;
    z-index: 2;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 72px;
    height: 72px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--c-gold), var(--c-gold-dark));
    box-shadow: 0 8px 28px rgba(200,169,110,0.35);
    margin: 0 auto 1.25rem;
    animation: iconPop 0.5s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s both;
  }

  @keyframes iconPop {
    from { opacity: 0; transform: scale(0.5); }
    to   { opacity: 1; transform: scale(1); }
  }

  .verify-icon-wrap i {
    font-size: 1.8rem;
    color: var(--c-black);
    position: relative;
    z-index: 1;
  }

  .verify-hero-title {
    position: relative;
    z-index: 2;
    font-family: var(--f-head);
    font-size: 1.45rem;
    font-weight: 900;
    color: var(--c-white);
    letter-spacing: -0.025em;
    line-height: 1.2;
    margin-bottom: 0.5rem;
  }

  .verify-hero-sub {
    position: relative;
    z-index: 2;
    font-size: 0.85rem;
    color: rgba(255,255,255,0.48);
    line-height: 1.55;
  }

  /* ── Card body ── */
  .verify-card-body {
    padding: 2rem 2.25rem 2.25rem;
  }

  /* Success alert (email resent) */
  .verify-alert-success {
    display: flex;
    align-items: flex-start;
    gap: 0.6rem;
    padding: 0.85rem 1rem;
    background: rgba(33,150,83,0.08);
    border: 1.5px solid rgba(33,150,83,0.22);
    border-radius: 10px;
    font-size: 0.85rem;
    color: var(--c-success);
    line-height: 1.5;
    margin-bottom: 1.5rem;
  }

  .verify-alert-success i { flex-shrink: 0; margin-top: 1px; }

  /* Steps */
  .verify-steps {
    list-style: none;
    padding: 0;
    margin: 0 0 1.75rem;
    display: flex;
    flex-direction: column;
    gap: 0.85rem;
  }

  .verify-step {
    display: flex;
    align-items: flex-start;
    gap: 0.85rem;
  }

  .verify-step-num {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background: var(--c-cream);
    border: 1.5px solid var(--c-border);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-family: var(--f-head);
    font-size: 0.65rem;
    font-weight: 900;
    color: var(--c-gold-dark);
    margin-top: 1px;
  }

  .verify-step-text {
    font-size: 0.875rem;
    color: var(--c-text-soft);
    line-height: 1.55;
  }

  .verify-step-text strong {
    color: var(--c-black);
    font-weight: 600;
  }

  /* Divider */
  .verify-divider {
    display: flex;
    align-items: center;
    gap: 0.85rem;
    margin-bottom: 1.5rem;
  }

  .verify-divider::before,
  .verify-divider::after {
    content: '';
    flex: 1;
    height: 1px;
    background: var(--c-border);
  }

  .verify-divider span {
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--c-text-muted);
    white-space: nowrap;
  }

  /* Resend form */
  .verify-resend-wrap {
    text-align: center;
    margin-bottom: 0.5rem;
  }

  .verify-resend-label {
    font-size: 0.85rem;
    color: var(--c-text-muted);
    margin-bottom: 0.85rem;
  }

  .btn-resend {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    width: 100%;
    padding: 13px 20px;
    background: var(--c-black);
    color: var(--c-white);
    border: none;
    border-radius: 9px;
    font-family: var(--f-head);
    font-size: 0.83rem;
    font-weight: 800;
    letter-spacing: 0.09em;
    text-transform: uppercase;
    cursor: pointer;
    transition: background 0.18s var(--ease), transform 0.2s var(--ease), box-shadow 0.2s var(--ease);
    position: relative;
    overflow: hidden;
    margin-bottom: 1.25rem;
  }

  .btn-resend::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.07) 0%, transparent 60%);
    pointer-events: none;
  }

  .btn-resend:hover {
    background: var(--c-charcoal);
    transform: translateY(-2px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.2);
  }

  .btn-resend:active { transform: translateY(0); box-shadow: none; }

  /* Sign out link */
  .verify-signout {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.45rem;
    font-size: 0.83rem;
    color: var(--c-text-muted);
    text-decoration: none;
    cursor: pointer;
    background: none;
    border: none;
    width: 100%;
    transition: color 0.18s var(--ease);
    padding: 0;
  }

  .verify-signout:hover { color: var(--c-error); }
  .verify-signout i { font-size: 0.72rem; }

  /* ── Card footer ── */
  .verify-card-footer {
    padding: 1rem 2.25rem;
    background: var(--c-off-white);
    border-top: 1px solid var(--c-border);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    font-size: 0.75rem;
    color: var(--c-text-muted);
  }

  .verify-card-footer i {
    color: var(--c-gold-dark);
    font-size: 0.8rem;
  }

  /* ── Responsive ── */
  @media (max-width: 540px) {
    .verify-card-body { padding: 1.75rem 1.5rem 2rem; }
    .verify-card-footer { padding: 0.9rem 1.5rem; }
    .verify-hero-title { font-size: 1.25rem; }
  }
</style>
@endsection

@section('content')
<div class="verify-page">

  {{-- Brand --}}
  <a href="{{ route('home') }}" class="verify-brand">
    <div class="verify-brand-mark" aria-hidden="true">
      <i class="fas fa-shoe-prints"></i>
    </div>
    <span class="verify-brand-name">Sole<em>Mates</em></span>
  </a>

  {{-- Card --}}
  <div class="verify-card" role="main">

    {{-- Hero strip --}}
    <div class="verify-card-hero">
      <div class="verify-icon-wrap" aria-hidden="true">
        <i class="fas fa-envelope-open-text"></i>
      </div>
      <h1 class="verify-hero-title">Check your inbox</h1>
      <p class="verify-hero-sub">
        We've sent a verification link to your email address
      </p>
    </div>

    {{-- Body --}}
    <div class="verify-card-body">

      {{-- Success: email resent --}}
      @if(session('resent'))
        <div class="verify-alert-success" role="alert">
          <i class="fas fa-check-circle" aria-hidden="true"></i>
          <span>
            A fresh verification link has been sent to your email address.
            Please check your inbox (and spam folder).
          </span>
        </div>
      @endif

      {{-- What to do steps --}}
      <ol class="verify-steps" role="list">
        <li class="verify-step">
          <span class="verify-step-num">1</span>
          <span class="verify-step-text">
            Open the email from <strong>SoleMates Footwear</strong> in your inbox
          </span>
        </li>
        <li class="verify-step">
          <span class="verify-step-num">2</span>
          <span class="verify-step-text">
            Click the <strong>Verify Email Address</strong> button inside
          </span>
        </li>
        <li class="verify-step">
          <span class="verify-step-num">3</span>
          <span class="verify-step-text">
            You'll be redirected back and your account will be fully activated
          </span>
        </li>
      </ol>

      <div class="verify-divider">
        <span>Didn't receive it?</span>
      </div>

      {{-- Resend form --}}
      <div class="verify-resend-wrap">
        <p class="verify-resend-label">
          Check your spam folder first. If it's still not there, request a new link below.
        </p>

        <form method="POST" action="{{ route('verification.resend') }}">
          @csrf
          <button type="submit" class="btn-resend">
            <i class="fas fa-paper-plane" aria-hidden="true"></i>
            Resend Verification Email
          </button>
        </form>

        {{-- Sign out --}}
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
          @csrf
          <button type="submit" class="verify-signout">
            <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
            Sign out and use a different account
          </button>
        </form>
      </div>

    </div>

    {{-- Footer strip --}}
    <div class="verify-card-footer">
      <i class="fas fa-shield-alt" aria-hidden="true"></i>
      Email verification keeps your account secure
    </div>

  </div>

</div>
@endsection
