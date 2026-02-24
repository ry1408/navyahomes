<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'NavyaHomes - Premium Real Estate')</title>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-gray-900">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">
                        🏠 NavyaHomes
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 transition">Home</a>
                    <a href="{{ route('projects.index') }}"
                        class="text-gray-700 hover:text-blue-600 transition">Projects</a>
                    <a href="{{ route('plots.index') }}" class="text-gray-700 hover:text-blue-600 transition">Plots</a>
                    <a href="{{ route('location') }}" class="text-gray-700 hover:text-blue-600 transition">Location</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600 transition">About</a>
                    <a href="{{ route('contact.show') }}"
                        class="text-gray-700 hover:text-blue-600 transition">Contact</a>
                </div>

                <!-- CTA Buttons -->
                <div class="flex items-center space-x-4">
                    @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-blue-600">Logout</button>
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">Login</a>
                    <a href="{{ route('register') }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Register</a>
                    @endauth

                    <a href="https://wa.me/92333XXXXXXX" target="_blank"
                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-5.031 1.378c-3.055 2.2-4.982 5.973-4.982 10.102 0 1.394.192 2.769.56 4.083l.744 2.601 2.976-1.1c1.202.664 2.555 1.014 3.861 1.014h.004c5.487 0 9.963-4.441 9.963-9.931 0-2.65-.967-5.14-2.716-7.072-1.749-1.932-4.068-2.994-6.517-2.994" />
                        </svg>
                        WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <!-- About -->
                <div>
                    <h3 class="text-lg font-bold mb-4">NavyaHomes</h3>
                    <p class="text-gray-400">Premium real estate solutions for modern living</p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-bold mb-4 text-blue-200">Quick Links</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>
                            <a href="{{ route('home') }}" class="group flex items-center gap-2 hover:text-white transition">
                                <span class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></span>
                                <span class="group-hover:text-blue-200">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('projects.index') }}" class="group flex items-center gap-2 hover:text-white transition">
                                <span class="w-2 h-2 rounded-full bg-indigo-500 animate-pulse"></span>
                                <span class="group-hover:text-blue-200">Projects</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('plots.index') }}" class="group flex items-center gap-2 hover:text-white transition">
                                <span class="w-2 h-2 rounded-full bg-sky-500 animate-pulse"></span>
                                <span class="group-hover:text-blue-200">Plots</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="group flex items-center gap-2 hover:text-white transition">
                                <span class="w-2 h-2 rounded-full bg-cyan-500 animate-pulse"></span>
                                <span class="group-hover:text-blue-200">About</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-bold mb-4">Contact Info</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>📞 +92 (300) XXX-XXXX</li>
                        <li>📧 info@navyahomes.com</li>
                        <li>📍 Office: Satrik Road, Behind Shalimar Paradise, Ayodhya Road, Lucknow</li>
                    </ul>
                </div>

                <!-- Follow Us -->
                <div>
                    <h4 class="text-lg font-bold mb-4 text-blue-200">Follow Us</h4>
                    <div class="flex flex-col space-y-2">
                        <a href="#" class="text-gray-400 hover:text-white transition flex items-center gap-2 group">
                            <span class="w-2 h-2 rounded-full bg-blue-500 group-hover:animate-pulse"></span>
                            <span class="group-hover:text-blue-200">Facebook</span>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition flex items-center gap-2 group">
                            <span class="w-2 h-2 rounded-full bg-pink-500 group-hover:animate-pulse"></span>
                            <span class="group-hover:text-blue-200">Instagram</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <p>&copy; 2026 NavyaHomes. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Initialize Swiper
        const swiper = new Swiper('.projectGallery', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            spaceBetween: 10,
            effect: 'fade',
            fadeEffect: {
                crossFade: true,
            },
            speed: 1000,
        });
    </script>
</body>

</html>