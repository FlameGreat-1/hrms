@props(['action', 'method' => 'POST'])

<form method="POST" action="{{ $action }}">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif

    <x-input 
        type="text"
        name="name"
        label="Department Name"
        placeholder="Enter department name"
        required
        autofocus
    />

    <div class="d-flex gap-2">
        <x-button type="submit" variant="primary" icon="check-circle">
            Save Department
        </x-button>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">
            <i class="bi bi-x-circle me-2"></i>Cancel
        </a>
    </div>
</form>
