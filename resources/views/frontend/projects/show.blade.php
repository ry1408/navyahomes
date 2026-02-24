@extends('layouts.public')

@section('title', $project->name . ' - NavyaHomes')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl md:text-5xl font-bold mb-2 animate-slide-down">{{ $project->name }}</h1>
        <p class="text-lg md:text-xl text-blue-100 flex items-center gap-2 animate-slide-up"
            style="animation-delay: 0.1s;">
            <span class="text-2xl">📍</span> {{ $project->location }}
        </p>
        <div class="mt-4 flex flex-wrap gap-3">
            <span class="inline-block bg-green-500 text-white px-4 py-2 rounded-full text-sm font-bold">💰 Bank Loan
                Available</span>
            <span class="inline-block bg-orange-500 text-white px-4 py-2 rounded-full text-sm font-bold">🏗️ Active
                Project</span>
            <span class="inline-block bg-purple-500 text-white px-4 py-2 rounded-full text-sm font-bold">⭐ Premium
                Location</span>
        </div>
    </div>
</section>

<!-- Project Details -->
<section class="py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 md:gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Project Image Gallery Slider -->
                <div class="mb-10 md:mb-12 animate-fade-in" style="animation-delay: 0.1s;">
                    @if($project->featured_image || $project->gallery_images)
                    <div
                        class="swiper projectGallery rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
                        <div class="swiper-wrapper">
                            @if($project->gallery_images && count($project->gallery_images) > 0)
                                @foreach($project->gallery_images as $index => $image)
                                    <div class="swiper-slide relative h-80 md:h-96 overflow-hidden group bg-gray-200">
                                        <img src="{{ asset($image) }}"
                                            alt="{{ $project->name }} - Image {{ $index + 1 }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    </div>
                                @endforeach
                            @elseif($project->featured_image)
                                <div class="swiper-slide relative h-80 md:h-96 overflow-hidden group bg-gray-200">
                                    <img src="{{ asset($project->featured_image) }}"
                                        alt="{{ $project->name }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                </div>
                            @endif
                        </div>

                        <!-- Navigation buttons -->
                        <div
                            class="swiper-button-prev !text-white !bg-blue-600/80 hover:!bg-blue-700 !w-10 !h-10 rounded-full">
                        </div>
                        <div
                            class="swiper-button-next !text-white !bg-blue-600/80 hover:!bg-blue-700 !w-10 !h-10 rounded-full">
                        </div>

                        <!-- Pagination -->
                        <div class="swiper-pagination !bottom-3"></div>
                    </div>

                    <!-- Image Counter -->
                    <div class="mt-4 flex items-center justify-between bg-blue-50 p-3 rounded-lg">
                        <div class="text-sm text-gray-600">
                            <span class="font-bold text-blue-600">{{ $project->gallery_images ? count($project->gallery_images) : 1 }}</span> high-quality project images
                        </div>
                        <div class="flex gap-2">
                            <button
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-bold hover:bg-blue-700 transition"
                                onclick="document.querySelector('.projectGallery').swiper.slidePrev()">←
                                Previous</button>
                            <button
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-bold hover:bg-blue-700 transition"
                                onclick="document.querySelector('.projectGallery').swiper.slideNext()">Next →</button>
                        </div>
                    </div>
                    @else
                    <!-- Default Image Gallery (from storage) -->
                    <div
                        class="swiper projectGallery rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
                        <div class="swiper-wrapper">
                            <!-- Slide 1 -->
                            <div class="swiper-slide relative h-80 md:h-96 overflow-hidden group bg-gray-200">
                                <img src="/storage/projects/WhatsApp Image 2026-01-27 at 6.38.00 PM.jpeg"
                                    alt="Project View 1"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>

                            <!-- Slide 4 -->
                            <div class="swiper-slide relative h-80 md:h-96 overflow-hidden group bg-gray-200">
                                <img src="/storage/projects/WhatsApp Image 2026-01-27 at 6.38.00 PM (1).jpeg"
                                    alt="Project View 2"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>

                            <!-- Slide 5 -->
                            <div class="swiper-slide relative h-80 md:h-96 overflow-hidden group bg-gray-200">
                                <img src="/storage/projects/WhatsApp Image 2026-01-27 at 6.38.00 PM (2).jpeg"
                                    alt="Project View 3"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>

                            <!-- Slide 6 -->
                            <div class="swiper-slide relative h-80 md:h-96 overflow-hidden group bg-gray-200">
                                <img src="/storage/projects/WhatsApp Image 2026-01-27 at 6.40.14 PM.jpeg"
                                    alt="Project View 4"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>

                            <!-- Slide 7 -->
                            <div class="swiper-slide relative h-80 md:h-96 overflow-hidden group bg-gray-200">
                                <img src="/storage/projects/WhatsApp Image 2026-01-27 at 6.40.14 PM (1).jpeg"
                                    alt="Project View 5"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>

                            <!-- Slide 8 -->
                            <div class="swiper-slide relative h-80 md:h-96 overflow-hidden group bg-gray-200">
                                <img src="/storage/projects/WhatsApp Image 2026-01-27 at 6.40.15 PM.jpeg"
                                    alt="Project View 6"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>

                            <!-- Slide 9 -->
                            <div class="swiper-slide relative h-80 md:h-96 overflow-hidden group bg-gray-200">
                                <img src="/storage/projects/WhatsApp Image 2026-01-27 at 6.40.15 PM (1).jpeg"
                                    alt="Project View 7"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>

                            <!-- Slide 10 -->
                            <div class="swiper-slide relative h-80 md:h-96 overflow-hidden group bg-gray-200">
                                <img src="/storage/projects/WhatsApp Image 2026-01-27 at 6.40.15 PM (2).jpeg"
                                    alt="Project View 8"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>

                            <!-- Slide 11 -->
                            <div class="swiper-slide relative h-80 md:h-96 overflow-hidden group bg-gray-200">
                                <img src="/storage/projects/WhatsApp Image 2026-01-27 at 6.40.15 PM (3).jpeg"
                                    alt="Project View 9"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>

                            <!-- Slide 12 -->
                            <div class="swiper-slide relative h-80 md:h-96 overflow-hidden group bg-gray-200">
                                <img src="/storage/projects/WhatsApp Image 2026-01-27 at 6.42.16 PM.jpeg"
                                    alt="Project View 10"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>

                            <!-- Slide 13 -->
                            <div class="swiper-slide relative h-80 md:h-96 overflow-hidden group bg-gray-200">
                                <img src="/storage/projects/WhatsApp Image 2026-01-28 at 2.41.57 PM.jpeg"
                                    alt="Project View 11"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>

                            <!-- Slide 14 -->
                            <div class="swiper-slide relative h-80 md:h-96 overflow-hidden group bg-gray-200">
                                <img src="/storage/projects/WhatsApp Image 2026-01-28 at 2.41.58 PM.jpeg"
                                    alt="Project View 12"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>

                            <!-- Slide 15 -->
                            <div class="swiper-slide relative h-80 md:h-96 overflow-hidden group bg-gray-200">
                                <img src="/storage/projects/WhatsApp Image 2026-01-28 at 2.41.59 PM.jpeg"
                                    alt="Project View 13"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>

                            <!-- Slide 16 -->
                            <div class="swiper-slide relative h-80 md:h-96 overflow-hidden group bg-gray-200">
                                <img src="/storage/projects/WhatsApp Image 2026-01-28 at 2.42.03 PM.jpeg"
                                    alt="Project View 14"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>

                            <!-- Slide 17 -->
                            <div class="swiper-slide relative h-80 md:h-96 overflow-hidden group bg-gray-200">
                                <img src="/storage/projects/WhatsApp Image 2026-01-28 at 2.42.04 PM.jpeg"
                                    alt="Project View 15"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>

                            <!-- Slide 18 -->
                            <div class="swiper-slide relative h-80 md:h-96 overflow-hidden group bg-gray-200">
                                <img src="/storage/projects/WhatsApp Image 2026-01-28 at 2.42.08 PM.jpeg"
                                    alt="Project View 16"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                        </div>

                        <!-- Navigation buttons -->
                        <div
                            class="swiper-button-prev !text-white !bg-blue-600/80 hover:!bg-blue-700 !w-10 !h-10 rounded-full">
                        </div>
                        <div
                            class="swiper-button-next !text-white !bg-blue-600/80 hover:!bg-blue-700 !w-10 !h-10 rounded-full">
                        </div>

                        <!-- Pagination -->
                        <div class="swiper-pagination !bottom-3"></div>
                    </div>

                    <!-- Image Counter -->
                    <div class="mt-4 flex items-center justify-between bg-blue-50 p-3 rounded-lg">
                        <div class="text-sm text-gray-600">
                            <span class="font-bold text-blue-600">18</span> high-quality project images
                        </div>
                        <div class="flex gap-2">
                            <button
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-bold hover:bg-blue-700 transition"
                                onclick="document.querySelector('.projectGallery').swiper.slidePrev()">←
                                Previous</button>
                            <button
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-bold hover:bg-blue-700 transition"
                                onclick="document.querySelector('.projectGallery').swiper.slideNext()">Next →</button>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Video Tour Section -->
                @if($project->video_url)
                <div class="mb-10 md:mb-12 animate-fade-in" style="animation-delay: 0.15s;">
                    <h2 class="text-2xl md:text-4xl font-bold mb-6 text-blue-900 flex items-center gap-3">
                        <span class="text-3xl">🎥</span> Virtual Project Tour
                    </h2>
                    <div class="relative rounded-xl overflow-hidden shadow-2xl bg-black group">
                        <video 
                            controls 
                            class="w-full h-auto max-h-[500px] object-contain"
                            poster="{{ $project->featured_image ? asset($project->featured_image) : '' }}"
                        >
                            <source src="{{ asset($project->video_url) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                    </div>
                    <div class="mt-4 bg-gradient-to-r from-blue-50 to-indigo-50 p-4 rounded-lg border border-blue-200">
                        <p class="text-sm text-gray-700 flex items-center gap-2">
                            <span class="text-xl">ℹ️</span>
                            <span class="font-semibold">Watch our comprehensive video tour to explore the project in detail</span>
                        </p>
                    </div>
                </div>
                @endif

                <!-- Description -->
                <div class="mb-12 md:mb-16 animate-fade-in" style="animation-delay: 0.1s;">
                    <h2 class="text-2xl md:text-4xl font-bold mb-6 text-blue-900">About This Project</h2>
                    <p class="text-lg md:text-xl text-gray-700 leading-relaxed mb-6">{{ $project->description }}</p>
                    <div class="bg-blue-50 border-l-4 border-blue-600 p-6 md:p-7 rounded-lg">
                        <p class="text-gray-800 font-semibold flex items-start gap-3">
                            <span class="text-2xl mt-1">💡</span>
                            This is a premium development project offering excellent investment opportunities in a prime
                            location.
                        </p>
                    </div>
                </div>

                <!-- Key Features -->
                <div class="mb-12 md:mb-16 animate-fade-in" style="animation-delay: 0.2s;">
                    <h2 class="text-2xl md:text-4xl font-bold mb-8 text-blue-900">Key Features</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-6">
                        <div
                            class="group flex items-start gap-4 p-5 md:p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg hover:shadow-lg transform hover:-translate-y-1 transition-all duration-200 border-l-4 border-blue-500">
                            <span
                                class="text-3xl md:text-4xl mt-1 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">✅</span>
                            <div>
                                <h3 class="font-bold text-lg text-blue-900 group-hover:text-blue-700 transition-colors">
                                    Registered Plots</h3>
                                <p class="text-gray-700 text-sm mt-2">All plots are legally registered with authorities
                                </p>
                            </div>
                        </div>
                        <div
                            class="group flex items-start gap-4 p-5 md:p-6 bg-gradient-to-br from-green-50 to-green-100 rounded-lg hover:shadow-lg transform hover:-translate-y-1 transition-all duration-200 border-l-4 border-green-500">
                            <span
                                class="text-3xl md:text-4xl mt-1 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">🏦</span>
                            <div>
                                <h3
                                    class="font-bold text-lg text-green-900 group-hover:text-green-700 transition-colors">
                                    Bank Loans Available</h3>
                                <p class="text-gray-700 text-sm mt-2">Easy financing with major banks and flexible terms
                                </p>
                            </div>
                        </div>
                        <div
                            class="group flex items-start gap-4 p-5 md:p-6 bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-lg hover:shadow-lg transform hover:-translate-y-1 transition-all duration-200 border-l-4 border-yellow-500">
                            <span
                                class="text-3xl md:text-4xl mt-1 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">🛣️</span>
                            <div>
                                <h3
                                    class="font-bold text-lg text-yellow-900 group-hover:text-yellow-700 transition-colors">
                                    Road Access</h3>
                                <p class="text-gray-700 text-sm mt-2">Well-connected with main roads and highways</p>
                            </div>
                        </div>
                        <div
                            class="group flex items-start gap-4 p-5 md:p-6 bg-gradient-to-br from-red-50 to-red-100 rounded-lg hover:shadow-lg transform hover:-translate-y-1 transition-all duration-200 border-l-4 border-red-500">
                            <span
                                class="text-3xl md:text-4xl mt-1 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">🔒</span>
                            <div>
                                <h3 class="font-bold text-lg text-red-900 group-hover:text-red-700 transition-colors">
                                    24/7 Security</h3>
                                <p class="text-gray-700 text-sm mt-2">Professional security with CCTV surveillance</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Plots in this Project -->
                <div class="animate-fade-in" style="animation-delay: 0.3s;">
                    <h2 class="text-2xl md:text-4xl font-bold mb-8 text-blue-900">Plots in {{ $project->name }}</h2>

                    @if ($project->plots()->count() > 0)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                        <!-- Table for larger screens -->
                        <div class="hidden md:block overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gradient-to-r from-blue-600 to-blue-800 text-white">
                                    <tr>
                                        <th class="px-6 py-4 text-left font-bold">Preview</th>
                                        <th class="px-6 py-4 text-left font-bold">Plot #</th>
                                        <th class="px-6 py-4 text-left font-bold">Area (Sqft)</th>
                                        <th class="px-6 py-4 text-left font-bold">Price</th>
                                        <th class="px-6 py-4 text-left font-bold">Status</th>
                                        <th class="px-6 py-4 text-center font-bold">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    @forelse ($project->plots()->orderByRaw("CAST(plot_number as UNSIGNED)")->get() as $idx => $plot)
                                    <tr class="hover:bg-blue-50 transition-colors group"
                                        style="animation-delay: {{ ($idx * 0.05) }}s;">
                                        <td class="px-6 py-4">
                                            <div class="w-16 h-12 rounded-md overflow-hidden shadow-sm ring-1 ring-blue-100 bg-gradient-to-br from-blue-200 to-blue-500 image-zoom">
                                                @if ($plot->image)
                                                    <img src="{{ asset($plot->image) }}" alt="Plot {{ $plot->plot_number }}"
                                                        class="w-full h-full object-cover">
                                                @elseif ($project->featured_image)
                                                    <img src="{{ asset($project->featured_image) }}" alt="{{ $project->name }}"
                                                        class="w-full h-full object-cover">
                                                @else
                                                    <div class="w-full h-full flex items-center justify-center">
                                                        <span class="text-xs text-white font-bold">Plot</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 font-bold text-blue-600 group-hover:text-blue-700">{{
                                            $plot->plot_number }}</td>
                                        <td class="px-6 py-4 text-gray-800">{{ number_format($plot->area_sqft, 0) }}
                                            Sqft</td>
                                        <td class="px-6 py-4 font-bold text-blue-600">Rs. {{
                                            number_format($plot->total_price / 100000, 1) }}L</td>
                                        <td class="px-6 py-4">
                                            @if ($plot->isAvailable())
                                            <span
                                                class="inline-flex items-center gap-1 px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-bold">
                                                <span>✅</span> Available
                                            </span>
                                            @elseif ($plot->isBooked())
                                            <span
                                                class="inline-flex items-center gap-1 px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-bold">
                                                <span>⏳</span> Booked
                                            </span>
                                            @else
                                            <span
                                                class="inline-flex items-center gap-1 px-3 py-1 bg-gray-200 text-gray-900 rounded-full text-sm font-bold">
                                                <span>✕</span> Sold @ Rs. 1500/sqft
                                            </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="{{ route('plots.show', [$project, $plot]) }}"
                                                class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 font-bold group-hover:translate-x-1 transition-all">
                                                View Details
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-8 text-center text-gray-600">No available plots
                                            in this project</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Card view for mobile -->
                        <div class="md:hidden divide-y">
                            @forelse ($project->plots()->orderByRaw("CAST(plot_number as UNSIGNED)")->get() as $idx => $plot)
                            <div class="p-5 hover:bg-blue-50 transition-colors">
                                <div class="mb-3 w-full h-36 rounded-lg overflow-hidden shadow-sm bg-gradient-to-br from-blue-200 to-blue-500 image-zoom">
                                    @if ($plot->image)
                                        <img src="{{ asset($plot->image) }}" alt="Plot {{ $plot->plot_number }}"
                                            class="w-full h-full object-cover">
                                    @elseif ($project->featured_image)
                                        <img src="{{ asset($project->featured_image) }}" alt="{{ $project->name }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <span class="text-white font-bold">Plot {{ $plot->plot_number }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex justify-between items-start mb-3">
                                    <h3 class="text-lg font-bold text-blue-600">Plot {{ $plot->plot_number }}</h3>
                                    @if ($plot->isAvailable())
                                    <span
                                        class="inline-flex items-center gap-1 px-2 py-1 bg-green-100 text-green-800 rounded text-xs font-bold">
                                        <span>✅</span> Available
                                    </span>
                                    @elseif ($plot->isBooked())
                                    <span
                                        class="inline-flex items-center gap-1 px-2 py-1 bg-yellow-100 text-yellow-800 rounded text-xs font-bold">
                                        <span>⏳</span> Booked
                                    </span>
                                    @else
                                    <span
                                        class="inline-flex items-center gap-1 px-2 py-1 bg-gray-200 text-gray-900 rounded text-xs font-bold">
                                        <span>✕</span> Sold @ Rs. 1500/sqft
                                    </span>
                                    @endif
                                </div>
                                <div class="space-y-2 mb-4">
                                    <p class="text-gray-700 flex justify-between">
                                        <span class="text-gray-600">Area:</span>
                                        <span class="font-bold">{{ number_format($plot->area_sqft, 0) }} Sqft</span>
                                    <tr>
                                        <td colspan="6" class="px-6 py-8 text-center text-gray-600">No plots in this project</td>
                                        <span class="font-bold text-blue-600">Rs. {{ number_format($plot->total_price /
                                            100000, 1) }}L</span>
                                    </p>
                                </div>
                                <a href="{{ route('plots.show', [$project, $plot]) }}"
                                    class="inline-flex items-center gap-2 text-blue-600 font-bold hover:text-blue-700">
                                    View Details
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </a>
                            </div>
                            @empty
                            <div class="p-8 text-center text-gray-600">
                                No available plots in this project
                            </div>
                            @endforelse
                        </div>
                    </div>
                    @else
                    <div class="bg-blue-50 border-2 border-blue-200 rounded-lg p-8 text-center">
                        <p class="text-lg text-gray-700 font-semibold mb-2">Currently all plots are sold out</p>
                        <p class="text-gray-600">Check back soon for new developments</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div>
                <!-- Key Stats -->
                <div
                    class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 md:p-8 rounded-xl mb-6 md:mb-8 sticky top-20 shadow-lg hover:shadow-xl transition-shadow duration-300 border border-blue-200">
                    <h3 class="text-2xl md:text-3xl font-bold mb-6 text-blue-900">Project Stats</h3>
                    <div class="space-y-4">
                        <div
                            class="group bg-white p-4 rounded-lg hover:shadow-md transform hover:-translate-y-1 transition-all duration-200 border-l-4 border-blue-600">
                            <p class="text-gray-600 text-xs md:text-sm mb-1 font-semibold uppercase">Price/Sqft</p>
                            <p
                                class="text-3xl md:text-4xl font-bold text-blue-600 group-hover:scale-110 transition-transform origin-left">
                                Rs. {{ number_format($project->price_per_sqft, 0) }}</p>
                        </div>
                        <div
                            class="group bg-white p-4 rounded-lg hover:shadow-md transform hover:-translate-y-1 transition-all duration-200 border-l-4 border-purple-600">
                            <p class="text-gray-600 text-xs md:text-sm mb-1 font-semibold uppercase">Total Plots</p>
                            <p
                                class="text-3xl md:text-4xl font-bold text-purple-600 group-hover:scale-110 transition-transform origin-left">
                                {{ $project->total_plots }}</p>
                        </div>
                        <div
                            class="group bg-white p-4 rounded-lg hover:shadow-md transform hover:-translate-y-1 transition-all duration-200 border-l-4 border-green-600">
                            <p class="text-gray-600 text-xs md:text-sm mb-1 font-semibold uppercase">Available</p>
                            <p
                                class="text-3xl md:text-4xl font-bold text-green-600 group-hover:scale-110 transition-transform origin-left">
                                {{ $stats['available'] }}</p>
                        </div>
                        <div
                            class="group bg-white p-4 rounded-lg hover:shadow-md transform hover:-translate-y-1 transition-all duration-200 border-l-4 border-yellow-600">
                            <p class="text-gray-600 text-xs md:text-sm mb-1 font-semibold uppercase">Booked</p>
                            <p
                                class="text-3xl md:text-4xl font-bold text-yellow-600 group-hover:scale-110 transition-transform origin-left">
                                {{ $stats['booked'] }}</p>
                        </div>
                        <div
                            class="group bg-white p-4 rounded-lg hover:shadow-md transform hover:-translate-y-1 transition-all duration-200 border-l-4 border-red-600">
                            <p class="text-gray-600 text-xs md:text-sm mb-1 font-semibold uppercase">Sold</p>
                            <p
                                class="text-3xl md:text-4xl font-bold text-red-600 group-hover:scale-110 transition-transform origin-left">
                                {{ $stats['sold'] }}</p>
                        </div>
                    </div>

                    <div class="mt-8 space-y-3">
                        <a href="{{ route('contact.show') }}"
                            class="flex items-center justify-center gap-2 w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-3 px-4 rounded-lg text-center font-bold hover:from-blue-700 hover:to-blue-800 active:scale-95 transform transition-all duration-200 group">
                            <svg class="w-5 h-5 transform group-hover:scale-110" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            Book Site Visit
                        </a>
                        <a href="https://wa.me/919794380555?text=I%20am%20interested%20in%20{{ urlencode($project->name) }}"
                            target="_blank" rel="noopener noreferrer"
                            class="flex items-center justify-center gap-2 w-full bg-green-500 hover:bg-green-600 text-white py-3 px-4 rounded-lg text-center font-bold active:scale-95 transform transition-all duration-200 group">
                            <svg class="w-5 h-5 transform group-hover:scale-110" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-9.746 9.798c0 2.734.75 5.404 2.177 7.707l-2.313 6.948 7.159-2.176c2.213 1.201 4.708 1.86 7.235 1.86 5.412 0 9.821-4.421 9.821-9.835 0-2.627-.698-5.095-2.028-7.239A9.828 9.828 0 0011.354 1.9" />
                            </svg>
                            WhatsApp Inquiry
                        </a>
                    </div>
                </div>

                <!-- Location Info -->
                <div
                    class="bg-white p-6 md:p-7 rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-200 border-t-4 border-blue-600">
                    <h3 class="text-xl md:text-2xl font-bold mb-6 text-blue-900">📍 Nearby Locations</h3>
                    <ul class="space-y-3 text-gray-700">
                        <li
                            class="flex items-start gap-3 p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors group">
                            <span class="text-lg mt-0.5 group-hover:scale-110 transition-transform">🏘️</span>
                            <span class="leading-relaxed"><strong>Mannat:</strong> Just close to site (00 Mtr)</span>
                        </li>
                        <li
                            class="flex items-start gap-3 p-3 bg-green-50 rounded-lg hover:bg-green-100 transition-colors group">
                            <span class="text-lg mt-0.5 group-hover:scale-110 transition-transform">🏢</span>
                            <span class="leading-relaxed"><strong>Shalimar:</strong> Just close to site (00 Mtr)</span>
                        </li>
                        <li
                            class="flex items-start gap-3 p-3 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition-colors group">
                            <span class="text-lg mt-0.5 group-hover:scale-110 transition-transform">🛣️</span>
                            <span class="leading-relaxed"><strong>Ayodhya Highway:</strong> 800 Meters away</span>
                        </li>
                        <li
                            class="flex items-start gap-3 p-3 bg-red-50 rounded-lg hover:bg-red-100 transition-colors group">
                            <span class="text-lg mt-0.5 group-hover:scale-110 transition-transform">🏥</span>
                            <span class="leading-relaxed"><strong>Hind Medical College:</strong> 1 KM</span>
                        </li>
                        <li
                            class="flex items-start gap-3 p-3 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors group">
                            <span class="text-lg mt-0.5 group-hover:scale-110 transition-transform">🎓</span>
                            <span class="leading-relaxed"><strong>Goel College:</strong> 3 KM</span>
                        </li>
                        <li
                            class="flex items-start gap-3 p-3 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition-colors group">
                            <span class="text-lg mt-0.5 group-hover:scale-110 transition-transform">📚</span>
                            <span class="leading-relaxed"><strong>CMS College / Jaipuria School:</strong> 3 KM</span>
                        </li>
                        <li
                            class="flex items-start gap-3 p-3 bg-pink-50 rounded-lg hover:bg-pink-100 transition-colors group">
                            <span class="text-lg mt-0.5 group-hover:scale-110 transition-transform">🏛️</span>
                            <span class="leading-relaxed"><strong>BBD College:</strong> 4 KM</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Inline Animations -->
<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
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

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    @keyframes zoomIn {
        from {
            transform: scale(0.9);
            opacity: 0;
        }

        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    /* Image animations */
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }

    .image-zoom {
        transition: transform 0.4s ease-out;
        overflow: hidden;
        border-radius: 0.75rem;
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

    /* Swiper Pagination Styles */
    :deep(.swiper-pagination-bullet) {
        background-color: rgba(255, 255, 255, 0.7);
        opacity: 1;
        transition: all 0.3s ease;
    }

    :deep(.swiper-pagination-bullet-active) {
        background-color: white;
        transform: scale(1.2);
    }

    :deep(.swiper-button-prev),
    :deep(.swiper-button-next) {
        background-color: rgba(37, 99, 235, 0.8);
        padding: 10px;
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    :deep(.swiper-button-prev:hover),
    :deep(.swiper-button-next:hover) {
        background-color: rgba(37, 99, 235, 1);
    }

    :deep(.swiper-button-prev::after),
    :deep(.swiper-button-next::after) {
        color: white;
        font-size: 16px;
    }
</style>
@endsection