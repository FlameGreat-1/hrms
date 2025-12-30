<x-app-layout>
    @section('title', 'Dashboard')
    @section('subtitle', 'Welcome back, ' . Auth::user()->name)

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted text-uppercase mb-2">Total Employees</h6>
                            <h2 class="mb-0 fw-bold">{{ $stats['total_employees'] }}</h2>
                        </div>
                        <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-people-fill text-primary fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('employees.index') }}" class="text-decoration-none small">
                            View all employees <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted text-uppercase mb-2">Departments</h6>
                            <h2 class="mb-0 fw-bold">{{ $stats['total_departments'] }}</h2>
                        </div>
                        <div class="bg-success bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-building text-success fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('departments.index') }}" class="text-decoration-none small">
                            View all departments <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted text-uppercase mb-2">Skills</h6>
                            <h2 class="mb-0 fw-bold">{{ $stats['total_skills'] }}</h2>
                        </div>
                        <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-star-fill text-warning fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('skills.index') }}" class="text-decoration-none small">
                            View all skills <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 py-3">
            <h5 class="mb-0 fw-semibold">Quick Actions</h5>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-3">
                    <a href="{{ route('employees.create') }}" class="text-decoration-none">
                        <div class="d-flex align-items-center p-3 border rounded hover-shadow">
                            <div class="bg-primary bg-opacity-10 rounded p-2 me-3">
                                <i class="bi bi-person-plus-fill text-primary fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Add Employee</h6>
                                <small class="text-muted">Create new employee record</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('departments.create') }}" class="text-decoration-none">
                        <div class="d-flex align-items-center p-3 border rounded hover-shadow">
                            <div class="bg-success bg-opacity-10 rounded p-2 me-3">
                                <i class="bi bi-building-add text-success fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Add Department</h6>
                                <small class="text-muted">Create new department</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('skills.create') }}" class="text-decoration-none">
                        <div class="d-flex align-items-center p-3 border rounded hover-shadow">
                            <div class="bg-warning bg-opacity-10 rounded p-2 me-3">
                                <i class="bi bi-star text-warning fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Add Skill</h6>
                                <small class="text-muted">Create new skill</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('employees.index') }}" class="text-decoration-none">
                        <div class="d-flex align-items-center p-3 border rounded hover-shadow">
                            <div class="bg-info bg-opacity-10 rounded p-2 me-3">
                                <i class="bi bi-list-ul text-info fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">View Employees</h6>
                                <small class="text-muted">Browse employee list</small>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
    <style>
        .hover-shadow {
            transition: all 0.3s ease;
        }
        .hover-shadow:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
            transform: translateY(-2px);
        }
    </style>
    @endpush
</x-app-layout>
