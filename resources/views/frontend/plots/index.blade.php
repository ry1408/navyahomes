@extends('layouts.public')

@section('title', 'Available Plots - NavyaHomes')

@section('content')
    <!-- Page Header with Animation -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12 animate-fade-in">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold mb-4 animate-slide-down">Available Plots</h1>
            <p class="text-xl text-blue-100 animate-slide-down" style="animation-delay: 0.1s;">Find the perfect plot matching your budget and requirements</p>
        </div>
    </section>

    <!-- Filters and Listings -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Mobile Filter Toggle Button -->
                <div class="lg:hidden mb-4">
                    <button id="filterToggle" class="w-full bg-blue-600 text-white py-3 rounded-lg font-bold hover:bg-blue-700 transition flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1H3z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M3 8a1 1 0 011-1h6a1 1 0 011 1H3zm0 4a1 1 0 011-1h6a1 1 0 011 1H3z" clip-rule="evenodd"></path>
                        </svg>
                        Filters
                    </button>
                </div>

                <!-- Filters Sidebar -->
                <div id="filterPanel" class="hidden lg:block lg:col-span-1">
                    <div class="bg-white p-6 rounded-lg shadow-lg sticky top-20 transform transition-all duration-300 ease-in-out">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-2xl font-bold">Filters</h3>
                            <button id="closeFilter" class="lg:hidden text-gray-500 hover:text-gray-700">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>

                        <form action="{{ route('plots.index') }}" method="GET" class="space-y-6">
                            <!-- Price Range -->
                            <div class="animate-fade-in" style="animation-delay: 0.1s;">
                                <label class="block text-sm font-bold text-gray-700 mb-3">💰 Price Range</label>
                                <input type="number" name="min_price" placeholder="Min Price" value="{{ request('min_price') }}" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition mb-2 hover:border-blue-400">
                                <input type="number" name="max_price" placeholder="Max Price" value="{{ request('max_price') }}" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition hover:border-blue-400">
                            </div>

                            <!-- Area Range -->
                            <div class="animate-fade-in" style="animation-delay: 0.2s;">
                                <label class="block text-sm font-bold text-gray-700 mb-3">📐 Area (Sqft)</label>
                                <input type="number" name="min_area" placeholder="Min Area" value="{{ request('min_area') }}" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition mb-2 hover:border-blue-400">
                                <input type="number" name="max_area" placeholder="Max Area" value="{{ request('max_area') }}" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition hover:border-blue-400">
                            </div>

                            <!-- Project Selection -->
                            <div class="animate-fade-in" style="animation-delay: 0.3s;">
                                <label class="block text-sm font-bold text-gray-700 mb-3">🏢 Project</label>
                                <select name="project_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition hover:border-blue-400 cursor-pointer">
                                    <option value="">All Projects</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}" {{ request('project_id') == $project->id ? 'selected' : '' }}>
                                            {{ $project->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Status -->
                            <div class="animate-fade-in" style="animation-delay: 0.4s;">
                                <label class="block text-sm font-bold text-gray-700 mb-3">✅ Status</label>
                                <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition hover:border-blue-400 cursor-pointer">
                                    <option value="">All Status</option>
                                    <option value="available" {{ request('status') === 'available' ? 'selected' : '' }}>Available</option>
                                    <option value="booked" {{ request('status') === 'booked' ? 'selected' : '' }}>Booked</option>
                                    <option value="sold" {{ request('status') === 'sold' ? 'selected' : '' }}>Sold</option>
                                </select>
                            </div>

                            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-bold hover:bg-blue-700 active:scale-95 transition transform duration-200">
                                Apply Filters
                            </button>

                            @if (request()->anyFilled(['min_price', 'max_price', 'min_area', 'max_area', 'project_id', 'status']))
                                <a href="{{ route('plots.index') }}" class="block w-full bg-gray-300 text-gray-700 py-3 rounded-lg font-bold hover:bg-gray-400 active:scale-95 transition transform duration-200 text-center">
                                    Clear Filters
                                </a>
                            @endif
                        </form>
                    </div>
                </div>

                <!-- Plots Grid -->
                <div class="lg:col-span-3">
                    <!-- Results Info -->
                    <div class="mb-6 flex justify-between items-center">
                        <p class="text-gray-600 text-lg"><span class="font-bold text-blue-600">{{ $plots->count() }}</span> plots found</p>
                        <div class="hidden md:flex gap-2">
                            <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition" title="List view">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"></path><path d="M3 10a1 1 0 011-1h12a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6z"></path></svg>
                            </button>
                        </div>
                    </div>

                    <!-- Plots Grid with Animation -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        @forelse ($plots as $plot)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 animate-fade-in group">
                                <!-- Plot Image with Animation -->
                                <div class="bg-gradient-to-br from-blue-300 to-blue-500 h-48 flex items-center justify-center relative overflow-hidden image-zoom">
                                    @if ($plot->image)
                                        <img src="{{ asset($plot->image) }}" alt="Plot {{ $plot->plot_number }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @elseif ($plot->project->featured_image)
                                        <img src="{{ asset($plot->project->featured_image) }}" alt="{{ $plot->project->name }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <div class="relative w-full h-full flex items-center justify-center">
                                            <svg class="w-16 h-16 text-white group-hover:scale-110 transition-transform duration-300 plot-icon" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-5.04-6.71l-2.75 3.54-2.16-2.66c-.23-.29-.62-.29-.85 0l-2.96 3.83c-.3.38-.09.88.39.88h11.96c.48 0 .68-.5.39-.88L13.04 12.29c-.23-.29-.62-.29-.85 0z"/>
                                            </svg>
                                            <!-- Animated background elements -->
                                            <div class="absolute top-5 right-5 w-2 h-2 bg-white rounded-full opacity-70 animate-float"></div>
                                            <div class="absolute bottom-8 left-8 w-3 h-3 bg-white rounded-full opacity-50 animate-float" style="animation-delay: 0.5s;"></div>
                                        </div>
                                    @endif
                                    <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity animate-glow">
                                        <span class="text-xs font-bold text-white bg-black bg-opacity-50 px-2 py-1 rounded">View</span>
                                    </div>
                                    @if ($plot->is_corner && $plot->isAvailable())
                                        <div class="absolute bottom-3 left-3 bg-yellow-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                            Corner Plot
                                        </div>
                                    @endif
                                </div>

                                <!-- Plot Details -->
                                <div class="p-6">
                                    <div class="flex justify-between items-start mb-3 gap-2">
                                        <div>
                                            <h3 class="text-xl font-bold text-gray-800 group-hover:text-blue-600 transition">Plot {{ $plot->plot_number }}</h3>
                                            <p class="text-gray-500 text-sm mt-1">📍 {{ $plot->project->name }}</p>
                                        </div>
                                        @if ($plot->isAvailable())
                                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-bold animate-pulse-slow">✓ Available</span>
                                        @elseif ($plot->isBooked())
                                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-bold">⏳ Booked</span>
                                        @else
                                            <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-xs font-bold">✕ Sold @ Rs. 1500/sqft</span>
                                        @endif
                                    </div>

                                    <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-4 rounded-lg mb-5 space-y-2 hover:from-blue-100 hover:to-blue-50 transition">
                                        <div class="flex justify-between items-center group/item">
                                            <span class="text-gray-700 text-sm font-medium">Area:</span>
                                            <span class="font-bold text-gray-800 group-hover/item:text-blue-600 transition">{{ number_format($plot->area_sqft, 0) }} Sqft</span>
                                        </div>
                                        <div class="flex justify-between items-center group/item border-t border-blue-200 pt-2">
                                            <span class="text-gray-700 text-sm font-medium">Price:</span>
                                            <span class="font-bold text-lg text-blue-600 group-hover/item:text-blue-800 transition">Rs. {{ number_format($plot->total_price, 0) }}</span>
                                        </div>
                                        <div class="flex justify-between items-center group/item">
                                            <span class="text-gray-700 text-sm font-medium">Rate/Sqft:</span>
                                            <span class="font-semibold text-gray-700">Rs. {{ number_format($plot->rate_per_sqft, 0) }}</span>
                                        </div>
                                    </div>

                                    <div class="space-y-2 flex flex-col gap-3">
                                        <a href="{{ route('plots.show', [$plot->project, $plot]) }}" class="block w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-3 rounded-lg text-center font-bold hover:from-blue-700 hover:to-blue-800 active:scale-95 transition-all duration-200 transform shadow-md hover:shadow-lg">
                                            View Details →
                                        </a>
                                        <a href="https://wa.me/92333XXXXXXX?text=I%20am%20interested%20in%20Plot%20{{ urlencode($plot->plot_number) }}" target="_blank" class="block w-full bg-gradient-to-r from-green-500 to-green-600 text-white py-3 rounded-lg text-center font-bold hover:from-green-600 hover:to-green-700 active:scale-95 transition-all duration-200 transform shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-5.031 1.378c-3.055 2.116-4.687 5.744-3.653 8.997 1.034 3.252 4.032 5.575 7.46 5.575h.005c2.305 0 4.543-.541 6.58-1.55l.996-.658 3.862 1.013-.983-3.264.657-.994c1.074-2.093 1.637-4.383 1.637-6.794 0-5.745-4.684-10.417-10.441-10.417"/></svg>
                                            WhatsApp Inquiry
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full bg-white p-16 rounded-lg text-center shadow-md">
                                <svg class="w-20 h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"></path>
                                </svg>
                                <p class="text-2xl font-bold text-gray-600 mb-2">No plots found</p>
                                <p class="text-gray-500 mb-6">Try adjusting your filters to find available properties</p>
                                <a href="{{ route('plots.index') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-blue-700 transition">
                                    Reset Filters
                                </a>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12 flex justify-center animate-fade-in" style="animation-delay: 0.3s;">
                        {{ $plots->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section with Interactive Elements -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16 relative overflow-hidden">
        <!-- Background Animation Elements -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-white opacity-5 rounded-full -translate-x-1/2 -translate-y-1/2 animate-pulse"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-white opacity-5 rounded-full translate-x-1/2 translate-y-1/2 animate-pulse" style="animation-delay: 1s;"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 animate-slide-down">Didn't find what you're looking for?</h2>
            <p class="text-lg text-blue-100 mb-8 animate-slide-down" style="animation-delay: 0.1s;">Our expert team can help you find the perfect plot tailored to your needs</p>
            <a href="{{ route('contact.show') }}" class="inline-block bg-white text-blue-600 px-8 py-4 rounded-lg font-bold hover:bg-blue-50 active:scale-95 transition-all duration-200 transform shadow-lg hover:shadow-xl animate-slide-up">
                📞 Get Personalized Assistance
            </a>
        </div>
    </section>

    <!-- Interactive Styles -->
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes pulseSlow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        @keyframes glow {
            0%, 100% { box-shadow: 0 0 5px rgba(59, 130, 246, 0.5); }
            50% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.8); }
        }
        @keyframes zoomIn {
            from { transform: scale(0.9); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        .animate-fade-in {
            animation: fadeIn 0.6s ease-in-out forwards;
            opacity: 0;
        }
        .animate-slide-down {
            animation: slideDown 0.8s ease-out forwards;
            opacity: 0;
        }
        .animate-slide-up {
            animation: slideUp 0.8s ease-out forwards;
            opacity: 0;
        }
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        .animate-glow {
            animation: glow 2s ease-in-out infinite;
        }
        .image-zoom {
            transition: transform 0.4s ease-out;
            overflow: hidden;
            border-radius: 0.25rem;
        }
        .image-zoom:hover {
            transform: scale(1.05);
        }
        .image-zoom img {
            transition: transform 0.4s ease-out;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .image-zoom:hover img {
            transform: scale(1.1);
        }
        .plot-icon {
            animation: float 3s ease-in-out infinite;
        }
        .plot-icon:hover {
            animation: zoomIn 0.4s ease-out forwards;
        }
        .animate-pulse-slow {
            animation: pulseSlow 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        input, select {
            transition: all 0.3s ease;
        }
        input:focus, select:focus {
            transform: translateY(-2px);
        }
        @media (max-width: 1024px) {
            #filterPanel {
                position: fixed;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100vh;
                z-index: 50;
                transition: left 0.3s ease-in-out;
                overflow-y: auto;
            }
            #filterPanel.active {
                left: 0;
            }
            #filterPanel .bg-white {
                border-radius: 0;
                position: relative;
                top: auto;
            }
        }
        .pagination {
            animation: fadeIn 0.6s ease-in-out;
        }
        .group:hover {
            animation: none;
        }
        button:active {
            animation: none;
        }
    </style>

    <!-- Interactive Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterToggle = document.getElementById('filterToggle');
            const filterPanel = document.getElementById('filterPanel');
            const closeFilter = document.getElementById('closeFilter');

            if (filterToggle) {
                filterToggle.addEventListener('click', function() {
                    filterPanel.classList.toggle('hidden');
                    filterPanel.classList.toggle('active');
                });
            }

            if (closeFilter) {
                closeFilter.addEventListener('click', function() {
                    filterPanel.classList.add('hidden');
                    filterPanel.classList.remove('active');
                });
            }

            if (window.innerWidth < 1024) {
                document.addEventListener('click', function(event) {
                    if (!event.target.closest('#filterPanel') && !event.target.closest('#filterToggle')) {
                        filterPanel.classList.add('hidden');
                        filterPanel.classList.remove('active');
                    }
                });
            }
        });
    </script>
@endsection
