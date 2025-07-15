@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/modern/hero-bg.jpg') }}" alt="Tech Innovation" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-br from-neutral-900/80 via-neutral-900/70 to-primary-900/60"></div>
            <div class="absolute inset-0 bg-hero-pattern opacity-10"></div>
        </div>
        
        <!-- Floating Elements -->
        <div class="absolute inset-0 z-10 overflow-hidden">
            <div class="absolute top-20 left-10 w-20 h-20 bg-primary-500/20 rounded-full blur-xl animate-float"></div>
            <div class="absolute top-40 right-20 w-32 h-32 bg-secondary-500/20 rounded-full blur-xl animate-float" style="animation-delay: 2s;"></div>
            <div class="absolute bottom-40 left-20 w-24 h-24 bg-tertiary-500/20 rounded-full blur-xl animate-float" style="animation-delay: 4s;"></div>
        </div>

        <!-- Content -->
        <div class="container mx-auto px-6 relative z-20">
            <div class="max-w-4xl mx-auto text-center">
                <div class="animate-fade-in">
                    <span class="inline-block bg-white/10 backdrop-blur-xl text-white px-6 py-3 rounded-full text-sm font-medium mb-8 border border-white/20">
                        🚀 {{ __('Innovation Meets Sustainability') }}
                    </span>
                </div>
                
                <div class="animate-slide-up" style="animation-delay: 0.2s;">
                    <h1 class="text-5xl md:text-7xl font-bold mb-8 text-white leading-tight">
                        {{ __('Transforming Ideas into') }} 
                        <span class="bg-gradient-to-r from-primary-400 via-secondary-400 to-tertiary-400 bg-clip-text text-transparent">
                            {{ __('Digital Reality') }}
                        </span>
                    </h1>
                </div>
                
                <div class="animate-slide-up" style="animation-delay: 0.4s;">
                    <p class="text-xl md:text-2xl mb-12 text-neutral-200 leading-relaxed max-w-3xl mx-auto">
                        {{ __('Where innovation meets sustainability. We create cutting-edge technology solutions that drive progress while protecting our planet.') }}
                    </p>
                </div>
                
                <div class="animate-slide-up flex flex-col sm:flex-row gap-6 justify-center items-center" style="animation-delay: 0.6s;">
                    <a href="/services" class="group bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-glow hover:shadow-glow/80 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                        <span>{{ __('Explore Solutions') }}</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="/contact" class="group bg-white/10 backdrop-blur-xl hover:bg-white/20 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 border border-white/20 hover:border-white/40 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                        <span>{{ __('Start Your Project') }}</span>
                        <svg class="w-5 h-5 group-hover:rotate-45 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="text-center mb-20">
                <span class="inline-block bg-gradient-to-r from-primary-50 to-secondary-50 text-primary-600 px-6 py-3 rounded-full text-sm font-semibold mb-6 border border-primary-100">
                    🎯 {{ __('Our Approach') }}
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-neutral-900 mb-6">
                    {{ __('Where Innovation Meets') }} 
                    <span class="bg-gradient-to-r from-primary-600 to-secondary-600 bg-clip-text text-transparent">
                        {{ __('Responsibility') }}
                    </span>
                </h2>
                <p class="text-xl text-neutral-600 max-w-3xl mx-auto">
                    {{ __('We combine cutting-edge technology with environmental consciousness to create solutions that matter.') }}
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Innovation -->
                <div class="group bg-white rounded-2xl p-8 shadow-soft hover:shadow-large border border-neutral-100 hover:border-primary-200 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-6 group-hover:shadow-glow transition-all duration-300">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-neutral-900">{{ __('Innovation First') }}</h3>
                    <p class="text-neutral-600">{{ __('Pioneering solutions that keep you ahead in the digital age.') }}</p>
                </div>

                <!-- Environmental Focus -->
                <div class="group bg-white rounded-2xl p-8 shadow-soft hover:shadow-large border border-neutral-100 hover:border-secondary-200 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-secondary-50 to-secondary-100 rounded-2xl flex items-center justify-center mb-6 group-hover:shadow-glow-green transition-all duration-300">
                        <svg class="w-8 h-8 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-neutral-900">{{ __('Eco-Conscious') }}</h3>
                    <p class="text-neutral-600">{{ __('Sustainability at the core of every solution we create.') }}</p>
                </div>

                <!-- Expertise -->
                <div class="group bg-white rounded-2xl p-8 shadow-soft hover:shadow-large border border-neutral-100 hover:border-tertiary-200 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-tertiary-50 to-tertiary-100 rounded-2xl flex items-center justify-center mb-6 group-hover:shadow-glow-purple transition-all duration-300">
                        <svg class="w-8 h-8 text-tertiary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-neutral-900">{{ __('Proven Excellence') }}</h3>
                    <p class="text-neutral-600">{{ __('Years of experience delivering impactful solutions.') }}</p>
                </div>

                <!-- Client Focus -->
                <div class="group bg-white rounded-2xl p-8 shadow-soft hover:shadow-large border border-neutral-100 hover:border-primary-200 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-6 group-hover:shadow-glow transition-all duration-300">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-neutral-900">{{ __('Client Success') }}</h3>
                    <p class="text-neutral-600">{{ __('Dedicated support ensuring your long-term success.') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Solutions -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="text-center mb-20">
                <span class="inline-block bg-white/80 backdrop-blur-xl text-primary-600 px-6 py-3 rounded-full text-sm font-semibold mb-6 border border-primary-100">
                    ⚡ {{ __('Our Services') }}
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-neutral-900 mb-6">
                    {{ __('Expert Solutions for') }} 
                    <span class="bg-gradient-to-r from-primary-600 to-secondary-600 bg-clip-text text-transparent">
                        {{ __('Your Success') }}
                    </span>
                </h2>
                <p class="text-xl text-neutral-600 max-w-3xl mx-auto">
                    {{ __('Professional technology services delivered with excellence, innovation, and environmental responsibility.') }}
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Software Development -->
                <div class="group bg-white/80 backdrop-blur-xl rounded-2xl p-8 shadow-soft hover:shadow-large border border-white/50 transition-all duration-300 transform hover:-translate-y-2">
                    <h3 class="text-2xl font-bold mb-4 text-neutral-900">{{ __('Software Development') }}</h3>
                    <ul class="space-y-3 text-neutral-600">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ __('Web Applications') }}
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ __('Mobile Development') }}
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ __('Custom Software') }}
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ __('System Integration') }}
                        </li>
                    </ul>
                    <div class="mt-6 pt-6 border-t border-neutral-100">
                        <p class="text-sm text-secondary-600">
                            <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/>
                            </svg>
                            {{ __('Energy-efficient and sustainable development practices') }}
                        </p>
                    </div>
                </div>

                <!-- Electronics & Robotics -->
                <div class="group bg-white/80 backdrop-blur-xl rounded-2xl p-8 shadow-soft hover:shadow-large border border-white/50 transition-all duration-300 transform hover:-translate-y-2">
                    <h3 class="text-2xl font-bold mb-4 text-neutral-900">{{ __('Electronics & Robotics') }}</h3>
                    <ul class="space-y-3 text-neutral-600">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ __('Embedded Systems') }}
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ __('Robotics Development') }}
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ __('IoT Solutions') }}
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ __('Hardware Design') }}
                        </li>
                    </ul>
                    <div class="mt-6 pt-6 border-t border-neutral-100">
                        <p class="text-sm text-secondary-600">
                            <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/>
                            </svg>
                            {{ __('Eco-friendly hardware and energy-efficient designs') }}
                        </p>
                    </div>
                </div>

                <!-- Consulting & Training -->
                <div class="group bg-white/80 backdrop-blur-xl rounded-2xl p-8 shadow-soft hover:shadow-large border border-white/50 transition-all duration-300 transform hover:-translate-y-2">
                    <h3 class="text-2xl font-bold mb-4 text-neutral-900">{{ __('Consulting & Training') }}</h3>
                    <ul class="space-y-3 text-neutral-600">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-tertiary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ __('Technical Consulting') }}
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-tertiary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ __('Professional Training') }}
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-tertiary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ __('Project Management') }}
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-tertiary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ __('Technology Workshops') }}
                        </li>
                    </ul>
                    <div class="mt-6 pt-6 border-t border-neutral-100">
                        <p class="text-sm text-secondary-600">
                            <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/>
                            </svg>
                            {{ __('Incorporating sustainable practices in all solutions') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Additional Service Details -->
            <div class="mt-16 text-center">
                <a href="/services" class="inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white bg-primary-600 rounded-xl hover:bg-primary-700 transition-colors duration-300">
                    {{ __('View Detailed Services') }}
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Sustainability Commitment -->
    <section class="py-24 bg-gradient-to-br from-neutral-50 to-secondary-50 relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="text-center mb-16">
                <span class="inline-block bg-white/80 backdrop-blur-xl text-secondary-600 px-6 py-3 rounded-full text-sm font-semibold mb-6 border border-secondary-100">
                    🌱 {{ __('Our Green Commitment') }}
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-neutral-900 mb-6">
                    {{ __('Innovating for a') }}
                    <span class="bg-gradient-to-r from-secondary-600 to-primary-600 bg-clip-text text-transparent">
                        {{ __('Better Tomorrow') }}
                    </span>
                </h2>
                <p class="text-xl text-neutral-600 max-w-3xl mx-auto">
                    {{ __('Our commitment to sustainable development goes beyond words - it\'s embedded in everything we create.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-8 text-center">
                    <div class="w-16 h-16 bg-secondary-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2">{{ __('Energy Efficient') }}</h3>
                    <p class="text-neutral-600">{{ __('Optimizing energy consumption in every solution we develop') }}</p>
                </div>

                <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-8 text-center">
                    <div class="w-16 h-16 bg-secondary-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2">{{ __('Resource Smart') }}</h3>
                    <p class="text-neutral-600">{{ __('Minimizing resource usage through intelligent design') }}</p>
                </div>

                <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-8 text-center">
                    <div class="w-16 h-16 bg-secondary-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2">{{ __('Eco-Innovation') }}</h3>
                    <p class="text-neutral-600">{{ __('Pioneering sustainable solutions for global challenges') }}</p>
                </div>

                <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-8 text-center">
                    <div class="w-16 h-16 bg-secondary-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2">{{ __('Future Ready') }}</h3>
                    <p class="text-neutral-600">{{ __('Building solutions that stand the test of time') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Stories -->
    <section class="py-24 bg-gradient-to-br from-neutral-50 to-primary-50 relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="text-center mb-20">
                <span class="inline-block bg-white/80 backdrop-blur-xl text-primary-600 px-6 py-3 rounded-full text-sm font-semibold mb-6 border border-primary-100">
                    ⭐ {{ __('Client Success Stories') }}
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-neutral-900 mb-6">
                    {{ __('Real Results,') }} 
                    <span class="bg-gradient-to-r from-primary-600 to-secondary-600 bg-clip-text text-transparent">
                        {{ __('Real Impact') }}
                    </span>
                </h2>
                <p class="text-xl text-neutral-600 max-w-3xl mx-auto">
                    {{ __('Discover how our solutions have helped organizations achieve their innovation and sustainability goals.') }}
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Case Study 1: Energy Management -->
                <div class="group bg-white/80 backdrop-blur-xl rounded-2xl overflow-hidden shadow-soft hover:shadow-large border border-white/50 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ asset('images/case-studies/energy.jpg') }}" alt="Energy Management Case Study" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <span class="text-sm font-semibold bg-primary-500/30 backdrop-blur-sm px-3 py-1 rounded-full">{{ __('Energy Sector') }}</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-neutral-900">{{ __('Smart Energy Management') }}</h3>
                        <p class="text-neutral-600 mb-4">{{ __('Achieved 30% energy reduction for a major tech campus through AI-powered optimization.') }}</p>
                        <div class="flex items-center text-sm text-neutral-500">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ __('Implementation: 3 months') }}
                            </span>
                        </div>
                    </div>
                            </div>

                <!-- Case Study 2: Process Automation -->
                <div class="group bg-white/80 backdrop-blur-xl rounded-2xl overflow-hidden shadow-soft hover:shadow-large border border-white/50 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ asset('images/case-studies/automation.jpg') }}" alt="Process Automation Case Study" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <span class="text-sm font-semibold bg-secondary-500/30 backdrop-blur-sm px-3 py-1 rounded-full">{{ __('Manufacturing') }}</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-neutral-900">{{ __('Intelligent Automation') }}</h3>
                        <p class="text-neutral-600 mb-4">{{ __('45% efficiency increase in manufacturing processes while reducing waste by 25%.') }}</p>
                        <div class="flex items-center text-sm text-neutral-500">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ __('Implementation: 6 months') }}
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Case Study 3: Resource Management -->
                <div class="group bg-white/80 backdrop-blur-xl rounded-2xl overflow-hidden shadow-soft hover:shadow-large border border-white/50 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ asset('images/case-studies/resource.jpg') }}" alt="Resource Management Case Study" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <span class="text-sm font-semibold bg-tertiary-500/30 backdrop-blur-sm px-3 py-1 rounded-full">{{ __('Smart City') }}</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-neutral-900">{{ __('Smart Resource Management') }}</h3>
                        <p class="text-neutral-600 mb-4">{{ __('Implemented IoT solution reducing water consumption by 25% across city facilities.') }}</p>
                        <div class="flex items-center text-sm text-neutral-500">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ __('Implementation: 8 months') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Numbers -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="text-center mb-20">
                <span class="inline-block bg-white/80 backdrop-blur-xl text-primary-600 px-6 py-3 rounded-full text-sm font-semibold mb-6 border border-primary-100">
                    📊 {{ __('Our Impact') }}
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-neutral-900 mb-6">
                    {{ __('Building a') }}
                    <span class="bg-gradient-to-r from-primary-600 to-secondary-600 bg-clip-text text-transparent">
                        {{ __('Sustainable Future') }}
                    </span>
                </h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-8 text-center">
                    <div class="text-4xl font-bold text-primary-600 mb-2">10+</div>
                    <div class="text-lg font-semibold text-neutral-900 mb-2">{{ __('Active Projects') }}</div>
                    <p class="text-neutral-600">{{ __('Innovative solutions in development') }}</p>
                </div>
                
                <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-8 text-center">
                    <div class="text-4xl font-bold text-secondary-600 mb-2">25%</div>
                    <div class="text-lg font-semibold text-neutral-900 mb-2">{{ __('Energy Efficiency') }}</div>
                    <p class="text-neutral-600">{{ __('Average improvement in our solutions') }}</p>
                </div>
                
                <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-8 text-center">
                    <div class="text-4xl font-bold text-tertiary-600 mb-2">5+</div>
                    <div class="text-lg font-semibold text-neutral-900 mb-2">{{ __('Partners') }}</div>
                    <p class="text-neutral-600">{{ __('Strong collaboration network') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners & Collaborations -->
    <section class="py-24 bg-gradient-to-br from-neutral-50 to-primary-50 relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="text-center mb-20">
                <span class="inline-block bg-white/80 backdrop-blur-xl text-primary-600 px-6 py-3 rounded-full text-sm font-semibold mb-6 border border-primary-100">
                    🤝 {{ __('Our Network') }}
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-neutral-900 mb-6">
                    {{ __('Trusted By Leading') }}
                        <span class="bg-gradient-to-r from-primary-600 to-secondary-600 bg-clip-text text-transparent">
                        {{ __('Organizations') }}
                        </span>
                    </h2>
                <p class="text-xl text-neutral-600 max-w-3xl mx-auto">
                    {{ __('Collaborating with respected environmental and technology organizations to drive sustainable innovation.') }}
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Green Peace Africa -->
                <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-8 shadow-soft hover:shadow-large transition-all duration-300">
                    <div class="flex items-center justify-center mb-6">
                        <img src="{{ asset('images/partners/greenpeace.png') }}" alt="Green Peace Africa" class="h-16 w-auto">
                    </div>
                    <h3 class="text-xl font-bold text-neutral-900 text-center mb-4">{{ __('Green Peace Africa') }}</h3>
                    <p class="text-neutral-600 text-center">{{ __('Partnering for environmental conservation and sustainable technology solutions in Africa.') }}</p>
                </div>

                <!-- Environmental Organization -->
                <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-8 shadow-soft hover:shadow-large transition-all duration-300">
                    <div class="flex items-center justify-center mb-6">
                        <img src="{{ asset('images/partners/env-org.png') }}" alt="Environmental Organization" class="h-16 w-auto">
                    </div>
                    <h3 class="text-xl font-bold text-neutral-900 text-center mb-4">{{ __('Environmental Conservation Group') }}</h3>
                    <p class="text-neutral-600 text-center">{{ __('Collaborating on sustainable technology initiatives and environmental protection projects.') }}</p>
                </div>

                <!-- Tech Innovation Hub -->
                <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-8 shadow-soft hover:shadow-large transition-all duration-300">
                    <div class="flex items-center justify-center mb-6">
                        <img src="{{ asset('images/partners/tech-hub.png') }}" alt="Tech Innovation Hub" class="h-16 w-auto">
                    </div>
                    <h3 class="text-xl font-bold text-neutral-900 text-center mb-4">{{ __('Tech Innovation Hub') }}</h3>
                    <p class="text-neutral-600 text-center">{{ __('Working together to develop innovative solutions for environmental challenges.') }}</p>
                </div>
            </div>

            <div class="mt-16 text-center">
                <p class="text-lg text-neutral-600 max-w-2xl mx-auto mb-8">
                    {{ __('Interested in partnering with us? Let\'s work together to create sustainable technology solutions.') }}
                </p>
                <a href="/contact" class="inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white bg-primary-600 rounded-xl hover:bg-primary-700 transition-colors duration-300">
                    {{ __('Become a Partner') }}
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Client Testimonials -->
    <section class="py-24 bg-gradient-to-br from-neutral-50 to-primary-50 relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="text-center mb-20">
                <span class="inline-block bg-white/80 backdrop-blur-xl text-primary-600 px-6 py-3 rounded-full text-sm font-semibold mb-6 border border-primary-100">
                    💬 {{ __('Client Testimonials') }}
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-neutral-900 mb-6">
                    {{ __('What Our Clients') }}
                    <span class="bg-gradient-to-r from-primary-600 to-secondary-600 bg-clip-text text-transparent">
                        {{ __('Say About Us') }}
                    </span>
                </h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-8 shadow-soft">
                    <div class="flex items-center mb-6">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('images/testimonials/client1.jpg') }}" alt="Client" class="w-12 h-12 rounded-full">
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-neutral-900">{{ __('Sarah Johnson') }}</h4>
                            <p class="text-neutral-600">{{ __('CTO, TechCorp') }}</p>
                        </div>
                    </div>
                    <p class="text-neutral-600 italic">"Their expertise in both software development and sustainability practices helped us achieve our digital transformation goals while reducing our environmental impact."</p>
                </div>

                <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-8 shadow-soft">
                    <div class="flex items-center mb-6">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('images/testimonials/client2.jpg') }}" alt="Client" class="w-12 h-12 rounded-full">
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-neutral-900">{{ __('Michael Chen') }}</h4>
                            <p class="text-neutral-600">{{ __('Innovation Director, EcoSmart') }}</p>
                        </div>
                    </div>
                    <p class="text-neutral-600 italic">"The IoT solution they developed revolutionized our energy monitoring system. Professional team with outstanding technical knowledge."</p>
                </div>

                <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-8 shadow-soft">
                    <div class="flex items-center mb-6">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('images/testimonials/client3.jpg') }}" alt="Client" class="w-12 h-12 rounded-full">
                    </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-neutral-900">{{ __('Emma Rodriguez') }}</h4>
                            <p class="text-neutral-600">{{ __('CEO, InnovateCo') }}</p>
                        </div>
                    </div>
                    <p class="text-neutral-600 italic">"Their training programs significantly improved our team's capabilities in sustainable technology practices. Highly recommended!"</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Technology Stack -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="text-center mb-20">
                <span class="inline-block bg-white/80 backdrop-blur-xl text-primary-600 px-6 py-3 rounded-full text-sm font-semibold mb-6 border border-primary-100">
                    🛠️ {{ __('Our Tools') }}
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-neutral-900 mb-6">
                    {{ __('Technologies We') }}
                    <span class="bg-gradient-to-r from-primary-600 to-secondary-600 bg-clip-text text-transparent">
                        {{ __('Excel In') }}
                    </span>
                </h2>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
                <!-- Add your technology logos here -->
                <div class="flex items-center justify-center p-6 bg-white/80 backdrop-blur-xl rounded-xl hover:shadow-soft transition-all duration-300">
                    <img src="{{ asset('images/tech/tech1.png') }}" alt="Technology 1" class="h-12 w-auto opacity-75 hover:opacity-100 transition-opacity duration-300">
                </div>
                <!-- Repeat for other technology logos -->
            </div>
        </div>
    </section>

    <!-- Latest News -->
    <section class="py-24 bg-gradient-to-br from-neutral-50 to-primary-50 relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="text-center mb-20">
                <span class="inline-block bg-white/80 backdrop-blur-xl text-primary-600 px-6 py-3 rounded-full text-sm font-semibold mb-6 border border-primary-100">
                    📰 {{ __('Latest Updates') }}
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-neutral-900 mb-6">
                    {{ __('Stay Informed With Our') }}
                    <span class="bg-gradient-to-r from-primary-600 to-secondary-600 bg-clip-text text-transparent">
                        {{ __('Latest News') }}
                    </span>
                </h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white/80 backdrop-blur-xl rounded-2xl overflow-hidden shadow-soft">
                    <img src="{{ asset('images/blog/post1.jpg') }}" alt="Blog Post 1" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-neutral-600 mb-2">{{ __('January 15, 2024') }}</div>
                        <h3 class="text-xl font-bold text-neutral-900 mb-2">{{ __('Advancing Sustainable Technology') }}</h3>
                        <p class="text-neutral-600 mb-4">{{ __('Exploring the latest trends in sustainable technology and their impact on business.') }}</p>
                        <a href="#" class="text-primary-600 font-semibold hover:text-primary-700">{{ __('Read More') }} →</a>
                    </div>
                </div>

                <div class="bg-white/80 backdrop-blur-xl rounded-2xl overflow-hidden shadow-soft">
                    <img src="{{ asset('images/blog/post2.jpg') }}" alt="Blog Post 2" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-neutral-600 mb-2">{{ __('January 10, 2024') }}</div>
                        <h3 class="text-xl font-bold text-neutral-900 mb-2">{{ __('IoT for Smart Cities') }}</h3>
                        <p class="text-neutral-600 mb-4">{{ __('How IoT technology is transforming urban infrastructure and sustainability.') }}</p>
                        <a href="#" class="text-primary-600 font-semibold hover:text-primary-700">{{ __('Read More') }} →</a>
                    </div>
                </div>

                <div class="bg-white/80 backdrop-blur-xl rounded-2xl overflow-hidden shadow-soft">
                    <img src="{{ asset('images/blog/post3.jpg') }}" alt="Blog Post 3" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-neutral-600 mb-2">{{ __('January 5, 2024') }}</div>
                        <h3 class="text-xl font-bold text-neutral-900 mb-2">{{ __('Green Software Development') }}</h3>
                        <p class="text-neutral-600 mb-4">{{ __('Best practices for developing environmentally conscious software solutions.') }}</p>
                        <a href="#" class="text-primary-600 font-semibold hover:text-primary-700">{{ __('Read More') }} →</a>
                    </div>
                </div>
                        </div>

            <div class="mt-12 text-center">
                <a href="/blog" class="inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white bg-primary-600 rounded-xl hover:bg-primary-700 transition-colors duration-300">
                    {{ __('View All Posts') }}
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-24 bg-gradient-to-br from-neutral-900 via-primary-900 to-neutral-900 relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-10"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-8">
                    {{ __('Ready to Build a') }} 
                    <span class="bg-gradient-to-r from-primary-400 to-secondary-400 bg-clip-text text-transparent">
                        {{ __('Sustainable Future?') }}
                    </span>
                </h2>
                <p class="text-xl text-neutral-200 mb-12 leading-relaxed">
                    {{ __('Join us in creating innovative solutions that drive progress while protecting our planet.') }}
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                    <a href="/contact" class="group bg-white text-primary-600 hover:text-primary-700 px-8 py-4 rounded-xl font-semibold transition-all duration-300 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                        <span>{{ __('Start Your Project') }}</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="/services" class="group text-white hover:text-neutral-200 px-8 py-4 rounded-xl font-semibold transition-all duration-300 border border-white/20 hover:border-white/40 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                        <span>{{ __('Learn More') }}</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection 