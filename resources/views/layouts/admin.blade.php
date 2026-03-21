<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') â€” SoleMates</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet"></noscript>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            /* Brand palette - Match user-facing design */
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

            /* Typography - Match user-facing */
            --font-display: 'Montserrat', system-ui, sans-serif;
            --font-body:    'Inter', system-ui, sans-serif;
            --font-mono:    'Courier New', ui-monospace, monospace;

            /* Layout */
            --nav-h: 68px;
            --sidebar-w: 280px;
            --topbar-h: 72px;
            --ease: cubic-bezier(0.4, 0, 0.2, 1);

            /* Aliases for backward compatibility */
            --bg:           var(--c-cream);
            --surface:      var(--c-white);
            --surface-2:    var(--c-off-white);
            --border:       var(--c-border);
            --border-strong:var(--c-text-muted);
            /* Sidebar */
            --sidebar-bg:   var(--c-black);
            --sidebar-border: rgba(255,255,255,0.07);
            /* Text */
            --text-primary:   var(--c-text);
            --text-secondary: var(--c-text-mid);
            --text-muted:     var(--c-text-muted);
            /* Brand */
            --accent:         var(--c-gold);
            --accent-light:   rgba(200,169,110,0.12);
            --accent-dark:    var(--c-gold-dark);
            /* Semantic */
            --green:          var(--c-success);
            --green-light:    rgba(33,150,83,0.1);
            --blue:           #2563EB;
            --blue-light:     rgba(37,99,235,0.1);
            --amber:          #D97706;
            --amber-light:    rgba(217,119,6,0.1);
            --red:            var(--c-error);
            --red-light:      rgba(192,57,43,0.1);
            --purple:         #7C3AED;
            --purple-light:   rgba(124,58,237,0.1);
            /* Font */
            --font-sans:    var(--font-body);
            /* Shadow */
            --shadow-sm:  0 1px 2px rgba(0,0,0,0.05);
            --shadow:     0 1px 4px rgba(0,0,0,0.08), 0 0 0 1px rgba(0,0,0,0.04);
            --shadow-md:  0 4px 16px rgba(0,0,0,0.1), 0 0 0 1px rgba(0,0,0,0.04);
            /* Radius */
            --radius-sm:  8px;
            --radius:     12px;
            --radius-lg:  16px;
            --radius-full: 9999px;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: var(--font-sans);
            background: var(--bg);
            color: var(--text-primary);
            display: flex;
            min-height: 100vh;
            font-size: 14px;
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
        }

        /* ============================================
           SIDEBAR
        ============================================ */
        .admin-sidebar {
            width: var(--sidebar-w);
            background: var(--sidebar-bg);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: fixed;
            left: 0; top: 0; bottom: 0;
            z-index: 200;
            transition: transform 0.3s var(--ease);
            border-right: 1px solid var(--sidebar-border);
            box-shadow: 2px 0 20px rgba(0,0,0,0.08);
        }

        .sidebar-brand {
            padding: 1.5rem 1.25rem 1.25rem;
            border-bottom: 1px solid var(--sidebar-border);
            display: flex; align-items: center; gap: 0.875rem;
        }
        .sidebar-brand-icon {
            width: 36px; height: 36px;
            background: var(--c-gold);
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
            font-family: var(--font-display);
            font-style: italic; font-size: 1.1rem; font-weight: 700;
            color: var(--c-black); flex-shrink: 0;
            transition: background 0.2s var(--ease);
        }
        .sidebar-brand:hover .sidebar-brand-icon { background: var(--c-gold-hover); }
        .sidebar-brand-text .brand-name {
            font-family: var(--font-display);
            font-size: 1.1rem; font-weight: 800; font-style: italic;
            color: #FFFFFF; line-height: 1.1;
        }
        .sidebar-brand-text .brand-sub {
            font-size: 0.65rem; letter-spacing: 0.18em;
            text-transform: uppercase; color: rgba(255,255,255,0.25);
            margin-top: 3px;
        }

        .sidebar-nav {
            flex: 1; padding: 1.25rem 0.75rem;
            overflow-y: auto; scrollbar-width: none;
        }
        .sidebar-nav::-webkit-scrollbar { display: none; }

        .nav-section {
            margin-bottom: 1rem;
        }
        .nav-section-label {
            display: block;
            font-size: 0.65rem; letter-spacing: 0.2em;
            text-transform: uppercase; color: rgba(255,255,255,0.28);
            padding: 1.25rem 1rem 0.75rem;
            font-weight: 600;
            font-family: var(--font-mono);
        }

        .sidebar-link {
            display: flex; align-items: center; gap: 0.875rem;
            padding: 0.75rem 1rem;
            color: rgba(255,255,255,0.6);
            text-decoration: none; font-size: 0.9rem; font-weight: 500;
            border-radius: var(--radius);
            transition: background 0.2s var(--ease), color 0.2s var(--ease), transform 0.2s var(--ease), box-shadow 0.2s var(--ease);
            width: 100%; text-align: left;
            position: relative;
            overflow: hidden;
            font-family: var(--font-body);
        }
        .sidebar-link::before { display: none; }
        .sidebar-link i {
            font-size: 1rem;
            width: 20px;
            flex-shrink: 0;
            transition: transform 0.2s var(--ease), color 0.2s var(--ease);
            opacity: 0.7;
        }
        .sidebar-link:hover {
            color: rgba(255,255,255,0.95);
            background: rgba(255,255,255,0.08);
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .sidebar-link:hover::before { display: none; }
        .sidebar-link:hover i {
            transform: scale(1.1);
            opacity: 1;
        }
        .sidebar-link.active {
            color: var(--c-gold);
            background: rgba(200,169,110,0.12);
            font-weight: 600;
            box-shadow: 0 0 0 1px rgba(200,169,110,0.25);
            transform: translateX(2px);
        }
        .sidebar-link.active::before { display: none; }
        .sidebar-link.active i {
            color: var(--c-gold);
            opacity: 1;
        }

        .sidebar-divider { height: 1px; background: var(--sidebar-border); margin: 0.5rem 0; }

        .sidebar-footer {
            padding: 0.875rem 0.75rem;
            border-top: 1px solid var(--sidebar-border);
        }
        .sidebar-user {
            display: flex; align-items: center; gap: 0.6rem;
            padding: 0.5rem 0.625rem; border-radius: var(--radius-sm);
            margin-bottom: 0.375rem;
        }
        .sidebar-avatar {
            width: 30px; height: 30px; border-radius: 50%;
            background: var(--accent); color: #0C0C0C;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.75rem; font-weight: 700;
            overflow: hidden; flex-shrink: 0;
        }
        .sidebar-avatar img { width: 100%; height: 100%; object-fit: cover; }
        .sidebar-user-name {
            font-size: 0.813rem; font-weight: 600; color: #FFFFFF;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.2;
        }
        .sidebar-user-role {
            font-size: 0.6rem; color: rgba(255,255,255,0.28);
            letter-spacing: 0.06em; text-transform: uppercase;
        }

        /* ============================================
           MAIN CONTENT
        ============================================ */
        .admin-main {
            margin-left: var(--sidebar-w);
            flex: 1; display: flex; flex-direction: column; min-height: 100vh;
            background: var(--c-cream);
        }

        .admin-topbar {
            height: var(--topbar-h);
            background: #FFFFFF;
            border-bottom: 1px solid var(--c-border);
            padding: 0 2rem;
            display: flex; align-items: center; justify-content: space-between;
            position: sticky; top: 0; z-index: 100;
            box-shadow: 0 1px 0 var(--c-border);
        }

        .topbar-left {
            display: flex; align-items: center; gap: 1rem;
            flex: 1 1 auto;
            min-width: 0;
        }
        .topbar-title {
            font-size: 1.34rem; font-weight: 800;
            color: var(--c-text);
            letter-spacing: -0.02em;
            font-family: var(--font-display);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .topbar-right {
            display: flex; align-items: center; gap: 0.75rem;
            flex-wrap: wrap;
            justify-content: flex-end;
            min-width: 0;
        }
        .topbar-right .btn-primary-admin,
        .topbar-right .btn-secondary-admin {
            margin-left: 0.25rem;
        }

        .sidebar-toggle-btn {
            display: none; background: none; border: none;
            font-size: 1.2rem; cursor: pointer;
            color: var(--c-text-mid); padding: 0.5rem;
            border-radius: var(--radius); line-height: 1;
            transition: background 0.2s var(--ease), color 0.2s var(--ease);
        }
        .sidebar-toggle-btn:hover {
            color: var(--c-text);
            background: var(--c-off-white);
        }

        .admin-content {
            padding: 2rem;
            flex: 1;
        }

        /* ============================================
           FLASH MESSAGES
        ============================================ */
        .flash-wrap { padding: 1rem 1.75rem 0; }
        .flash-alert {
            display: flex; align-items: center; gap: 0.75rem;
            padding: 0.813rem 1rem; border-radius: var(--radius);
            font-size: 0.875rem; font-weight: 500;
            margin-bottom: 0.5rem; border: 1px solid;
            animation: slideIn 0.2s ease;
        }
        @keyframes slideIn { from { opacity:0; transform:translateY(-5px); } to { opacity:1; transform:translateY(0); } }
        .flash-success { background:var(--green-light); border-color:rgba(22,163,74,0.25); color:#14532d; }
        .flash-error   { background:var(--red-light);   border-color:rgba(220,38,38,0.25);  color:#7f1d1d; }
        .flash-alert .btn-close { margin-left: auto; opacity: 0.5; }

        /* ============================================
           BUTTONS
        ============================================ */
        .btn-primary-admin {
            display: inline-flex; align-items: center; gap: 0.5rem;
            background: var(--c-black);
            color: var(--c-white);
            font-size: 0.85rem; font-weight: 700;
            padding: 0.75rem 1.25rem; border-radius: 7px;
            border: none; cursor: pointer; text-decoration: none; white-space: nowrap;
            transition: background 0.2s var(--ease), transform 0.2s var(--ease), box-shadow 0.2s var(--ease);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
            position: relative; overflow: hidden;
            font-family: var(--font-display);
            letter-spacing: 0.02em;
            text-transform: uppercase;
        }
        .btn-primary-admin::before { display: none; }
        .btn-primary-admin:hover {
            background: var(--c-charcoal);
            color: var(--c-white);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.18);
        }
        .btn-primary-admin:active {
            transform: translateY(0);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
        }

        .btn-secondary-admin {
            display: inline-flex; align-items: center; gap: 0.5rem;
            background: var(--c-white);
            color: var(--c-text-mid);
            font-size: 0.85rem; font-weight: 600;
            padding: 0.75rem 1.25rem; border-radius: 7px;
            border: 1.5px solid var(--c-border); cursor: pointer;
            text-decoration: none; white-space: nowrap;
            transition: background 0.2s var(--ease), color 0.2s var(--ease), border-color 0.2s var(--ease), transform 0.2s var(--ease), box-shadow 0.2s var(--ease);
            font-family: var(--font-display);
            letter-spacing: 0.01em;
        }
        .btn-secondary-admin::before { display: none; }
        .btn-secondary-admin:hover {
            background: var(--c-off-white);
            color: var(--c-text);
            border-color: var(--c-gold);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .action-btn {
            display: inline-flex; align-items: center; justify-content: center;
            width: 36px; height: 36px; border-radius: 8px;
            border: 1.5px solid var(--c-border); background: var(--c-white);
            color: var(--c-text-mid); cursor: pointer; text-decoration: none;
            font-size: 0.9rem; transition: background 0.2s var(--ease), color 0.2s var(--ease), border-color 0.2s var(--ease), transform 0.2s var(--ease), box-shadow 0.2s var(--ease);
            position: relative; overflow: hidden;
        }
        .action-btn::before { display: none; }
        .action-btn:hover {
            color: var(--c-text);
            background: var(--c-off-white);
            border-color: var(--c-gold);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }
        .action-btn.danger:hover {
            color: var(--c-error);
            border-color: rgba(192,57,43,0.3);
            background: rgba(192,57,43,0.05);
        }
        .action-btn.success:hover {
            color: var(--c-success);
            border-color: rgba(33,150,83,0.3);
            background: rgba(33,150,83,0.05);
        }
        .action-btn.warning:hover { color: var(--amber); border-color: rgba(217,119,6,0.35);  background: var(--amber-light); }

        /* ============================================
           PANEL / CARD
        ============================================ */
        .panel {
            background: var(--c-white);
            border: 1px solid var(--c-border);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            transition: box-shadow 0.2s var(--ease);
        }
        .panel:hover {
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        .panel-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--c-border);
            display: flex; align-items: center; justify-content: space-between;
            background: var(--c-off-white);
        }
        .panel-title {
            font-size: 1rem; font-weight: 700;
            color: var(--c-text);
            letter-spacing: -0.01em;
            font-family: var(--font-display);
            margin: 0;
        }

        /* ============================================
           STAT CARDS
        ============================================ */
        .stat-card {
            background: var(--c-white); border: 1px solid var(--c-border);
            border-radius: var(--radius); padding: 1.35rem 1.2rem;
            display: flex; align-items: center; justify-content: flex-start; gap: 1rem;
            transition: box-shadow 0.2s var(--ease), transform 0.2s var(--ease);
            min-height: 96px;
        }
        .stat-card:hover { box-shadow: 0 8px 24px rgba(0,0,0,0.08); transform: translateY(-2px); }
        .stat-icon { width: 46px; height: 46px; border-radius: 12px; font-size: 1.2rem; }
        .stat-body { flex: 1; min-width: 0; display: flex; flex-direction: column; justify-content: center; }
        .stat-value { font-family: var(--font-display); font-size: 2rem; font-weight: 800; line-height: 1; color: var(--c-text); margin-bottom: 0.15rem; display: flex; align-items: center; gap: 0.4rem; }
        .stat-label { font-family: var(--font-mono); font-size: 0.72rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em; color: var(--c-text-mid); margin-bottom: 0; }
        .stat-icon {
            width: 44px; height: 44px; border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem; flex-shrink: 0;
            background: var(--c-off-white);
            color: var(--c-text);
        }
        .stat-icon-amber  { background: rgba(217,119,6,0.12);  color: var(--amber); }
        .stat-icon-blue   { background: var(--blue-light);   color: var(--blue); }
        .stat-icon-purple { background: var(--purple-light); color: var(--purple); }
        .stat-icon-green  { background: var(--green-light);  color: var(--green); }
        .stat-icon-accent { background: var(--accent-light); color: var(--accent); }
        .stat-body { flex: 1; min-width: 0; display: flex; flex-direction: column; justify-content: center; }
        .stat-value {
            font-family: var(--font-display);
            font-size: 2rem; font-weight: 800;
            line-height: 1; letter-spacing: -0.02em;
            color: var(--c-text); margin-bottom: 0.2rem;
        }
        .stat-label {
            font-family: var(--font-mono);
            font-size: 0.72rem; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.1em; color: var(--c-text-mid);
            margin-bottom: 0;
        }

        /* ============================================
           DATA TABLE
        ============================================ */
        .data-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            background: var(--c-white);
            border: 1px solid var(--c-border);
        }
        .data-table thead th {
            background: linear-gradient(135deg, var(--c-off-white), var(--c-white));
            color: var(--c-text-muted);
            font-size: 0.75rem; font-weight: 600;
            letter-spacing: 0.08em; text-transform: uppercase;
            padding: 1.25rem 1.5rem;
            border-bottom: 2px solid var(--c-border);
            white-space: nowrap;
            position: relative;
            font-family: var(--font-mono);
        }
        .data-table thead th:first-child { border-radius: var(--radius-sm) 0 0 var(--radius-sm); }
        .data-table thead th:last-child { border-radius: 0 var(--radius-sm) var(--radius-sm) 0; }
        .data-table tbody td {
            padding: 1.5rem 1.5rem;
            border-bottom: 1px solid rgba(228,226,220,0.5);
            font-size: 0.9rem; vertical-align: middle;
            background: var(--c-white);
            transition: background 0.2s var(--ease), border-color 0.2s var(--ease);
            color: var(--c-text);
            position: relative;
        }
        .data-table tbody tr:hover {
            background: var(--c-off-white);
            box-shadow: inset 3px 0 0 var(--c-gold);
        }
        .data-table tbody tr:hover td {
            border-bottom-color: rgba(200,169,110,0.15);
        }
        .data-table .mono {
            font-family: var(--font-mono);
            font-size: 0.9rem;
            font-weight: 600;
            background: var(--c-off-white);
            padding: 0.375rem 0.75rem;
            border-radius: 6px;
            border: 1px solid var(--c-border);
            color: var(--c-text);
        }
        .data-table .subtext {
            font-size: 0.8rem;
            color: var(--c-text-muted);
            margin-top: 4px;
            display: block;
            font-weight: 400;
        }

        /* ============================================
           BADGES
        ============================================ */
        .badge-pill {
            display: inline-flex; align-items: center;
            font-size: 0.7rem; font-weight: 600;
            letter-spacing: 0.04em; text-transform: uppercase;
            padding: 0.375rem 0.875rem; border-radius: 20px;
            border: 1px solid transparent;
            transition: color 0.2s var(--ease), background 0.2s var(--ease), border-color 0.2s var(--ease), box-shadow 0.2s var(--ease);
            position: relative;
            overflow: hidden;
            font-family: var(--font-mono);
        }
        .badge-pill::before { display: none; }
        .badge-pill:hover::before { display: none; }
        .badge-pending {
            background: linear-gradient(135deg, var(--amber-light), rgba(217,119,6,0.05));
            color: #92400e;
            border-color: rgba(217,119,6,0.2);
            box-shadow: 0 1px 3px rgba(217,119,6,0.15);
        }
        .badge-processing {
            background: linear-gradient(135deg, var(--blue-light), rgba(37,99,235,0.05));
            color: #1d4ed8;
            border-color: rgba(37,99,235,0.2);
            box-shadow: 0 1px 3px rgba(37,99,235,0.15);
        }
        .badge-shipped {
            background: linear-gradient(135deg, var(--purple-light), rgba(124,58,237,0.05));
            color: #5b21b6;
            border-color: rgba(124,58,237,0.2);
            box-shadow: 0 1px 3px rgba(124,58,237,0.15);
        }
        .badge-completed {
            background: linear-gradient(135deg, var(--green-light), rgba(22,163,74,0.05));
            color: #14532d;
            border-color: rgba(22,163,74,0.2);
            box-shadow: 0 1px 3px rgba(22,163,74,0.15);
        }
        .badge-cancelled {
            background: linear-gradient(135deg, var(--red-light), rgba(220,38,38,0.05));
            color: #7f1d1d;
            border-color: rgba(220,38,38,0.2);
            box-shadow: 0 1px 3px rgba(220,38,38,0.15);
        }
        .badge-admin {
            background: linear-gradient(135deg, var(--accent-light), rgba(200,169,110,0.05));
            color: var(--accent-dark);
            border-color: rgba(200,169,110,0.2);
            box-shadow: 0 1px 3px rgba(200,169,110,0.15);
        }
        .badge-user {
            background: linear-gradient(135deg, var(--surface-2), rgba(0,0,0,0.03));
            color: var(--text-secondary);
            border: 1px solid var(--border);
        }
        .badge-active {
            background: linear-gradient(135deg, var(--green-light), rgba(22,163,74,0.05));
            color: #14532d;
            border-color: rgba(22,163,74,0.2);
            box-shadow: 0 1px 3px rgba(22,163,74,0.15);
        }
        .badge-inactive {
            background: linear-gradient(135deg, var(--red-light), rgba(220,38,38,0.05));
            color: #7f1d1d;
            border-color: rgba(220,38,38,0.2);
            box-shadow: 0 1px 3px rgba(220,38,38,0.15);
        }
        .badge-instock {
            background: linear-gradient(135deg, var(--green-light), rgba(22,163,74,0.05));
            color: #14532d;
            border-color: rgba(22,163,74,0.2);
            box-shadow: 0 1px 3px rgba(22,163,74,0.15);
        }
        .badge-outofstock {
            background: linear-gradient(135deg, var(--red-light), rgba(220,38,38,0.05));
            color: #7f1d1d;
            border-color: rgba(220,38,38,0.2);
            box-shadow: 0 1px 3px rgba(220,38,38,0.15);
        }
        .badge-lowstock {
            background: linear-gradient(135deg, var(--amber-light), rgba(217,119,6,0.05));
            color: #92400e;
            border-color: rgba(217,119,6,0.2);
            box-shadow: 0 1px 3px rgba(217,119,6,0.15);
        }

        /* ============================================
           FORM CARD
        ============================================ */
        .admin-form-card {
            background: var(--surface); border: 1px solid var(--border);
            border-radius: var(--radius); overflow: hidden;
        }
        .admin-form-card .form-label {
            font-size: 0.72rem; font-weight: 600;
            letter-spacing: 0.08em; text-transform: uppercase;
            color: var(--text-secondary); margin-bottom: 0.375rem;
        }
        .admin-form-card .form-control,
        .admin-form-card .form-select {
            border: 1px solid var(--border); border-radius: var(--radius-sm);
            font-size: 0.875rem; padding: 0.5rem 0.75rem;
            background: var(--surface); color: var(--text-primary);
            transition: border-color 0.14s, box-shadow 0.14s;
        }
        .admin-form-card .form-control:focus,
        .admin-form-card .form-select:focus {
            border-color: var(--accent); box-shadow: 0 0 0 3px rgba(200,169,110,0.12); outline: none;
        }

        /* ============================================
           FILTER BAR
        ============================================ */
        .filter-bar {
            background: var(--surface); border: 1px solid var(--border);
            border-radius: var(--radius); padding: 0.813rem 1.125rem;
            margin-bottom: 1.125rem;
            display: flex; align-items: center; gap: 0.625rem; flex-wrap: wrap;
        }
        .filter-bar .form-control,
        .filter-bar .form-select {
            border: 1px solid var(--border); border-radius: var(--radius-sm);
            font-size: 0.838rem; padding: 0.425rem 0.75rem;
            height: 36px; background: var(--surface-2); color: var(--text-primary);
        }
        .filter-bar .form-control:focus,
        .filter-bar .form-select:focus {
            background: var(--surface); border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(200,169,110,0.1); outline: none;
        }

        /* ============================================
           USER AVATAR
        ============================================ */
        .user-avatar {
            width: 34px; height: 34px; border-radius: 50%;
            background: var(--accent); color: #0C0C0C;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.8rem; font-weight: 700; overflow: hidden; flex-shrink: 0;
        }
        .user-avatar img { width: 100%; height: 100%; object-fit: cover; }

        /* ============================================
           MODAL OVERRIDES
        ============================================ */
        .modal-content { border: 1px solid var(--border); border-radius: var(--radius); box-shadow: var(--shadow-md); }
        .modal-header {
            padding: 1rem 1.375rem; border-bottom: 1px solid var(--border); background: var(--surface-2);
        }
        .modal-title { font-size: 0.925rem; font-weight: 650; }
        .modal-body  { padding: 1.375rem; }
        .modal-footer { padding: 0.813rem 1.375rem; border-top: 1px solid var(--border); background: var(--surface-2); }

        /* ============================================
           MISC
        ============================================ */
        .empty-state {
            text-align: center; padding: 3rem 1.5rem; color: var(--text-muted);
        }
        .empty-state i { font-size: 2rem; margin-bottom: 0.75rem; display: block; opacity: 0.35; }
        .empty-state p { font-size: 0.875rem; margin-bottom: 1rem; }

        ::-webkit-scrollbar { width: 5px; height: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.12); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(0,0,0,0.2); }

        .pagination .page-link {
            font-size: 0.875rem;
            border: 1px solid var(--c-border);
            color: var(--c-text-mid);
            padding: 0.625rem 1rem;
            margin: 0 0.125rem;
            border-radius: 8px;
            transition: color 0.2s var(--ease), background 0.2s var(--ease), border-color 0.2s var(--ease), transform 0.2s var(--ease), box-shadow 0.2s var(--ease);
            position: relative;
            overflow: hidden;
            font-family: var(--font-body);
            font-weight: 500;
        }
        .pagination .page-link::before { display: none; }
        .pagination .page-link:hover::before { display: none; }
        .pagination .page-link:hover {
            color: var(--c-gold);
            border-color: var(--c-gold);
            background: rgba(200,169,110,0.05);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(200,169,110,0.15);
        }
        .pagination .page-item.active .page-link {
            color: var(--c-black);
            background: var(--c-gold);
            border-color: var(--c-gold);
            box-shadow: 0 2px 8px rgba(200,169,110,0.2);
            font-weight: 600;
        }
        .pagination .page-item.disabled .page-link {
            color: var(--c-text-muted);
            border-color: var(--c-border);
            background: var(--c-off-white);
            cursor: not-allowed;
            opacity: 0.6;
        }

        @media (max-width: 992px) {
            .admin-sidebar { transform: translateX(-100%); }
            .admin-sidebar.open { transform: translateX(0); }
            .admin-main { margin-left: 0; }
            .sidebar-toggle-btn { display: block; }
            .admin-content { padding: 1.5rem; }
            .admin-topbar { padding: 0 1.5rem; }
            .topbar-title { font-size: 1.1rem; }
        }

        @yield('styles')
    </style>
    @yield('head')
    <style>
        /* ── Pagination overrides (after any CDN CSS) ── */
        .dataTables_paginate .pagination .page-link,
        .pagination .page-link {
            font-family: var(--font-body) !important;
            font-size: 0.8rem !important;
            font-weight: 600 !important;
            color: var(--c-text-mid) !important;
            background: var(--c-white) !important;
            border: 1.5px solid var(--c-border) !important;
            padding: 0.5rem 0.875rem !important;
            margin: 0 2px !important;
            border-radius: 8px !important;
            transition: color 0.18s ease, background 0.18s ease, border-color 0.18s ease, box-shadow 0.18s ease !important;
            box-shadow: none !important;
        }
        .dataTables_paginate .pagination .page-link:hover,
        .pagination .page-link:hover {
            color: var(--c-gold-dark) !important;
            background: rgba(200,169,110,0.07) !important;
            border-color: var(--c-gold) !important;
            box-shadow: 0 2px 8px rgba(200,169,110,0.15) !important;
        }
        .dataTables_paginate .pagination .page-item.active .page-link,
        .pagination .page-item.active .page-link {
            color: var(--c-black) !important;
            background: var(--c-gold) !important;
            border-color: var(--c-gold) !important;
            font-weight: 700 !important;
            box-shadow: 0 2px 8px rgba(200,169,110,0.25) !important;
        }
        .dataTables_paginate .pagination .page-item.disabled .page-link,
        .pagination .page-item.disabled .page-link {
            color: var(--c-text-muted) !important;
            background: var(--c-off-white) !important;
            border-color: var(--c-border) !important;
            opacity: 0.55 !important;
            cursor: not-allowed !important;
        }
        .dataTables_paginate {
            padding-top: 0.5rem !important;
        }
        .dataTables_info {
            font-size: 0.8rem !important;
            color: var(--c-text-muted) !important;
            padding-top: 0.75rem !important;
        }
    </style>
</head>
<body>

<aside class="admin-sidebar" id="adminSidebar">
    <div class="sidebar-brand">
        <div class="sidebar-brand-icon">S</div>
        <div class="sidebar-brand-text">
            <div class="brand-name">SoleMates</div>
            <div class="brand-sub">Admin Panel</div>
        </div>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-section">
            <span class="nav-section-label">Overview</span>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2"></i> Dashboard
            </a>
        </div>

        <div class="nav-section">
            <span class="nav-section-label">Catalog</span>
            <a href="{{ route('admin.products.index') }}" class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                <i class="bi bi-box-seam"></i> Products
            </a>
        </div>

        <div class="nav-section">
            <span class="nav-section-label">Commerce</span>
            <a href="{{ route('admin.orders.index') }}" class="sidebar-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                <i class="bi bi-bag-check"></i> Orders
            </a>
        </div>

        <div class="nav-section">
            <span class="nav-section-label">Users</span>
            <a href="{{ route('admin.users.index') }}" class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="bi bi-people"></i> All Users
            </a>
        </div>

        <div class="nav-section">
            <span class="nav-section-label">Reviews</span>
            <a href="{{ route('admin.reviews.index') }}" class="sidebar-link {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                <i class="bi bi-star"></i> All Reviews
            </a>
        </div>

        <div class="nav-section">
            <span class="nav-section-label">Analytics</span>
            <a href="{{ route('admin.charts.index') }}" class="sidebar-link {{ request()->routeIs('admin.charts.*') ? 'active' : '' }}">
                <i class="bi bi-bar-chart-line"></i> Charts
            </a>
        </div>

        <div class="sidebar-divider"></div>

        <div class="nav-section">
            <a href="{{ route('home') }}" class="sidebar-link" target="_blank" rel="noopener">
                <i class="bi bi-arrow-up-right-square"></i> View Storefront
            </a>
        </div>
    </nav>

    <div class="sidebar-footer">
        <div class="sidebar-user">
            <div class="sidebar-avatar">
                @if(auth()->user()->profile_photo)
                    <img src="{{ asset('storage/profile_photos/' . auth()->user()->profile_photo) }}" alt="">
                @else
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                @endif
            </div>
            <div style="flex:1;min-width:0;">
                <div class="sidebar-user-name">{{ auth()->user()->name }}</div>
                <div class="sidebar-user-role">Administrator</div>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="sidebar-link" style="color:rgba(255,255,255,0.32);">
                <i class="bi bi-box-arrow-right"></i> Sign Out
            </button>
        </form>
    </div>
</aside>

<div class="admin-main">
    <div class="admin-topbar">
        <div class="topbar-left">
            <button class="sidebar-toggle-btn" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
            <div class="topbar-title">@yield('page-title', 'Dashboard')</div>
        </div>
        <div class="topbar-right">
            @yield('topbar-actions')
        </div>
    </div>

    @if(session('success') || session('error'))
    <div class="flash-wrap">
        @if(session('success'))
        <div class="flash-alert flash-success alert-dismissible" role="alert">
            <i class="bi bi-check-circle-fill"></i>
            <span>{{ session('success') }}</span>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
        @endif
        @if(session('error'))
        <div class="flash-alert flash-error alert-dismissible" role="alert">
            <i class="bi bi-exclamation-circle-fill"></i>
            <span>{{ session('error') }}</span>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
        @endif
    </div>
    @endif

    <main class="admin-content">
        @yield('content')
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('sidebarToggle')?.addEventListener('click', function() {
        document.getElementById('adminSidebar').classList.toggle('open');
    });
</script>
@yield('scripts')
</body>
</html>
