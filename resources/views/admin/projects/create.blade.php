<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create New Project
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

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Project Name *</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        <div class="mb-4">
            <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location *</label>
            <input type="text" name="location" id="location" value="{{ old('location') }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea name="description" id="description" rows="4"
                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label for="price_per_sqft" class="block text-gray-700 text-sm font-bold mb-2">Price Per Sqft *</label>
                <input type="number" name="price_per_sqft" id="price_per_sqft" step="0.01" value="{{ old('price_per_sqft') }}" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
            </div>

            <div>
                <label for="total_plots" class="block text-gray-700 text-sm font-bold mb-2">Total Plots *</label>
                <input type="number" name="total_plots" id="total_plots" value="{{ old('total_plots') }}" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
            </div>
        </div>

        <!-- Media Upload Section -->
        <div class="mb-4 border-t pt-4">
            <h3 class="text-lg font-bold text-gray-700 mb-4">📸 Media Files (Images & Videos)</h3>
            
            <div class="mb-4">
                <label for="featured_image" class="block text-gray-700 text-sm font-bold mb-2">Featured Image</label>
                <input type="file" name="featured_image" id="featured_image" accept="image/*"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-sm text-gray-500 mt-1">Main project image (JPEG, PNG, WebP | Max: 5MB)</p>
            </div>

            <div class="mb-4">
                <label for="gallery_images" class="block text-gray-700 text-sm font-bold mb-2">Gallery Images</label>
                <input type="file" name="gallery_images[]" id="gallery_images" accept="image/*" multiple
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-sm text-gray-500 mt-1">Multiple images for gallery (JPEG, PNG, WebP | Max: 5MB each)</p>
            </div>

            <div class="mb-4">
                <label for="video_file" class="block text-gray-700 text-sm font-bold mb-2">Project Video</label>
                <input type="file" name="video_file" id="video_file" accept="video/*"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-sm text-gray-500 mt-1">Project tour video (MP4, WebM | Max: 50MB)</p>
            </div>

            <div class="mb-4">
                <label for="video_url" class="block text-gray-700 text-sm font-bold mb-2">Or Video URL</label>
                <input type="text" name="video_url" id="video_url" value="{{ old('video_url') }}" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="https://youtube.com/watch?v=...">
                <p class="text-sm text-gray-500 mt-1">YouTube or direct video link (optional)</p>
            </div>

            <div class="mb-4">
                <label for="brochure_pdf" class="block text-gray-700 text-sm font-bold mb-2">Project Brochure (PDF)</label>
                <input type="file" name="brochure_pdf" id="brochure_pdf" accept=".pdf"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-sm text-gray-500 mt-1">Downloadable brochure (PDF | Max: 10MB)</p>
            </div>
        </div>

        <div class="mb-6">
            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status *</label>
            <select name="status" id="status" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                Create Project
            </button>
            <a href="{{ route('admin.projects.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-6 rounded">
                Cancel
            </a>
        </div>
    </div>
</x-app-layout>
