<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'HRMS')); ?> - <?php echo $__env->yieldContent('title', 'Authentication'); ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('favicon.ico')); ?>">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-light">
    <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center py-5">
        <div class="text-center mb-4">
            <h1 class="display-4 fw-bold text-primary mb-2"><?php echo e(config('app.name', 'HRMS')); ?></h1>
            <p class="text-muted">Human Resource Management System</p>
        </div>

        <div class="card shadow-sm border-0" style="width: 100%; max-width: 450px;">
            <div class="card-body p-4">
                <?php echo e($slot); ?>

            </div>
        </div>

        <div class="mt-4 text-center">
            <p class="text-muted small mb-0">&copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name', 'HRMS')); ?>. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/layouts/guest.blade.php ENDPATH**/ ?>