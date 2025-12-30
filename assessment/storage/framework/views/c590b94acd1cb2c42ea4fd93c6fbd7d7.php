<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center fw-bold" href="<?php echo e(route('dashboard')); ?>">
            <i class="bi bi-building me-2"></i>
            <?php echo e(config('app.name', 'HRMS')); ?>

        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item d-flex align-items-center">
                    <button class="theme-toggle-btn" id="theme-toggle" title="Toggle theme">
                        <span class="theme-toggle-icon">
                            <i class="bi bi-sun-fill sun-icon"></i>
                            <i class="bi bi-moon-fill moon-icon"></i>
                        </span>
                    </button>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle me-2"></i>
                        <span><?php echo e(Auth::user()->name); ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                        <li>
                            <span class="dropdown-item-text text-muted small">
                                <?php echo e(Auth::user()->email); ?>

                            </span>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav><?php /**PATH /var/www/html/resources/views/layouts/navigation.blade.php ENDPATH**/ ?>