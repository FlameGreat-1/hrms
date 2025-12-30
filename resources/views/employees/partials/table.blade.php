@props(['employees'])

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th style="width: 5%">#</th>
                <th>Employee</th>
                <th>Email</th>
                <th>Department</th>
                <th>Skills</th>
                <th style="width: 15%">Actions</th>
            </tr>
        </thead>
        <tbody id="employees-table-body">
            @forelse($employees as $employee)
                <tr>
                    <td class="text-muted">{{ $loop->iteration }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="bi bi-person-fill text-primary"></i>
                            </div>
                            <div>
                                <div class="fw-semibold">{{ $employee->full_name }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <i class="bi bi-envelope me-1 text-muted"></i>
                        {{ $employee->email }}
                    </td>
                    <td>
                        <span class="badge bg-success">
                            {{ $employee->department->name }}
                        </span>
                    </td>
                    <td>
                        @if($employee->skills->count() > 0)
                            <div class="d-flex flex-wrap gap-1">
                                @foreach($employee->skills->take(3) as $skill)
                                    <span class="badge bg-info">{{ $skill->name }}</span>
                                @endforeach
                                @if($employee->skills->count() > 3)
                                    <span class="badge bg-secondary">+{{ $employee->skills->count() - 3 }}</span>
                                @endif
                            </div>
                        @else
                            <span class="text-muted small">No skills</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('employees.show', $employee) }}" class="btn btn-sm btn-outline-info" title="View">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form method="POST" action="{{ route('employees.destroy', $employee) }}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <div class="text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                            <p class="mb-0">No employees found</p>
                            <a href="{{ route('employees.create') }}" class="btn btn-primary btn-sm mt-3">
                                <i class="bi bi-plus-circle me-1"></i>Add First Employee
                            </a>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
