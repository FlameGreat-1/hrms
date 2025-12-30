<x-guest-layout>
    @section('title', 'Reset Password')

    <div class="text-center mb-4">
        <h4 class="fw-bold">Create New Password</h4>
        <p class="text-muted">Enter your new password below</p>
    </div>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <x-input 
            type="email"
            name="email"
            label="Email Address"
            :value="$request->email"
            placeholder="Enter your email"
            required
            autofocus
        />

        <x-input 
            type="password"
            name="password"
            label="New Password"
            placeholder="Create a new password"
            required
        />

        <x-input 
            type="password"
            name="password_confirmation"
            label="Confirm Password"
            placeholder="Confirm your new password"
            required
        />

        <div class="d-grid gap-2 mb-3">
            <x-button type="submit" variant="primary" size="lg">
                Reset Password
            </x-button>
        </div>
    </form>
</x-guest-layout>
