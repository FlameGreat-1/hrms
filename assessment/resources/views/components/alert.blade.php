@props(['type' => 'info', 'message' => null, 'dismissible' => true])

@php
    $classes = match($type) {
        'success' => 'alert-success',
        'error', 'danger' => 'alert-danger',
        'warning' => 'alert-warning',
        'info' => 'alert-info',
        default => 'alert-info',
    };

    $icon = match($type) {
        'success' => 'bi-check-circle-fill',
        'error', 'danger' => 'bi-exclamation-triangle-fill',
        'warning' => 'bi-exclamation-circle-fill',
        'info' => 'bi-info-circle-fill',
        default => 'bi-info-circle-fill',
    };
@endphp

<div {{ $attributes->merge(['class' => 'alert ' . $classes . ($dismissible ? ' alert-dismissible fade show' : '')]) }} role="alert">
    <i class="bi {{ $icon }} me-2"></i>
    {{ $message ?? $slot }}
    @if($dismissible)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
</div>
