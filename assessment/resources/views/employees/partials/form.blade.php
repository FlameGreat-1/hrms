@props(['employee' => null, 'departments', 'skills'])

<div class="row">
    <div class="col-md-6">
        <x-input 
            type="text"
            name="first_name"
            label="First Name"
            :value="$employee->first_name ?? ''"
            placeholder="Enter first name"
            required
            autofocus
        />
    </div>

    <div class="col-md-6">
        <x-input 
            type="text"
            name="last_name"
            label="Last Name"
            :value="$employee->last_name ?? ''"
            placeholder="Enter last name"
            required
        />
    </div>
</div>

<x-input 
    type="email"
    name="email"
    label="Email Address"
    :value="$employee->email ?? ''"
    placeholder="Enter email address"
    required
    class="email-input"
    data-employee-id="{{ $employee->id ?? '' }}"
/>

<div id="email-validation-message" class="small mb-3"></div>

<x-select 
    name="department_id"
    label="Department"
    :options="$departments->pluck('name', 'id')->toArray()"
    :selected="$employee->department_id ?? ''"
    placeholder="Select a department"
    required
/>

<div class="mb-3">
    <label class="form-label">
        Skills
        <span class="text-muted small">(Optional)</span>
    </label>
    <div id="skills-container">
        @if($employee && $employee->skills->count() > 0)
            @foreach($employee->skills as $skill)
                <div class="skill-item mb-2">
                    <div class="input-group">
                        <select name="skills[]" class="form-select" required>
                            <option value="">Select a skill</option>
                            @foreach($skills as $s)
                                <option value="{{ $s->id }}" {{ $skill->id == $s->id ? 'selected' : '' }}>
                                    {{ $s->name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="button" class="btn btn-outline-danger remove-skill">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        @else
            <div class="skill-item mb-2">
                <div class="input-group">
                    <select name="skills[]" class="form-select">
                        <option value="">Select a skill</option>
                        @foreach($skills as $skill)
                            <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="btn btn-outline-danger remove-skill">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        @endif
    </div>
    
    <button type="button" id="add-skill" class="btn btn-outline-primary btn-sm mt-2">
        <i class="bi bi-plus-circle me-1"></i>Add Another Skill
    </button>

    <div id="skill-template" class="d-none">
        <div class="skill-item mb-2">
            <div class="input-group">
                <select name="skills[]" class="form-select">
                    <option value="">Select a skill</option>
                    @foreach($skills as $skill)
                        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                    @endforeach
                </select>
                <button type="button" class="btn btn-outline-danger remove-skill">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </div>
    </div>

    @error('skills')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
    @error('skills.*')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="d-flex gap-2">
    <x-button type="submit" variant="primary" icon="check-circle">
        {{ $employee ? 'Update Employee' : 'Create Employee' }}
    </x-button>
    <a href="{{ route('employees.index') }}" class="btn btn-secondary">
        <i class="bi bi-x-circle me-2"></i>Cancel
    </a>
</div>
