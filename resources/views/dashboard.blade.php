<x-app-layout>
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

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
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

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2);
        }

        .stat-number {
            transition: transform 0.3s ease;
        }

        .card-hover:hover .stat-number {
            transform: scale(1.1);
        }
    </style>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="animate-slide-down">
                <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-200">
                    👋 Welcome, {{ Auth::user()->name }}!
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mt-1">Manage your real estate dashboard</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Statistics Section -->
            <div class="mb-12">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6 animate-slide-down">📊 Quick Statistics</h3>
                
                @php
                    $projectsCount = \App\Models\Project::count();
                    $plotsCount = \App\Models\Plot::count();
                    $availablePlots = \App\Models\Plot::where('status', 'available')->count();
                    $bookedPlots = \App\Models\Plot::where('status', 'booked')->count();
                    $soldPlots = \App\Models\Plot::where('status', 'sold')->count();
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 md:gap-6">
                    <!-- Total Projects Stat -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900 dark:to-blue-800 rounded-xl shadow-md p-6 card-hover border-l-4 border-blue-600 animate-fade-in group">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold text-gray-600 dark:text-gray-400">Total Projects</p>
                                <p class="text-3xl font-bold text-blue-600 dark:text-blue-400 mt-2 stat-number">{{ $projectsCount }}</p>
                            </div>
                            <div class="text-4xl animate-float">📋</div>
                        </div>
                        <p class="text-xs text-gray-600 dark:text-gray-400 mt-3">Active developments</p>
                    </div>

                    <!-- Total Plots Stat -->
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900 dark:to-purple-800 rounded-xl shadow-md p-6 card-hover border-l-4 border-purple-600 animate-fade-in group" style="animation-delay: 0.1s;">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold text-gray-600 dark:text-gray-400">Total Plots</p>
                                <p class="text-3xl font-bold text-purple-600 dark:text-purple-400 mt-2 stat-number">{{ $plotsCount }}</p>
                            </div>
                            <div class="text-4xl animate-float" style="animation-delay: 0.3s;">📍</div>
                        </div>
                        <p class="text-xs text-gray-600 dark:text-gray-400 mt-3">Properties listed</p>
                    </div>

                    <!-- Available Plots Stat -->
                    <div class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900 dark:to-green-800 rounded-xl shadow-md p-6 card-hover border-l-4 border-green-600 animate-fade-in group" style="animation-delay: 0.2s;">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold text-gray-600 dark:text-gray-400">Available</p>
                                <p class="text-3xl font-bold text-green-600 dark:text-green-400 mt-2 stat-number">{{ $availablePlots }}</p>
                            </div>
                            <div class="text-4xl animate-float" style="animation-delay: 0.6s;">✅</div>
                        </div>
                        <p class="text-xs text-gray-600 dark:text-gray-400 mt-3">Ready to book</p>
                    </div>

                    <!-- Booked Plots Stat -->
                    <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 dark:from-yellow-900 dark:to-yellow-800 rounded-xl shadow-md p-6 card-hover border-l-4 border-yellow-600 animate-fade-in group" style="animation-delay: 0.3s;">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold text-gray-600 dark:text-gray-400">Booked</p>
                                <p class="text-3xl font-bold text-yellow-600 dark:text-yellow-400 mt-2 stat-number">{{ $bookedPlots }}</p>
                            </div>
                            <div class="text-4xl animate-float" style="animation-delay: 0.9s;">⏳</div>
                        </div>
                        <p class="text-xs text-gray-600 dark:text-gray-400 mt-3">In progress</p>
                    </div>

                    <!-- Sold Plots Stat -->
                    <div class="bg-gradient-to-br from-red-50 to-red-100 dark:from-red-900 dark:to-red-800 rounded-xl shadow-md p-6 card-hover border-l-4 border-red-600 animate-fade-in group" style="animation-delay: 0.4s;">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold text-gray-600 dark:text-gray-400">Sold</p>
                                <p class="text-3xl font-bold text-red-600 dark:text-red-400 mt-2 stat-number">{{ $soldPlots }}</p>
                            </div>
                            <div class="text-4xl animate-float" style="animation-delay: 1.2s;">🏆</div>
                        </div>
                        <p class="text-xs text-gray-600 dark:text-gray-400 mt-3">Completed sales</p>
                    </div>
                </div>
            </div>

            <!-- Management Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Project Management -->
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6 animate-slide-down">🏗️ Project Management</h3>
                    <div class="space-y-4">
                        <a href="{{ route('admin.projects.index') }}" class="group block bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-xl shadow-lg p-6 card-hover transition animate-fade-in" style="animation-delay: 0.5s;">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="font-bold text-lg">📋 Manage Projects</h4>
                                    <p class="text-blue-100 text-sm mt-1">View and edit all projects</p>
                                </div>
                                <span class="text-3xl group-hover:scale-110 transition transform">→</span>
                            </div>
                        </a>
                        <a href="{{ route('admin.projects.create') }}" class="group block bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white rounded-xl shadow-lg p-6 card-hover transition animate-fade-in" style="animation-delay: 0.6s;">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="font-bold text-lg">✨ Create New Project</h4>
                                    <p class="text-green-100 text-sm mt-1">Add a new development project</p>
                                </div>
                                <span class="text-3xl group-hover:scale-110 transition transform">+</span>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Plot Management -->
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6 animate-slide-down">📍 Plot Management</h3>
                    <div class="space-y-4">
                        <a href="{{ route('admin.plots.index') }}" class="group block bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white rounded-xl shadow-lg p-6 card-hover transition animate-fade-in" style="animation-delay: 0.7s;">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="font-bold text-lg">📍 Manage Plots</h4>
                                    <p class="text-purple-100 text-sm mt-1">View and edit all properties</p>
                                </div>
                                <span class="text-3xl group-hover:scale-110 transition transform">→</span>
                            </div>
                        </a>
                        <a href="{{ route('admin.plots.create') }}" class="group block bg-gradient-to-r from-orange-600 to-orange-700 hover:from-orange-700 hover:to-orange-800 text-white rounded-xl shadow-lg p-6 card-hover transition animate-fade-in" style="animation-delay: 0.8s;">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="font-bold text-lg">🏡 Create New Plot</h4>
                                    <p class="text-orange-100 text-sm mt-1">List a new property</p>
                                </div>
                                <span class="text-3xl group-hover:scale-110 transition transform">+</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Section -->
            <div class="mt-12">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6 animate-slide-down">⚡ Quick Actions</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="{{ route('home') }}" class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 text-center card-hover border-t-4 border-blue-600 animate-fade-in" style="animation-delay: 0.9s;">
                        <p class="text-2xl mb-2">🏠</p>
                        <p class="font-semibold text-gray-900 dark:text-gray-100 text-sm">View Website</p>
                    </a>
                    <a href="{{ route('contact.show') }}" class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 text-center card-hover border-t-4 border-green-600 animate-fade-in" style="animation-delay: 1.0s;">
                        <p class="text-2xl mb-2">📧</p>
                        <p class="font-semibold text-gray-900 dark:text-gray-100 text-sm">Contact Support</p>
                    </a>
                    <a href="{{ route('plots.index') }}" class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 text-center card-hover border-t-4 border-purple-600 animate-fade-in" style="animation-delay: 1.1s;">
                        <p class="text-2xl mb-2">🔍</p>
                        <p class="font-semibold text-gray-900 dark:text-gray-100 text-sm">Browse Plots</p>
                    </a>
                    <a href="{{ route('projects.index') }}" class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 text-center card-hover border-t-4 border-orange-600 animate-fade-in" style="animation-delay: 1.2s;">
                        <p class="text-2xl mb-2">📋</p>
                        <p class="font-semibold text-gray-900 dark:text-gray-100 text-sm">View Projects</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>