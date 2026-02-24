@extends('layouts.public')

@section('title', 'Our Projects - NavyaHomes')

@section('content')
    <!-- Page Header -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl md:text-5xl font-bold mb-3 md:mb-4">Our Premium Projects</h1>
            <p class="text-base md:text-lg text-blue-100">Explore our premium developments across prime locations</p>
        </div>
    </section>

    <!-- Projects Grid -->
    <section class="py-12 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if ($projects->count() > 0)
                <div class="mb-8 text-center">
                    <p class="text-gray-600 text-base md:text-lg">Showing <span class="font-bold text-blue-600">{{ $projects->count() }}</span> premium projects</p>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @forelse ($projects as $index => $project)
                    <div class="group bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                        <!-- Project Image Section with Animation -->
                        <div class="relative bg-gradient-to-br from-blue-400 to-blue-600 h-56 md:h-64 flex items-center justify-center overflow-hidden group-hover:from-blue-500 group-hover:to-blue-700 transition image-zoom">
                            @if($project->featured_image)
                                <img src="{{ asset($project->featured_image) }}" 
                                     alt="{{ $project->name }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="relative w-full h-full flex items-center justify-center">
                                    <svg class="w-32 h-32 text-white transform group-hover:scale-110 transition plot-icon" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                                    </svg>
                                    <!-- Floating particles -->
                                    <div class="absolute top-8 left-6 w-2 h-2 bg-white rounded-full opacity-70 animate-float"></div>
                                    <div class="absolute bottom-10 right-4 w-2.5 h-2.5 bg-white rounded-full opacity-50 animate-float" style="animation-delay: 0.5s;"></div>
                                </div>
                            @endif
                            
                            <!-- Badge -->
                            <div class="absolute top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg animate-float" style="animation-delay: 0.2s;">
                                {{ $project->total_plots }} Plots
                            </div>
                            
                            <!-- Video badge if available -->
                            @if($project->video_url)
                                <div class="absolute bottom-4 left-4 bg-red-500 text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-lg flex items-center gap-1">
                                    <span>🎥</span> Video Tour
                                </div>
                            @endif
                        </div>

                        <!-- Project Details -->
                        <div class="p-6 md:p-7">
                            <h3 class="text-lg md:text-xl font-bold mb-2 group-hover:text-blue-600 transition">{{ $project->name }}</h3>
                            <p class="text-gray-600 mb-4 flex items-center text-sm">
                                <span class="text-lg mr-2">📍</span>
                                {{ $project->location }}
                            </p>

                            <!-- Stats Box -->
                            <div class="bg-blue-50 p-4 rounded-lg mb-4 border-l-4 border-blue-600">
                                <div class="grid grid-cols-3 gap-3 text-center">
                                    <div>
                                        <p class="text-2xl font-bold text-blue-600">Rs. {{ number_format($project->price_per_sqft, 0) }}</p>
                                        <p class="text-xs text-gray-600 mt-1">Per Sqft</p>
                                    </div>
                                    <div>
                                        <p class="text-2xl font-bold text-green-600">{{ $project->total_plots }}</p>
                                        <p class="text-xs text-gray-600 mt-1">Total</p>
                                    </div>
                                    <div>
                                        <p class="text-2xl font-bold text-yellow-600">{{ $project->plots()->where('status', 'available')->count() }}</p>
                                        <p class="text-xs text-gray-600 mt-1">Available</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Description -->
                            <p class="text-gray-700 mb-6 text-sm line-clamp-3">{{ $project->description }}</p>

                            <!-- Action Button -->
                            <a href="{{ route('projects.show', $project) }}" class="block w-full bg-blue-600 text-white py-3 px-4 rounded-lg text-center font-bold hover:bg-blue-700 transition">
                                View Details →
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16 md:py-20">
                        <div class="text-5xl mb-4">🏗️</div>
                        <p class="text-xl md:text-2xl text-gray-500 font-semibold">No projects available at the moment</p>
                        <p class="text-gray-600 mt-2">Check back soon for exciting new developments!</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($projects->hasPages())
                <div class="mt-12 md:mt-16 flex justify-center">
                    <div class="bg-white rounded-lg shadow-md p-4 md:p-6">
                        {{ $projects->links() }}
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12 md:py-16">
        <!-- Animated Background -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse-slow"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse-slow" style="animation-delay: 1s;"></div>
        
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
            <h2 class="text-2xl md:text-4xl font-bold mb-4 animate-slide-down">Interested in Any Project?</h2>
            <p class="text-lg md:text-xl mb-8 text-blue-100 animate-slide-up" style="animation-delay: 0.2s;">Book a site visit or get detailed information about our premium developments</p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-3 md:gap-4 flex-wrap">
                <a href="{{ route('contact.show') }}" class="group inline-flex items-center justify-center gap-2 bg-white text-blue-600 px-6 md:px-8 py-3 md:py-4 rounded-lg font-bold hover:bg-blue-50 active:scale-95 transform hover:shadow-2xl transition-all duration-200 animate-fade-in" style="animation-delay: 0.3s;">
                    <svg class="w-5 h-5 transform group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Contact Us
                </a>
                
                <a href="{{ route('plots.index') }}" class="group inline-flex items-center justify-center gap-2 bg-blue-400 hover:bg-blue-300 text-white px-6 md:px-8 py-3 md:py-4 rounded-lg font-bold active:scale-95 transform hover:shadow-2xl transition-all duration-200 animate-fade-in" style="animation-delay: 0.4s;">
                    <svg class="w-5 h-5 transform group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Browse Plots
                </a>
            </div>
        </div>
    </section>

    <!-- Inline Animations -->
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
        
        .animate-fade-in {
            animation: fadeIn 0.6s ease-in-out forwards;
            opacity: 0;
        }
        
        .animate-slide-down {
            animation: slideDown 0.6s ease-in-out forwards;
        }
        
        .animate-slide-up {
            animation: slideUp 0.6s ease-in-out forwards;
        }
        
        .animate-pulse-slow {
            animation: pulseSlow 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        @keyframes zoomIn {
            from { transform: scale(0.9); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        /* Image animations */
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .image-zoom {
            transition: transform 0.4s ease-out;
            overflow: hidden;
            border-radius: 0.5rem;
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
    </style>
@endsection
