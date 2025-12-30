<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div>
        <h1 class="h2 mb-0">@yield('title', 'Dashboard')</h1>
        @hasSection('subtitle')
            <p class="text-muted mb-0">@yield('subtitle')</p>
        @endif
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        @yield('actions')
    </div>
</div>
