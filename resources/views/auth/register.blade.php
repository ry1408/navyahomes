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

    <div class="min-h-screen bg-gradient-to-br from-green-600 to-blue-800 flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-md">
            <!-- Header -->
            <div class="text-center mb-8 animate-slide-down">
                <h1 class="text-4xl font-bold text-white mb-2">🏠 NavyaHomes</h1>
                <p class="text-blue-100 text-lg">Join Our Community</p>
            </div>

            <!-- Registration Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl overflow-hidden animate-slide-up">
                <!-- Decorative top bar -->
                <div class="h-1 bg-gradient-to-r from-green-600 to-blue-600"></div>

                <div class="p-8 md:p-10">
                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-50 dark:bg-red-900 border-l-4 border-red-500 rounded animate-fade-in">
                            <p class="text-red-800 dark:text-red-100 font-semibold mb-2">⚠️ Registration Error</p>
                            @foreach ($errors->all() as $error)
                                <p class="text-red-700 dark:text-red-200 text-sm">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}" class="space-y-5">
                        @csrf

                        <!-- Name -->
                        <div class="animate-fade-in" style="animation-delay: 0.1s;">
                            <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">
                                👤 Full Name
                            </label>
                            <input 
                                id="name" 
                                class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:border-green-500 focus:outline-none form-input-focus dark:bg-gray-700 dark:text-white transition" 
                                type="text" 
                                name="name" 
                                value="{{ old('name') }}" 
                                required 
                                autofocus 
                                autocomplete="name"
                                placeholder="Enter your full name"
                            />
                            @error('name')
                                <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="animate-fade-in" style="animation-delay: 0.2s;">
                            <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">
                                📧 Email Address
                            </label>
                            <input 
                                id="email" 
                                class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:border-green-500 focus:outline-none form-input-focus dark:bg-gray-700 dark:text-white transition" 
                                type="email" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required 
                                autocomplete="username"
                                placeholder="Enter your email"
                            />
                            @error('email')
                                <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="animate-fade-in" style="animation-delay: 0.3s;">
                            <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">
                                🔒 Password
                            </label>
                            <input 
                                id="password" 
                                class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:border-green-500 focus:outline-none form-input-focus dark:bg-gray-700 dark:text-white transition" 
                                type="password" 
                                name="password" 
                                required 
                                autocomplete="new-password"
                                placeholder="Create a strong password (min 8 characters)"
                            />
                            @error('password')
                                <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="animate-fade-in" style="animation-delay: 0.4s;">
                            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">
                                🔒 Confirm Password
                            </label>
                            <input 
                                id="password_confirmation" 
                                class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:border-green-500 focus:outline-none form-input-focus dark:bg-gray-700 dark:text-white transition" 
                                type="password" 
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password"
                                placeholder="Confirm your password"
                            />
                            @error('password_confirmation')
                                <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Terms Agreement -->
                        <div class="flex items-start animate-fade-in" style="animation-delay: 0.5s;">
                            <input 
                                id="agree" 
                                type="checkbox" 
                                class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:border-gray-600 mt-1" 
                                required
                            >
                            <label for="agree" class="ml-2 text-sm text-gray-600 dark:text-gray-300">
                                I agree to the <a href="#" class="text-green-600 dark:text-green-400 font-semibold hover:underline">Terms of Service</a> and <a href="#" class="text-green-600 dark:text-green-400 font-semibold hover:underline">Privacy Policy</a>
                            </label>
                        </div>

                        <!-- Register Button -->
                        <button 
                            type="submit" 
                            class="w-full mt-6 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold py-3 rounded-lg transition transform hover:scale-105 active:scale-95 shadow-lg animate-fade-in" 
                            style="animation-delay: 0.6s;"
                        >
                            ✨ Create Account
                        </button>
                    </form>
                </div>

                <!-- Footer -->
                <div class="px-8 md:px-10 py-6 bg-gray-50 dark:bg-gray-700 border-t border-gray-200 dark:border-gray-600 text-center animate-fade-in" style="animation-delay: 0.7s;">
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-green-600 dark:text-green-400 font-bold hover:text-green-700 dark:hover:text-green-300 transition">
                            Sign in
                        </a>
                    </p>
                </div>
            </div>

            <!-- Benefits -->
            <div class="mt-8 grid grid-cols-3 gap-4 text-center text-blue-100 text-xs animate-slide-up" style="animation-delay: 0.8s;">
                <div class="p-3 bg-white bg-opacity-10 rounded-lg">
                    <p class="text-xl mb-1">🏡</p>
                    <p>Find Plots</p>
                </div>
                <div class="p-3 bg-white bg-opacity-10 rounded-lg">
                    <p class="text-xl mb-1">💼</p>
                    <p>Manage Account</p>
                </div>
                <div class="p-3 bg-white bg-opacity-10 rounded-lg">
                    <p class="text-xl mb-1">🎯</p>
                    <p>Get Updates</p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
