@extends('layouts.public')

@section('title', 'About Us - Navya Homes')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl md:text-5xl font-bold mb-4 animate-slide-down">About Navya Homes</h1>
        <p class="text-lg md:text-xl text-blue-100 animate-slide-up" style="animation-delay: 0.1s;">Premium Real Estate
            Solutions in Lucknow - Building Dreams, Creating Communities</p>
    </div>
</section>

<!-- Company Introduction -->
<section class="py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-center">
            <div class="animate-slide-left">
                <h2 class="text-2xl md:text-4xl font-bold mb-6 text-blue-900">Who We Are</h2>
                <p class="text-gray-700 text-base md:text-lg mb-4 leading-relaxed">
                    Navya Homes is a leading real estate development company in Lucknow, dedicated to creating premium
                    residential plots and properties that combine luxury, affordability, and quality. We specialize in
                    providing exceptional land investment opportunities for families and investors seeking genuine value
                    and reliability.
                </p>
                <p class="text-gray-700 text-base md:text-lg mb-4 leading-relaxed">
                    With 10 years of expertise in the real estate industry, we have successfully delivered 850+ premium
                    properties across Lucknow and earned the trust of 1200+ happy clients. Our current portfolio
                    includes 3 active projects, with SATRIK ROADS being our flagship plot project on Ayodhya Road. Our
                    commitment to transparency, quality, and customer satisfaction sets us apart in the competitive real
                    estate market.
                </p>
                <p class="text-gray-700 text-base md:text-lg mb-6 leading-relaxed">
                    Our mission is to provide affordable, secure, and strategically located residential plots to
                    families and investors who seek genuine value, transparency, and reliability. Every project we
                    develop comes with modern amenities, bank loan facility, RCC roads, 24/7 security, and proximity to
                    premium locations.
                </p>
                <div class="flex flex-col sm:flex-row gap-3 md:gap-4">
                    <a href="{{ route('projects.index') }}"
                        class="group inline-flex items-center justify-center gap-2 bg-blue-600 text-white px-6 md:px-8 py-3 rounded-lg font-bold hover:bg-blue-700 active:scale-95 transform transition-all duration-200">
                        <svg class="w-5 h-5 transform group-hover:scale-110" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                        Explore Projects
                    </a>
                    <a href="{{ route('contact.show') }}"
                        class="group inline-flex items-center justify-center gap-2 border-2 border-blue-600 text-blue-600 px-6 md:px-8 py-3 rounded-lg font-bold hover:bg-blue-50 active:scale-95 transform transition-all duration-200">
                        <svg class="w-5 h-5 transform group-hover:scale-110" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        Get in Touch
                    </a>
                </div>
            </div>
            <div
                class="group relative bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl p-8 md:p-12 text-white h-80 md:h-96 flex items-center justify-center overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 animate-slide-right">
                <div class="absolute inset-0 opacity-0 group-hover:opacity-10 bg-white transition-opacity duration-300">
                </div>
                <div class="text-center relative z-10">
                    <div
                        class="text-6xl md:text-7xl mb-4 transform group-hover:scale-110 transition-transform duration-300">
                        �</div>
                    <p class="text-lg md:text-2xl font-bold leading-snug">Navya Homes<br><span
                            class="text-base md:text-lg">10 Years • 1200+ Clients • 850+ Properties Delivered</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Experience & Stats -->
