<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['type' => 'info', 'message' => null, 'dismissible' => true]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['type' => 'info', 'message' => null, 'dismissible' => true]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $classes = match($type) {
        'success' => 'alert-success',
        'error', 'danger' => 'alert-danger',
        'warning' => 'alert-warning',
        'info' => 'alert-info',
        default => 'alert-info',
    };

    $icon = match($type) {
        'success' => 'bi-check-circle-fill',
        'error', 'danger' => 'bi-exclamation-triangle-fill',
        'warning' => 'bi-exclamation-circle-fill',
        'info' => 'bi-info-circle-fill',
        default => 'bi-info-circle-fill',
    };
?>

<div <?php echo e($attributes->merge(['class' => 'alert ' . $classes . ($dismissible ? ' alert-dismissible fade show' : '')])); ?> role="alert">
    <i class="bi <?php echo e($icon); ?> me-2"></i>
    <?php echo e($message ?? $slot); ?>

    <?php if($dismissible): ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/html/resources/views/components/alert.blade.php ENDPATH**/ ?>