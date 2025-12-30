<x-guest-layout>
    @section('title', 'Login')

    <div class="text-center mb-4">
        <h4 class="fw-bold">Welcome Back</h4>
        <p class="text-muted">Sign in to your account</p>
    </div>

    @if(session('status'))
        <x-alert type="success" :message="session('status')" />
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <x-input 
            type="email"
            name="email"
            label="Email Address"
            placeholder="Enter your email"
            required
            autofocus
        />

        <x-input 
            type="password"
            name="password"
            label="Password"
            placeholder="Enter your password"
            required
        />

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">
                Remember me
            </label>
        </div>

        <div class="d-grid gap-2 mb-3">
            <x-button type="submit" variant="primary" size="lg">
                Sign In
            </x-button>
        </div>

        <div class="text-center">
            <a href="{{ route('password.request') }}" class="text-decoration-none small">
                Forgot your password?
            </a>
        </div>

        <hr class="my-4">

        <div class="text-center">
            <p class="text-muted small mb-0">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-decoration-none fw-semibold">
                    Sign up
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
