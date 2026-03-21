<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SoleMates Footwear')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        /* ═══════════════════════════════════════════════════════════
           GLOBAL CSS VARIABLES
        ═══════════════════════════════════════════════════════════ */
        :root {
            /* Brand palette */
            --c-black:      #0A0A0A;
            --c-charcoal:   #1A1A1A;
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

            /* Aliases used by product pages */
            --black:        var(--c-black);
            --white:        var(--c-white);
            --accent:       var(--c-gold);
            --warm-gray:    var(--c-text-muted);
            --red:          var(--c-error);

            /* Typography */
            --font-display: 'Montserrat', system-ui, sans-serif;
            --font-body:    'Inter', system-ui, sans-serif;
            --font-mono:    'Courier New', ui-monospace, monospace;

            /* Layout */
            --nav-h: 68px;
            --ease:  cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* ═══════════════════════════════════════════════════════════
           RESET / BASE
        ═══════════════════════════════════════════════════════════ */
        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: var(--font-body);
            color: var(--c-text);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* ═══════════════════════════════════════════════════════════
           NAVBAR
        ═══════════════════════════════════════════════════════════ */
        .sm-nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            background: rgba(255, 255, 255, 0.72);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid rgba(228, 226, 220, 0.6);
            transition: background 0.3s var(--ease), box-shadow 0.3s var(--ease), border-color 0.3s var(--ease), backdrop-filter 0.3s var(--ease);
            height: var(--nav-h);
        }

        .sm-nav.is-scrolled {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(28px) saturate(200%);
            -webkit-backdrop-filter: blur(28px) saturate(200%);
            box-shadow: 0 2px 28px rgba(0, 0, 0, 0.09);
            border-bottom-color: transparent;
        }

        .sm-nav > .container {
            height: 100%;
            display: flex;
            align-items: center;
        }

        /* ── Brand ── */
        .sm-brand {
            display: flex;
            align-items: center;
            gap: 9px;
            text-decoration: none;
            flex-shrink: 0;
            user-select: none;
        }

        .sm-brand-mark {
            width: 36px;
            height: 36px;
            background: var(--c-gold);
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--c-black);
            font-size: 0.95rem;
            transition: background 0.2s var(--ease);
            flex-shrink: 0;
        }

        .sm-brand:hover .sm-brand-mark { background: var(--c-gold-hover); }

        .sm-brand-name {
            font-family: var(--font-display);
            font-size: 1.05rem;
            font-weight: 800;
            color: var(--c-black);
            letter-spacing: 0.01em;
            line-height: 1;
        }

        .sm-brand-name em {
            font-style: normal;
            color: var(--c-gold-dark);
        }

        /* ── Mobile toggler ── */
        .sm-toggler {
            display: none;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            background: none;
            border: 1.5px solid var(--c-border);
            border-radius: 8px;
            color: var(--c-black);
            font-size: 0.9rem;
            cursor: pointer;
            margin-left: auto;
            transition: border-color 0.18s, background 0.18s;
        }

        .sm-toggler:hover { border-color: var(--c-gold); background: var(--c-off-white); }

        /* ── Collapse wrapper ── */
        .sm-collapse {
            display: flex;
            align-items: center;
            flex: 1;
            gap: 0;
        }

        /* ── Center nav links ── */
        .sm-nav-links {
            display: flex;
            align-items: center;
            list-style: none;
            margin: 0 auto;
            padding: 0;
            gap: 2px;
        }

        .sm-nav-link {
            display: block;
            padding: 7px 13px;
            font-family: var(--font-display);
            font-size: 0.83rem;
            font-weight: 600;
            color: var(--c-text-soft);
            text-decoration: none;
            border-radius: 7px;
            letter-spacing: 0.01em;
            position: relative;
            transition: color 0.18s var(--ease), background 0.18s var(--ease);
        }

        .sm-nav-link::after {
            content: '';
            position: absolute;
            bottom: 3px;
            left: 13px;
            right: 13px;
            height: 2px;
            background: var(--c-gold);
            border-radius: 2px;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.22s var(--ease);
        }

        .sm-nav-link:hover,
        .sm-nav-link.active {
            color: var(--c-black);
            background: var(--c-off-white);
        }

        .sm-nav-link:hover::after,
        .sm-nav-link.active::after { transform: scaleX(1); }

        /* ── Right utilities ── */
        .sm-nav-right {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-shrink: 0;
        }

        /* ── Search ── */
        .sm-search-form {
            position: relative;
            display: flex;
            align-items: center;
        }

        .sm-search-icon {
            position: absolute;
            left: 10px;
            color: var(--c-text-muted);
            font-size: 0.75rem;
            pointer-events: none;
            z-index: 1;
        }

        .sm-search-input {
            width: 175px;
            padding: 7px 12px 7px 28px;
            background: var(--c-off-white);
            border: 1.5px solid var(--c-border);
            border-radius: 20px;
            font-family: var(--font-body);
            font-size: 0.8rem;
            color: var(--c-text);
            outline: none;
            transition: width 0.28s var(--ease), border-color 0.18s, background 0.18s, box-shadow 0.18s;
            -webkit-appearance: none;
        }

        .sm-search-input::placeholder { color: #C0BEB8; }

        .sm-search-input:focus {
            width: 215px;
            border-color: var(--c-gold);
            background: var(--c-white);
            box-shadow: 0 0 0 3px rgba(200, 169, 110, 0.12);
        }

        /* ── Auth Buttons ── */
        .sm-btn-ghost {
            padding: 7px 13px;
            font-family: var(--font-display);
            font-size: 0.78rem;
            font-weight: 700;
            color: var(--c-text-mid);
            text-decoration: none;
            border-radius: 7px;
            letter-spacing: 0.02em;
            transition: color 0.18s, background 0.18s;
            white-space: nowrap;
        }

        .sm-btn-ghost:hover { color: var(--c-black); background: var(--c-off-white); }

        .sm-btn-solid {
            padding: 7px 16px;
            font-family: var(--font-display);
            font-size: 0.78rem;
            font-weight: 800;
            background: var(--c-black);
            color: var(--c-white);
            text-decoration: none;
            border-radius: 7px;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            transition: background 0.18s, transform 0.18s, box-shadow 0.18s;
            white-space: nowrap;
        }

        .sm-btn-solid:hover {
            background: var(--c-charcoal);
            color: var(--c-white);
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.18);
        }

        /* ── Cart icon ── */
        .sm-icon-btn {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            color: var(--c-text-mid);
            font-size: 1rem;
            text-decoration: none;
            transition: background 0.18s, color 0.18s;
        }

        .sm-icon-btn:hover { background: var(--c-off-white); color: var(--c-black); }

        .sm-cart-badge {
            position: absolute;
            top: 1px;
            right: 1px;
            min-width: 16px;
            height: 16px;
            background: var(--c-gold);
            color: var(--c-black);
            font-family: var(--font-display);
            font-size: 0.55rem;
            font-weight: 900;
            border-radius: 99px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 3px;
            line-height: 1;
        }

        /* ── User menu trigger button ── */
        .sm-user-menu {
            position: relative;
        }

        .sm-user-btn {
            display: flex;
            align-items: center;
            gap: 7px;
            padding: 5px 10px 5px 5px;
            background: none;
            border: 1.5px solid var(--c-border);
            border-radius: 20px;
            font-family: var(--font-body);
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--c-text-mid);
            cursor: pointer;
            transition: border-color 0.2s var(--ease), background 0.2s var(--ease);
        }

        .sm-user-btn:hover,
        .sm-user-menu.is-open .sm-user-btn {
            border-color: var(--c-gold);
            background: var(--c-off-white);
        }

        .sm-avatar {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--c-gold), var(--c-gold-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-display);
            font-size: 0.7rem;
            font-weight: 900;
            color: var(--c-white);
            flex-shrink: 0;
            text-transform: uppercase;
        }

        .sm-user-name {
            max-width: 110px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .sm-user-chevron {
            font-size: 0.6rem;
            color: var(--c-text-muted);
            transition: transform 0.22s var(--ease);
            margin-left: 1px;
        }

        .sm-user-menu.is-open .sm-user-chevron {
            transform: rotate(180deg);
        }

        /* ── Custom dropdown panel ── */
        .sm-user-panel {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            min-width: 240px;
            background: var(--c-white);
            border: 1.5px solid var(--c-border);
            border-radius: 14px;
            box-shadow: 0 20px 52px rgba(0,0,0,0.13), 0 4px 14px rgba(0,0,0,0.06);
            padding: 0.45rem;
            z-index: 2000;
            transform-origin: top right;

            /* Hidden state */
            opacity: 0;
            transform: translateY(-8px) scale(0.97);
            pointer-events: none;
            transition: opacity 0.2s var(--ease), transform 0.2s var(--ease);
        }

        .sm-user-menu.is-open .sm-user-panel {
            opacity: 1;
            transform: translateY(0) scale(1);
            pointer-events: auto;
        }

        /* Panel header: avatar + name + email */
        .sm-user-panel-head {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.8rem 0.85rem;
        }

        .sm-user-panel-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--c-gold), var(--c-gold-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-display);
            font-size: 0.85rem;
            font-weight: 900;
            color: var(--c-white);
            flex-shrink: 0;
            text-transform: uppercase;
        }

        .sm-user-panel-name {
            font-family: var(--font-display);
            font-size: 0.875rem;
            font-weight: 700;
            color: var(--c-black);
            line-height: 1.2;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 150px;
        }

        .sm-user-panel-email {
            font-size: 0.72rem;
            color: var(--c-text-muted);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 150px;
        }

        .sm-panel-sep {
            height: 1px;
            background: var(--c-border);
            margin: 0.35rem 0;
        }

        /* Menu items */
        .sm-user-item {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            padding: 0.6rem 0.85rem;
            border-radius: 9px;
            font-family: var(--font-body);
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--c-text-mid);
            text-decoration: none;
            transition: background 0.15s var(--ease), color 0.15s var(--ease);
            cursor: pointer;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
        }

        .sm-user-item:hover {
            background: var(--c-off-white);
            color: var(--c-black);
        }

        .sm-user-item:hover .sm-user-item-ic {
            color: var(--c-gold-dark);
        }

        .sm-user-item-ic {
            width: 15px;
            text-align: center;
            color: var(--c-text-muted);
            font-size: 0.8rem;
            flex-shrink: 0;
            transition: color 0.15s var(--ease);
        }

        .sm-user-item-danger {
            color: var(--c-error);
        }

        .sm-user-item-danger:hover {
            background: #fff5f5;
            color: var(--c-error);
        }

        .sm-user-item-danger .sm-user-item-ic,
        .sm-user-item-danger:hover .sm-user-item-ic {
            color: var(--c-error);
        }

        /* ── Page header (shop page) ── */
        .page-header {
            background: var(--c-off-white);
            border-bottom: 1px solid var(--c-border);
            padding: 1.5rem 0 1.25rem;
        }

        .page-header h1 {
            font-family: var(--font-display);
            font-size: 1.75rem;
            font-weight: 900;
            letter-spacing: -0.02em;
            margin: 0;
        }

        .page-header .breadcrumb {
            font-size: 0.8rem;
        }

        .page-header .breadcrumb-item a { color: var(--c-gold-dark); }

        /* ── Filter sidebar (shop page) ── */
        .filter-sidebar { display: flex; flex-direction: column; gap: 0.75rem; }

        .filter-card {
            background: var(--c-white);
            border: 1px solid var(--c-border);
            border-radius: 10px;
            padding: 1rem 1.1rem;
        }

        /* ═══════════════════════════════════════════════════════════
           FLASH MESSAGES
        ═══════════════════════════════════════════════════════════ */
        .flash-wrap { position: sticky; top: var(--nav-h); z-index: 1020; }

        /* ═══════════════════════════════════════════════════════════
           FOOTER
        ═══════════════════════════════════════════════════════════ */
        .sm-footer {
            background: var(--c-black);
            color: rgba(255, 255, 255, 0.65);
            padding: 3.5rem 0 0;
            margin-top: 5rem;
            font-size: 0.875rem;
        }

        .sm-footer-brand {
            font-family: var(--font-display);
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--c-white);
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            margin-bottom: 0.9rem;
        }

        .sm-footer-brand-mark {
            width: 32px;
            height: 32px;
            background: var(--c-gold);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--c-black);
            font-size: 0.85rem;
            flex-shrink: 0;
        }

        .sm-footer-tagline {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.4);
            line-height: 1.65;
            max-width: 260px;
        }

        .sm-footer-heading {
            font-family: var(--font-display);
            font-size: 0.68rem;
            font-weight: 800;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--c-white);
            margin-bottom: 1rem;
        }

        .sm-footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .sm-footer-links a {
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
            font-size: 0.85rem;
            transition: color 0.18s;
        }

        .sm-footer-links a:hover { color: var(--c-gold); }

        .sm-footer-social {
            display: flex;
            gap: 0.6rem;
            flex-wrap: wrap;
        }

        .sm-social-btn {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.07);
            border: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255, 255, 255, 0.55);
            font-size: 0.9rem;
            text-decoration: none;
            transition: background 0.18s, color 0.18s, border-color 0.18s;
        }

        .sm-social-btn:hover {
            background: rgba(200, 169, 110, 0.18);
            border-color: rgba(200, 169, 110, 0.4);
            color: var(--c-gold);
        }

        .sm-footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            margin-top: 2.5rem;
            padding: 1.25rem 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .sm-footer-copy {
            font-size: 0.78rem;
            color: rgba(255, 255, 255, 0.28);
        }

        .sm-footer-legal {
            display: flex;
            gap: 1.25rem;
        }

        .sm-footer-legal a {
            font-size: 0.78rem;
            color: rgba(255, 255, 255, 0.28);
            text-decoration: none;
            transition: color 0.18s;
        }

        .sm-footer-legal a:hover { color: var(--c-gold); }

        /* ═══════════════════════════════════════════════════════════
           RESPONSIVE — NAVBAR
        ═══════════════════════════════════════════════════════════ */
        @media (max-width: 991.98px) {
            .sm-toggler { display: flex; }

            .sm-collapse {
                position: absolute;
                top: var(--nav-h);
                left: 0;
                right: 0;
                background: var(--c-white);
                border-bottom: 1px solid var(--c-border);
                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
                padding: 1rem 1.25rem 1.25rem;
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
                z-index: 1029;
                /* collapsed by default */
                display: none;
            }

            .sm-collapse.open { display: flex; }

            .sm-nav-links {
                flex-direction: column;
                align-items: flex-start;
                gap: 2px;
                width: 100%;
                margin: 0;
            }

            .sm-nav-link { width: 100%; }

            .sm-nav-right {
                flex-wrap: wrap;
                width: 100%;
                gap: 8px;
            }

            .sm-search-form { width: 100%; }
            .sm-search-input { width: 100%; border-radius: 8px; }
            .sm-search-input:focus { width: 100%; }
        }

        @media (max-width: 575.98px) {
            .sm-btn-ghost,
            .sm-btn-solid { flex: 1; text-align: center; justify-content: center; display: flex; }
        }

        /* ═══════════════════════════════════════════════════════════
           FADE-UP ANIMATION SYSTEM
           ─ JS auto-adds .sm-animate to target elements by their
             existing CSS class names — no HTML attributes needed.
           ─ On page load: above-fold elements reveal with a stagger.
           ─ On scroll: below-fold elements reveal as they enter view.
           ─ .sm-animate is added by JS so content is always visible
             if JS is blocked or fails.
        ═══════════════════════════════════════════════════════════ */

        /* Hidden state — only applied once JS adds the class */
        .sm-animate {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.6s cubic-bezier(0.4, 0, 0.2, 1),
                        transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            will-change: opacity, transform;
        }

        /* Visible state — JS adds .sm-in when element enters viewport */
        .sm-animate.sm-in {
            opacity: 1;
            transform: translateY(0);
        }

        /* ── Button hover micro-interactions ── */
        .btn-hero-primary,
        .btn-hero-secondary,
        .btn-prod-view,
        .btn-prod-cart,
        .btn-checkout,
        .btn-place-order,
        .btn-shop-more,
        .btn-mission,
        .sm-btn-solid {
            transition: background 0.2s cubic-bezier(0.4, 0, 0.2, 1),
                        color 0.2s cubic-bezier(0.4, 0, 0.2, 1),
                        transform 0.2s cubic-bezier(0.4, 0, 0.2, 1),
                        box-shadow 0.2s cubic-bezier(0.4, 0, 0.2, 1),
                        border-color 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* ── Product card hover polish ── */
        .prod-card {
            transition: transform 0.28s cubic-bezier(0.4, 0, 0.2, 1),
                        box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1),
                        border-color 0.28s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Respect reduced-motion — show everything instantly */
        @media (prefers-reduced-motion: reduce) {
            .sm-animate {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
            }
        }
    </style>

    @yield('head')
</head>
<body>

<!-- ═══════════════════════════════════════════════════════════
     NAVBAR
═══════════════════════════════════════════════════════════ -->
<nav class="sm-nav" id="smNav" role="navigation" aria-label="Main navigation">
    <div class="container">

        {{-- Brand / Logo --}}
        <a class="sm-brand" href="{{ route('home') }}" aria-label="SoleMates Footwear — Home">
            <div class="sm-brand-mark" aria-hidden="true">
                <i class="fas fa-shoe-prints"></i>
            </div>
            <span class="sm-brand-name">Sole<em>Mates</em></span>
        </a>

        {{-- Mobile toggle --}}
        <button class="sm-toggler"
                id="smToggler"
                aria-expanded="false"
                aria-controls="smCollapse"
                aria-label="Toggle navigation">
            <i class="fas fa-bars" id="smTogglerIcon" aria-hidden="true"></i>
        </button>

        {{-- Collapsible content --}}
        <div class="sm-collapse" id="smCollapse">

            {{-- ── Centre: Page Links ── --}}
            <ul class="sm-nav-links" role="list">
                <li>
                    <a href="{{ route('home') }}"
                       class="sm-nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       aria-current="{{ request()->routeIs('home') ? 'page' : 'false' }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}"
                       class="sm-nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}"
                       aria-current="{{ request()->routeIs('products.*') ? 'page' : 'false' }}">
                        Shop
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}"
                       class="sm-nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                       aria-current="{{ request()->routeIs('about') ? 'page' : 'false' }}">
                        About
                    </a>
                </li>
            </ul>

            {{-- ── Right: Search + Auth ── --}}
            <div class="sm-nav-right">

                {{-- Search --}}
                <form class="sm-search-form" action="{{ route('search') }}" method="GET" role="search">
                    <i class="fas fa-search sm-search-icon" aria-hidden="true"></i>
                    <input class="sm-search-input"
                           type="search"
                           name="search"
                           placeholder="Search shoes…"
                           value="{{ request('search') }}"
                           autocomplete="off"
                           aria-label="Search products">
                </form>

                @guest
                    <a href="{{ route('login') }}" class="sm-btn-ghost">Sign In</a>
                    <a href="{{ route('register') }}" class="sm-btn-solid">Register</a>
                @else
                    {{-- Cart --}}
                    <a href="{{ route('cart.index') }}" class="sm-icon-btn" aria-label="Shopping cart">
                        <i class="fas fa-shopping-bag" aria-hidden="true"></i>
                        @php $cartCount = \App\Models\Cart::where('user_id', Auth::id())->count(); @endphp
                        @if($cartCount > 0)
                            <span class="sm-cart-badge" aria-label="{{ $cartCount }} items in cart">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>

                    {{-- Custom user menu dropdown --}}
                    <div class="sm-user-menu" id="smUserMenu">

                        <button class="sm-user-btn"
                                id="smUserBtn"
                                type="button"
                                aria-expanded="false"
                                aria-haspopup="true"
                                aria-controls="smUserPanel">
                            <span class="sm-avatar" aria-hidden="true">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </span>
                            <span class="sm-user-name">{{ auth()->user()->name }}</span>
                            <i class="fas fa-chevron-down sm-user-chevron" aria-hidden="true"></i>
                        </button>

                        <div class="sm-user-panel" id="smUserPanel" role="menu">

                            {{-- Identity header --}}
                            <div class="sm-user-panel-head">
                                <div class="sm-user-panel-avatar" aria-hidden="true">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                                <div style="min-width:0;">
                                    <div class="sm-user-panel-name">{{ auth()->user()->name }}</div>
                                    <div class="sm-user-panel-email">{{ auth()->user()->email }}</div>
                                </div>
                            </div>

                            <div class="sm-panel-sep"></div>

                            {{-- Navigation items --}}
                            <a href="{{ route('profile.edit') }}"
                               class="sm-user-item"
                               role="menuitem">
                                <i class="fas fa-user-circle sm-user-item-ic" aria-hidden="true"></i>
                                My Profile
                            </a>

                            <a href="{{ route('cart.index') }}"
                               class="sm-user-item"
                               role="menuitem">
                                <i class="fas fa-shopping-bag sm-user-item-ic" aria-hidden="true"></i>
                                My Cart
                                @php $cartCount = \App\Models\Cart::where('user_id', Auth::id())->count(); @endphp
                                @if($cartCount > 0)
                                    <span style="margin-left:auto;background:var(--c-gold);color:var(--c-black);font-size:0.6rem;font-weight:900;border-radius:99px;padding:1px 7px;font-family:var(--font-display);">
                                        {{ $cartCount }}
                                    </span>
                                @endif
                            </a>

                            <a href="{{ route('profile.orders') }}"
                               class="sm-user-item"
                               role="menuitem">
                                <i class="fas fa-box sm-user-item-ic" aria-hidden="true"></i>
                                My Orders
                            </a>

                            @if(auth()->user()->isAdmin())
                                <div class="sm-panel-sep"></div>
                                <a href="{{ route('admin.dashboard') }}"
                                   class="sm-user-item"
                                   role="menuitem">
                                    <i class="fas fa-cog sm-user-item-ic" aria-hidden="true"></i>
                                    Admin Panel
                                </a>
                            @endif

                            <div class="sm-panel-sep"></div>

                            <button class="sm-user-item sm-user-item-danger"
                                    role="menuitem"
                                    onclick="document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt sm-user-item-ic" aria-hidden="true"></i>
                                Sign Out
                            </button>

                        </div>{{-- /.sm-user-panel --}}
                    </div>{{-- /.sm-user-menu --}}
                @endguest

            </div>{{-- /.sm-nav-right --}}
        </div>{{-- /.sm-collapse --}}
    </div>{{-- /.container --}}
