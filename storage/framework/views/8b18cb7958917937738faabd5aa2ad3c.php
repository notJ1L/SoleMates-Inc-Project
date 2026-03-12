<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'SoleMates Footwear'); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>

    <style>
        .dropdown-toggle::after {
            content: none;
        }
        
        /* Add cursor pointer for dropdown */
        .nav-link.dropdown-toggle {
            cursor: pointer;
        }
    </style>
    
    <?php echo $__env->yieldContent('head'); ?>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?php echo e(route('home')); ?>">
                <i class="fas fa-shoe-prints me-2"></i>SoleMates Footwear
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('home')); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('products.index')); ?>">Shop</a>
                    </li>
                </ul>
                
                <!-- Search Bar -->
                <form class="d-flex me-3" action="<?php echo e(route('search')); ?>" method="GET">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search products..." value="<?php echo e(request('search')); ?>">
                    <button class="btn btn-outline-light" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                
                <!-- User Menu -->
                <ul class="navbar-nav">
                    <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a>
                        </li>
                    <?php else: ?>
                        <!-- Cart Link -->
                        <li class="nav-item">
                            <a class="nav-link position-relative" href="<?php echo e(route('cart.index')); ?>">
                                <i class="fas fa-shopping-cart"></i>
                                <?php if(Auth::check()): ?>
                                    <?php
                                        $cartCount = \App\Models\Cart::where('user_id', Auth::id())->count();
                                    ?>
                                    <?php if($cartCount > 0): ?>
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            <?php echo e($cartCount); ?>

                                        </span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if(session('cart') && count(session('cart')) > 0): ?>
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            <?php echo e(count(session('cart'))); ?>

                                        </span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-1"></i><?php echo e(auth()->user()->name); ?>

                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo e(route('profile.edit')); ?>"><i class="fas fa-user me-2"></i>Profile</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(route('cart.index')); ?>"><i class="fas fa-shopping-cart me-2"></i>Cart</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(route('profile.orders')); ?>"><i class="fas fa-box me-2"></i>Orders</a></li>
                                <?php if(auth()->user()->isAdmin()): ?>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-cog me-2"></i>Admin Panel</a></li>
                                <?php endif; ?>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                                </a></li>
                            </ul>
                        </li>
                        
                        <!-- Fallback logout button -->
                        <li class="nav-item d-none d-lg-block">
                            <form action="<?php echo e(route('logout')); ?>" method="POST" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-outline-light btn-sm ms-2" title="Logout">
                                    <i class="fas fa-sign-out-alt"></i>
                                </button>
                            </form>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content" style="margin-top: 76px;">
        <!-- Flash Messages -->
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show m-0" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
                <?php echo e(session('error')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5><i class="fas fa-shoe-prints me-2"></i>SoleMates Footwear</h5>
                    <p>Your trusted partner for quality footwear since 2024.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(route('home')); ?>" class="text-light">Home</a></li>
                        <li><a href="<?php echo e(route('products.index')); ?>" class="text-light">Shop</a></li>
                        <li><a href="#" class="text-light">About Us</a></li>
                        <li><a href="#" class="text-light">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Follow Us</h5>
                    <div>
                        <a href="#" class="text-light me-3"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-linkedin fa-lg"></i></a>
                    </div>
                </div>
            </div>
            <hr class="bg-light">
            <div class="text-center">
                <p>&copy; <?php echo e(date('Y')); ?> SoleMates Footwear. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Logout Form -->
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
    </form>
    
        <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Dropdown Init + Logout Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Manually initialize all dropdowns (in case Bootstrap auto-init fails)
            var dropdownElements = document.querySelectorAll('[data-bs-toggle="dropdown"]');
            dropdownElements.forEach(function(el) {
                new bootstrap.Dropdown(el);
            });

            // Handle logout links
            const logoutLinks = document.querySelectorAll('a[href*="logout"]');
            logoutLinks.forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.getElementById('logout-form').submit();
                });
            });
        });
    </script>

    <!-- Dropdown and Logout Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        
            // Handle logout links
            const logoutLinks = document.querySelectorAll('a[href*="logout"]');
            logoutLinks.forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const form = document.getElementById('logout-form');
                    if (form) {
                        form.submit();
                    }
                });
            });
        });
    </script>
    
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp_ITCP226\htdocs\SoleMates Inc\resources\views/layouts/app.blade.php ENDPATH**/ ?>