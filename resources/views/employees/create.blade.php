<x-app-layout>
    @section('title', 'Create Employee')
    @section('subtitle', 'Add a new employee to the system')

    <x-breadcrumb :items="[
        ['label' => 'Employees', 'url' => route('employees.index')],
        ['label' => 'Create']
    ]" />

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-semibold">
                        <i class="bi bi-person-plus me-2"></i>Employee Information
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('employees.store') }}" id="employee-form">
                        @csrf
                        @include('employees.partials.form', [
                            'employee' => null,
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
                        <i class="bi bi-info-circle me-2"></i>Guidelines
                    </h6>
                    <ul class="small text-muted mb-0">
                        <li>All fields marked with <span class="text-danger">*</span> are required</li>
                        <li>Email must be unique in the system</li>
                        <li>Select at least one department</li>
                        <li>Skills are optional but recommended</li>
                        <li>You can add multiple skills using the add button</li>
                    </ul>
                </div>
            </div>

            <div class="card border-0 shadow-sm mt-3">
                <div class="card-body">
                    <h6 class="fw-semibold mb-3">
                        <i class="bi bi-lightbulb me-2"></i>Quick Tips
                    </h6>
                    <ul class="small text-muted mb-0">
                        <li>Email validation happens in real-time</li>
                        <li>Remove unwanted skills by clicking the trash icon</li>
                        <li>Department assignment is permanent after creation</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="{{ asset('js/employees/create.js') }}"></script>
    @endpush
</x-app-layout>
