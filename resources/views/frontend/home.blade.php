@extends('layouts.public')

@section('title', 'NavyaHomes - Premium Real Estate Solutions')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap');

        :root {
            --ink: #0f172a;
            --ocean: #0ea5e9;
            --deep: #1e3a8a;
            --sun: #f97316;
            --mint: #14b8a6;
            --mist: #e2e8f0;
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
        }

        .display-serif {
            font-family: 'Playfair Display', serif;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes floatSlow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }

        @keyframes drift {
            0% { transform: translate3d(0, 0, 0); }
            50% { transform: translate3d(12px, -8px, 0); }
            100% { transform: translate3d(0, 0, 0); }
        }

        .animate-slide-down {
            animation: slideDown 0.6s ease-out forwards;
        }

        .animate-slide-up {
            animation: slideUp 0.6s ease-out forwards;
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
            opacity: 0;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(15, 23, 42, 0.2);
        }

        .stat-number {
            transition: transform 0.3s ease;
        }

        .card-hover:hover .stat-number {
            transform: scale(1.08);
        }

        .hero-aurora {
            background: radial-gradient(circle at 10% 20%, rgba(14, 165, 233, 0.35), transparent 45%),
                        radial-gradient(circle at 90% 10%, rgba(249, 115, 22, 0.2), transparent 40%),
                        linear-gradient(135deg, #0b1220 0%, #0f172a 40%, #1e3a8a 100%);
        }

        .hero-grid {
            background-image: linear-gradient(rgba(226, 232, 240, 0.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(226, 232, 240, 0.08) 1px, transparent 1px);
            background-size: 48px 48px;
        }

        .glow-chip {
            box-shadow: 0 10px 30px rgba(14, 165, 233, 0.25);
        }
    </style>

    <!-- Hero Section -->
    <section class="hero-aurora text-white py-14 md:py-24 relative overflow-hidden">
        <div class="absolute inset-0 hero-grid opacity-40"></div>
        <div class="absolute -top-16 -left-16 w-64 h-64 bg-blue-500/30 rounded-full blur-3xl animate-fade-in" style="animation-delay: 0.2s;"></div>
        <div class="absolute top-16 right-10 w-56 h-56 bg-orange-400/25 rounded-full blur-3xl" style="animation: drift 6s ease-in-out infinite;"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
                <div class="animate-slide-down">
                    <div class="inline-flex items-center gap-3 bg-white/10 text-blue-100 px-4 py-2 rounded-full text-sm uppercase tracking-widest mb-5 glow-chip">
                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                        {{-- Market Ready Plots --}}
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight display-serif">
                        Invest in Lucknow's<br>
                        <span class="text-blue-200">Fastest-Growing Corridor</span>
                    </h1>
                    <p class="text-lg md:text-xl text-blue-100 mt-5 leading-relaxed">
                        Prime plots near Lucknow-Ayodhya Road with RCC roads, gated security, and direct highway access.
                    </p>
                    <div class="mt-6 flex flex-wrap gap-3 text-sm">
                        <span class="px-3 py-2 rounded-full bg-white/10">Bank Loan Available</span>
                        <span class="px-3 py-2 rounded-full bg-white/10">40 ft Entrance</span>
                        <span class="px-3 py-2 rounded-full bg-white/10">24/7 CCTV</span>
                        <span class="px-3 py-2 rounded-full bg-white/10">Temple & Park</span>
                    </div>
                    <div class="mt-6 text-blue-100 text-lg font-semibold">
                        Starting from <span class="text-white text-2xl">Rs. 1500/sqft</span>
                        <span class="text-orange-200">(Corner plots Rs. 1800/sqft)</span>
                    </div>
                    <div class="mt-8 flex flex-col sm:flex-row gap-3">
                        <a href="{{ route('plots.index') }}" class="bg-white text-blue-700 px-6 md:px-8 py-3 md:py-4 rounded-lg font-bold hover:bg-blue-50 transition text-center hover:shadow-lg">
                            🔍 Explore Plots
                        </a>
                        <a href="{{ route('contact.show') }}" class="border-2 border-white text-white px-6 md:px-8 py-3 md:py-4 rounded-lg font-bold hover:bg-white hover:text-blue-700 transition text-center">
                            📞 Schedule Site Visit
                        </a>
                    </div>
                </div>

                <div class="animate-slide-up">
                    <div class="relative bg-white/5 rounded-2xl p-4 md:p-6 border border-white/10 shadow-2xl">
                        <div class="absolute -top-6 -right-6 bg-emerald-400 text-slate-900 px-4 py-2 rounded-full font-bold text-sm">
                            Verified Project
                        </div>
                        <div class="rounded-xl overflow-hidden shadow-lg">
                            @if ($featuredProjects->first() && $featuredProjects->first()->featured_image)
                                <img src="{{ asset($featuredProjects->first()->featured_image) }}" alt="{{ $featuredProjects->first()->name }}"
                                    class="w-full h-64 md:h-80 object-cover">
                            @else
                                <div class="bg-gradient-to-br from-blue-400 to-blue-600 h-64 md:h-80 flex items-center justify-center">
                                    <svg class="w-24 md:w-32 h-24 md:h-32 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="mt-5 flex items-center justify-between">
                            <div>
                                <p class="text-blue-100 text-sm">Featured Project</p>
                                <h3 class="text-xl font-bold">{{ optional($featuredProjects->first())->name ?? 'Lucknow-Ayodhya Ring Road' }}</h3>
                            </div>
                            <div class="text-right">
                                <p class="text-blue-100 text-sm">Availability</p>
                                <p class="text-2xl font-bold">{{ $availablePlots }}</p>
                            </div>
                        </div>
                        <div class="mt-4 grid grid-cols-3 gap-3 text-center">
                            <div class="bg-white/10 rounded-lg p-3">
                                <p class="text-xs text-blue-100">Total Plots</p>
                                <p class="text-lg font-bold">{{ $totalPlots }}</p>
                            </div>
                            <div class="bg-white/10 rounded-lg p-3">
                                <p class="text-xs text-blue-100">Booked</p>
                                <p class="text-lg font-bold">{{ $totalPlots - $availablePlots - $soldPlots }}</p>
                            </div>
                            <div class="bg-white/10 rounded-lg p-3">
                                <p class="text-xs text-blue-100">Sold</p>
                                <p class="text-lg font-bold">{{ $soldPlots }}</p>
                            </div>
                        </div>
                        <p class="mt-4 text-blue-100 text-sm">Only 800m from Lucknow-Ayodhya Highway</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Featured Projects -->
    <section class="py-12 md:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10 md:mb-16 animate-slide-down">
                <div class="inline-flex items-center gap-2 bg-emerald-100 text-emerald-800 px-4 py-1.5 rounded-full text-xs uppercase tracking-widest">
                    Spotlight
                </div>
                <h2 class="text-3xl md:text-4xl font-bold mb-3 md:mb-4 mt-4 display-serif text-slate-900">Featured Projects</h2>
                <p class="text-base md:text-lg text-gray-600">Curated plots with verified documents and fast connectivity.</p>
            </div>

            <div class="flex justify-center">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 w-full max-w-7xl">
                    @forelse ($featuredProjects as $index => $project)
                        <div class="group bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition card-hover animate-fade-in {{ count($featuredProjects) === 1 ? 'md:col-span-2 lg:col-span-3 max-w-md mx-auto' : '' }}" style="animation-delay: {{ ($index * 0.1) }}s;">
                            <!-- Project Image/Icon Section -->
                            <div class="relative bg-gradient-to-br from-blue-400 to-blue-600 h-48 flex items-center justify-center overflow-hidden group-hover:from-blue-500 group-hover:to-blue-700 transition">
                                <svg class="w-24 h-24 text-white transform group-hover:scale-110 transition duration-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                                </svg>
                            </div>
                            <!-- Project Details -->
                            <div class="p-6 md:p-7">
                                <h3 class="text-lg md:text-xl font-bold mb-2 group-hover:text-blue-600 transition">{{ $project->name }}</h3>
                                <p class="text-gray-600 mb-3 flex items-center text-sm">
                                    <span class="text-lg mr-2">📍</span> 
                                    {{ $project->location }}
                                </p>
                                <p class="text-gray-700 mb-4 text-sm line-clamp-2">{{ Str::limit($project->description, 100) }}</p>
                                <!-- Stats Box -->
                                <div class="bg-blue-50 rounded-lg p-4 mb-4 border-l-4 border-blue-600">
                                    <div class="grid grid-cols-2 gap-3">
                                        <div>
                                            <p class="text-2xl font-bold text-blue-600">Rs. {{ number_format($project->price_per_sqft, 0) }}</p>
                                            <p class="text-xs text-gray-600">Per Sqft</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-2xl font-bold text-green-600">{{ $project->total_plots }}</p>
                                            <p class="text-xs text-gray-600">Plots</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- CTA Button -->
                                <a href="{{ route('projects.show', $project) }}" class="block w-full bg-blue-600 text-white py-2 px-4 rounded-lg text-center font-bold hover:bg-blue-700 transition">
                                    View Details →
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="col-span-3 text-center text-gray-500 py-12">No projects available at the moment</p>
                    @endforelse
                </div>
            </div>

            <div class="text-center mt-10 md:mt-16 animate-slide-up">
                <a href="{{ route('projects.index') }}" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-700 transition hover:shadow-lg">
                    View All Projects →
                </a>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="bg-gray-50 py-12 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10 md:mb-16 animate-slide-down">
                <div class="inline-flex items-center gap-2 bg-blue-100 text-blue-800 px-4 py-1.5 rounded-full text-xs uppercase tracking-widest">
                    Momentum Snapshot
                </div>
                <h2 class="text-3xl md:text-4xl font-bold mt-4 display-serif text-slate-900">Market Momentum</h2>
                <p class="text-gray-600 mt-3">Live inventory and booking velocity across our prime locations.</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8 text-center">
                <div class="bg-white p-6 md:p-8 rounded-lg shadow hover:shadow-lg transition card-hover animate-fade-in">
                    <div class="stat-number text-4xl md:text-5xl font-bold text-blue-600 mb-2">{{ count($featuredProjects) }}+</div>
                    <p class="text-gray-600 font-semibold text-sm md:text-base">Active Projects</p>
                    <div class="mt-3 text-xs md:text-sm text-gray-500">Building dreams across the city</div>
                </div>
                <div class="bg-white p-6 md:p-8 rounded-lg shadow hover:shadow-lg transition card-hover animate-fade-in" style="animation-delay: 0.1s;">
                    <div class="stat-number text-4xl md:text-5xl font-bold text-green-600 mb-2">{{ $totalPlots }}</div>
                    <p class="text-gray-600 font-semibold text-sm md:text-base">Total Plots</p>
                    <div class="mt-3 text-xs md:text-sm text-gray-500">Available in our projects</div>
                </div>
                <div class="bg-white p-6 md:p-8 rounded-lg shadow hover:shadow-lg transition card-hover animate-fade-in" style="animation-delay: 0.2s;">
                    <div class="stat-number text-4xl md:text-5xl font-bold text-yellow-600 mb-2">{{ $availablePlots }}</div>
                    <p class="text-gray-600 font-semibold text-sm md:text-base">Available Now</p>
                    <div class="mt-3 text-xs md:text-sm text-gray-500">Ready for booking</div>
                </div>
                <div class="bg-white p-6 md:p-8 rounded-lg shadow hover:shadow-lg transition card-hover animate-fade-in" style="animation-delay: 0.3s;">
                    <div class="stat-number text-4xl md:text-5xl font-bold text-red-600 mb-2">{{ $soldPlots }}</div>
                    <p class="text-gray-600 font-semibold text-sm md:text-base">Sold Units</p>
                    <div class="mt-3 text-xs md:text-sm text-gray-500">Successfully delivered</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Section -->
    <section class="bg-gradient-to-b from-blue-50 to-blue-100 py-12 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10 md:mb-16 animate-slide-down">
                <div class="inline-flex items-center gap-2 bg-indigo-100 text-indigo-800 px-4 py-1.5 rounded-full text-xs uppercase tracking-widest">
                    Trust & Credibility
                </div>
                <h2 class="text-3xl md:text-4xl font-bold mb-3 mt-4 display-serif text-slate-900">Why Choose <span class="text-blue-600">NavyaHomes</span>?</h2>
                <p class="text-base md:text-lg text-gray-600">Clear titles, transparent pricing, and a buyer-first experience.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                <!-- Trust Card 1 -->
                <div class="bg-white p-8 rounded-lg shadow hover:shadow-lg transition card-hover text-center border-t-4 border-blue-600 animate-fade-in">
                    <div class="text-5xl mb-4">✅</div>
                    <h3 class="text-lg md:text-xl font-bold mb-3 group-hover:text-blue-600">Approved & Registered</h3>
                    <p class="text-gray-700 text-sm leading-relaxed">All plots are officially registered with the authorities ensuring complete legal compliance</p>
                </div>
                <!-- Trust Card 2 -->
                <div class="bg-white p-8 rounded-lg shadow hover:shadow-lg transition card-hover text-center border-t-4 border-green-600 animate-fade-in" style="animation-delay: 0.1s;">
                    <div class="text-5xl mb-4">🏦</div>
                    <h3 class="text-lg md:text-xl font-bold mb-3">Loan Friendly</h3>
                    <p class="text-gray-700 text-sm leading-relaxed">Easy financing options with major banks and flexible payment schemes</p>
                </div>
                <!-- Trust Card 3 -->
                <div class="bg-white p-8 rounded-lg shadow hover:shadow-lg transition card-hover text-center border-t-4 border-red-600 animate-fade-in" style="animation-delay: 0.2s;">
                    <div class="text-5xl mb-4">🛡️</div>
                    <h3 class="text-lg md:text-xl font-bold mb-3">100% Secure</h3>
                    <p class="text-gray-700 text-sm leading-relaxed">Complete legal protection, transparent pricing, and guaranteed ownership transfer</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12 md:py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center gap-2 bg-white/10 text-blue-100 px-4 py-1.5 rounded-full text-xs uppercase tracking-widest">
                Book a Visit
            </div>
            <h2 class="text-3xl md:text-4xl font-bold mb-4 md:mb-6 mt-4 display-serif animate-slide-down">Ready to Find Your <span class="text-blue-200">Dream Plot</span>?</h2>
            <p class="text-base md:text-lg mb-8 md:mb-12 text-blue-100 animate-slide-up">Schedule a site visit or get pricing details from our experts today.</p>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row justify-center gap-3 md:gap-4 flex-wrap">
                <!-- Call Button -->
                <a href="tel:+923001234567" class="inline-flex items-center justify-center gap-2 bg-white text-blue-600 px-6 md:px-8 py-3 rounded-lg font-bold hover:bg-blue-50 transition hover:shadow-lg animate-fade-in">
                    📞 Call Now
                </a>
                
                <!-- WhatsApp Button -->
                <a href="https://wa.me/923001234567" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 bg-green-500 text-white px-6 md:px-8 py-3 rounded-lg font-bold hover:bg-green-600 transition hover:shadow-lg animate-fade-in" style="animation-delay: 0.1s;">
                    💬 WhatsApp
                </a>
                
                <!-- Message Button -->
                <a href="{{ route('contact.show') }}" class="inline-flex items-center justify-center gap-2 bg-blue-400 hover:bg-blue-300 text-white px-6 md:px-8 py-3 rounded-lg font-bold transition hover:shadow-lg animate-fade-in" style="animation-delay: 0.2s;">
                    ✉️ Send Message
                </a>
            </div>

            <!-- Trust Badges -->
            <div class="mt-10 md:mt-16 pt-8 border-t border-blue-400 border-opacity-30">
                <p class="text-blue-100 mb-4 text-sm">Trusted by businesses and individuals worldwide</p>
                <div class="flex justify-center items-center flex-wrap gap-4 md:gap-6">
                    <div class="flex items-center gap-2 text-blue-100">
                        <span>⭐</span>
                        <span class="text-sm">4.8 Rating</span>
                    </div>
                    <div class="w-px h-6 bg-blue-400 opacity-30"></div>
                    <div class="flex items-center gap-2 text-blue-100">
                        <span>👥</span>
                        <span class="text-sm">10K+ Customers</span>
                    </div>
                    <div class="w-px h-6 bg-blue-400 opacity-30"></div>
                    <div class="flex items-center gap-2 text-blue-100">
                        <span>🏆</span>
                        <span class="text-sm">Award Winner</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
