<x-app-layout>
    <style>
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes glow {
            0%, 100% {
                box-shadow: 0 0 15px rgba(59, 130, 246, 0.3);
            }
            50% {
                box-shadow: 0 0 25px rgba(59, 130, 246, 0.5);
            }
        }

        .animate-slide-down {
            animation: slideDown 0.6s ease-out;
        }

        .animate-slide-up {
            animation: slideUp 0.6s ease-out;
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
        }

        .button-hover {
            transition: all 0.3s ease;
        }

        .button-hover:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
    </style>

    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">
            <!-- Header -->
            <div class="mb-12 animate-slide-down">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-3">👤 Your Profile</h1>
                <p class="text-lg text-gray-600 dark:text-gray-400">Manage your account information and security settings</p>
            </div>

            <!-- Profile Information Card -->
            <div class="mb-8 animate-fade-in" style="animation-delay: 0.1s;">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden card-hover border-l-4 border-blue-500">
                    <div class="h-1 bg-gradient-to-r from-blue-500 to-blue-600"></div>
                    <div class="p-6 sm:p-10">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white text-xl">📧</div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Profile Information</h2>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Update your name and email address</p>
                            </div>
                        </div>
                        <div class="mt-8">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>
            </div>

            <!-- Password Card -->
            <div class="mb-8 animate-fade-in" style="animation-delay: 0.2s;">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden card-hover border-l-4 border-yellow-500">
                    <div class="h-1 bg-gradient-to-r from-yellow-500 to-orange-500"></div>
                    <div class="p-6 sm:p-10">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center text-white text-xl">🔒</div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Update Password</h2>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Keep your account secure with a strong password</p>
                            </div>
                        </div>
                        <div class="mt-8">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delete Account Card -->
            <div class="animate-fade-in" style="animation-delay: 0.3s;">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden card-hover border-l-4 border-red-500">
                    <div class="h-1 bg-gradient-to-r from-red-500 to-pink-600"></div>
                    <div class="p-6 sm:p-10">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl flex items-center justify-center text-white text-xl">⚠️</div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Delete Account</h2>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Permanently remove your account and data</p>
                            </div>
                        </div>
                        <div class="mt-8">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