<section class="bg-gradient-to-b from-gray-50 to-gray-100 py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl md:text-4xl font-bold text-center mb-6 md:mb-12 text-blue-900 animate-slide-down">Our
            Achievement</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-8">
            <div
                class="group bg-white rounded-xl shadow-md hover:shadow-xl p-6 md:p-8 text-center transform hover:-translate-y-2 transition-all duration-300 animate-fade-in border-t-4 border-blue-600">
                <div
                    class="text-4xl md:text-5xl font-bold text-blue-600 mb-3 group-hover:scale-110 transition-transform">
                    10+</div>
                <p class="text-lg md:text-xl font-semibold text-gray-700 group-hover:text-blue-600 transition-colors">
                    Years of Experience</p>
                <p class="text-gray-600 text-sm md:text-base mt-2">In real estate business</p>
            </div>

            <div class="group bg-white rounded-xl shadow-md hover:shadow-xl p-6 md:p-8 text-center transform hover:-translate-y-2 transition-all duration-300 animate-fade-in border-t-4 border-green-600"
                style="animation-delay: 0.1s;">
                <div
                    class="text-4xl md:text-5xl font-bold text-green-600 mb-3 group-hover:scale-110 transition-transform">
                    1200+</div>
                <p class="text-lg md:text-xl font-semibold text-gray-700 group-hover:text-green-600 transition-colors">
                    Happy Clients</p>
                <p class="text-gray-600 text-sm md:text-base mt-2">Satisfied customers</p>
            </div>

            <div class="group bg-white rounded-xl shadow-md hover:shadow-xl p-6 md:p-8 text-center transform hover:-translate-y-2 transition-all duration-300 animate-fade-in border-t-4 border-purple-600"
                style="animation-delay: 0.2s;">
                <div
                    class="text-4xl md:text-5xl font-bold text-purple-600 mb-3 group-hover:scale-110 transition-transform">
                    850+</div>
                <p class="text-lg md:text-xl font-semibold text-gray-700 group-hover:text-purple-600 transition-colors">
                    Properties Delivered</p>
                <p class="text-gray-600 text-sm md:text-base mt-2">Premium plots & land</p>
            </div>

            <div class="group bg-white rounded-xl shadow-md hover:shadow-xl p-6 md:p-8 text-center transform hover:-translate-y-2 transition-all duration-300 animate-fade-in border-t-4 border-orange-600"
                style="animation-delay: 0.3s;">
                <div
                    class="text-4xl md:text-5xl font-bold text-orange-600 mb-3 group-hover:scale-110 transition-transform">
                    3</div>
                <p class="text-lg md:text-xl font-semibold text-gray-700 group-hover:text-orange-600 transition-colors">
                    Active Projects</p>
                <p class="text-gray-600 text-sm md:text-base mt-2">In development now</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl md:text-4xl font-bold text-center mb-6 md:mb-12 text-blue-900 animate-slide-down">Why Choose
            Navya Homes</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 md:gap-8">
            <div
                class="group bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-6 md:p-7 border-l-4 border-blue-600 hover:shadow-lg transform hover:-translate-y-1 transition-all duration-200 animate-fade-in">
                <div
                    class="text-4xl md:text-5xl text-blue-600 mb-4 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                    💰</div>
                <h3 class="text-lg md:text-xl font-bold mb-3 group-hover:text-blue-700 transition-colors">Bank Loan
                    Facility</h3>
                <p class="text-gray-700 text-sm md:text-base">Easy financing options with all major banks for plot
                    purchase.</p>
            </div>

            <div class="group bg-gradient-to-br from-green-50 to-green-100 rounded-lg p-6 md:p-7 border-l-4 border-green-600 hover:shadow-lg transform hover:-translate-y-1 transition-all duration-200 animate-fade-in"
                style="animation-delay: 0.1s;">
                <div
                    class="text-4xl md:text-5xl text-green-600 mb-4 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                    🛣️</div>
                <h3 class="text-lg md:text-xl font-bold mb-3 group-hover:text-green-700 transition-colors">RCC Roads &
                    Utilities</h3>
                <p class="text-gray-700 text-sm md:text-base">All plots connected with RCC roads and modern
                    infrastructure.</p>
            </div>

            <div class="group bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg p-6 md:p-7 border-l-4 border-purple-600 hover:shadow-lg transform hover:-translate-y-1 transition-all duration-200 animate-fade-in"
                style="animation-delay: 0.2s;">
                <div
                    class="text-4xl md:text-5xl text-purple-600 mb-4 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                    🔒</div>
                <h3 class="text-lg md:text-xl font-bold mb-3 group-hover:text-purple-700 transition-colors">24/7
                    Security</h3>
                <p class="text-gray-700 text-sm md:text-base">Round-the-clock CCTV surveillance and security personnel
                    on duty.</p>
            </div>

            <div class="group bg-gradient-to-br from-orange-50 to-orange-100 rounded-lg p-6 md:p-7 border-l-4 border-orange-600 hover:shadow-lg transform hover:-translate-y-1 transition-all duration-200 animate-fade-in"
                style="animation-delay: 0.3s;">
                <div
                    class="text-4xl md:text-5xl text-orange-600 mb-4 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                    📍</div>
                <h3 class="text-lg md:text-xl font-bold mb-3 group-hover:text-orange-700 transition-colors">Prime
                    Location</h3>
                <p class="text-gray-700 text-sm md:text-base">Strategic Ayodhya Road location with easy access to
                    amenities.</p>
            </div>
        </div>
    </div>
