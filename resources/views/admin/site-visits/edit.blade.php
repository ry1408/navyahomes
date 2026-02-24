<x-app-layout>
    <style>
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-down { animation: slideDown 0.6s ease-out; }

        .form-input {
            transition: all 0.3s ease;
        }

        .form-input:focus {
            transform: translateY(-2px);
            box-shadow: 0 0 20px rgba(236, 72, 153, 0.3);
            border-color: #EC4899;
        }
    </style>

    <div class="bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <a href="{{ route('admin.site-visits.index') }}" class="text-pink-600 dark:text-pink-400 hover:underline mb-6 inline-block">← Back to Site Visits</a>

            <!-- Form Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden animate-slide-down">
                <div class="bg-gradient-to-r from-pink-500 to-pink-600 px-6 py-6">
                    <h1 class="text-3xl font-bold text-white">📅 Edit Site Visit</h1>
                    <p class="text-pink-100 mt-2">Update site visit details</p>
                </div>

                <form action="{{ route('admin.site-visits.update', $siteVisit->id) }}" method="POST" class="p-8 space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="lead_id" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">📧 Select Lead</label>
                        <select id="lead_id" name="lead_id" required class="form-input w-full px-4 py-3 rounded-lg border-2 border-gray-200 dark:border-gray-700 dark:bg-gray-700 dark:text-white focus:outline-none">
                            @foreach($leads as $lead)
                                <option value="{{ $lead->id }}" {{ $siteVisit->lead_id === $lead->id ? 'selected' : '' }}>{{ $lead->name }} ({{ $lead->email }})</option>
                            @endforeach
                        </select>
                        @error('lead_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="project_id" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">📍 Select Project</label>
                        <select id="project_id" name="project_id" required class="form-input w-full px-4 py-3 rounded-lg border-2 border-gray-200 dark:border-gray-700 dark:bg-gray-700 dark:text-white focus:outline-none">
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}" {{ $siteVisit->project_id === $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                            @endforeach
                        </select>
                        @error('project_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="scheduled_date" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">📅 Scheduled Date & Time</label>
                        <input type="datetime-local" id="scheduled_date" name="scheduled_date" required class="form-input w-full px-4 py-3 rounded-lg border-2 border-gray-200 dark:border-gray-700 dark:bg-gray-700 dark:text-white focus:outline-none" value="{{ $siteVisit->scheduled_date->format('Y-m-d\TH:i') }}" />
                        @error('scheduled_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="customer_name" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">👤 Customer Name</label>
                        <input type="text" id="customer_name" name="customer_name" required class="form-input w-full px-4 py-3 rounded-lg border-2 border-gray-200 dark:border-gray-700 dark:bg-gray-700 dark:text-white focus:outline-none" value="{{ $siteVisit->customer_name }}" />
                        @error('customer_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="customer_email" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">📧 Customer Email</label>
                        <input type="email" id="customer_email" name="customer_email" required class="form-input w-full px-4 py-3 rounded-lg border-2 border-gray-200 dark:border-gray-700 dark:bg-gray-700 dark:text-white focus:outline-none" value="{{ $siteVisit->customer_email }}" />
                        @error('customer_email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="customer_phone" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">📱 Customer Phone</label>
                        <input type="tel" id="customer_phone" name="customer_phone" required class="form-input w-full px-4 py-3 rounded-lg border-2 border-gray-200 dark:border-gray-700 dark:bg-gray-700 dark:text-white focus:outline-none" value="{{ $siteVisit->customer_phone }}" />
                        @error('customer_phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">📊 Status</label>
                        <select id="status" name="status" required class="form-input w-full px-4 py-3 rounded-lg border-2 border-gray-200 dark:border-gray-700 dark:bg-gray-700 dark:text-white focus:outline-none">
                            <option value="scheduled" {{ $siteVisit->status === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                            <option value="completed" {{ $siteVisit->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $siteVisit->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="notes" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">📝 Notes</label>
                        <textarea id="notes" name="notes" rows="4" class="form-input w-full px-4 py-3 rounded-lg border-2 border-gray-200 dark:border-gray-700 dark:bg-gray-700 dark:text-white focus:outline-none">{{ $siteVisit->notes }}</textarea>
                        @error('notes') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex gap-4 pt-6 border-t dark:border-gray-700">
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-pink-500 to-pink-600 text-white rounded-lg font-semibold hover:from-pink-600 hover:to-pink-700 transition">
                            Update Visit
                        </button>
                        <a href="{{ route('admin.site-visits.index') }}" class="px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>