@extends('layouts.public')

@section('title', 'Plot ' . $plot->plot_number . ' - NavyaHomes')

@section('content')
    <!-- Page Header -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4 animate-slide-down">
                <div>
                    <h1 class="text-3xl md:text-5xl font-bold mb-2">Plot <span class="text-blue-200">{{ $plot->plot_number }}</span></h1>
                    <p class="text-lg md:text-xl text-blue-100">{{ $plot->project->name }} • {{ $plot->project->location }}</p>
                </div>
                @if ($plot->isAvailable())
                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm md:text-lg font-bold shadow-lg transform hover:scale-110 transition-transform">
                        <span class="text-xl">✅</span> Available
                    </span>
                @elseif ($plot->isBooked())
                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-100 text-yellow-800 rounded-full text-sm md:text-lg font-bold shadow-lg transform hover:scale-110 transition-transform">
                        <span class="text-xl">⏳</span> Booked
                    </span>
                @else
                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-red-100 text-red-800 rounded-full text-sm md:text-lg font-bold shadow-lg transform hover:scale-110 transition-transform">
                        <span class="text-xl">✓</span> Sold @ Rs. 1500/sqft
                    </span>
                @endif
            </div>
        </div>
    </section>

    <!-- Plot Details -->
    <section class="py-16 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 md:gap-12">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Plot Image with Animated Elements -->
                    <div class="group relative bg-gradient-to-br from-blue-300 to-blue-500 rounded-xl h-80 md:h-96 flex items-center justify-center mb-8 md:mb-10 overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 image-zoom">
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-10 bg-white transition-opacity duration-300"></div>
                        @if ($plot->image)
                            <img src="{{ asset($plot->image) }}" alt="Plot {{ $plot->plot_number }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @elseif ($plot->project->featured_image)
                            <img src="{{ asset($plot->project->featured_image) }}" alt="{{ $plot->project->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="relative w-full h-full flex items-center justify-center">
                                <svg class="w-40 h-40 md:w-48 md:h-48 text-white transform group-hover:scale-110 transition-transform duration-300 plot-icon" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-5.04-6.71l-2.75 3.54-2.16-2.66c-.23-.29-.62-.29-.85 0l-2.96 3.83c-.3.38-.09.88.39.88h11.96c.48 0 .68-.5.39-.88L13.04 12.29c-.23-.29-.62-.29-.85 0z"/>
                                </svg>
                                <!-- Floating particles -->
                                <div class="absolute top-12 left-12 w-2 h-2 bg-white rounded-full opacity-70 animate-float"></div>
                                <div class="absolute bottom-16 right-8 w-3 h-3 bg-white rounded-full opacity-50 animate-float" style="animation-delay: 0.5s;"></div>
                                <div class="absolute top-24 right-16 w-2 h-2 bg-white rounded-full opacity-60 animate-float" style="animation-delay: 1s;"></div>
                            </div>
                        @endif
                        @if ($plot->is_corner && $plot->isAvailable())
                            <div class="absolute bottom-4 left-4 bg-yellow-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                Corner Plot
                            </div>
                        @endif
                    </div>

                    <!-- Key Information -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 md:p-8 rounded-xl mb-8 md:mb-10 border-l-4 border-blue-600 shadow-md">
                        <h2 class="text-2xl md:text-3xl font-bold mb-6 text-blue-900">Plot Information</h2>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-4">
                            <div class="bg-white p-4 md:p-5 rounded-lg shadow-sm hover:shadow-md transform hover:-translate-y-1 transition-all duration-200 group text-center">
                                <p class="text-gray-600 text-xs md:text-sm mb-2 font-semibold uppercase">Plot #</p>
                                <p class="text-2xl md:text-3xl font-bold text-blue-600 group-hover:scale-110 transition-transform">{{ $plot->plot_number }}</p>
                            </div>
                            <div class="bg-white p-4 md:p-5 rounded-lg shadow-sm hover:shadow-md transform hover:-translate-y-1 transition-all duration-200 group text-center">
                                <p class="text-gray-600 text-xs md:text-sm mb-2 font-semibold uppercase">Area</p>
                                <p class="text-2xl md:text-3xl font-bold text-green-600 group-hover:scale-110 transition-transform">{{ number_format($plot->area_sqft, 0) }}</p>
                                <p class="text-xs text-gray-600">Sqft</p>
                            </div>
                            <div class="bg-white p-4 md:p-5 rounded-lg shadow-sm hover:shadow-md transform hover:-translate-y-1 transition-all duration-200 group text-center">
                                <p class="text-gray-600 text-xs md:text-sm mb-2 font-semibold uppercase">Total Price</p>
                                <p class="text-xl md:text-2xl font-bold text-blue-600 group-hover:scale-110 transition-transform">Rs. {{ number_format($plot->total_price / 100000, 1) }}L</p>
                            </div>
                            <div class="bg-white p-4 md:p-5 rounded-lg shadow-sm hover:shadow-md transform hover:-translate-y-1 transition-all duration-200 group text-center">
                                <p class="text-gray-600 text-xs md:text-sm mb-2 font-semibold uppercase">Rate/Sqft</p>
                                <p class="text-2xl md:text-3xl font-bold text-yellow-600 group-hover:scale-110 transition-transform">Rs. {{ number_format($plot->rate_per_sqft, 0) }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Project Details -->
                    <div class="mb-8 md:mb-10 animate-fade-in" style="animation-delay: 0.1s;">
                        <h2 class="text-2xl md:text-3xl font-bold mb-4 text-blue-900">Project Details</h2>
                        <div class="bg-white p-6 md:p-7 rounded-xl border-l-4 border-blue-600 shadow-md hover:shadow-lg transition-all duration-300 group">
                            <h3 class="text-xl md:text-2xl font-bold mb-2 group-hover:text-blue-600 transition-colors">{{ $plot->project->name }}</h3>
                            <p class="text-gray-600 mb-4 flex items-center gap-2">
                                <span class="text-lg">📍</span>
                                {{ $plot->project->location }}
                            </p>
                            <p class="text-gray-700 leading-relaxed">{{ $plot->project->description }}</p>
                        </div>
                    </div>

                    <!-- Features -->
                    <div class="mb-8 md:mb-10 animate-fade-in" style="animation-delay: 0.2s;">
                        <h2 class="text-2xl md:text-3xl font-bold mb-6 text-blue-900">Features & Benefits</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-5">
                            <div class="flex items-start gap-3 p-4 md:p-5 bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg hover:shadow-md transform hover:-translate-y-1 transition-all duration-200 group border-l-4 border-blue-500">
                                <span class="text-2xl md:text-3xl mt-1">✅</span>
                                <div>
                                    <h3 class="font-bold text-blue-900 group-hover:text-blue-600 transition-colors">Registered & Legal</h3>
                                    <p class="text-gray-600 text-sm mt-1">All legal documents in order</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 p-4 md:p-5 bg-gradient-to-br from-green-50 to-green-100 rounded-lg hover:shadow-md transform hover:-translate-y-1 transition-all duration-200 group border-l-4 border-green-500">
                                <span class="text-2xl md:text-3xl mt-1">🏦</span>
                                <div>
                                    <h3 class="font-bold text-green-900 group-hover:text-green-600 transition-colors">Loan Friendly</h3>
                                    <p class="text-gray-600 text-sm mt-1">Financing from major banks</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 p-4 md:p-5 bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-lg hover:shadow-md transform hover:-translate-y-1 transition-all duration-200 group border-l-4 border-yellow-500">
                                <span class="text-2xl md:text-3xl mt-1">🛣️</span>
                                <div>
                                    <h3 class="font-bold text-yellow-900 group-hover:text-yellow-600 transition-colors">Prime Location</h3>
                                    <p class="text-gray-600 text-sm mt-1">Connected with main roads</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 p-4 md:p-5 bg-gradient-to-br from-red-50 to-red-100 rounded-lg hover:shadow-md transform hover:-translate-y-1 transition-all duration-200 group border-l-4 border-red-500">
                                <span class="text-2xl md:text-3xl mt-1">🔒</span>
                                <div>
                                    <h3 class="font-bold text-red-900 group-hover:text-red-600 transition-colors">100% Secure</h3>
                                    <p class="text-gray-600 text-sm mt-1">24/7 security & gated community</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Related Plots -->
                    @if ($relatedPlots->count() > 0)
                        <div class="animate-fade-in" style="animation-delay: 0.3s;">
                            <h2 class="text-2xl md:text-3xl font-bold mb-6 text-blue-900">Similar Plots in This Project</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-6">
                                @foreach ($relatedPlots as $idx => $relatedPlot)
                                    <div class="group bg-white p-5 md:p-6 rounded-lg shadow-md hover:shadow-xl transform hover:-translate-y-2 transition-all duration-300 border-t-4 border-blue-600" style="animation-delay: {{ ($idx * 0.1) }}s;">
                                        <div class="flex justify-between items-start mb-3">
                                            <h3 class="text-lg md:text-xl font-bold text-blue-600 group-hover:text-blue-700">Plot {{ $relatedPlot->plot_number }}</h3>
                                            @if ($relatedPlot->isAvailable())
                                                <span class="inline-flex items-center gap-1 px-2 py-1 bg-green-100 text-green-800 rounded text-xs font-bold">
                                                    <span>✅</span> Available
                                                </span>
                                            @elseif ($relatedPlot->isBooked())
                                                <span class="inline-flex items-center gap-1 px-2 py-1 bg-yellow-100 text-yellow-800 rounded text-xs font-bold">
                                                    <span>⏳</span> Booked
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1 px-2 py-1 bg-red-100 text-red-800 rounded text-xs font-bold">
                                                    <span>✕</span> Sold @ Rs. 1500/sqft
                                                </span>
                                            @endif
                                        </div>
                                        <div class="space-y-2 mb-4">
                                            <p class="text-gray-600 flex justify-between items-center">
                                                <span>Area:</span>
                                                <strong class="text-gray-900">{{ number_format($relatedPlot->area_sqft, 0) }} Sqft</strong>
                                            </p>
                                            <p class="text-gray-600 flex justify-between items-center">
                                                <span>Price:</span>
                                                <strong class="text-blue-600 text-lg">Rs. {{ number_format($relatedPlot->total_price / 100000, 1) }}L</strong>
                                            </p>
                                        </div>
                                        <a href="{{ route('plots.show', [$relatedPlot->project, $relatedPlot]) }}" class="inline-flex items-center gap-2 text-blue-600 font-bold hover:text-blue-700 group-hover:translate-x-1 transition-all">
                                            View Details
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                            </svg>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div>
                    <!-- Price Summary -->
                    <div class="bg-gradient-to-br from-blue-600 to-blue-800 text-white p-6 md:p-8 rounded-xl mb-6 md:mb-8 sticky top-20 shadow-lg hover:shadow-2xl transition-shadow duration-300 animate-slide-up">
                        <h3 class="text-2xl md:text-3xl font-bold mb-6">Price Summary</h3>
                        <div class="space-y-4 mb-8">
                            <div class="flex justify-between pb-3 border-b border-blue-400 hover:border-blue-300 transition-colors">
                                <span class="text-blue-100">Plot Area</span>
                                <span class="font-bold text-lg">{{ number_format($plot->area_sqft, 0) }} <span class="text-sm">Sqft</span></span>
                            </div>
                            <div class="flex justify-between pb-3 border-b border-blue-400 hover:border-blue-300 transition-colors">
                                <span class="text-blue-100">Rate per Sqft</span>
                                <span class="font-bold">Rs. {{ number_format($plot->rate_per_sqft, 0) }}</span>
                            </div>
                            <div class="flex justify-between p-4 md:p-5 bg-blue-700 rounded-lg border-2 border-blue-400 hover:border-blue-200 transition-colors">
                                <span class="font-bold text-lg">Total Price</span>
                                <span class="font-bold text-xl">Rs. {{ number_format($plot->total_price / 100000, 1) }}L</span>
                            </div>
                        </div>

                        <div class="space-y-3">
                            @if ($plot->isAvailable())
                                <a href="{{ route('contact.show') }}" class="flex items-center justify-center gap-2 w-full bg-white text-blue-600 py-3 px-4 rounded-lg text-center font-bold hover:bg-blue-50 active:scale-95 transform transition-all duration-200 group">
                                    <svg class="w-5 h-5 transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Book Site Visit
                                </a>
                            @endif
                            <a href="https://wa.me/923001234567?text=I%20am%20interested%20in%20Plot%20{{ urlencode($plot->plot_number) }}%20in%20{{ urlencode($plot->project->name) }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center gap-2 w-full bg-green-500 hover:bg-green-600 text-white py-3 px-4 rounded-lg text-center font-bold active:scale-95 transform transition-all duration-200 group">
                                <svg class="w-5 h-5 transform group-hover:scale-110" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-9.746 9.798c0 2.734.75 5.404 2.177 7.707l-2.313 6.948 7.159-2.176c2.213 1.201 4.708 1.86 7.235 1.86 5.412 0 9.821-4.421 9.821-9.835 0-2.627-.698-5.095-2.028-7.239A9.828 9.828 0 0011.354 1.9"/>
                                </svg>
                                WhatsApp Us
                            </a>
                            <a href="tel:+923001234567" class="flex items-center justify-center gap-2 w-full bg-blue-400 hover:bg-blue-300 text-white py-3 px-4 rounded-lg text-center font-bold active:scale-95 transform transition-all duration-200 group">
                                <svg class="w-5 h-5 transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                Call Now
                            </a>
                        </div>
                    </div>

                    <!-- Contact Card -->
                    <div class="bg-white p-6 md:p-7 rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-200 animate-slide-up" style="animation-delay: 0.1s;">
                        <h3 class="text-xl md:text-2xl font-bold mb-4 text-blue-900">Questions?</h3>
                        <p class="text-gray-700 mb-6 text-sm md:text-base">Our team is ready to help you with any questions about this plot</p>
                        <div class="space-y-4">
                            <a href="tel:+923001234567" class="flex items-start gap-3 p-3 rounded-lg hover:bg-blue-50 transition-colors group">
                                <span class="text-xl mt-1">📞</span>
                                <div>
                                    <p class="text-gray-900 font-semibold text-sm">+92 (300) 123-4567</p>
                                    <p class="text-gray-600 text-xs">Call us anytime</p>
                                </div>
                            </a>
                            <a href="mailto:info@navyahomes.com" class="flex items-start gap-3 p-3 rounded-lg hover:bg-blue-50 transition-colors group">
                                <span class="text-xl mt-1">📧</span>
                                <div>
                                    <p class="text-gray-900 font-semibold text-sm">info@navyahomes.com</p>
                                    <p class="text-gray-600 text-xs">Send us a message</p>
                                </div>
                            </a>
                            <div class="flex items-start gap-3 p-3 rounded-lg bg-blue-50">
                                <span class="text-xl mt-1">⏰</span>
                                <div>
                                    <p class="text-gray-900 font-semibold text-sm">9:00 AM - 6:00 PM</p>
                                    <p class="text-gray-600 text-xs">Monday - Sunday</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
        
        @keyframes slideLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        @keyframes slideRight {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
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
            animation: slideDown 0.6s ease-in-out forwards;
        }
        
        .animate-slide-up {
            animation: slideUp 0.6s ease-in-out forwards;
        }
        
        .animate-slide-left {
            animation: slideLeft 0.6s ease-in-out forwards;
        }
        
        .animate-slide-right {
            animation: slideRight 0.6s ease-in-out forwards;
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
    </style>
@endsection
