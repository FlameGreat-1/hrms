<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'HRMS') }} - @yield('title', 'Authentication')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center py-5">
        <div class="text-center mb-4">
            <h1 class="display-4 fw-bold text-primary mb-2">{{ config('app.name', 'HRMS') }}</h1>
            <p class="text-muted">Human Resource Management System</p>
        </div>

        <div class="card shadow-sm border-0" style="width: 100%; max-width: 450px;">
            <div class="card-body p-4">
                {{ $slot }}
            </div>
        </div>

        <div class="mt-4 text-center">
            <p class="text-muted small mb-0">&copy; {{ date('Y') }} {{ config('app.name', 'HRMS') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