</nav>

<!-- ═══════════════════════════════════════════════════════════
     MAIN CONTENT
═══════════════════════════════════════════════════════════ -->
<main class="main-content" style="margin-top: var(--nav-h);">

    {{-- Flash Messages --}}
    @if(session('success') || session('error'))
        <div class="flash-wrap">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-0 rounded-0 border-0 border-bottom"
                     style="border-color: var(--c-border) !important; font-size:0.875rem;"
                     role="alert">
                    <i class="fas fa-check-circle me-2 text-success" aria-hidden="true"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-0 rounded-0 border-0 border-bottom"
                     style="font-size:0.875rem;"
                     role="alert">
                    <i class="fas fa-exclamation-circle me-2" aria-hidden="true"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    @endif

    @yield('content')

</main>

<!-- ═══════════════════════════════════════════════════════════
     FOOTER
═══════════════════════════════════════════════════════════ -->
<footer class="sm-footer" role="contentinfo">
    <div class="container">
        <div class="row g-4 pb-2">

            {{-- Brand column --}}
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('home') }}" class="sm-footer-brand" aria-label="SoleMates Footwear">
                    <div class="sm-footer-brand-mark" aria-hidden="true">
                        <i class="fas fa-shoe-prints"></i>
                    </div>
                    Sole<span style="color:var(--c-gold);">Mates</span>
                </a>
                <p class="sm-footer-tagline">
                    Your trusted partner for quality footwear since 2024.
                    Every pair, hand-picked for comfort and style.
                </p>
                <div class="sm-footer-social mt-3" role="list" aria-label="Social media links">
                    <a href="#" class="sm-social-btn" role="listitem" aria-label="Facebook" title="Facebook">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="sm-social-btn" role="listitem" aria-label="Instagram" title="Instagram">
                        <i class="fab fa-instagram" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="sm-social-btn" role="listitem" aria-label="Twitter / X" title="Twitter">
                        <i class="fab fa-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="sm-social-btn" role="listitem" aria-label="TikTok" title="TikTok">
                        <i class="fab fa-tiktok" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="col-lg-2 col-md-3 col-6">
                <p class="sm-footer-heading">Shop</p>
                <ul class="sm-footer-links">
                    <li><a href="{{ route('products.index') }}">All Products</a></li>
                    <li><a href="{{ route('products.index', ['sort' => 'latest']) }}">New Arrivals</a></li>
                    <li><a href="{{ route('products.index') }}">Featured Picks</a></li>
                    <li><a href="{{ route('products.index') }}">Sale</a></li>
                </ul>
            </div>

            {{-- Company --}}
            <div class="col-lg-2 col-md-3 col-6">
                <p class="sm-footer-heading">Company</p>
                <ul class="sm-footer-links">
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('about') }}#contact">Contact</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Press</a></li>
                </ul>
            </div>

            {{-- Support --}}
            <div class="col-lg-2 col-md-4 col-6">
                <p class="sm-footer-heading">Support</p>
                <ul class="sm-footer-links">
                    @auth
                        <li><a href="{{ route('profile.orders') }}">Track Order</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Track Order</a></li>
                    @endauth
                    <li><a href="{{ route('about') }}#contact">Help Centre</a></li>
                    <li><a href="#">Returns</a></li>
                    <li><a href="#">Size Guide</a></li>
                </ul>
            </div>

            {{-- Account --}}
            <div class="col-lg-2 col-md-4 col-6">
                <p class="sm-footer-heading">Account</p>
                <ul class="sm-footer-links">
                    @guest
                        <li><a href="{{ route('login') }}">Sign In</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li><a href="{{ route('profile.edit') }}">My Profile</a></li>
                        <li><a href="{{ route('profile.orders') }}">My Orders</a></li>
                        <li><a href="{{ route('cart.index') }}">My Cart</a></li>
                    @endguest
                </ul>
            </div>

        </div>

        {{-- Footer bottom bar --}}
        <div class="sm-footer-bottom">
            <p class="sm-footer-copy mb-0">
                &copy; {{ date('Y') }} SoleMates Footwear. All rights reserved.
            </p>
            <nav class="sm-footer-legal" aria-label="Legal links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Use</a>
                <a href="#">Cookie Policy</a>
            </nav>
        </div>
    </div>
