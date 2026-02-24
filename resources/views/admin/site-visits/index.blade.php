<x-app-layout>
    <style>
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-down { animation: slideDown 0.6s ease-out; }
    </style>

    <div class="bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="animate-slide-down mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-2">📅 Site Visit Booking</h1>
                    <p class="text-lg text-gray-600 dark:text-gray-400">Schedule and manage customer site visits</p>
                </div>
                <a href="{{ route('admin.site-visits.create') }}" class="px-6 py-3 bg-gradient-to-r from-pink-500 to-pink-600 text-white rounded-lg font-semibold hover:from-pink-600 hover:to-pink-700 transition">
                    + Schedule Visit
                </a>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <div class="bg-blue-50 dark:bg-blue-900 rounded-lg p-4 border-l-4 border-blue-500">
                    <p class="text-sm text-gray-600 dark:text-gray-300">Total Visits</p>
                    <p class="text-3xl font-bold text-blue-600 dark:text-blue-400">{{ $stats['total'] }}</p>
                </div>
                <div class="bg-pink-50 dark:bg-pink-900 rounded-lg p-4 border-l-4 border-pink-500">
                    <p class="text-sm text-gray-600 dark:text-gray-300">Scheduled</p>
                    <p class="text-3xl font-bold text-pink-600 dark:text-pink-400">{{ $stats['scheduled'] }}</p>
                </div>
                <div class="bg-green-50 dark:bg-green-900 rounded-lg p-4 border-l-4 border-green-500">
                    <p class="text-sm text-gray-600 dark:text-gray-300">Completed</p>
                    <p class="text-3xl font-bold text-green-600 dark:text-green-400">{{ $stats['completed'] }}</p>
                </div>
                <div class="bg-red-50 dark:bg-red-900 rounded-lg p-4 border-l-4 border-red-500">
                    <p class="text-sm text-gray-600 dark:text-gray-300">Cancelled</p>
                    <p class="text-3xl font-bold text-red-600 dark:text-red-400">{{ $stats['cancelled'] }}</p>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    ✓ {{ $message }}
                </div>
            @endif

            <!-- Site Visits Table -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-pink-500 to-pink-600">
                        <tr>
                            <th class="px-6 py-4 text-left text-white font-semibold">Customer</th>
                            <th class="px-6 py-4 text-left text-white font-semibold">Project</th>
                            <th class="px-6 py-4 text-left text-white font-semibold">Date & Time</th>
                            <th class="px-6 py-4 text-left text-white font-semibold">Phone</th>
                            <th class="px-6 py-4 text-left text-white font-semibold">Status</th>
                            <th class="px-6 py-4 text-left text-white font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y dark:divide-gray-700">
                        @forelse ($siteVisits as $visit)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $visit->customer_name }}</td>
                                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $visit->project->name }}</td>
                                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $visit->scheduled_date->format('M d, Y h:i A') }}</td>
                                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $visit->customer_phone }}</td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('admin.site-visits.updateStatus', $visit->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" class="px-3 py-1 rounded-full text-xs font-semibold border-0 cursor-pointer @if($visit->status === 'scheduled') bg-pink-100 text-pink-800 @elseif($visit->status === 'completed') bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                                            <option value="scheduled" {{ $visit->status === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                            <option value="completed" {{ $visit->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                            <option value="cancelled" {{ $visit->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.site-visits.show', $visit->id) }}" class="text-pink-600 dark:text-pink-400 hover:underline font-semibold text-sm">View</a>
                                    <a href="{{ route('admin.site-visits.edit', $visit->id) }}" class="text-blue-600 dark:text-blue-400 hover:underline font-semibold text-sm ml-2">Edit</a>
                                    <form action="{{ route('admin.site-visits.destroy', $visit->id) }}" method="POST" class="inline ml-2" onsubmit="return confirm('Delete this visit?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 dark:text-red-400 hover:underline font-semibold text-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">No site visits found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $siteVisits->links() }}
            </div>
        </div>
    </div>
</x-app-layout>