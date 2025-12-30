<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['skills']));

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

foreach (array_filter((['skills']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th style="width: 5%">#</th>
                <th>Skill Name</th>
                <th style="width: 15%">Employees</th>
                <th style="width: 20%">Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="text-muted"><?php echo e($loop->iteration); ?></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="bg-warning bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <span class="fw-semibold"><?php echo e($skill->name); ?></span>
                        </div>
                    </td>
                    <td>
                        <span class="badge bg-info">
                            <?php echo e($skill->employees_count ?? $skill->employees->count()); ?> 
                            <?php echo e(Str::plural('employee', $skill->employees_count ?? $skill->employees->count())); ?>

                        </span>
                    </td>
                    <td class="text-muted">
                        <i class="bi bi-calendar3 me-1"></i>
                        <?php echo e($skill->created_at->format('M d, Y')); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4" class="text-center py-5">
                        <div class="text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                            <p class="mb-0">No skills found</p>
                            <a href="<?php echo e(route('skills.create')); ?>" class="btn btn-primary btn-sm mt-3">
                                <i class="bi bi-plus-circle me-1"></i>Add First Skill
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php /**PATH /var/www/html/resources/views/skills/partials/table.blade.php ENDPATH**/ ?>