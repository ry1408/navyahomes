<x-guest-layout>
    <div class="auth-header">
        <h1>Confirm Password</h1>
        <p>This is a secure area. Please confirm your password to continue</p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-submit">
            Confirm Password
        </button>
    </form>

    <div class="auth-link">
        <p><a href="{{ route('dashboard') }}">Back to Dashboard</a></p>
    </div>
</x-guest-layout>
