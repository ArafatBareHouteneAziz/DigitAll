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
                        🚀 Welcome to the Future of Technology
                    </span>
                </div>
                
                <div class="animate-slide-up" style="animation-delay: 0.2s;">
                    <h1 class="text-5xl md:text-7xl font-bold mb-8 text-white leading-tight">
                        Transforming Ideas into 
                        <span class="bg-gradient-to-r from-primary-400 via-secondary-400 to-tertiary-400 bg-clip-text text-transparent">
                            Digital Reality
                        </span>
                    </h1>
                </div>
                
                <div class="animate-slide-up" style="animation-delay: 0.4s;">
                    <p class="text-xl md:text-2xl mb-12 text-neutral-200 leading-relaxed max-w-3xl mx-auto">
                        Where innovation meets sustainability. We create cutting-edge technology solutions that drive progress while protecting our planet.
                    </p>
                </div>
                
                <div class="animate-slide-up flex flex-col sm:flex-row gap-6 justify-center items-center" style="animation-delay: 0.6s;">
                    <a href="/services" class="group bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-glow hover:shadow-glow/80 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                        <span>Explore Solutions</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="/contact" class="group bg-white/10 backdrop-blur-xl hover:bg-white/20 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 border border-white/20 hover:border-white/40 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                        <span>Get Started</span>
                        <svg class="w-5 h-5 group-hover:rotate-45 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20 animate-bounce">
            <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </section>

    <!-- Key Services -->
    <section class="py-24 bg-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="text-center mb-20">
                <span class="inline-block bg-gradient-to-r from-primary-50 to-secondary-50 text-primary-600 px-6 py-3 rounded-full text-sm font-semibold mb-6 border border-primary-100">
                    ✨ Our Services
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-neutral-900 mb-6">
                    Innovative Solutions for 
                    <span class="bg-gradient-to-r from-primary-600 to-secondary-600 bg-clip-text text-transparent">
                        Modern Challenges
                    </span>
                </h2>
                <p class="text-xl text-neutral-600 max-w-3xl mx-auto">
                    We combine cutting-edge technology with sustainable practices to deliver solutions that make a difference.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Digital Innovation -->
                <div class="group bg-white rounded-2xl p-8 shadow-soft hover:shadow-large border border-neutral-100 hover:border-primary-200 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-6 group-hover:shadow-glow transition-all duration-300">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-neutral-900">Digital Innovation</h3>
                    <p class="text-neutral-600 mb-6 leading-relaxed">
                        Cutting-edge digital solutions powered by AI, IoT, and blockchain technologies to transform your business.
                    </p>
                    <a href="/services#digital-innovation" class="inline-flex items-center text-primary-600 hover:text-primary-700 font-semibold group/link">
                        Learn More
                        <svg class="w-5 h-5 ml-2 group-hover/link:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>

                <!-- Sustainable Solutions -->
                <div class="group bg-white rounded-2xl p-8 shadow-soft hover:shadow-large border border-neutral-100 hover:border-secondary-200 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-secondary-50 to-secondary-100 rounded-2xl flex items-center justify-center mb-6 group-hover:shadow-glow-green transition-all duration-300">
                        <svg class="w-8 h-8 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-neutral-900">Sustainable Solutions</h3>
                    <p class="text-neutral-600 mb-6 leading-relaxed">
                        Eco-friendly technology solutions that reduce environmental impact while maximizing efficiency and performance.
                    </p>
                    <a href="/services#sustainable" class="inline-flex items-center text-secondary-600 hover:text-secondary-700 font-semibold group/link">
                        Learn More
                        <svg class="w-5 h-5 ml-2 group-hover/link:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>

                <!-- Enterprise Solutions -->
                <div class="group bg-white rounded-2xl p-8 shadow-soft hover:shadow-large border border-neutral-100 hover:border-tertiary-200 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-tertiary-50 to-tertiary-100 rounded-2xl flex items-center justify-center mb-6 group-hover:shadow-glow-purple transition-all duration-300">
                        <svg class="w-8 h-8 text-tertiary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-neutral-900">Enterprise Solutions</h3>
                    <p class="text-neutral-600 mb-6 leading-relaxed">
                        Scalable, secure solutions designed for enterprise-level challenges with comprehensive support and maintenance.
                    </p>
                    <a href="/services#enterprise" class="inline-flex items-center text-tertiary-600 hover:text-tertiary-700 font-semibold group/link">
                        Learn More
                        <svg class="w-5 h-5 ml-2 group-hover/link:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="py-24 bg-gradient-to-br from-neutral-50 to-primary-50 relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="max-w-4xl mx-auto text-center mb-20">
                <span class="inline-block bg-gradient-to-r from-primary-50 to-secondary-50 text-primary-600 px-6 py-3 rounded-full text-sm font-semibold mb-6 border border-primary-100">
                    🎯 Why Choose Us
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-neutral-900 mb-6">
                    The Perfect Blend of 
                    <span class="bg-gradient-to-r from-primary-600 to-secondary-600 bg-clip-text text-transparent">
                        Innovation & Sustainability
                    </span>
                </h2>
                <p class="text-xl text-neutral-600">
                    We don't just build technology—we build a better future.
                </p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="group bg-white/80 backdrop-blur-xl p-10 rounded-2xl shadow-soft border border-white/50 hover:shadow-large transition-all duration-300 transform hover:-translate-y-2">
                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <div class="w-16 h-16 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center group-hover:shadow-glow transition-all duration-300">
                                <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold mb-4 text-neutral-900">Innovative Approach</h3>
                            <p class="text-neutral-600 leading-relaxed">
                                We leverage the latest technologies and methodologies to create solutions that are not just current, but future-ready. Our innovative approach ensures your business stays ahead of the curve.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="group bg-white/80 backdrop-blur-xl p-10 rounded-2xl shadow-soft border border-white/50 hover:shadow-large transition-all duration-300 transform hover:-translate-y-2">
                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <div class="w-16 h-16 bg-gradient-to-br from-secondary-50 to-secondary-100 rounded-2xl flex items-center justify-center group-hover:shadow-glow-green transition-all duration-300">
                                <svg class="w-8 h-8 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold mb-4 text-neutral-900">Sustainable Impact</h3>
                            <p class="text-neutral-600 leading-relaxed">
                                Every solution we create is designed with environmental responsibility in mind. We help you achieve your goals while making a positive impact on the planet.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Insights -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-16">
                <div>
                    <span class="inline-block bg-gradient-to-r from-primary-50 to-secondary-50 text-primary-600 px-6 py-3 rounded-full text-sm font-semibold mb-6 border border-primary-100">
                        📚 Latest Insights
                    </span>
                    <h2 class="text-4xl md:text-5xl font-bold text-neutral-900">
                        Stay Ahead of the 
                        <span class="bg-gradient-to-r from-primary-600 to-secondary-600 bg-clip-text text-transparent">
                            Curve
                        </span>
                    </h2>
                </div>
                <a href="/blog" class="group mt-8 lg:mt-0 inline-flex items-center text-primary-600 hover:text-primary-700 font-semibold text-lg">
                    View All Articles
                    <svg class="w-6 h-6 ml-2 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Blog Post 1 -->
                <article class="group bg-white rounded-2xl overflow-hidden shadow-soft hover:shadow-large border border-neutral-100 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/modern/blog-1.jpg') }}" alt="Blog post image" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center mb-4">
                            <span class="text-sm text-neutral-500">June 7, 2025</span>
                            <span class="mx-2 text-neutral-300">•</span>
                            <span class="text-sm text-primary-600 font-semibold">Innovation</span>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-neutral-900 group-hover:text-primary-600 transition-colors duration-200">The Future of Tech: 2025 & Beyond</h3>
                        <p class="text-neutral-600 mb-6 leading-relaxed">Exploring the intersection of innovation and sustainability in technology, and what it means for businesses and society.</p>
                        <a href="/blog/future-of-tech-2025" class="inline-flex items-center text-primary-600 hover:text-primary-700 font-semibold group/link">
                            Read More
                            <svg class="w-5 h-5 ml-2 group-hover/link:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Blog Post 2 -->
                <article class="group bg-white rounded-2xl overflow-hidden shadow-soft hover:shadow-large border border-neutral-100 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/modern/blog-2.jpg') }}" alt="Blog post image" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center mb-4">
                            <span class="text-sm text-neutral-500">June 5, 2025</span>
                            <span class="mx-2 text-neutral-300">•</span>
                            <span class="text-sm text-secondary-600 font-semibold">Sustainability</span>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-neutral-900 group-hover:text-secondary-600 transition-colors duration-200">Green Tech Revolution</h3>
                        <p class="text-neutral-600 mb-6 leading-relaxed">How sustainable technology is reshaping industries and creating new opportunities for environmentally conscious businesses.</p>
                        <a href="/blog/green-tech-revolution" class="inline-flex items-center text-secondary-600 hover:text-secondary-700 font-semibold group/link">
                            Read More
                            <svg class="w-5 h-5 ml-2 group-hover/link:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Blog Post 3 -->
                <article class="group bg-white rounded-2xl overflow-hidden shadow-soft hover:shadow-large border border-neutral-100 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/modern/blog-3.jpg') }}" alt="Blog post image" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center mb-4">
                            <span class="text-sm text-neutral-500">June 3, 2025</span>
                            <span class="mx-2 text-neutral-300">•</span>
                            <span class="text-sm text-tertiary-600 font-semibold">Enterprise</span>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-neutral-900 group-hover:text-tertiary-600 transition-colors duration-200">Digital Transformation Guide</h3>
                        <p class="text-neutral-600 mb-6 leading-relaxed">A comprehensive guide to modern digital transformation strategies that drive business growth and competitive advantage.</p>
                        <a href="/blog/digital-transformation-guide" class="inline-flex items-center text-tertiary-600 hover:text-tertiary-700 font-semibold group/link">
                            Read More
                            <svg class="w-5 h-5 ml-2 group-hover/link:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Call-to-Action -->
    <section class="relative py-24 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-neutral-900 via-primary-900 to-neutral-900"></div>
        <div class="absolute inset-0 bg-hero-pattern opacity-10"></div>
        
        <!-- Floating Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-20 left-10 w-32 h-32 bg-primary-500/20 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-10 w-40 h-40 bg-secondary-500/20 rounded-full blur-3xl animate-float" style="animation-delay: 3s;"></div>
        </div>
        
        <div class="container mx-auto px-6 relative">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h2 class="text-4xl md:text-5xl font-bold mb-8">
                    Ready to Transform Your 
                    <span class="bg-gradient-to-r from-primary-400 to-secondary-400 bg-clip-text text-transparent">
                        Digital Future?
                    </span>
                </h2>
                <p class="text-xl md:text-2xl mb-12 text-neutral-200 leading-relaxed">
                    Join us in building innovative, sustainable solutions that create lasting impact for tomorrow's world.
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                    <a href="/contact" class="group bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white px-10 py-4 rounded-xl font-semibold transition-all duration-300 shadow-glow hover:shadow-glow/80 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                        <span>Get Started Today</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="/services" class="group bg-white/10 backdrop-blur-xl hover:bg-white/20 text-white px-10 py-4 rounded-xl font-semibold transition-all duration-300 border border-white/20 hover:border-white/40 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                        <span>Learn More</span>
                        <svg class="w-5 h-5 group-hover:rotate-45 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection 