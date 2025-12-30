@props(['skills'])

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th style="width: 5%">#</th>
                <th>Skill Name</th>
                <th style="width: 15%">Employees</th>
                <th style="width: 20%">Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($skills as $skill)
                <tr>
                    <td class="text-muted">{{ $loop->iteration }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="bg-warning bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <span class="fw-semibold">{{ $skill->name }}</span>
                        </div>
                    </td>
                    <td>
                        <span class="badge bg-info">
                            {{ $skill->employees_count ?? $skill->employees->count() }} 
                            {{ Str::plural('employee', $skill->employees_count ?? $skill->employees->count()) }}
                        </span>
                    </td>
                    <td class="text-muted">
                        <i class="bi bi-calendar3 me-1"></i>
                        {{ $skill->created_at->format('M d, Y') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-5">
                        <div class="text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                            <p class="mb-0">No skills found</p>
                            <a href="{{ route('skills.create') }}" class="btn btn-primary btn-sm mt-3">
                                <i class="bi bi-plus-circle me-1"></i>Add First Skill
                            </a>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
