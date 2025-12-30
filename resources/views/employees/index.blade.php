<x-app-layout>
    @section('title', 'Employees')
    @section('subtitle', 'Manage all employees')

    @section('actions')
        <a href="{{ route('employees.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Add Employee
        </a>
    @endsection

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted text-uppercase small mb-1">Total</h6>
                            <h3 class="mb-0 fw-bold">{{ $employees->total() }}</h3>
                        </div>
                        <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-people-fill text-primary fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('employees.partials.filter', ['departments' => $departments])

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
            @include('employees.partials.table', ['employees' => $employees])
        </div>
        @if($employees->hasPages())
            <div class="card-footer bg-white border-0 py-3">
                {{ $employees->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

    @push('scripts')
    <script src="{{ asset('js/employees/index.js') }}"></script>
    @endpush
</x-app-layout>
