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

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
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

        .stat-number {
            transition: all 0.3s ease;
        }

        .card-hover:hover .stat-number {
            transform: scale(1.1);
            color: #fff;
        }

        .emoji {
            animation: float 3s infinite ease-in-out;
        }
    </style>

    <div class="bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-12 animate-slide-down">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-3">📊 Admin Dashboard</h1>
                <p class="text-lg text-gray-600 dark:text-gray-400">Complete business control and analytics</p>
            </div>

            <!-- Main Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
                <!-- Total Projects -->
                <div class="animate-fade-in card-hover bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900 dark:to-blue-800 rounded-xl p-6 shadow-lg border-l-4 border-blue-500" style="animation-delay: 0.1s;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-300">Projects</p>
                            <p class="text-3xl font-bold text-blue-600 dark:text-blue-400 stat-number">{{ $stats['total_projects'] }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $stats['active_projects'] }} active</p>
                        </div>
                        <div class="text-5xl emoji">📋</div>
                    </div>
                </div>

                <!-- Total Plots -->
                <div class="animate-fade-in card-hover bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900 dark:to-purple-800 rounded-xl p-6 shadow-lg border-l-4 border-purple-500" style="animation-delay: 0.2s;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-300">Total Plots</p>
                            <p class="text-3xl font-bold text-purple-600 dark:text-purple-400 stat-number">{{ $stats['total_plots'] }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">All projects</p>
                        </div>
                        <div class="text-5xl emoji">📍</div>
                    </div>
                </div>

                <!-- Available Plots -->
                <div class="animate-fade-in card-hover bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900 dark:to-green-800 rounded-xl p-6 shadow-lg border-l-4 border-green-500" style="animation-delay: 0.3s;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-300">Available</p>
                            <p class="text-3xl font-bold text-green-600 dark:text-green-400 stat-number">{{ $stats['available_plots'] }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Ready to sell</p>
                        </div>
                        <div class="text-5xl emoji">✅</div>
                    </div>
                </div>

                <!-- Booked Plots -->
                <div class="animate-fade-in card-hover bg-gradient-to-br from-yellow-50 to-yellow-100 dark:from-yellow-900 dark:to-yellow-800 rounded-xl p-6 shadow-lg border-l-4 border-yellow-500" style="animation-delay: 0.4s;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-300">Booked</p>
                            <p class="text-3xl font-bold text-yellow-600 dark:text-yellow-400 stat-number">{{ $stats['booked_plots'] }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Pending payment</p>
                        </div>
                        <div class="text-5xl emoji">⏳</div>
                    </div>
                </div>

                <!-- Sold Plots -->
                <div class="animate-fade-in card-hover bg-gradient-to-br from-red-50 to-red-100 dark:from-red-900 dark:to-red-800 rounded-xl p-6 shadow-lg border-l-4 border-red-500" style="animation-delay: 0.5s;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-300">Sold</p>
                            <p class="text-3xl font-bold text-red-600 dark:text-red-400 stat-number">{{ $stats['sold_plots'] }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Completed</p>
                        </div>
                        <div class="text-5xl emoji">🏆</div>
                    </div>
                </div>
            </div>

            <!-- Secondary Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Revenue -->
                <div class="animate-fade-in card-hover bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border-l-4 border-indigo-500" style="animation-delay: 0.1s;">
                    <div class="flex items-center">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-300">Revenue</p>
                            <p class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">Rs. {{ number_format($revenue, 0) }}</p>
                        </div>
                        <div class="text-4xl ml-auto">💰</div>
                    </div>
                </div>

                <!-- Total Leads -->
                <div class="animate-fade-in card-hover bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border-l-4 border-orange-500" style="animation-delay: 0.2s;">
                    <div class="flex items-center">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-300">Total Leads</p>
                            <p class="text-2xl font-bold text-orange-600 dark:text-orange-400">{{ $stats['total_leads'] }}</p>
                        </div>
                        <div class="text-4xl ml-auto">👥</div>
                    </div>
                </div>

                <!-- New Leads -->
                <div class="animate-fade-in card-hover bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border-l-4 border-cyan-500" style="animation-delay: 0.3s;">
                    <div class="flex items-center">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-300">New Leads</p>
                            <p class="text-2xl font-bold text-cyan-600 dark:text-cyan-400">{{ $stats['new_leads'] }}</p>
                        </div>
                        <div class="text-4xl ml-auto">📧</div>
                    </div>
                </div>

                <!-- Scheduled Visits -->
                <div class="animate-fade-in card-hover bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border-l-4 border-pink-500" style="animation-delay: 0.4s;">
                    <div class="flex items-center">
                        <div>
                            <p class="text-sm font-semibold text-gray-600 dark:text-gray-300">Site Visits</p>
                            <p class="text-2xl font-bold text-pink-600 dark:text-pink-400">{{ $stats['scheduled_visits'] }}</p>
                        </div>
                        <div class="text-4xl ml-auto">📅</div>
                    </div>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Leads -->
                <div class="animate-fade-in bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden" style="animation-delay: 0.1s;">
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                        <h2 class="text-xl font-bold text-white flex items-center gap-2">📧 Recent Leads</h2>
                    </div>
                    <div class="p-6">
                        @forelse($recent_leads as $lead)
                            <div class="flex items-center justify-between py-3 border-b dark:border-gray-700 last:border-b-0">
                                <div>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $lead->name }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $lead->email }}</p>
                                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">{{ $lead->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="text-center">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold @if($lead->status === 'new') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 @elseif($lead->status === 'contacted') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200 @else bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 @endif">
                                        {{ ucfirst($lead->status) }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-500 dark:text-gray-400 py-6">No leads yet</p>
                        @endforelse
                        <div class="mt-4">
                            <a href="{{ route('admin.leads.index') }}" class="text-orange-600 dark:text-orange-400 hover:underline text-sm font-semibold">View all leads →</a>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Site Visits -->
                <div class="animate-fade-in bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden" style="animation-delay: 0.2s;">
                    <div class="bg-gradient-to-r from-pink-500 to-pink-600 px-6 py-4">
                        <h2 class="text-xl font-bold text-white flex items-center gap-2">📅 Upcoming Visits</h2>
                    </div>
                    <div class="p-6">
                        @forelse($upcoming_visits as $visit)
                            <div class="flex items-center justify-between py-3 border-b dark:border-gray-700 last:border-b-0">
                                <div>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $visit->customer_name }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $visit->project->name ?? 'N/A' }}</p>
                                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">{{ $visit->scheduled_date->format('M d, Y h:i A') }}</p>
                                </div>
                                <div class="text-center">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-pink-100 text-pink-800 dark:bg-pink-900 dark:text-pink-200">
                                        {{ ucfirst($visit->status) }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-500 dark:text-gray-400 py-6">No upcoming visits</p>
                        @endforelse
                        <div class="mt-4">
                            <a href="{{ route('admin.site-visits.index') }}" class="text-pink-600 dark:text-pink-400 hover:underline text-sm font-semibold">View all visits →</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mt-8 animate-fade-in bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6" style="animation-delay: 0.3s;">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">🚀 Quick Actions</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="{{ route('admin.projects.index') }}" class="p-4 bg-gradient-to-br from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-lg font-semibold transition-all hover:scale-105">
                        📋 Manage Projects
                    </a>
                    <a href="{{ route('admin.plots.index') }}" class="p-4 bg-gradient-to-br from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white rounded-lg font-semibold transition-all hover:scale-105">
                        📍 Manage Plots
                    </a>
                    <a href="{{ route('admin.leads.index') }}" class="p-4 bg-gradient-to-br from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white rounded-lg font-semibold transition-all hover:scale-105">
                        👥 Manage Leads
                    </a>
                    <a href="{{ route('admin.site-visits.index') }}" class="p-4 bg-gradient-to-br from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white rounded-lg font-semibold transition-all hover:scale-105">
                        📅 Site Visits
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>