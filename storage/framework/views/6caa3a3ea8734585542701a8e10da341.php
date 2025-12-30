<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div>
        <h1 class="h2 mb-0"><?php echo $__env->yieldContent('title', 'Dashboard'); ?></h1>
        <?php if (! empty(trim($__env->yieldContent('subtitle')))): ?>
            <p class="text-muted mb-0"><?php echo $__env->yieldContent('subtitle'); ?></p>
        <?php endif; ?>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <?php echo $__env->yieldContent('actions'); ?>
    </div>
</div>
<?php /**PATH /var/www/html/resources/views/layouts/partials/header.blade.php ENDPATH**/ ?>