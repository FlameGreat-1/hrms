@props([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
    'loading' => false,
])

@php
    $sizeClass = match($size) {
        'sm' => 'btn-sm',
        'lg' => 'btn-lg',
        default => '',
    };
@endphp

<button 
    type="{{ $type }}"
    {{ $attributes->merge(['class' => 'btn btn-' . $variant . ' ' . $sizeClass]) }}
    {{ $loading ? 'disabled' : '' }}
>
    @if($loading)
        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
    @elseif($icon)
        <i class="bi bi-{{ $icon }} me-2"></i>
    @endif
    {{ $slot }}
</button>
