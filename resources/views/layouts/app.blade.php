<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'HRMS') }} - @yield('title', 'Dashboard')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .sidebar {
            min-height: calc(100vh - 56px);
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }
        .sidebar .nav-link {
            font-weight: 500;
            color: var(--bs-body-color);
            padding: 0.75rem 1rem;
            border-radius: 0.25rem;
            margin-bottom: 0.25rem;
        }
        .sidebar .nav-link:hover {
            background-color: var(--bs-secondary-bg);
        }
        .sidebar .nav-link.active {
            background-color: #0d6efd;
            color: #fff;
        }
        .sidebar .nav-link i {
            margin-right: 0.5rem;
        }
    </style>
    @stack('styles')
</head>
<body>
    @include('layouts.navigation')

    <div class="container-fluid">
        <div class="row">
            @include('layouts.partials.sidebar')
            
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @include('layouts.partials.header')

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <strong>Please correct the following errors:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{ $slot }}

                @include('layouts.partials.footer')
            </main>
        </div>
    </div>

    <script src="{{ asset('js/common/theme-toggle.js') }}"></script>
    <script src="{{ asset('js/common/ajax-helpers.js') }}"></script>
    @stack('scripts')
</body>
</html>
