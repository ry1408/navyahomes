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
            <div class="animate-slide-down mb-8">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-2">👥 Lead Management</h1>
                <p class="text-lg text-gray-600 dark:text-gray-400">Track and manage customer inquiries</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <div class="bg-blue-50 dark:bg-blue-900 rounded-lg p-4 border-l-4 border-blue-500">
                    <p class="text-sm text-gray-600 dark:text-gray-300">Total Leads</p>
                    <p class="text-3xl font-bold text-blue-600 dark:text-blue-400">{{ $stats['total'] }}</p>
                </div>
                <div class="bg-yellow-50 dark:bg-yellow-900 rounded-lg p-4 border-l-4 border-yellow-500">
                    <p class="text-sm text-gray-600 dark:text-gray-300">New Leads</p>
                    <p class="text-3xl font-bold text-yellow-600 dark:text-yellow-400">{{ $stats['new'] }}</p>
                </div>
                <div class="bg-orange-50 dark:bg-orange-900 rounded-lg p-4 border-l-4 border-orange-500">
                    <p class="text-sm text-gray-600 dark:text-gray-300">Contacted</p>
                    <p class="text-3xl font-bold text-orange-600 dark:text-orange-400">{{ $stats['contacted'] }}</p>
                </div>
                <div class="bg-green-50 dark:bg-green-900 rounded-lg p-4 border-l-4 border-green-500">
                    <p class="text-sm text-gray-600 dark:text-gray-300">Converted</p>
                    <p class="text-3xl font-bold text-green-600 dark:text-green-400">{{ $stats['converted'] }}</p>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    ✓ {{ $message }}
                </div>
            @endif

            <!-- Leads Table -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-orange-500 to-orange-600">
                        <tr>
                            <th class="px-6 py-4 text-left text-white font-semibold">Name</th>
                            <th class="px-6 py-4 text-left text-white font-semibold">Email</th>
                            <th class="px-6 py-4 text-left text-white font-semibold">Phone</th>
                            <th class="px-6 py-4 text-left text-white font-semibold">Source</th>
                            <th class="px-6 py-4 text-left text-white font-semibold">Status</th>
                            <th class="px-6 py-4 text-left text-white font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y dark:divide-gray-700">
                        @forelse ($leads as $lead)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $lead->name }}</td>
                                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $lead->email }}</td>
                                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $lead->phone }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        {{ ucfirst($lead->source) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('admin.leads.updateStatus', $lead->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" class="px-3 py-1 rounded-full text-xs font-semibold border-0 cursor-pointer @if($lead->status === 'new') bg-yellow-100 text-yellow-800 @elseif($lead->status === 'contacted') bg-orange-100 text-orange-800 @else bg-green-100 text-green-800 @endif">
                                            <option value="new" {{ $lead->status === 'new' ? 'selected' : '' }}>New</option>
                                            <option value="contacted" {{ $lead->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                                            <option value="converted" {{ $lead->status === 'converted' ? 'selected' : '' }}>Converted</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.leads.show', $lead->id) }}" class="text-orange-600 dark:text-orange-400 hover:underline font-semibold text-sm">View</a>
                                    <form action="{{ route('admin.leads.destroy', $lead->id) }}" method="POST" class="inline ml-2" onsubmit="return confirm('Delete this lead?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 dark:text-red-400 hover:underline font-semibold text-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">No leads found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $leads->links() }}
            </div>
        </div>
    </div>
</x-app-layout>