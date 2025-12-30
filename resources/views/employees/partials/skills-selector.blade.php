@props(['skills', 'selectedSkills' => []])

<div class="mb-3">
    <label class="form-label">
        Skills
        <span class="text-muted small">(Optional - Select multiple)</span>
    </label>
    
    <select name="skills[]" id="skills-select" class="form-select" multiple size="8">
        @foreach($skills as $skill)
            <option value="{{ $skill->id }}" 
                {{ in_array($skill->id, old('skills', $selectedSkills)) ? 'selected' : '' }}>
                {{ $skill->name }}
            </option>
        @endforeach
    </select>
    
    <div class="form-text">
        <i class="bi bi-info-circle me-1"></i>
        Hold Ctrl (Windows) or Cmd (Mac) to select multiple skills
    </div>

    @error('skills')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
    @error('skills.*')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Selected Skills</label>
    <div id="selected-skills-display" class="border rounded p-3 bg-light min-height-100">
        @if(count(old('skills', $selectedSkills)) > 0)
            @foreach($skills->whereIn('id', old('skills', $selectedSkills)) as $skill)
                <span class="badge bg-info me-1 mb-1">{{ $skill->name }}</span>
            @endforeach
        @else
            <span class="text-muted small">No skills selected</span>
        @endif
    </div>
</div>
