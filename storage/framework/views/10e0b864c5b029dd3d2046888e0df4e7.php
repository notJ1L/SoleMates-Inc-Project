<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Admin'); ?> â€” SoleMates</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,700;1,400&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --sidebar-w:    256px;
            --topbar-h:     64px;
            /* Surface */
            --bg:           #F2EDE5;
            --surface:      #FFFFFF;
            --surface-2:    #F8F5F1;
            --border:       #E6E0D8;
            --border-strong:#CEC8BE;
            /* Sidebar */
            --sidebar-bg:   #0C0C0C;
            --sidebar-border: rgba(255,255,255,0.07);
            /* Text */
            --text-primary:   #1A1A1A;
            --text-secondary: #6B6560;
            --text-muted:     #A09A94;
            /* Brand */
            --accent:         #C8A96E;
            --accent-light:   rgba(200,169,110,0.12);
            --accent-dark:    #A8893E;
            /* Semantic */
            --green:          #16A34A;
            --green-light:    rgba(22,163,74,0.1);
            --blue:           #2563EB;
            --blue-light:     rgba(37,99,235,0.1);
            --amber:          #D97706;
            --amber-light:    rgba(217,119,6,0.1);
            --red:            #DC2626;
            --red-light:      rgba(220,38,38,0.1);
            --purple:         #7C3AED;
            --purple-light:   rgba(124,58,237,0.1);
            /* Font */
            --font-sans:    'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            --font-display: 'Playfair Display', serif;
            --font-mono:    'Space Grotesk', sans-serif;
            /* Shadow */
            --shadow-sm:  0 1px 2px rgba(0,0,0,0.05);
            --shadow:     0 1px 4px rgba(0,0,0,0.08), 0 0 0 1px rgba(0,0,0,0.04);
            --shadow-md:  0 4px 16px rgba(0,0,0,0.1), 0 0 0 1px rgba(0,0,0,0.04);
            /* Radius */
            --radius-sm:  6px;
            --radius:     10px;
            --radius-lg:  14px;
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
            transition: transform 0.25s cubic-bezier(0.4,0,0.2,1);
        }

        .sidebar-brand {
            padding: 1.375rem 1.125rem 1.125rem;
            border-bottom: 1px solid var(--sidebar-border);
            display: flex; align-items: center; gap: 0.75rem;
        }
        .sidebar-brand-icon {
            width: 32px; height: 32px;
            background: var(--accent);
            border-radius: var(--radius-sm);
            display: flex; align-items: center; justify-content: center;
            font-family: var(--font-display);
            font-style: italic; font-size: 1.05rem; font-weight: 700;
            color: #0C0C0C; flex-shrink: 0;
        }
        .sidebar-brand-text .brand-name {
            font-family: var(--font-display);
            font-size: 1rem; font-weight: 700; font-style: italic;
            color: #FFFFFF; line-height: 1.1;
        }
        .sidebar-brand-text .brand-sub {
            font-size: 0.6rem; letter-spacing: 0.18em;
            text-transform: uppercase; color: rgba(255,255,255,0.22);
            margin-top: 2px;
        }

        .sidebar-nav {
            flex: 1; padding: 0.875rem 0.75rem;
            overflow-y: auto; scrollbar-width: none;
        }
        .sidebar-nav::-webkit-scrollbar { display: none; }

        .nav-section { margin-bottom: 0.15rem; }
        .nav-section-label {
            display: block;
            font-size: 0.59rem; letter-spacing: 0.2em;
            text-transform: uppercase; color: rgba(255,255,255,0.2);
            padding: 0.875rem 0.75rem 0.35rem;
        }

        .sidebar-link {
            display: flex; align-items: center; gap: 0.6rem;
            padding: 0.55rem 0.75rem;
            color: rgba(255,255,255,0.48);
            text-decoration: none; font-size: 0.838rem; font-weight: 400;
            border-radius: var(--radius-sm);
            transition: all 0.14s ease;
            border: none; background: none; cursor: pointer;
            width: 100%; text-align: left;
        }
        .sidebar-link i { font-size: 0.95rem; width: 18px; flex-shrink: 0; }
        .sidebar-link:hover {
            color: rgba(255,255,255,0.82);
            background: rgba(255,255,255,0.07);
        }
        .sidebar-link.active {
            color: var(--accent);
            background: rgba(200,169,110,0.13);
            font-weight: 600;
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
        }

        .admin-topbar {
            height: var(--topbar-h);
            background: rgba(255,255,255,0.94);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            padding: 0 1.75rem;
            display: flex; align-items: center; justify-content: space-between;
            position: sticky; top: 0; z-index: 100;
        }
        .topbar-left  { display: flex; align-items: center; gap: 0.875rem; }
        .topbar-title { font-size: 1rem; font-weight: 650; color: var(--text-primary); letter-spacing: -0.01em; }
        .topbar-right { display: flex; align-items: center; gap: 0.75rem; }

        .sidebar-toggle-btn {
            display: none; background: none; border: none;
            font-size: 1.2rem; cursor: pointer;
            color: var(--text-secondary); padding: 0.375rem;
            border-radius: var(--radius-sm); line-height: 1;
        }
        .sidebar-toggle-btn:hover { color: var(--text-primary); background: var(--surface-2); }

        .admin-content { padding: 1.75rem; flex: 1; }

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
            display: inline-flex; align-items: center; gap: 0.4rem;
            background: var(--accent); color: #0C0C0C;
            font-size: 0.813rem; font-weight: 650;
            padding: 0.5rem 1rem; border-radius: var(--radius-sm);
            border: none; cursor: pointer; text-decoration: none; white-space: nowrap;
            transition: all 0.14s ease;
        }
        .btn-primary-admin:hover {
            background: var(--accent-dark); color: #0C0C0C;
            transform: translateY(-1px); box-shadow: 0 4px 12px rgba(200,169,110,0.35);
        }
        .btn-secondary-admin {
            display: inline-flex; align-items: center; gap: 0.4rem;
            background: var(--surface); color: var(--text-secondary);
            font-size: 0.813rem; font-weight: 500;
            padding: 0.5rem 1rem; border-radius: var(--radius-sm);
            border: 1px solid var(--border); cursor: pointer;
            text-decoration: none; white-space: nowrap; transition: all 0.14s ease;
        }
        .btn-secondary-admin:hover {
            background: var(--surface-2); color: var(--text-primary); border-color: var(--border-strong);
        }
        .action-btn {
            display: inline-flex; align-items: center; justify-content: center;
            width: 32px; height: 32px; border-radius: var(--radius-sm);
            border: 1px solid var(--border); background: var(--surface);
            color: var(--text-secondary); cursor: pointer; text-decoration: none;
            font-size: 0.875rem; transition: all 0.14s ease;
        }
        .action-btn:hover { color: var(--text-primary); background: var(--surface-2); border-color: var(--border-strong); }
        .action-btn.danger:hover  { color: var(--red);   border-color: rgba(220,38,38,0.35);  background: var(--red-light); }
        .action-btn.success:hover { color: var(--green); border-color: rgba(22,163,74,0.35);  background: var(--green-light); }
        .action-btn.warning:hover { color: var(--amber); border-color: rgba(217,119,6,0.35);  background: var(--amber-light); }

        /* ============================================
           PANEL / CARD
        ============================================ */
        .panel {
            background: var(--surface); border: 1px solid var(--border);
            border-radius: var(--radius); overflow: hidden;
        }
        .panel-header {
            padding: 0.938rem 1.25rem; border-bottom: 1px solid var(--border);
            display: flex; align-items: center; justify-content: space-between;
        }
        .panel-title { font-size: 0.888rem; font-weight: 650; color: var(--text-primary); letter-spacing: -0.01em; }

        /* ============================================
           STAT CARDS
        ============================================ */
        .stat-card {
            background: var(--surface); border: 1px solid var(--border);
            border-radius: var(--radius); padding: 1.25rem;
            display: flex; align-items: flex-start; gap: 1rem;
            transition: box-shadow 0.15s, transform 0.15s;
        }
        .stat-card:hover { box-shadow: var(--shadow-md); transform: translateY(-1px); }
        .stat-icon {
            width: 44px; height: 44px; border-radius: var(--radius-sm);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.15rem; flex-shrink: 0;
        }
        .stat-icon-amber  { background: var(--amber-light);  color: var(--amber); }
        .stat-icon-blue   { background: var(--blue-light);   color: var(--blue); }
        .stat-icon-purple { background: var(--purple-light); color: var(--purple); }
        .stat-icon-green  { background: var(--green-light);  color: var(--green); }
        .stat-icon-accent { background: var(--accent-light); color: var(--accent); }
        .stat-body { flex: 1; min-width: 0; }
        .stat-value {
            font-family: var(--font-mono);
            font-size: 1.75rem; font-weight: 700;
            line-height: 1; letter-spacing: -0.02em;
            color: var(--text-primary); margin-bottom: 0.35rem;
        }
        .stat-label {
            font-size: 0.72rem; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.07em; color: var(--text-muted);
        }

        /* ============================================
           DATA TABLE
        ============================================ */
        .data-table { width: 100%; border-collapse: collapse; }
        .data-table thead th {
            background: var(--surface-2); color: var(--text-muted);
            font-size: 0.69rem; font-weight: 600;
            letter-spacing: 0.1em; text-transform: uppercase;
            padding: 0.75rem 1.125rem;
            border-bottom: 1px solid var(--border); white-space: nowrap;
        }
        .data-table tbody td {
            padding: 0.875rem 1.125rem;
            border-bottom: 1px solid var(--border);
            font-size: 0.863rem; vertical-align: middle;
        }
        .data-table tbody tr:last-child td { border-bottom: none; }
        .data-table tbody tr { transition: background 0.1s; }
        .data-table tbody tr:hover td { background: var(--surface-2); }
        .data-table .mono { font-family: var(--font-mono); font-size: 0.825rem; font-weight: 600; }
        .data-table .subtext { font-size: 0.75rem; color: var(--text-muted); margin-top: 1px; }

        /* ============================================
           BADGES
        ============================================ */
        .badge-pill {
            display: inline-flex; align-items: center;
            font-size: 0.68rem; font-weight: 600;
            letter-spacing: 0.04em; text-transform: uppercase;
            padding: 0.2rem 0.65rem; border-radius: var(--radius-full);
        }
        .badge-pending    { background: var(--amber-light);  color: #92400e; }
        .badge-processing { background: var(--blue-light);   color: #1d4ed8; }
        .badge-shipped    { background: var(--purple-light); color: #5b21b6; }
        .badge-completed  { background: var(--green-light);  color: #14532d; }
        .badge-cancelled  { background: var(--red-light);    color: #7f1d1d; }
        .badge-admin      { background: var(--accent-light); color: var(--accent-dark); }
        .badge-user       { background: var(--surface-2);    color: var(--text-secondary); border: 1px solid var(--border); }
        .badge-active     { background: var(--green-light);  color: #14532d; }
        .badge-inactive   { background: var(--red-light);    color: #7f1d1d; }
        .badge-instock    { background: var(--green-light);  color: #14532d; }
        .badge-outofstock { background: var(--red-light);    color: #7f1d1d; }
        .badge-lowstock   { background: var(--amber-light);  color: #92400e; }

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

        .pagination .page-link { font-size: 0.813rem; }

        @media (max-width: 992px) {
            .admin-sidebar { transform: translateX(-100%); }
            .admin-sidebar.open { transform: translateX(0); }
            .admin-main { margin-left: 0; }
            .sidebar-toggle-btn { display: block; }
            .admin-content { padding: 1.125rem; }
        }

        <?php echo $__env->yieldContent('styles'); ?>
    </style>
    <?php echo $__env->yieldContent('head'); ?>
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
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                <i class="bi bi-grid-1x2"></i> Dashboard
            </a>
        </div>

        <div class="nav-section">
            <span class="nav-section-label">Catalog</span>
            <a href="<?php echo e(route('admin.products.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.products.*') ? 'active' : ''); ?>">
                <i class="bi bi-box-seam"></i> Products
            </a>
        </div>

        <div class="nav-section">
            <span class="nav-section-label">Commerce</span>
            <a href="<?php echo e(route('admin.orders.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.orders.*') ? 'active' : ''); ?>">
                <i class="bi bi-bag-check"></i> Orders
            </a>
        </div>

        <div class="nav-section">
            <span class="nav-section-label">Users</span>
            <a href="<?php echo e(route('admin.users.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.users.*') ? 'active' : ''); ?>">
                <i class="bi bi-people"></i> All Users
            </a>
        </div>

        <div class="nav-section">
            <span class="nav-section-label">Reviews</span>
            <a href="<?php echo e(route('admin.reviews.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.reviews.*') ? 'active' : ''); ?>">
                <i class="bi bi-star"></i> All Reviews
            </a>
        </div>

        <div class="sidebar-divider"></div>

        <div class="nav-section">
            <a href="<?php echo e(route('home')); ?>" class="sidebar-link" target="_blank" rel="noopener">
                <i class="bi bi-arrow-up-right-square"></i> View Storefront
            </a>
        </div>
    </nav>

    <div class="sidebar-footer">
        <div class="sidebar-user">
            <div class="sidebar-avatar">
                <?php if(auth()->user()->profile_photo): ?>
                    <img src="<?php echo e(asset('storage/profile_photos/' . auth()->user()->profile_photo)); ?>" alt="">
                <?php else: ?>
                    <?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?>

                <?php endif; ?>
            </div>
            <div style="flex:1;min-width:0;">
                <div class="sidebar-user-name"><?php echo e(auth()->user()->name); ?></div>
                <div class="sidebar-user-role">Administrator</div>
            </div>
        </div>
        <form action="<?php echo e(route('logout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
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
            <div class="topbar-title"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></div>
        </div>
        <div class="topbar-right">
            <?php echo $__env->yieldContent('topbar-actions'); ?>
        </div>
    </div>

    <?php if(session('success') || session('error')): ?>
    <div class="flash-wrap">
        <?php if(session('success')): ?>
        <div class="flash-alert flash-success alert-dismissible" role="alert">
            <i class="bi bi-check-circle-fill"></i>
            <span><?php echo e(session('success')); ?></span>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
        <div class="flash-alert flash-error alert-dismissible" role="alert">
            <i class="bi bi-exclamation-circle-fill"></i>
            <span><?php echo e(session('error')); ?></span>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <main class="admin-content">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('sidebarToggle')?.addEventListener('click', function() {
        document.getElementById('adminSidebar').classList.toggle('open');
    });
</script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp_ITCP226\htdocs\SoulMates-Inc-Project\resources\views/layouts/admin.blade.php ENDPATH**/ ?>