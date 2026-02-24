<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create New Plot
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.plots.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6">
        @csrf

        <div class="mb-4">
            <label for="project_id" class="block text-gray-700 text-sm font-bold mb-2">Project *</label>
            <select name="project_id" id="project_id" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                <option value="">-- Select Project --</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                        {{ $project->name }} (Rs. {{ number_format($project->price_per_sqft, 2) }}/sqft)
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="plot_number" class="block text-gray-700 text-sm font-bold mb-2">Plot Number *</label>
            <input type="text" name="plot_number" id="plot_number" value="{{ old('plot_number') }}" placeholder="e.g., A-101"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        <div class="mb-4">
            <label for="area_sqft" class="block text-gray-700 text-sm font-bold mb-2">Area (Sqft) *</label>
            <input type="number" name="area_sqft" id="area_sqft" step="0.01" value="{{ old('area_sqft') }}" placeholder="e.g., 500"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
            <p class="text-gray-500 text-xs mt-1">Total price will be calculated automatically</p>
        </div>

        <div class="mb-6">
            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status *</label>
            <select name="status" id="status" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                <option value="available" {{ old('status') === 'available' ? 'selected' : '' }}>Available</option>
                <option value="booked" {{ old('status') === 'booked' ? 'selected' : '' }}>Booked</option>
                <option value="sold" {{ old('status') === 'sold' ? 'selected' : '' }}>Sold</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Plot Image</label>
            <input type="file" name="image" id="image" accept="image/*"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <p class="text-gray-500 text-xs mt-1">Max file size: 2MB. Supported: JPEG, PNG, GIF</p>
        </div>

        <div class="mb-6">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea name="description" id="description" rows="4" placeholder="Add plot description..."
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                Create Plot
            </button>
            <a href="{{ route('admin.plots.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-6 rounded">
                Cancel
            </a>
        </div>
    </div>
</x-app-layout>
