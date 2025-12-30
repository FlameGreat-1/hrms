<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['employees']));

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

foreach (array_filter((['employees']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
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
                <th>Employee</th>
                <th>Email</th>
                <th>Department</th>
                <th>Skills</th>
                <th style="width: 15%">Actions</th>
            </tr>
        </thead>
        <tbody id="employees-table-body">
            <?php $__empty_1 = true; $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="text-muted"><?php echo e($loop->iteration); ?></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="bi bi-person-fill text-primary"></i>
                            </div>
                            <div>
                                <div class="fw-semibold"><?php echo e($employee->full_name); ?></div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <i class="bi bi-envelope me-1 text-muted"></i>
                        <?php echo e($employee->email); ?>

                    </td>
                    <td>
                        <span class="badge bg-success">
                            <?php echo e($employee->department->name); ?>

                        </span>
                    </td>
                    <td>
                        <?php if($employee->skills->count() > 0): ?>
                            <div class="d-flex flex-wrap gap-1">
                                <?php $__currentLoopData = $employee->skills->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="badge bg-info"><?php echo e($skill->name); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if($employee->skills->count() > 3): ?>
                                    <span class="badge bg-secondary">+<?php echo e($employee->skills->count() - 3); ?></span>
                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <span class="text-muted small">No skills</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="<?php echo e(route('employees.show', $employee)); ?>" class="btn btn-sm btn-outline-info" title="View">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="<?php echo e(route('employees.edit', $employee)); ?>" class="btn btn-sm btn-outline-primary" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form method="POST" action="<?php echo e(route('employees.destroy', $employee)); ?>" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <div class="text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                            <p class="mb-0">No employees found</p>
                            <a href="<?php echo e(route('employees.create')); ?>" class="btn btn-primary btn-sm mt-3">
                                <i class="bi bi-plus-circle me-1"></i>Add First Employee
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php /**PATH /var/www/html/resources/views/employees/partials/table.blade.php ENDPATH**/ ?>