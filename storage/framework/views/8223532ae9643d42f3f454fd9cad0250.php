<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startSection('title', $employee->full_name); ?>
    <?php $__env->startSection('subtitle', 'Employee Details'); ?>

    <?php $__env->startSection('actions'); ?>
        <div class="d-flex gap-2">
            <a href="<?php echo e(route('employees.edit', $employee)); ?>" class="btn btn-primary">
                <i class="bi bi-pencil me-2"></i>Edit
            </a>
            <form method="POST" action="<?php echo e(route('employees.destroy', $employee)); ?>" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash me-2"></i>Delete
                </button>
            </form>
        </div>
    <?php $__env->stopSection(); ?>

    <?php if (isset($component)) { $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb','data' => ['items' => [
        ['label' => 'Employees', 'url' => route('employees.index')],
        ['label' => $employee->full_name]
    ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
        ['label' => 'Employees', 'url' => route('employees.index')],
        ['label' => $employee->full_name]
    ])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2)): ?>
<?php $attributes = $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2; ?>
<?php unset($__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale19f62b34dfe0bfdf95075badcb45bc2)): ?>
<?php $component = $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2; ?>
<?php unset($__componentOriginale19f62b34dfe0bfdf95075badcb45bc2); ?>
<?php endif; ?>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-semibold">
                        <i class="bi bi-person-badge me-2"></i>Personal Information
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="text-muted small mb-1">First Name</label>
                            <p class="fw-semibold mb-0"><?php echo e($employee->first_name); ?></p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted small mb-1">Last Name</label>
                            <p class="fw-semibold mb-0"><?php echo e($employee->last_name); ?></p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="text-muted small mb-1">Email Address</label>
                            <p class="fw-semibold mb-0">
                                <i class="bi bi-envelope me-2"></i><?php echo e($employee->email); ?>

                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="text-muted small mb-1">Department</label>
                            <p class="mb-0">
                                <span class="badge bg-success fs-6">
                                    <i class="bi bi-building me-1"></i><?php echo e($employee->department->name); ?>

                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-semibold">
                        <i class="bi bi-star-fill me-2"></i>Skills
                    </h5>
                </div>
                <div class="card-body p-4">
                    <?php if($employee->skills->count() > 0): ?>
                        <div class="d-flex flex-wrap gap-2">
                            <?php $__currentLoopData = $employee->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="badge bg-info fs-6 px-3 py-2">
                                    <?php echo e($skill->name); ?>

                                </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-4">
                            <i class="bi bi-inbox fs-1 text-muted d-block mb-2"></i>
                            <p class="text-muted mb-0">No skills assigned</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="fw-semibold mb-3">
                        <i class="bi bi-clock-history me-2"></i>Record Information
                    </h6>
                    <ul class="list-unstyled small mb-0">
                        <li class="mb-3">
                            <span class="text-muted d-block mb-1">Created At</span>
                            <span class="fw-semibold"><?php echo e($employee->created_at->format('M d, Y')); ?></span>
                            <span class="text-muted d-block small"><?php echo e($employee->created_at->diffForHumans()); ?></span>
                        </li>
                        <li>
                            <span class="text-muted d-block mb-1">Last Updated</span>
                            <span class="fw-semibold"><?php echo e($employee->updated_at->format('M d, Y')); ?></span>
                            <span class="text-muted d-block small"><?php echo e($employee->updated_at->diffForHumans()); ?></span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card border-0 shadow-sm mt-3">
                <div class="card-body">
                    <h6 class="fw-semibold mb-3">
                        <i class="bi bi-bar-chart me-2"></i>Statistics
                    </h6>
                    <ul class="list-unstyled small mb-0">
                        <li class="mb-2">
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">Total Skills</span>
                                <span class="badge bg-info"><?php echo e($employee->skills->count()); ?></span>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">Department</span>
                                <span class="badge bg-success"><?php echo e($employee->department->name); ?></span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/employees/show.blade.php ENDPATH**/ ?>