<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Plot
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

    @if ($plot->isSold())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <strong>Warning:</strong> This plot is marked as sold and cannot be edited.
        </div>
    @endif

    <form action="{{ route('admin.plots.update', $plot) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="project_id" class="block text-gray-700 text-sm font-bold mb-2">Project</label>
            <div class="px-3 py-2 border border-gray-300 rounded-md bg-gray-100">
                {{ $plot->project->name }} (Rs. {{ number_format($plot->project->price_per_sqft, 2) }}/sqft)
            </div>
            <p class="text-gray-500 text-xs mt-1">Project cannot be changed</p>
        </div>

        <div class="mb-4">
            <label for="plot_number" class="block text-gray-700 text-sm font-bold mb-2">Plot Number *</label>
            <input type="text" name="plot_number" id="plot_number" value="{{ old('plot_number', $plot->plot_number) }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        <div class="mb-4">
            <label for="area_sqft" class="block text-gray-700 text-sm font-bold mb-2">Area (Sqft) *</label>
            <input type="number" name="area_sqft" id="area_sqft" step="0.01" value="{{ old('area_sqft', $plot->area_sqft) }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
            <p class="text-gray-500 text-xs mt-1">Changing area will recalculate total price</p>
        </div>

        <div class="mb-4">
            <label for="total_price" class="block text-gray-700 text-sm font-bold mb-2">Total Price (Auto-calculated)</label>
            <div class="px-3 py-2 border border-gray-300 rounded-md bg-gray-100">
                Rs. {{ number_format($plot->total_price, 2) }}
            </div>
        </div>

        <div class="mb-6">
            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status *</label>
            <select name="status" id="status" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                <option value="available" {{ old('status', $plot->status) === 'available' ? 'selected' : '' }}>Available</option>
                <option value="booked" {{ old('status', $plot->status) === 'booked' ? 'selected' : '' }}>Booked</option>
                <option value="sold" {{ old('status', $plot->status) === 'sold' ? 'selected' : '' }}>Sold</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Plot Image</label>
            @if($plot->image)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $plot->image) }}" alt="Plot image" class="h-40 w-auto rounded-lg">
                    <p class="text-gray-500 text-xs mt-2">Current image</p>
                </div>
            @endif
            <input type="file" name="image" id="image" accept="image/*"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <p class="text-gray-500 text-xs mt-1">Max file size: 2MB. Leave empty to keep current image.</p>
        </div>

        <div class="mb-6">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea name="description" id="description" rows="4" placeholder="Add plot description..."
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $plot->description) }}</textarea>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                Update Plot
            </button>
            <a href="{{ route('admin.plots.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-6 rounded">
                Cancel
            </a>
        </div>
    </div>
</x-app-layout>
