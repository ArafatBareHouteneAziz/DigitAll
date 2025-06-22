<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="DigitAll - Innovative Tech Solutions for a Sustainable Future">
        <title>{{ config('app.name', 'DigitAll') }} - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        
        <!-- Scripts and Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Alpine.js -->
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="font-sans antialiased bg-neutral-50 text-neutral-900">
        <!-- Header -->
        <header class="bg-white/80 backdrop-blur-xl fixed w-full top-0 z-50 border-b border-neutral-200/50 shadow-soft">
            <nav class="container mx-auto px-6 py-4" x-data="{ isOpen: false }">
                <div class="flex justify-between items-center">
                    <!-- Logo -->
                    <a href="/" class="flex items-center space-x-3 group">
                        <div class="relative">
                            <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl flex items-center justify-center shadow-glow group-hover:shadow-glow/80 transition-all duration-300">
                                <svg class="w-6 h-6 text-white" fill="white" stroke="currentColor" viewBox="0 0 375 350">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="m200 0a175 175 0 0 1 0 350h-50-100v-150h50v-50h50v100h50a75 75 0 0 0 0-150h-100v-50h50v-50m-50 50v-50h-50v50m0 0h-50v50h50m0 0v50h50v-50m0 0"/>
                                </svg>
                            </div>
                            <div class="absolute -inset-1 bg-gradient-to-r from-primary-400 to-secondary-400 rounded-xl blur opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                        </div>
                        <div>
                            <span class="text-2xl font-bold bg-gradient-to-r from-neutral-900 to-neutral-700 bg-clip-text text-transparent">Digit</span>
                            <span class="text-2xl font-bold bg-gradient-to-r from-primary-600 to-secondary-600 bg-clip-text text-transparent">All</span>
                        </div>
                    </a>

                    <!-- Desktop Navigation -->
                    <div class="hidden lg:flex items-center space-x-8">
                        <a href="/about" class="text-neutral-600 hover:text-primary-600 font-medium transition-all duration-200 relative group">
                            About Us
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-primary-500 to-secondary-500 group-hover:w-full transition-all duration-300"></span>
                        </a>
                        <a href="/services" class="text-neutral-600 hover:text-primary-600 font-medium transition-all duration-200 relative group">
                            Services
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-primary-500 to-secondary-500 group-hover:w-full transition-all duration-300"></span>
                        </a>
                        <a href="/blog" class="text-neutral-600 hover:text-primary-600 font-medium transition-all duration-200 relative group">
                            Blog/Insights
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-primary-500 to-secondary-500 group-hover:w-full transition-all duration-300"></span>
                        </a>
                        <a href="/contact" class="bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white px-6 py-3 rounded-xl font-medium transition-all duration-200 shadow-medium hover:shadow-large transform hover:-translate-y-0.5">
                            Get Started
                        </a>
                    </div>

                    <!-- Mobile menu button -->
                    <button @click="isOpen = !isOpen" class="lg:hidden text-neutral-600 hover:text-primary-600 transition-colors duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path x-show="isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Mobile Navigation -->
                <div x-show="isOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-2" class="lg:hidden mt-6 bg-white/95 backdrop-blur-xl rounded-2xl shadow-large border border-neutral-200/50 p-6">
                    <div class="space-y-4">
                        <a href="/about" class="block py-3 text-neutral-600 hover:text-primary-600 font-medium transition-colors duration-200">About Us</a>
                        <a href="/services" class="block py-3 text-neutral-600 hover:text-primary-600 font-medium transition-colors duration-200">Services</a>
                        <a href="/blog" class="block py-3 text-neutral-600 hover:text-primary-600 font-medium transition-colors duration-200">Blog/Insights</a>
                        <a href="/contact" class="block py-3 text-primary-600 font-medium">Contact</a>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Main Content -->
        <main class="pt-20">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gradient-to-br from-neutral-900 via-neutral-800 to-neutral-900 text-white relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
            
            <div class="container mx-auto px-6 py-16 relative">
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
                    <!-- Company Info -->
                    <div class="lg:col-span-2">
                        <div class="flex items-center space-x-3 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-secondary-500 rounded-xl flex items-center justify-center shadow-glow">
                                <svg class="w-7 h-7 text-white" fill="white" stroke="currentColor" viewBox="0 0 375 350">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="m200 0a175 175 0 0 1 0 350h-50-100v-150h50v-50h50v100h50a75 75 0 0 0 0-150h-100v-50h50v-50m-50 50v-50h-50v50m0 0h-50v50h50m0 0v50h50v-50m0 0"/>
                                </svg>
                            </div>
                            <div>
                                <span class="text-3xl font-bold text-white">Digit</span>
                                <span class="text-3xl font-bold bg-gradient-to-r from-primary-400 to-secondary-400 bg-clip-text text-transparent">All</span>
                            </div>
                        </div>
                        <p class="text-neutral-300 text-lg mb-8 leading-relaxed">
                            Pioneering innovative technology solutions that drive sustainable progress and create a better future for all.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-neutral-800 hover:bg-primary-600 rounded-xl flex items-center justify-center transition-all duration-200 group">
                                <svg class="w-5 h-5 text-neutral-400 group-hover:text-white transition-colors duration-200" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-neutral-800 hover:bg-primary-600 rounded-xl flex items-center justify-center transition-all duration-200 group">
                                <svg class="w-5 h-5 text-neutral-400 group-hover:text-white transition-colors duration-200" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-xl font-semibold mb-6 text-white">Quick Links</h3>
                        <ul class="space-y-3">
                            <li><a href="/" class="text-neutral-300 hover:text-white transition-colors duration-200 hover:translate-x-1 transform inline-block">Home</a></li>
                            <li><a href="/about" class="text-neutral-300 hover:text-white transition-colors duration-200 hover:translate-x-1 transform inline-block">About Us</a></li>
                            <li><a href="/services" class="text-neutral-300 hover:text-white transition-colors duration-200 hover:translate-x-1 transform inline-block">Services</a></li>
                            <li><a href="/blog" class="text-neutral-300 hover:text-white transition-colors duration-200 hover:translate-x-1 transform inline-block">Blog/Insights</a></li>
                            <li><a href="/contact" class="text-neutral-300 hover:text-white transition-colors duration-200 hover:translate-x-1 transform inline-block">Contact</a></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <h3 class="text-xl font-semibold mb-6 text-white">Get in Touch</h3>
                        <ul class="space-y-3">
                            <li class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <a href="mailto:info@digitall.com" class="text-neutral-300 hover:text-white transition-colors duration-200">info@digitall.com</a>
                            </li>
                            <li class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                </svg>
                                <a href="https://www.digitall.com" class="text-neutral-300 hover:text-white transition-colors duration-200">www.digitall.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="mt-12 pt-8 border-t border-neutral-700">
                    <div class="flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0">
                        <p class="text-neutral-400">&copy; 2025 DigitAll. All rights reserved.</p>
                        <div class="flex space-x-6">
                            <span class="text-sm text-neutral-400">#InnovationMeetsSustainability</span>
                            <span class="text-sm text-neutral-400">#FutureOfTech</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