</section>

<!-- Our Values -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center mb-12">Our Promise to You</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center transform hover:scale-105 transition-transform duration-300">
                <div class="text-5xl mb-4">✅</div>
                <h3 class="text-2xl font-bold mb-3">100% Transparency</h3>
                <p class="text-blue-100">Clear pricing, no hidden charges. Complete documentation and legal verification
                    for every plot transaction.</p>
            </div>

            <div class="text-center transform hover:scale-105 transition-transform duration-300">
                <div class="text-5xl mb-4">🏆</div>
                <h3 class="text-2xl font-bold mb-3">Premium Quality</h3>
                <p class="text-blue-100">Every plot comes with modern infrastructure, utilities, and amenities meeting
                    international standards.</p>
            </div>

            <div class="text-center transform hover:scale-105 transition-transform duration-300">
                <div class="text-5xl mb-4">📱</div>
                <h3 class="text-2xl font-bold mb-3">Customer Support</h3>
                <p class="text-blue-100">Dedicated team available 24/7 to assist with inquiries, site visits, and
                    post-purchase support.</p>
            </div>
        </div>
    </div>
</section>

<!-- Leadership Team -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center mb-12">Our Leadership</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div
                class="bg-white rounded-xl shadow-lg overflow-hidden text-center transform hover:shadow-2xl transition-all duration-300">
                <div class="bg-gradient-to-r from-blue-600 to-blue-800 flex items-center justify-center" style="height: 180px;">
                    <img src="{{ asset('images/team/jp-yadav.jpg') }}" alt="J P Yadav"
                        class="h-full object-cover" style="width: 140px; height: 180px;">
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold mb-2 text-gray-900">J P Yadav</h3>
                    <p class="text-blue-600 font-bold mb-3 text-lg">Founder & CEO</p>
                    <p class="text-gray-700">With 10 years of expertise in real estate development, J P Yadav leads
                        Navya Homes with a vision to provide premium, affordable plots and properties with complete
                        transparency and
                        customer satisfaction.</p>
                </div>
            </div>

            <div
                class="bg-white rounded-xl shadow-lg overflow-hidden text-center transform hover:shadow-2xl transition-all duration-300">
                <div class="bg-gradient-to-r from-green-600 to-green-800 flex items-center justify-center" style="height: 180px;">
                    <img src="{{ asset('images/team/raj-yadav.jpeg') }}" alt="Raj Yadav"
                        class="h-full object-cover" style="width: 140px; height: 180px;">
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold mb-2 text-gray-900">Raj Yadav</h3>
                    <p class="text-green-600 font-bold mb-3 text-lg">Project Management</p>
                    <p class="text-gray-700">Dedicated professional ensuring timely delivery, quality infrastructure,
                        and exceptional customer experience throughout the project lifecycle.</p>
                </div>
            </div>

            <div
                class="bg-white rounded-xl shadow-lg overflow-hidden text-center transform hover:shadow-2xl transition-all duration-300">
                <div
                    class="bg-gradient-to-r from-purple-600 to-purple-800 h-40 flex items-center justify-center text-6xl">
                    👥</div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold mb-2 text-gray-900">Customer Service</h3>
                    <p class="text-purple-600 font-bold mb-3 text-lg">Client Relations</p>
                    <p class="text-gray-700">Available 24/7 to assist with plot inquiries, site visits, documentation,
                        and post-purchase support for all our valued customers.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Invest in SATRIK ROADS -->
