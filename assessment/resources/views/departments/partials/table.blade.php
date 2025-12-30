@props(['departments'])

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th style="width: 5%">#</th>
                <th>Department Name</th>
                <th style="width: 15%">Employees</th>
                <th style="width: 20%">Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($departments as $department)
                <tr>
                    <td class="text-muted">{{ $loop->iteration }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="bi bi-building text-primary"></i>
                            </div>
                            <span class="fw-semibold">{{ $department->name }}</span>
                        </div>
                    </td>
                    <td>
                        <span class="badge bg-info">
                            {{ $department->employees_count ?? $department->employees->count() }} 
                            {{ Str::plural('employee', $department->employees_count ?? $department->employees->count()) }}
                        </span>
                    </td>
                    <td class="text-muted">
                        <i class="bi bi-calendar3 me-1"></i>
                        {{ $department->created_at->format('M d, Y') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-5">
                        <div class="text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                            <p class="mb-0">No departments found</p>
                            <a href="{{ route('departments.create') }}" class="btn btn-primary btn-sm mt-3">
                                <i class="bi bi-plus-circle me-1"></i>Add First Department
                            </a>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
