<x-app-layout>
    @section('title', 'Skills')
    @section('subtitle', 'Manage all skills')

    @section('actions')
        <a href="{{ route('skills.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Add Skill
        </a>
    @endsection

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted text-uppercase small mb-1">Total</h6>
                            <h3 class="mb-0 fw-bold">{{ $skills->count() }}</h3>
                        </div>
                        <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-star-fill text-warning fs-4"></i>
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
                    <i class="bi bi-list-ul me-2"></i>All Skills
                </h5>
            </div>
        </div>
        <div class="card-body p-0">
            @include('skills.partials.table', ['skills' => $skills])
        </div>
    </div>
</x-app-layout>
