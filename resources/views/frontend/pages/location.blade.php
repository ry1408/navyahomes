@extends('layouts.public')

@section('title', 'Location & Connectivity - Lucknow Ayodhya Ring Road')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 text-white py-16 md:py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-64 h-64 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-300 rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-8 animate-slide-down">
                <div class="inline-flex items-center gap-2 bg-white/10 text-blue-100 px-4 py-2 rounded-full text-sm uppercase tracking-widest mb-4">
                    📍 Prime Location
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 leading-tight">
                    30 फीट रोड पर प्लॉट उपलब्ध
                </h1>
                <p class="text-xl md:text-2xl text-blue-100 mb-6">लखनऊ अयोध्या रोड पर प्लॉट बुक करें</p>
                <div class="inline-flex items-center gap-3 bg-orange-500 text-white px-6 py-3 rounded-full text-lg font-bold animate-pulse">
                    🚗 हाईवे से सिर्फ 800 मीटर दूर
                </div>
            </div>

            <!-- Key Highlights Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-12 animate-slide-up">
                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20 hover:bg-white/20 transition">
                    <div class="text-4xl mb-3">🏠</div>
                    <h3 class="text-xl font-bold mb-2">Bank Loan Available</h3>
                    <p class="text-blue-100">Easy financing options</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20 hover:bg-white/20 transition">
                    <div class="text-4xl mb-3">🛣️</div>
                    <h3 class="text-xl font-bold mb-2">40 Feet Wide Entrance</h3>
                    <p class="text-blue-100">Premium road access</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20 hover:bg-white/20 transition">
                    <div class="text-4xl mb-3">💰</div>
                    <h3 class="text-xl font-bold mb-2">Special Offer</h3>
                    <p class="text-blue-100">₹1,499/sqft (Offer: ₹1,400/-)</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Project Location Details -->
    <section class="py-16 md:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 animate-slide-down">
                <div class="inline-flex items-center gap-2 bg-blue-100 text-blue-800 px-4 py-1.5 rounded-full text-xs uppercase tracking-widest mb-4">
                    Strategic Location
                </div>
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-900">Satrik Road Project Location</h2>
                <p class="text-lg text-gray-600">Satrik Road, Behind Shalimar Paradise, Ayodhya Road, Lucknow</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
                <!-- Map -->
                <div class="animate-fade-in">
                    <div class="bg-gray-100 rounded-xl overflow-hidden shadow-lg h-96 hover:shadow-2xl transition-shadow duration-300">
                        <iframe 
                            class="w-full h-full border-0" 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3560.5748676544373!2d81.02817!3d26.81234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399be37eb65ed7ef%3A0x6c3c5d0c1e3b5c5d!2sAyodhya%20Road%2C%20Lucknow!5e0!3m2!1sen!2sin!4v1707000000000" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <div class="mt-6 p-6 bg-gradient-to-r from-orange-50 to-orange-100 rounded-xl border-l-4 border-orange-500">
                        <h3 class="text-xl font-bold text-orange-900 mb-3 flex items-center gap-2">
                            <span class="text-2xl">🎯</span>
                            Exact Address
                        </h3>
                        <p class="text-gray-700 font-semibold mb-2">Satrik Road, Behind Shalimar Paradise</p>
                        <p class="text-gray-700">Ayodhya Road, Lucknow - 226025</p>
                        <div class="mt-4 flex gap-2">
                            <span class="px-3 py-1 bg-orange-200 text-orange-800 rounded-full text-sm font-bold">📞 +91 88588 80755</span>
                            <span class="px-3 py-1 bg-orange-200 text-orange-800 rounded-full text-sm font-bold">📞 +91 97943 80555</span>
                        </div>
                    </div>
                </div>

                <!-- Key Distances -->
                <!-- Key Distances -->
                <div class="space-y-4 animate-fade-in" style="animation-delay: 0.2s;">
                    <!-- Nearest Locations -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-xl border-l-4 border-blue-600 shadow-md hover:shadow-xl transition">
                        <h3 class="text-2xl font-bold text-blue-900 mb-4 flex items-center gap-2">
                            <span class="text-3xl">📍</span>
                            Nearest Locations
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between bg-white p-3 rounded-lg hover:translate-x-2 transition group">
                                <span class="flex items-center gap-3">
                                    <span class="text-2xl">🏛️</span>
                                    <span class="font-semibold text-gray-800">Mannat (Site Adjacent)</span>
                                </span>
                                <span class="px-3 py-1 bg-green-500 text-white rounded-full text-sm font-bold">00 Mtr</span>
                            </div>
                            <div class="flex items-center justify-between bg-white p-3 rounded-lg hover:translate-x-2 transition group">
                                <span class="flex items-center gap-3">
                                    <span class="text-2xl">🏢</span>
                                    <span class="font-semibold text-gray-800">Shalimar Paradise</span>
                                </span>
                                <span class="px-3 py-1 bg-green-500 text-white rounded-full text-sm font-bold">00 Mtr</span>
                            </div>
                            <div class="flex items-center justify-between bg-white p-3 rounded-lg hover:translate-x-2 transition group">
                                <span class="flex items-center gap-3">
                                    <span class="text-2xl">🛣️</span>
                                    <span class="font-semibold text-gray-800">Lucknow-Ayodhya Highway</span>
                                </span>
                                <span class="px-3 py-1 bg-orange-500 text-white rounded-full text-sm font-bold">800 Mtr</span>
                            </div>
                        </div>
                    </div>

                    <!-- Major City Landmarks -->
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-xl border-l-4 border-purple-600 shadow-md hover:shadow-xl transition">
                        <h3 class="text-2xl font-bold text-purple-900 mb-4 flex items-center gap-2">
                            <span class="text-3xl">🏙️</span>
                            Distance from Major Locations
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between bg-white p-3 rounded-lg hover:translate-x-2 transition">
                                <span class="flex items-center gap-3">
                                    <span class="text-2xl">🏛️</span>
                                    <span class="font-semibold text-gray-800">Gomti Nagar</span>
                                </span>
                                <span class="px-3 py-1 bg-purple-500 text-white rounded-full text-sm font-bold">15 KM</span>
                            </div>
                            <div class="flex items-center justify-between bg-white p-3 rounded-lg hover:translate-x-2 transition">
                                <span class="flex items-center gap-3">
                                    <span class="text-2xl">🏛️</span>
                                    <span class="font-semibold text-gray-800">Hazratganj</span>
                                </span>
                                <span class="px-3 py-1 bg-purple-500 text-white rounded-full text-sm font-bold">18 KM</span>
                            </div>
                            <div class="flex items-center justify-between bg-white p-3 rounded-lg hover:translate-x-2 transition">
                                <span class="flex items-center gap-3">
                                    <span class="text-2xl">🚉</span>
                                    <span class="font-semibold text-gray-800">Lucknow Railway Station</span>
                                </span>
                                <span class="px-3 py-1 bg-purple-500 text-white rounded-full text-sm font-bold">22 KM</span>
                            </div>
                            <div class="flex items-center justify-between bg-white p-3 rounded-lg hover:translate-x-2 transition">
                                <span class="flex items-center gap-3">
                                    <span class="text-2xl">✈️</span>
                                    <span class="font-semibold text-gray-800">Chaudhary Charan Singh Airport</span>
                                </span>
                                <span class="px-3 py-1 bg-purple-500 text-white rounded-full text-sm font-bold">28 KM</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Educational Institutions -->
    <section class="py-16 md:py-20 bg-gradient-to-b from-gray-50 to-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 animate-slide-down">
                <div class="inline-flex items-center gap-2 bg-green-100 text-green-800 px-4 py-1.5 rounded-full text-xs uppercase tracking-widest mb-4">
                    Education Hub
                </div>
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-900">Top Educational Institutions Nearby</h2>
                <p class="text-lg text-gray-600">Premium schools and colleges within easy reach</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="group bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all border-t-4 border-red-500 animate-fade-in">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">🏥</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Hind Medical College</h3>
                    <p class="text-gray-600 mb-3">Premier medical institution</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Distance:</span>
                        <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm font-bold">1 KM</span>
                    </div>
                </div>

                <div class="group bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all border-t-4 border-blue-500 animate-fade-in" style="animation-delay: 0.1s;">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">🎓</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">CMS College</h3>
                    <p class="text-gray-600 mb-3">Renowned educational institution</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Distance:</span>
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-bold">3 KM</span>
                    </div>
                </div>

                <div class="group bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all border-t-4 border-green-500 animate-fade-in" style="animation-delay: 0.2s;">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">🏫</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Jaipuria School</h3>
                    <p class="text-gray-600 mb-3">Top CBSE school</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Distance:</span>
                        <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-bold">3 KM</span>
                    </div>
                </div>

                <div class="group bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all border-t-4 border-orange-500 animate-fade-in" style="animation-delay: 0.3s;">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">🎓</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Goel College</h3>
                    <p class="text-gray-600 mb-3">Quality higher education</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Distance:</span>
                        <span class="px-3 py-1 bg-orange-100 text-orange-800 rounded-full text-sm font-bold">3 KM</span>
                    </div>
                </div>
            </div>

            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="group bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all border-t-4 border-purple-500 animate-fade-in" style="animation-delay: 0.4s;">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">🏛️</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">BBD College</h3>
                    <p class="text-gray-600 mb-3">Prestigious degree college</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Distance:</span>
                        <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm font-bold">4 KM</span>
                    </div>
                </div>

                <div class="group bg-gradient-to-br from-blue-500 to-blue-700 p-6 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all text-white animate-fade-in" style="animation-delay: 0.5s;">
                    <div class="text-5xl mb-4">🎯</div>
                    <h3 class="text-xl font-bold mb-2">Perfect for Families</h3>
                    <p class="text-blue-100 mb-3">All major educational institutions within 1-4 KM radius</p>
                    <div class="text-sm opacity-90">Quality education at your doorstep</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Amenities Section -->
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
    </style>

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
    </style>

    <!-- CTA Section -->
    <section class="py-16 md:py-20 bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-300 rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-3xl md:text-5xl font-bold mb-4">Book Your Site Visit Today!</h2>
            <p class="text-xl md:text-2xl mb-8 text-blue-100">Experience the location advantage personally</p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-4 mb-8">
                <a href="tel:+918858880755" class="inline-flex items-center justify-center gap-2 bg-white text-blue-600 px-8 py-4 rounded-lg font-bold text-lg hover:bg-blue-50 transition transform hover:scale-105 shadow-xl">
                    📞 +91 88588 80755
                </a>
                <a href="tel:+919794380555" class="inline-flex items-center justify-center gap-2 bg-white text-blue-600 px-8 py-4 rounded-lg font-bold text-lg hover:bg-blue-50 transition transform hover:scale-105 shadow-xl">
                    📞 +91 97943 80555
                </a>
            </div>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="https://wa.me/918858880755" target="_blank" class="inline-flex items-center justify-center gap-2 bg-green-500 text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-green-600 transition transform hover:scale-105 shadow-xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-5.031 1.378c-3.055 2.116-4.687 5.744-3.653 8.997 1.034 3.252 4.032 5.575 7.46 5.575h.005c2.305 0 4.543-.541 6.58-1.55l.996-.658 3.862 1.013-.983-3.264.657-.994c1.074-2.093 1.637-4.383 1.637-6.794 0-5.745-4.684-10.417-10.441-10.417"/></svg>
                    WhatsApp Inquiry
                </a>
                <a href="{{ route('contact.show') }}" class="inline-flex items-center justify-center gap-2 border-2 border-white text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-white hover:text-blue-600 transition transform hover:scale-105">
                    📧 Send Message
                </a>
            </div>

            <div class="mt-8 pt-8 border-t border-white/20">
                <p class="text-blue-100 mb-2">📍 Satrik Road, Behind Shalimar Paradise, Ayodhya Road, Lucknow</p>
                <p class="text-white font-semibold">Visit us: Mon-Sat (9 AM - 6 PM) | Sunday (10 AM - 5 PM)</p>
            </div>
        </div>
    </section>
@endsection