<section class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center mb-12">Why Invest in Our Projects</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div
                class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl shadow-lg p-8 text-center transform hover:-translate-y-2 transition-all duration-300 border-t-4 border-blue-600">
                <div class="text-5xl mb-4">📍</div>
                <h3 class="font-bold text-lg mb-2 text-gray-900">Prime Location</h3>
                <p class="text-gray-700">Ayodhya Road with proximity to schools, hospitals, shopping, and temples</p>
            </div>

            <div
                class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl shadow-lg p-8 text-center transform hover:-translate-y-2 transition-all duration-300 border-t-4 border-green-600">
                <div class="text-5xl mb-4">💵</div>
                <h3 class="font-bold text-lg mb-2 text-gray-900">Affordable Pricing</h3>
                <p class="text-gray-700">₹1,499/sqft (special offer ₹1,050/sqft) with flexible payment plans</p>
            </div>

            <div
                class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl shadow-lg p-8 text-center transform hover:-translate-y-2 transition-all duration-300 border-t-4 border-purple-600">
                <div class="text-5xl mb-4">📄</div>
                <h3 class="font-bold text-lg mb-2 text-gray-900">Legal & Verified</h3>
                <p class="text-gray-700">All plots legally documented, registered, and government approved</p>
            </div>

            <div
                class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl shadow-lg p-8 text-center transform hover:-translate-y-2 transition-all duration-300 border-t-4 border-orange-600">
                <div class="text-5xl mb-4">📈</div>
                <h3 class="font-bold text-lg mb-2 text-gray-900">High ROI Potential</h3>
                <p class="text-gray-700">Strategic location ensures high appreciation and resale value</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 text-white py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl md:text-5xl font-bold mb-4">Ready to Invest With Navya Homes?</h2>
        <p class="text-lg md:text-xl text-blue-100 mb-8">Join 1200+ satisfied customers across our premium
            projects<br>Bank loan facility, RCC roads, and 24/7 security on all properties</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('plots.index') }}"
                class="inline-block bg-white text-blue-600 px-8 md:px-10 py-3 md:py-4 rounded-lg font-bold hover:bg-blue-50 transition transform hover:scale-105">
                🔍 View Available Plots
            </a>
            <a href="{{ route('contact.show') }}"
                class="inline-block border-2 border-white text-white px-8 md:px-10 py-3 md:py-4 rounded-lg font-bold hover:bg-blue-700 transition transform hover:scale-105">
                📞 Schedule Site Visit
            </a>
        </div>
        <p class="text-blue-100 mt-6 text-sm md:text-base">📍 Lucknow • Affordable Pricing • 🏠 Bank Loan Available</p>
    </div>
</section>

<!-- Animations & Styles -->
<style>
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

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideLeft {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideRight {
        from {
            opacity: 0;
            transform: translateX(20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .animate-slide-down {
        animation: slideDown 0.6s ease-out forwards;
    }

    .animate-slide-up {
        animation: slideUp 0.6s ease-out forwards;
    }

    .animate-fade-in {
        animation: fadeIn 0.6s ease-in-out forwards;
        opacity: 0;
    }

    .animate-slide-left {
        animation: slideLeft 0.6s ease-out forwards;
        opacity: 0;
    }

    .animate-slide-right {
        animation: slideRight 0.6s ease-out forwards;
        opacity: 0;
    }
</style>
@endsection