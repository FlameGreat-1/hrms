<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
    'loading' => false,
]));

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

foreach (array_filter(([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
    'loading' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $sizeClass = match($size) {
        'sm' => 'btn-sm',
        'lg' => 'btn-lg',
        default => '',
    };
?>

<button 
    type="<?php echo e($type); ?>"
    <?php echo e($attributes->merge(['class' => 'btn btn-' . $variant . ' ' . $sizeClass])); ?>

    <?php echo e($loading ? 'disabled' : ''); ?>

>
    <?php if($loading): ?>
        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
    <?php elseif($icon): ?>
        <i class="bi bi-<?php echo e($icon); ?> me-2"></i>
    <?php endif; ?>
    <?php echo e($slot); ?>

</button>
<?php /**PATH /var/www/html/resources/views/components/button.blade.php ENDPATH**/ ?>