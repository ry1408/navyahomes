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
            box-shadow: 0 0 20px rgba(217, 119, 6, 0.3);
            border-color: #F59E0B;
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

        .save-button {
            background: linear-gradient(135deg, #F59E0B, #D97706);
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
            box-shadow: 0 8px 16px rgba(217, 119, 6, 0.3);
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

        .help-text {
            font-size: 0.875rem;
            color: #6B7280;
            margin-top: 0.25rem;
        }

        .dark .help-text {
            color: #D1D5DB;
        }
    </style>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="animate-fade-in" style="animation-delay: 0.1s;">
            <label for="current_password" class="form-label">
                <span class="inline-flex items-center gap-2">
                    <span>🔐 Current Password</span>
                </span>
            </label>
            <input
                id="current_password"
                name="current_password"
                type="password"
                class="form-input w-full px-4 py-3 rounded-lg border-2 border-gray-200 dark:border-gray-700 dark:bg-gray-700 dark:text-white focus:outline-none"
                autocomplete="current-password"
                placeholder="Enter your current password"
            />
            @if ($errors->updatePassword->has('current_password'))
                @foreach ($errors->updatePassword->get('current_password') as $message)
                    <span class="error-message">{{ $message }}</span>
                @endforeach
            @endif
            <p class="help-text">Required to verify your identity</p>
        </div>

        <!-- New Password -->
        <div class="animate-fade-in" style="animation-delay: 0.2s;">
            <label for="password" class="form-label">
                <span class="inline-flex items-center gap-2">
                    <span>🆕 New Password</span>
                </span>
            </label>
            <input
                id="password"
                name="password"
                type="password"
                class="form-input w-full px-4 py-3 rounded-lg border-2 border-gray-200 dark:border-gray-700 dark:bg-gray-700 dark:text-white focus:outline-none"
                autocomplete="new-password"
                placeholder="Enter a strong new password"
            />
            @if ($errors->updatePassword->has('password'))
                @foreach ($errors->updatePassword->get('password') as $message)
                    <span class="error-message">{{ $message }}</span>
                @endforeach
            @endif
            <p class="help-text">Use a long, random password (8+ characters with mix of letters, numbers, symbols)</p>
        </div>

        <!-- Confirm Password -->
        <div class="animate-fade-in" style="animation-delay: 0.3s;">
            <label for="password_confirmation" class="form-label">
                <span class="inline-flex items-center gap-2">
                    <span>✓ Confirm Password</span>
                </span>
            </label>
            <input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                class="form-input w-full px-4 py-3 rounded-lg border-2 border-gray-200 dark:border-gray-700 dark:bg-gray-700 dark:text-white focus:outline-none"
                autocomplete="new-password"
                placeholder="Confirm your new password"
            />
            @if ($errors->updatePassword->has('password_confirmation'))
                @foreach ($errors->updatePassword->get('password_confirmation') as $message)
                    <span class="error-message">{{ $message }}</span>
                @endforeach
            @endif
        </div>

        <!-- Save Button -->
        <div class="flex items-center gap-4 pt-4 animate-fade-in" style="animation-delay: 0.4s;">
            <button type="submit" class="save-button">
                💾 Update Password
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="success-message"
                >✓ Password updated successfully!</p>
            @endif
        </div>
    </form>
</section>
