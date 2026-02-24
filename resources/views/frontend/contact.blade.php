@extends('layouts.public')

@section('title', 'Contact Us - NavyaHomes')

@section('content')
<style>
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
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

    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-15px);
        }
    }

    @keyframes pulse-glow {
        0%, 100% {
            box-shadow: 0 0 10px rgba(59, 130, 246, 0.3);
        }
        50% {
            box-shadow: 0 0 25px rgba(59, 130, 246, 0.6);
        }
    }

    @keyframes scale-in {
        from {
            transform: scale(0.8);
            opacity: 0;
        }
        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    @keyframes shimmer {
        0% {
            background-position: -1000px 0;
        }
        100% {
            background-position: 1000px 0;
        }
    }

    .animate-slide-down {
        animation: slideDown 0.8s ease-out forwards;
    }

    .animate-slide-up {
        animation: slideUp 0.8s ease-out forwards;
    }

    .animate-slide-left {
        animation: slideLeft 0.8s ease-out forwards;
    }

    .animate-slide-right {
        animation: slideRight 0.8s ease-out forwards;
    }

    .animate-fade-in {
        animation: fadeIn 0.8s ease-out forwards;
        opacity: 0;
    }

    .animate-float {
        animation: float 3s ease-in-out infinite;
    }

    .animate-scale-in {
        animation: scale-in 0.6s ease-out forwards;
    }

    .card-hover {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .card-hover:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .input-focus {
        transition: all 0.3s ease;
    }

    .input-focus:focus {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.3);
    }

    .btn-hover {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .btn-hover::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }

    .btn-hover:hover::before {
        left: 100%;
    }

    .btn-hover:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px -10px rgba(0, 0, 0, 0.4);
    }

    .icon-bounce:hover {
        animation: float 0.6s ease-in-out;
    }

    .gradient-text {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-pattern {
        background-image: 
            radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
    }
</style>

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 text-white py-20 md:py-32 overflow-hidden hero-pattern">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-10 left-10 w-64 h-64 bg-white rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-blue-300 rounded-full blur-3xl animate-float" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-purple-300 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center">
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm px-6 py-2 rounded-full text-sm uppercase tracking-widest mb-6 animate-scale-in border border-white/20">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                We're Online
            </div>
            <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-slide-down leading-tight">
                Let's Connect
            </h1>
            <p class="text-xl md:text-2xl text-blue-100 mb-8 animate-slide-up max-w-3xl mx-auto leading-relaxed">
                Ready to find your dream plot? Our team is here to help you every step of the way
            </p>
            <div class="flex flex-wrap justify-center gap-4 animate-fade-in" style="animation-delay: 0.3s;">
                <a href="tel:+918858880755" class="inline-flex items-center gap-2 bg-white text-blue-600 px-8 py-4 rounded-full font-bold hover:bg-blue-50 transition transform hover:scale-105 shadow-xl">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/></svg>
                    Call Now
                </a>
                <a href="https://wa.me/918858880755" target="_blank" class="inline-flex items-center gap-2 bg-green-500 text-white px-8 py-4 rounded-full font-bold hover:bg-green-600 transition transform hover:scale-105 shadow-xl">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-5.031 1.378c-3.055 2.116-4.687 5.744-3.653 8.997 1.034 3.252 4.032 5.575 7.46 5.575h.005c2.305 0 4.543-.541 6.58-1.55l.996-.658 3.862 1.013-.983-3.264.657-.994c1.074-2.093 1.637-4.383 1.637-6.794 0-5.745-4.684-10.417-10.441-10.417"/></svg>
                    WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-16 md:py-24 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16 animate-slide-down">
            <div class="inline-flex items-center gap-2 bg-blue-100 text-blue-800 px-4 py-1.5 rounded-full text-xs uppercase tracking-widest mb-4">
                Get In Touch
            </div>
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900">We're Here to Help</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Fill out the form below and our team will get back to you within 24 hours</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-12">
            <!-- Contact Form -->
            <div class="lg:col-span-3 bg-white rounded-2xl shadow-2xl p-8 md:p-10 animate-slide-left border border-gray-100">
                <div class="mb-8">
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Send us a Message</h3>
                    <p class="text-gray-600">We'd love to hear from you. Drop us a line!</p>
                </div>

                @if ($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 rounded-lg p-5 animate-scale-in">
                    <div class="flex items-start gap-3">
                        <div class="text-2xl">⚠️</div>
                        <div>
                            <p class="text-red-800 font-bold mb-2">Please fix the following errors:</p>
                            <ul class="text-red-700 list-disc list-inside space-y-1 text-sm">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endif

                @if (session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 rounded-lg p-5 animate-scale-in">
                    <div class="flex items-center gap-3">
                        <div class="text-2xl">✓</div>
                        <p class="text-green-800 font-bold">{{ session('success') }}</p>
                    </div>
                </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div class="animate-fade-in" style="animation-delay: 0.1s;">
                            <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Full Name *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-300 input-focus @error('name') border-red-400 @enderror"
                                placeholder="John Doe">
                            @error('name')
                            <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                <span>⚠</span>{{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="animate-fade-in" style="animation-delay: 0.15s;">
                            <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email Address *</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-300 input-focus @error('email') border-red-400 @enderror"
                                placeholder="john@example.com">
                            @error('email')
                            <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                <span>⚠</span>{{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Phone -->
                        <div class="animate-fade-in" style="animation-delay: 0.2s;">
                            <label for="phone" class="block text-sm font-bold text-gray-700 mb-2">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required
                                class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-300 input-focus @error('phone') border-red-400 @enderror"
                                placeholder="+91-XXXXX-XXXXX">
                            @error('phone')
                            <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                <span>⚠</span>{{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Subject -->
                        <div class="animate-fade-in" style="animation-delay: 0.25s;">
                            <label for="subject" class="block text-sm font-bold text-gray-700 mb-2">Subject *</label>
                            <select id="subject" name="subject" required
                                class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-300 input-focus @error('subject') border-red-400 @enderror">
                                <option value="">Select subject...</option>
                                <option value="plot_inquiry" {{ old('subject')=='plot_inquiry' ? 'selected' : '' }}>🏘️ Plot Inquiry</option>
                                <option value="project_info" {{ old('subject')=='project_info' ? 'selected' : '' }}>📋 Project Information</option>
                                <option value="site_visit" {{ old('subject')=='site_visit' ? 'selected' : '' }}>🚗 Schedule Site Visit</option>
                                <option value="financing" {{ old('subject')=='financing' ? 'selected' : '' }}>💰 Financing Inquiry</option>
                                <option value="other" {{ old('subject')=='other' ? 'selected' : '' }}>💬 Other</option>
                            </select>
                            @error('subject')
                            <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                <span>⚠</span>{{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="animate-fade-in" style="animation-delay: 0.3s;">
                        <label for="message" class="block text-sm font-bold text-gray-700 mb-2">Your Message *</label>
                        <textarea id="message" name="message" rows="6" required
                            class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-300 resize-none input-focus @error('message') border-red-400 @enderror"
                            placeholder="Tell us more about your requirements...">{{ old('message') }}</textarea>
                        @error('message')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                            <span>⚠</span>{{ $message }}
                        </p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="animate-fade-in" style="animation-delay: 0.35s;">
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-5 rounded-xl font-bold text-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-300 btn-hover shadow-lg flex items-center justify-center gap-2">
                            <span>Send Message</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="lg:col-span-2 space-y-5 animate-slide-right">
                <!-- Phone -->
                <div class="group bg-white rounded-2xl shadow-lg p-6 border-2 border-blue-100 hover:border-blue-400 hover:shadow-2xl transition-all duration-300 card-hover animate-fade-in">
                    <div class="flex items-start gap-5">
                        <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center text-2xl icon-bounce group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            ☎️
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold mb-2 text-gray-900 group-hover:text-blue-600 transition-colors">Call Us Now</h3>
                            <p class="text-sm text-gray-600 mb-3">Available 24/7 for support & queries</p>
                            <div class="space-y-2">
                                <a href="tel:+918858880755" class="flex items-center gap-2 text-blue-600 hover:text-blue-800 font-semibold transition">
                                    <span class="text-sm">📞</span>
                                    <span>+91 88588 80755</span>
                                </a>
                                <a href="tel:+919794380555" class="flex items-center gap-2 text-blue-600 hover:text-blue-800 font-semibold transition">
                                    <span class="text-sm">📱</span>
                                    <span>+91 97943 80555</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- WhatsApp -->
                <div class="group bg-white rounded-2xl shadow-lg p-6 border-2 border-green-100 hover:border-green-400 hover:shadow-2xl transition-all duration-300 card-hover animate-fade-in" style="animation-delay: 0.1s;">
                    <div class="flex items-start gap-5">
                        <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center text-2xl icon-bounce group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            💬
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold mb-2 text-gray-900 group-hover:text-green-600 transition-colors">WhatsApp Chat</h3>
                            <p class="text-sm text-gray-600 mb-3">Get instant responses on WhatsApp</p>
                            <div class="flex flex-col gap-2">
                                <a href="https://wa.me/918858880755?text=Hi%20NavyaHomes%2C%20I%20am%20interested%20in%20your%20plots"
                                    target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center justify-center gap-2 bg-green-500 text-white px-5 py-2.5 rounded-lg font-bold hover:bg-green-600 transition-all transform hover:scale-105 shadow-md">
                                    <span>💬</span> <span>Chat Now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="group bg-white rounded-2xl shadow-lg p-6 border-2 border-purple-100 hover:border-purple-400 hover:shadow-2xl transition-all duration-300 card-hover animate-fade-in" style="animation-delay: 0.2s;">
                    <div class="flex items-start gap-5">
                        <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center text-2xl icon-bounce group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            ✉️
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold mb-2 text-gray-900 group-hover:text-purple-600 transition-colors">Email Us</h3>
                            <p class="text-sm text-gray-600 mb-3">Response within 2 hours</p>
                            <div class="space-y-2">
                                <a href="mailto:info@navyahomes.com" class="flex items-center gap-2 text-purple-600 hover:text-purple-800 font-semibold transition">
                                    <span class="text-sm">📧</span>
                                    <span class="text-sm">info@navyahomes.com</span>
                                </a>
                                <a href="mailto:sales@navyahomes.com" class="flex items-center gap-2 text-purple-600 hover:text-purple-800 font-semibold transition">
                                    <span class="text-sm">💼</span>
                                    <span class="text-sm">sales@navyahomes.com</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Office -->
                <div class="group bg-white rounded-2xl shadow-lg p-6 border-2 border-orange-100 hover:border-orange-400 hover:shadow-2xl transition-all duration-300 card-hover animate-fade-in" style="animation-delay: 0.3s;">
                    <div class="flex items-start gap-5">
                        <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center text-2xl icon-bounce group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            📍
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold mb-2 text-gray-900 group-hover:text-orange-600 transition-colors">Visit Our Office</h3>
                            <p class="text-sm text-gray-700 mb-1 font-semibold">Satrik Road, Behind Shalimar Paradise</p>
                            <p class="text-sm text-gray-700 mb-1">Ayodhya Road, Lucknow</p>
                            <p class="text-sm text-gray-700 mb-3">Uttar Pradesh, India</p>
                            <a href="https://maps.google.com/maps?q=Lucknow+Ayodhya+Road" target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 bg-orange-500 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-orange-600 transition-all transform hover:scale-105 shadow-md mb-3">
                                <span>📍</span> <span>View on Maps</span>
                            </a>
                            <div class="text-xs text-gray-600 space-y-1 mt-2 border-t pt-3">
                                <p class="font-bold text-gray-700">Office Hours:</p>
                                <p>Mon-Fri: 9:00 AM - 6:00 PM</p>
                                <p>Sat: 10:00 AM - 2:00 PM</p>
                                <p>Sun: Closed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="bg-gradient-to-b from-white to-gray-50 py-16 md:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16 animate-slide-down">
            <div class="inline-flex items-center gap-2 bg-blue-100 text-blue-800 px-4 py-1.5 rounded-full text-xs uppercase tracking-widest mb-4">
                FAQ
            </div>
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900">Frequently Asked Questions</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Quick answers to common questions about our plots and services</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
            <div class="group bg-white rounded-2xl shadow-lg p-7 border-2 border-blue-100 hover:border-blue-400 hover:shadow-2xl transition-all duration-300 card-hover animate-fade-in">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-2xl group-hover:scale-110 transition-transform duration-300">
                        ❓
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-2 text-gray-900 group-hover:text-blue-600 transition-colors">What is the minimum plot size?</h3>
                        <p class="text-gray-600 text-sm">Our plots range from 1125 sqft to 2250 sqft, perfect for residential construction and investment purposes.</p>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-2xl shadow-lg p-7 border-2 border-green-100 hover:border-green-400 hover:shadow-2xl transition-all duration-300 card-hover animate-fade-in" style="animation-delay: 0.1s;">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-2xl group-hover:scale-110 transition-transform duration-300">
                        💰
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-2 text-gray-900 group-hover:text-green-600 transition-colors">Do you offer financing options?</h3>
                        <p class="text-gray-600 text-sm">Yes, we provide flexible payment plans with easy installments. Contact us for customized financing solutions.</p>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-2xl shadow-lg p-7 border-2 border-purple-100 hover:border-purple-400 hover:shadow-2xl transition-all duration-300 card-hover animate-fade-in" style="animation-delay: 0.2s;">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-2xl group-hover:scale-110 transition-transform duration-300">
                        🏘️
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-2 text-gray-900 group-hover:text-purple-600 transition-colors">Can I book a site visit?</h3>
                        <p class="text-gray-600 text-sm">Absolutely! Contact us via phone, WhatsApp, or the form above to schedule a free site visit at your convenience.</p>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-2xl shadow-lg p-7 border-2 border-orange-100 hover:border-orange-400 hover:shadow-2xl transition-all duration-300 card-hover animate-fade-in" style="animation-delay: 0.3s;">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center text-2xl group-hover:scale-110 transition-transform duration-300">
                        📄
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-2 text-gray-900 group-hover:text-orange-600 transition-colors">What is your transfer process?</h3>
                        <p class="text-gray-600 text-sm">We handle all legal documentation with complete transparency and facilitate smooth transfers through authorized registrars.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map -->
<section class="py-16 md:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12 animate-slide-down">
            <div class="inline-flex items-center gap-2 bg-blue-100 text-blue-800 px-4 py-1.5 rounded-full text-xs uppercase tracking-widest mb-4">
                Find Us
            </div>
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900">Visit Our Office in Lucknow</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Located on Ayodhya Road, we're easily accessible and ready to assist you</p>
        </div>
        <div class="relative group animate-fade-in">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-500 rounded-3xl transform translate-x-2 translate-y-2 group-hover:translate-x-3 group-hover:translate-y-3 transition-transform duration-300"></div>
            <div class="relative bg-white rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                <iframe class="w-full h-96 md:h-[500px] border-0"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.5449999999996!2d80.8856!3d26.8667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1sAyodhya%20Road%2C%20Lucknow!2sIndia!5e0!3m2!1sen!2s!4v1611234567890"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <!-- CTA Bar -->
        <div class="mt-12 bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 md:p-10 text-center animate-scale-in shadow-2xl">
            <h3 class="text-2xl md:text-3xl font-bold text-white mb-3">Ready to Start Your Journey?</h3>
            <p class="text-blue-100 mb-6 text-lg">Get in touch with us today and let's make your dream home a reality</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="tel:+918858880755" class="inline-flex items-center gap-2 bg-white text-blue-600 px-8 py-4 rounded-full font-bold hover:bg-blue-50 transition transform hover:scale-105 shadow-xl">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/></svg>
                    Call +91 88588 80755
                </a>
                <a href="https://wa.me/918858880755" target="_blank" class="inline-flex items-center gap-2 bg-green-500 text-white px-8 py-4 rounded-full font-bold hover:bg-green-600 transition transform hover:scale-105 shadow-xl">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-5.031 1.378c-3.055 2.116-4.687 5.744-3.653 8.997 1.034 3.252 4.032 5.575 7.46 5.575h.005c2.305 0 4.543-.541 6.58-1.55l.996-.658 3.862 1.013-.983-3.264.657-.994c1.074-2.093 1.637-4.383 1.637-6.794 0-5.745-4.684-10.417-10.441-10.417"/></svg>
                    WhatsApp Now
                </a>
            </div>
        </div>
    </div>
</section>
@endsection