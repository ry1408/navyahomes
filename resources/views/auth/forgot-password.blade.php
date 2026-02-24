<x-guest-layout>
    <div class="auth-header">
        <h1>Reset Password</h1>
        <p>Enter your email to receive a password reset link</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="success-message">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="form-label">Email Address</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus />
            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-submit">
            Email Password Reset Link
        </button>
    </form>

    <div class="auth-link">
        <p>Remember your password? <a href="{{ route('login') }}">Sign in here</a></p>
    </div>
</x-guest-layout>
