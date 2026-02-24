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
            <a href="{{ route('admin.site-visits.index') }}" class="text-pink-600 dark:text-pink-400 hover:underline mb-6 inline-block">← Back to Site Visits</a>

            <!-- Visit Details Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden animate-slide-down">
                <div class="bg-gradient-to-r from-pink-500 to-pink-600 px-6 py-6">
                    <h1 class="text-3xl font-bold text-white">📅 {{ $siteVisit->customer_name }}</h1>
                    <p class="text-pink-100 mt-2">Site Visit Details</p>
                </div>

                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 font-semibold">Project</p>
                            <p class="text-lg text-gray-900 dark:text-white">{{ $siteVisit->project->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 font-semibold">Scheduled Date & Time</p>
                            <p class="text-lg text-gray-900 dark:text-white">{{ $siteVisit->scheduled_date->format('M d, Y h:i A') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 font-semibold">Email</p>
                            <p class="text-lg text-gray-900 dark:text-white">{{ $siteVisit->customer_email }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 font-semibold">Phone</p>
                            <p class="text-lg text-gray-900 dark:text-white">{{ $siteVisit->customer_phone }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 font-semibold">Status</p>
                            <span class="px-4 py-2 rounded-full text-sm font-semibold inline-block @if($siteVisit->status === 'scheduled') bg-pink-100 text-pink-800 dark:bg-pink-900 dark:text-pink-200 @elseif($siteVisit->status === 'completed') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 @else bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 @endif">
                                {{ ucfirst($siteVisit->status) }}
                            </span>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 font-semibold">Lead</p>
                            <p class="text-lg text-gray-900 dark:text-white">
                                <a href="{{ route('admin.leads.show', $siteVisit->lead->id) }}" class="text-pink-600 dark:text-pink-400 hover:underline">
                                    {{ $siteVisit->lead->name }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <!-- Notes Section -->
                    @if($siteVisit->notes)
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-900 dark:text-white mb-3">📝 Notes</h3>
                            <p class="text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">{{ $siteVisit->notes }}</p>
                        </div>
                    @endif

                    <!-- Timeline -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 mb-6">
                        <h3 class="font-semibold text-gray-900 dark:text-white mb-3">📅 Timeline</h3>
                        <div class="space-y-2 text-sm">
                            <p class="text-gray-600 dark:text-gray-400">Created: {{ $siteVisit->created_at->format('M d, Y h:i A') }}</p>
                            @if($siteVisit->reminder_sent_at)
                                <p class="text-gray-600 dark:text-gray-400">Reminder Sent: {{ $siteVisit->reminder_sent_at->format('M d, Y h:i A') }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4 pt-6 border-t dark:border-gray-700">
                        <a href="{{ route('admin.site-visits.edit', $siteVisit->id) }}" class="px-6 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg font-semibold hover:from-blue-600 hover:to-blue-700 transition">
                            Edit Visit
                        </a>
                        <form action="{{ route('admin.site-visits.destroy', $siteVisit->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this visit?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-6 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg font-semibold hover:from-red-600 hover:to-red-700 transition">
                                Delete Visit
                            </button>
                        </form>
                        <a href="{{ route('admin.site-visits.index') }}" class="px-6 py-2 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition ml-auto">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>