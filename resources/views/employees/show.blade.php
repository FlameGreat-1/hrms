<x-app-layout>
    @section('title', $employee->full_name)
    @section('subtitle', 'Employee Details')

    @section('actions')
        <div class="d-flex gap-2">
            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary">
                <i class="bi bi-pencil me-2"></i>Edit
            </a>
            <form method="POST" action="{{ route('employees.destroy', $employee) }}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash me-2"></i>Delete
                </button>
            </form>
        </div>
    @endsection

    <x-breadcrumb :items="[
        ['label' => 'Employees', 'url' => route('employees.index')],
        ['label' => $employee->full_name]
    ]" />

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
                            <p class="fw-semibold mb-0">{{ $employee->first_name }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted small mb-1">Last Name</label>
                            <p class="fw-semibold mb-0">{{ $employee->last_name }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="text-muted small mb-1">Email Address</label>
                            <p class="fw-semibold mb-0">
                                <i class="bi bi-envelope me-2"></i>{{ $employee->email }}
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="text-muted small mb-1">Department</label>
                            <p class="mb-0">
                                <span class="badge bg-success fs-6">
                                    <i class="bi bi-building me-1"></i>{{ $employee->department->name }}
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
                    @if($employee->skills->count() > 0)
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($employee->skills as $skill)
                                <span class="badge bg-info fs-6 px-3 py-2">
                                    {{ $skill->name }}
                                </span>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="bi bi-inbox fs-1 text-muted d-block mb-2"></i>
                            <p class="text-muted mb-0">No skills assigned</p>
                        </div>
                    @endif
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
                            <span class="fw-semibold">{{ $employee->created_at->format('M d, Y') }}</span>
                            <span class="text-muted d-block small">{{ $employee->created_at->diffForHumans() }}</span>
                        </li>
                        <li>
                            <span class="text-muted d-block mb-1">Last Updated</span>
                            <span class="fw-semibold">{{ $employee->updated_at->format('M d, Y') }}</span>
                            <span class="text-muted d-block small">{{ $employee->updated_at->diffForHumans() }}</span>
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
                                <span class="badge bg-info">{{ $employee->skills->count() }}</span>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">Department</span>
                                <span class="badge bg-success">{{ $employee->department->name }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
