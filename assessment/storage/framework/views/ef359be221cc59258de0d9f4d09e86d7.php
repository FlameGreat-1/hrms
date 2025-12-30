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
    <?php $__env->startSection('title', 'Employees'); ?>
    <?php $__env->startSection('subtitle', 'Manage all employees'); ?>

    <?php $__env->startSection('actions'); ?>
        <a href="<?php echo e(route('employees.create')); ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Add Employee
        </a>
    <?php $__env->stopSection(); ?>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted text-uppercase small mb-1">Total</h6>
                            <h3 class="mb-0 fw-bold"><?php echo e($employees->total()); ?></h3>
                        </div>
                        <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-people-fill text-primary fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('employees.partials.filter', ['departments' => $departments], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-list-ul me-2"></i>All Employees
                </h5>
                <div id="loading-indicator" class="d-none">
                    <span class="spinner-border spinner-border-sm me-2"></span>
                    <span class="small text-muted">Loading...</span>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <?php echo $__env->make('employees.partials.table', ['employees' => $employees], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
        <?php if($employees->hasPages()): ?>
            <div class="card-footer bg-white border-0 py-3">
                <?php echo e($employees->links('pagination::bootstrap-5')); ?>

            </div>
        <?php endif; ?>
    </div>

    <?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/employees/index.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
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
<?php /**PATH /var/www/html/resources/views/employees/index.blade.php ENDPATH**/ ?>