<x-guest-layout>
    <div class="auth-header">
        <h1>Verify Email</h1>
        <p>Check your email for the verification link</p>
    </div>

    <div class="section-info">
        Thanks for signing up! We've sent a verification link to your email address. Please click on it to complete your registration.
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="success-message">
            A new verification link has been sent to your email address.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn-submit">
            Resend Verification Email
        </button>
    </form>

    <div class="auth-link">
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="text-decoration-none" style="background: none; border: none; padding: 0;">
                Log Out
            </button>
        </form>
    </div>
</x-guest-layout>