</footer>

{{-- Hidden logout form --}}
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;" aria-hidden="true">
    @csrf
</form>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
(function () {
    'use strict';

    /* ── Scroll shadow + glassmorphism intensity on navbar ── */
    var nav = document.getElementById('smNav');
    if (nav) {
        window.addEventListener('scroll', function () {
            nav.classList.toggle('is-scrolled', window.scrollY > 12);
        }, { passive: true });
    }

    /* ── Mobile nav toggler ── */
    var toggler     = document.getElementById('smToggler');
    var collapse    = document.getElementById('smCollapse');
    var togglerIcon = document.getElementById('smTogglerIcon');

    if (toggler && collapse) {
        toggler.addEventListener('click', function () {
            var isOpen = collapse.classList.toggle('open');
            toggler.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            if (togglerIcon) {
                togglerIcon.className = isOpen ? 'fas fa-times' : 'fas fa-bars';
            }
        });

        /* Close on outside click */
        document.addEventListener('click', function (e) {
            if (!nav.contains(e.target)) {
                collapse.classList.remove('open');
                toggler.setAttribute('aria-expanded', 'false');
                if (togglerIcon) togglerIcon.className = 'fas fa-bars';
            }
        });
    }

    /* ── Bootstrap dropdown init (for any remaining BS dropdowns) ── */
    if (typeof bootstrap !== 'undefined') {
        document.querySelectorAll('[data-bs-toggle="dropdown"]').forEach(function (el) {
            new bootstrap.Dropdown(el);
        });
    }

    /* ── Custom user menu dropdown ── */
    var userMenu = document.getElementById('smUserMenu');
    var userBtn  = document.getElementById('smUserBtn');

    if (userMenu && userBtn) {

        /* Toggle on button click */
        userBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            var isOpen = userMenu.classList.toggle('is-open');
            userBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });

        /* Close when clicking anywhere outside the menu */
        document.addEventListener('click', function (e) {
            if (!userMenu.contains(e.target)) {
                userMenu.classList.remove('is-open');
                userBtn.setAttribute('aria-expanded', 'false');
            }
        });

        /* Close on Escape key */
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && userMenu.classList.contains('is-open')) {
                userMenu.classList.remove('is-open');
                userBtn.setAttribute('aria-expanded', 'false');
                userBtn.focus();
            }
        });
    }

    /* ══════════════════════════════════════════════════════════
       FADE-UP ANIMATION ENGINE
       ─ Automatically targets elements by their existing CSS
         class names — no data-* attributes needed in HTML.
       ─ On page load: elements already on screen reveal with a
         small stagger ordered by their vertical position.
       ─ On scroll: elements below the fold reveal as they enter
         the viewport (fires once per element, never repeats).
       ─ The double requestAnimationFrame trick ensures the
         browser has actually painted opacity:0 before the
         observer starts — without it the transition is skipped.
    ══════════════════════════════════════════════════════════ */
    (function () {

        /* Skip entirely for reduced-motion users */
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

        /* ── Elements to animate (by existing class names) ── */
        var SELECTORS = [
            /* ---- Homepage hero ---- */
            '.hero-kicker',
            '.hero-title',
            '.hero-subtitle',
            '.hero-cta',
            '.hero-trust',
            '.hero-card',

            /* ---- Homepage sections ---- */
            '.hp-sec-head',
            '.cat-strip',
            '.carousel-outer',
            '.carousel-dots',
            '.hp-empty',

            /* ---- Product cards (homepage + shop) ---- */
            '.prod-card',

            /* ---- Shop page ---- */
            '.sort-bar',
            '.filter-card',
            '.empty-state',

            /* ---- Cart page ---- */
            '.cart-empty',
            '.cart-item-wrap',
            '.summary-card',

            /* ---- Checkout page ---- */
            '.checkout-steps',
            '.co-card',
            '.co-summary',

            /* ---- Order success page ---- */
            '.success-icon-wrap',
            '.success-title',
            '.success-subtitle',
            '.order-card',

            /* ---- About page ---- */
            '.about-hero-inner',
            '.value-card',
            '.contact-card',
            '.mission-banner',
            '.story-visual',

            /* ---- Shared page headers ---- */
            '.page-eyebrow',
            '.page-title',
            '.search-results-title',
        ].join(', ');

        /* Collect all matching elements */
        var all = Array.from(document.querySelectorAll(SELECTORS));
        if (!all.length) return;

        /* Mark every target as animatable (starts hidden via CSS) */
        all.forEach(function (el) { el.classList.add('sm-animate'); });

        /* Helper: is element currently in the visible viewport? */
        function inViewport(el) {
            var r = el.getBoundingClientRect();
            return r.top < window.innerHeight && r.bottom > 0;
        }

        /* Helper: reveal a group with a top-to-bottom stagger */
        function revealGroup(group, baseDelayMs) {
            /* Sort by vertical position so items animate top → down */
            group.slice().sort(function (a, b) {
                return a.getBoundingClientRect().top - b.getBoundingClientRect().top;
            }).forEach(function (el, i) {
                setTimeout(function () { el.classList.add('sm-in'); }, (baseDelayMs || 0) + i * 80);
            });
        }

        /* Split into already-visible vs below-the-fold */
        var onScreen  = all.filter(inViewport);
        var offScreen = all.filter(function (el) { return !inViewport(el); });

        /*
         * Double rAF:
         * Frame 1 — browser schedules a paint with opacity:0 applied.
         * Frame 2 — that paint is committed to screen.
         * NOW we trigger .sm-in so the CSS transition is visible.
         */
        requestAnimationFrame(function () {
            requestAnimationFrame(function () {
                revealGroup(onScreen, 60); /* slight initial delay feels natural */
            });
        });

        /* Scroll reveal via IntersectionObserver */
        if (!('IntersectionObserver' in window)) {
            /* Fallback for very old browsers */
            offScreen.forEach(function (el) { el.classList.add('sm-in'); });
            return;
        }

        var scrollObserver = new IntersectionObserver(function (entries) {
            var visible = [];
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    visible.push(entry.target);
                    scrollObserver.unobserve(entry.target); /* fire once only */
                }
            });
            if (visible.length) revealGroup(visible, 0);
        }, {
            threshold:  0.08,              /* 8 % of element visible = trigger  */
            rootMargin: '0px 0px -40px 0px' /* 40 px before bottom of viewport  */
        });

        offScreen.forEach(function (el) { scrollObserver.observe(el); });

    })();

})();
</script>

@yield('scripts')
</body>
</html>
