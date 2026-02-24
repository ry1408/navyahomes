<section>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .form-input {
            transition: all 0.3s ease;
        }

        .form-input:focus {
            transform: translateY(-2px);
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
            border-color: #3B82F6;
        }

        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            display: block;
        }

        .dark .form-label {
            color: #E5E7EB;
        }

        .success-message {
            animation: fadeIn 0.6s ease-out;
            background: linear-gradient(135deg, #10B981, #059669);
            color: white;
            padding: 12px 16px;
            border-radius: 8px;
            font-weight: 500;
            margin-top: 12px;
        }

        .verify-link {
            color: #3B82F6;
            text-decoration: underline;
            transition: color 0.2s;
        }

        .verify-link:hover {
            color: #2563EB;
        }

        .save-button {
            background: linear-gradient(135deg, #3B82F6, #2563EB);
            color: white;
            padding: 12px 32px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .save-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
        }

        .error-message {
            color: #EF4444;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: block;
        }

        .dark .error-message {
            color: #FCA5A5;
        }
    </style>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Name Input -->
        <div class="animate-fade-in" style="animation-delay: 0.1s;">
            <label for="name" class="form-label">
                <span class="inline-flex items-center gap-2">
                    <span>👤 Full Name</span>
                </span>
            </label>
            <input
                id="name"
                name="name"
                type="text"
                class="form-input w-full px-4 py-3 rounded-lg border-2 border-gray-200 dark:border-gray-700 dark:bg-gray-700 dark:text-white focus:outline-none"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
                placeholder="Enter your full name"
            />
            @if ($errors->has('name'))
                @foreach ($errors->get('name') as $message)
                    <span class="error-message">{{ $message }}</span>
                @endforeach
            @endif
        </div>

        <!-- Email Input -->
        <div class="animate-fade-in" style="animation-delay: 0.2s;">
            <label for="email" class="form-label">
                <span class="inline-flex items-center gap-2">
                    <span>📧 Email Address</span>
                </span>
            </label>
            <input
                id="email"
                name="email"
                type="email"
                class="form-input w-full px-4 py-3 rounded-lg border-2 border-gray-200 dark:border-gray-700 dark:bg-gray-700 dark:text-white focus:outline-none"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
                placeholder="Enter your email address"
            />
            @if ($errors->has('email'))
                @foreach ($errors->get('email') as $message)
                    <span class="error-message">{{ $message }}</span>
                @endforeach
            @endif

            <!-- Email Verification Notice -->
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 p-4 bg-yellow-50 dark:bg-yellow-900 rounded-lg border-l-4 border-yellow-400 animate-fade-in">
                    <p class="text-sm text-yellow-800 dark:text-yellow-100">
                        ⚠️ Your email address is <strong>not verified</strong>.
                        <button form="send-verification" class="verify-link font-semibold block mt-2">
                            Click here to resend the verification email →
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="success-message mt-2">
                            ✓ A new verification link has been sent to your email!
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Save Button -->
        <div class="flex items-center gap-4 pt-4 animate-fade-in" style="animation-delay: 0.3s;">
            <button type="submit" class="save-button">
                💾 Save Changes
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="success-message"
                >✓ Profile updated successfully!</p>
            @endif
        </div>
    </form>
</section>
