<x-guest-layout>
    @section('title', 'Register')

    <div class="text-center mb-4">
        <h4 class="fw-bold">Create Account</h4>
        <p class="text-muted">Join our HR management system</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <x-input 
            type="text"
            name="name"
            label="Full Name"
            placeholder="Enter your full name"
            required
            autofocus
        />

        <x-input 
            type="email"
            name="email"
            label="Email Address"
            placeholder="Enter your email"
            required
        />

        <x-input 
            type="password"
            name="password"
            label="Password"
            placeholder="Create a password"
            required
        />

        <x-input 
            type="password"
            name="password_confirmation"
            label="Confirm Password"
            placeholder="Confirm your password"
            required
        />

        <div class="d-grid gap-2 mb-3">
            <x-button type="submit" variant="primary" size="lg">
                Create Account
            </x-button>
        </div>

        <hr class="my-4">

        <div class="text-center">
            <p class="text-muted small mb-0">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">
                    Sign in
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
