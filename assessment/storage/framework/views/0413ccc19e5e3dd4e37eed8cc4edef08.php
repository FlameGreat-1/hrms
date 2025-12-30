<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['departments']));

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

foreach (array_filter((['departments']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <div class="row align-items-end">
            <div class="col-md-4">
                <label for="department-filter" class="form-label fw-semibold">
                    <i class="bi bi-funnel me-1"></i>Filter by Department
                </label>
                <select id="department-filter" class="form-select">
                    <option value="">All Departments</option>
                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-2">
                <button type="button" id="reset-filter" class="btn btn-outline-secondary w-100">
                    <i class="bi bi-arrow-clockwise me-1"></i>Reset
                </button>
            </div>
            <div class="col-md-6 text-end">
                <div id="filter-status" class="text-muted small"></div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/resources/views/employees/partials/filter.blade.php ENDPATH**/ ?>