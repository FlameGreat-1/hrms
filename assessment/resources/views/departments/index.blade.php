<x-app-layout>
    @section('title', 'Departments')
    @section('subtitle', 'Manage all departments')

    @section('actions')
        <a href="{{ route('departments.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Add Department
        </a>
    @endsection

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted text-uppercase small mb-1">Total</h6>
                            <h3 class="mb-0 fw-bold">{{ $departments->count() }}</h3>
                        </div>
                        <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-building text-primary fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-list-ul me-2"></i>All Departments
                </h5>
            </div>
        </div>
        <div class="card-body p-0">
            @include('departments.partials.table', ['departments' => $departments])
        </div>
    </div>
</x-app-layout>
