@props(['departments'])

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <div class="row align-items-end">
            <div class="col-md-4">
                <label for="department-filter" class="form-label fw-semibold">
                    <i class="bi bi-funnel me-1"></i>Filter by Department
                </label>
                <select id="department-filter" class="form-select">
                    <option value="">All Departments</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="button" id="reset-filter" class="btn btn-outline-secondary w-100">
                    <i class="bi bi-arrow-clockwise me-1"></i>Reset
                </button>
            </div>
            <div class="col-md-6 text-end">
                <div id="filter-status" class="text-muted small"></div>
            </div>
        </div>
    </div>
</div>
