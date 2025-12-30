<x-app-layout>
    @section('title', 'Edit Employee')
    @section('subtitle', 'Update employee information')

    <x-breadcrumb :items="[
        ['label' => 'Employees', 'url' => route('employees.index')],
        ['label' => $employee->full_name, 'url' => route('employees.show', $employee)],
        ['label' => 'Edit']
    ]" />

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-semibold">
                        <i class="bi bi-pencil me-2"></i>Edit Employee Information
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('employees.update', $employee) }}" id="employee-form">
                        @csrf
                        @method('PUT')
                        @include('employees.partials.form', [
                            'employee' => $employee,
                            'departments' => $departments,
                            'skills' => $skills
                        ])
                    </form>
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
                        <li class="mb-2">
                            <span class="text-muted">Created:</span>
                            <span class="fw-semibold d-block">{{ $employee->created_at->format('M d, Y h:i A') }}</span>
                        </li>
                        <li>
                            <span class="text-muted">Last Updated:</span>
                            <span class="fw-semibold d-block">{{ $employee->updated_at->format('M d, Y h:i A') }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card border-0 shadow-sm mt-3">
                <div class="card-body">
                    <h6 class="fw-semibold mb-3">
                        <i class="bi bi-info-circle me-2"></i>Update Guidelines
                    </h6>
                    <ul class="small text-muted mb-0">
                        <li>Email must remain unique</li>
                        <li>Department can be changed</li>
                        <li>Skills can be added or removed</li>
                        <li>All changes are saved immediately</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="{{ asset('js/employees/edit.js') }}"></script>
    @endpush
</x-app-layout>
