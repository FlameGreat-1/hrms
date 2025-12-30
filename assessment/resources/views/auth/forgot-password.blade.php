<x-guest-layout>
    @section('title', 'Forgot Password')

    <div class="text-center mb-4">
        <h4 class="fw-bold">Reset Password</h4>
        <p class="text-muted">Enter your email to receive a password reset link</p>
    </div>

    @if(session('status'))
        <x-alert type="success" :message="session('status')" />
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <x-input 
            type="email"
            name="email"
            label="Email Address"
            placeholder="Enter your email"
            required
            autofocus
        />

        <div class="d-grid gap-2 mb-3">
            <x-button type="submit" variant="primary" size="lg">
                Send Reset Link
            </x-button>
        </div>

        <div class="text-center">
            <a href="{{ route('login') }}" class="text-decoration-none small">
                <i class="bi bi-arrow-left me-1"></i>Back to login
            </a>
        </div>
    </form>
</x-guest-layout>
