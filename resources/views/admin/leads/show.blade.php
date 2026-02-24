<x-app-layout>
    <style>
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-down { animation: slideDown 0.6s ease-out; }
    </style>

    <div class="bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <a href="{{ route('admin.leads.index') }}" class="text-orange-600 dark:text-orange-400 hover:underline mb-6 inline-block">← Back to Leads</a>

            <!-- Lead Details Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden animate-slide-down">
                <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-6">
                    <h1 class="text-3xl font-bold text-white">👥 {{ $lead->name }}</h1>
                    <p class="text-orange-100 mt-2">Lead Details & History</p>
                </div>

                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 font-semibold">Email</p>
                            <p class="text-lg text-gray-900 dark:text-white">{{ $lead->email }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 font-semibold">Phone</p>
                            <p class="text-lg text-gray-900 dark:text-white">{{ $lead->phone }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 font-semibold">Source</p>
                            <p class="text-lg text-gray-900 dark:text-white">{{ ucfirst($lead->source) }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 font-semibold">Current Status</p>
                            <span class="px-4 py-2 rounded-full text-sm font-semibold inline-block @if($lead->status === 'new') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200 @elseif($lead->status === 'contacted') bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200 @else bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 @endif">
                                {{ ucfirst($lead->status) }}
                            </span>
                        </div>
                        @if($lead->plot)
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 font-semibold">Interested Plot</p>
                            <p class="text-lg text-gray-900 dark:text-white">{{ $lead->plot->plot_number }}</p>
                        </div>
                        @endif
                        @if($lead->project)
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 font-semibold">Project</p>
                            <p class="text-lg text-gray-900 dark:text-white">{{ $lead->project->name }}</p>
                        </div>
                        @endif
                    </div>

                    <!-- Timestamps -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 mb-6">
                        <h3 class="font-semibold text-gray-900 dark:text-white mb-3">📅 Timeline</h3>
                        <div class="space-y-2 text-sm">
                            <p class="text-gray-600 dark:text-gray-400">Created: {{ $lead->created_at->format('M d, Y h:i A') }}</p>
                            @if($lead->contacted_at)
                                <p class="text-gray-600 dark:text-gray-400">Contacted: {{ $lead->contacted_at->format('M d, Y h:i A') }}</p>
                            @endif
                            @if($lead->converted_at)
                                <p class="text-gray-600 dark:text-gray-400">Converted: {{ $lead->converted_at->format('M d, Y h:i A') }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Notes Section -->
                    <div class="mb-6">
                        <h3 class="font-semibold text-gray-900 dark:text-white mb-3">📝 Notes</h3>
                        @if($lead->notes)
                            <p class="text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">{{ $lead->notes }}</p>
                        @else
                            <p class="text-gray-500 dark:text-gray-400 italic">No notes yet</p>
                        @endif
                    </div>

                    <!-- Site Visits -->
                    <div class="mb-6">
                        <h3 class="font-semibold text-gray-900 dark:text-white mb-3">📅 Associated Site Visits</h3>
                        @if($lead->siteVisits->count() > 0)
                            <div class="space-y-2">
                                @foreach($lead->siteVisits as $visit)
                                    <div class="bg-pink-50 dark:bg-pink-900 p-4 rounded-lg">
                                        <p class="font-semibold text-gray-900 dark:text-white">{{ $visit->project->name }}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $visit->scheduled_date->format('M d, Y h:i A') }}</p>
                                        <span class="px-2 py-1 text-xs font-semibold rounded bg-pink-200 text-pink-800 dark:bg-pink-700 dark:text-pink-200 inline-block mt-2">
                                            {{ ucfirst($visit->status) }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 dark:text-gray-400 italic">No site visits scheduled</p>
                        @endif
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4 pt-6 border-t dark:border-gray-700">
                        <form action="{{ route('admin.leads.updateStatus', $lead->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            @if($lead->status !== 'converted')
                                <input type="hidden" name="status" value="{{ $lead->status === 'new' ? 'contacted' : 'converted' }}">
                                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg font-semibold hover:from-orange-600 hover:to-orange-700 transition">
                                    {{ $lead->status === 'new' ? 'Mark as Contacted' : 'Mark as Converted' }}
                                </button>
                            @endif
                        </form>
                        <a href="{{ route('admin.leads.index') }}" class="px-6 py-2 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>