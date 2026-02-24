<x-guest-layout>
    <style>
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .animate-slide-down {
            animation: slideDown 0.6s ease-out forwards;
        }
        
        .animate-slide-up {
            animation: slideUp 0.6s ease-out forwards;
        }
        
        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
            opacity: 0;
        }

        .form-input-focus {
            transition: all 0.3s ease;
        }

        .form-input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.3);
        }
    </style>

    <div class="min-h-screen bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-md">
            <!-- Header -->
            <div class="text-center mb-8 animate-slide-down">
                <h1 class="text-4xl font-bold text-white mb-2">🏠 NavyaHomes</h1>
                <p class="text-blue-100 text-lg">Welcome Back</p>
            </div>

            <!-- Login Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl overflow-hidden animate-slide-up">
                <!-- Decorative top bar -->
                <div class="h-1 bg-gradient-to-r from-blue-600 to-green-600"></div>

                <div class="p-8 md:p-10">
                    <!-- Session Status -->
                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-50 dark:bg-red-900 border-l-4 border-red-500 rounded animate-fade-in">
                            <p class="text-red-800 dark:text-red-100 font-semibold mb-2">⚠️ Login Failed</p>
                            @foreach ($errors->all() as $error)
                                <p class="text-red-700 dark:text-red-200 text-sm">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="mb-6 p-4 bg-green-50 dark:bg-green-900 border-l-4 border-green-500 rounded animate-fade-in">
                            <p class="text-green-800 dark:text-green-100 font-semibold">✓ {{ session('status') }}</p>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        <!-- Email Address -->
                        <div class="animate-fade-in" style="animation-delay: 0.1s;">
                            <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">
                                📧 Email Address
                            </label>
                            <input 
                                id="email" 
                                class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:border-blue-500 focus:outline-none form-input-focus dark:bg-gray-700 dark:text-white transition" 
                                type="email" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required 
                                autofocus 
                                autocomplete="username"
                                placeholder="Enter your email"
                            />
                            @error('email')
                                <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="animate-fade-in" style="animation-delay: 0.2s;">
                            <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">
                                🔒 Password
                            </label>
                            <input 
                                id="password" 
                                class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:border-blue-500 focus:outline-none form-input-focus dark:bg-gray-700 dark:text-white transition" 
                                type="password" 
                                name="password" 
                                required 
                                autocomplete="current-password"
                                placeholder="Enter your password"
                            />
                            @error('password')
                                <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center animate-fade-in" style="animation-delay: 0.3s;">
                            <input 
                                id="remember_me" 
                                type="checkbox" 
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600" 
                                name="remember"
                            >
                            <label for="remember_me" class="ml-2 text-sm text-gray-600 dark:text-gray-300">
                                Remember me for 30 days
                            </label>
                        </div>

                        <!-- Login Button -->
                        <button 
                            type="submit" 
                            class="w-full mt-6 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-3 rounded-lg transition transform hover:scale-105 active:scale-95 shadow-lg animate-fade-in" 
                            style="animation-delay: 0.4s;"
                        >
                            🔓 Sign In
                        </button>

                        <!-- Forgot Password Link -->
                        @if (Route::has('password.request'))
                            <div class="text-center animate-fade-in" style="animation-delay: 0.5s;">
                                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 font-semibold transition">
                                    Forgot your password?
                                </a>
                            </div>
                        @endif
                    </form>
                </div>

                <!-- Footer -->
                <div class="px-8 md:px-10 py-6 bg-gray-50 dark:bg-gray-700 border-t border-gray-200 dark:border-gray-600 text-center animate-fade-in" style="animation-delay: 0.6s;">
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="text-blue-600 dark:text-blue-400 font-bold hover:text-blue-700 dark:hover:text-blue-300 transition">
                            Create one
                        </a>
                    </p>
                </div>
            </div>

            <!-- Security Info -->
            <div class="mt-8 text-center text-blue-100 text-sm animate-slide-up" style="animation-delay: 0.7s;">
                <p class="flex items-center justify-center gap-2">
                    <span>🔐</span>
                    Secure login with SSL encryption
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
