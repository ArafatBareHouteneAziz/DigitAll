@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-24 bg-gradient-to-br from-neutral-50 to-primary-50 overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="max-w-4xl mx-auto text-center">
                <span class="inline-block bg-gradient-to-r from-primary-50 to-secondary-50 text-primary-600 px-6 py-3 rounded-full text-sm font-semibold mb-6 border border-primary-100">
                    🚀 About DigitAll
                </span>
                <h1 class="text-4xl md:text-6xl font-bold mb-8 text-neutral-900">
                    Pioneering the Future of 
                    <span class="bg-gradient-to-r from-primary-600 to-secondary-600 bg-clip-text text-transparent">
                        Sustainable Technology
                    </span>
                </h1>
                <p class="text-xl md:text-2xl text-neutral-600 max-w-3xl mx-auto leading-relaxed">
                    We're a team of innovators, engineers, and sustainability experts dedicated to creating technology solutions that drive progress while protecting our planet.
                </p>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1">
                    <span class="inline-block bg-gradient-to-r from-primary-50 to-primary-100 text-primary-600 px-4 py-2 rounded-full text-sm font-semibold mb-6 border border-primary-200">
                        🎯 Our Mission
                    </span>
                    <h2 class="text-4xl md:text-5xl font-bold mb-8 text-neutral-900">
                        Driving Innovation for a 
                        <span class="bg-gradient-to-r from-primary-600 to-primary-700 bg-clip-text text-transparent">
                            Sustainable Future
                        </span>
                    </h2>
                    <p class="text-xl text-neutral-600 mb-8 leading-relaxed">
                        At DigitAll, we believe that technology should be a force for good. Our mission is to develop innovative solutions that not only solve complex business challenges but also contribute to environmental sustainability and social progress.
                    </p>
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-6 h-6 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-neutral-900 mb-1">Environmental Responsibility</h4>
                                <p class="text-neutral-600">Every solution we create is designed with environmental impact in mind.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-6 h-6 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-neutral-900 mb-1">Innovation Excellence</h4>
                                <p class="text-neutral-600">Cutting-edge technology that pushes boundaries and creates new possibilities.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-1 lg:order-2 relative">
                    <div class="relative h-96 lg:h-[500px] rounded-2xl overflow-hidden shadow-large">
                        <img src="{{ asset('images/modern/about-hero.jpg') }}" alt="About DigitAll" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>
                    <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-primary-500/20 rounded-full blur-2xl"></div>
                    <div class="absolute -top-6 -right-6 w-32 h-32 bg-secondary-500/20 rounded-full blur-2xl"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Company Values -->
    <section class="py-24 bg-gradient-to-br from-neutral-50 to-secondary-50 relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="text-center mb-20">
                <span class="inline-block bg-gradient-to-r from-secondary-50 to-secondary-100 text-secondary-600 px-6 py-3 rounded-full text-sm font-semibold mb-6 border border-secondary-200">
                    🌟 Our Values
                </span>
                <h2 class="text-4xl md:text-5xl font-bold mb-8 text-neutral-900">
                    The Principles That 
                    <span class="bg-gradient-to-r from-secondary-600 to-secondary-700 bg-clip-text text-transparent">
                        Drive Us Forward
                    </span>
                </h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Innovation -->
                <div class="group bg-white/80 backdrop-blur-xl p-8 rounded-2xl shadow-soft border border-white/50 hover:shadow-large transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-6 group-hover:shadow-glow transition-all duration-300">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-neutral-900">Innovation</h3>
                    <p class="text-neutral-600 leading-relaxed">
                        We constantly push the boundaries of what's possible, exploring new technologies and approaches to solve complex challenges.
                    </p>
                </div>

                <!-- Sustainability -->
                <div class="group bg-white/80 backdrop-blur-xl p-8 rounded-2xl shadow-soft border border-white/50 hover:shadow-large transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-secondary-50 to-secondary-100 rounded-2xl flex items-center justify-center mb-6 group-hover:shadow-glow-green transition-all duration-300">
                        <svg class="w-8 h-8 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-neutral-900">Sustainability</h3>
                    <p class="text-neutral-600 leading-relaxed">
                        Environmental responsibility is at the heart of our mission. We create solutions that protect our planet for future generations.
                    </p>
                </div>

                <!-- Excellence -->
                <div class="group bg-white/80 backdrop-blur-xl p-8 rounded-2xl shadow-soft border border-white/50 hover:shadow-large transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-tertiary-50 to-tertiary-100 rounded-2xl flex items-center justify-center mb-6 group-hover:shadow-glow-purple transition-all duration-300">
                        <svg class="w-8 h-8 text-tertiary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-neutral-900">Excellence</h3>
                    <p class="text-neutral-600 leading-relaxed">
                        We maintain the highest standards in everything we do, from code quality to customer service and environmental impact.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="text-center mb-20">
                <span class="inline-block bg-gradient-to-r from-tertiary-50 to-tertiary-100 text-tertiary-600 px-6 py-3 rounded-full text-sm font-semibold mb-6 border border-tertiary-200">
                    👥 Our Team
                </span>
                <h2 class="text-4xl md:text-5xl font-bold mb-8 text-neutral-900">
                    Meet the Minds Behind 
                    <span class="bg-gradient-to-r from-tertiary-600 to-tertiary-700 bg-clip-text text-transparent">
                        DigitAll
                    </span>
                </h2>
                <p class="text-xl text-neutral-600 max-w-3xl mx-auto">
                    Our diverse team brings together expertise in technology, sustainability, and innovation to create solutions that make a difference.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Team Member 1 -->
                <div class="group bg-white rounded-2xl overflow-hidden shadow-soft hover:shadow-large border border-neutral-100 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/modern/team.jpg') }}" alt="Team Member" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold mb-2 text-neutral-900">Sarah Chen</h3>
                        <p class="text-primary-600 font-semibold mb-4">CEO & Founder</p>
                        <p class="text-neutral-600 leading-relaxed">
                            Visionary leader with 15+ years in sustainable technology. Passionate about creating solutions that drive environmental and social impact.
                        </p>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="group bg-white rounded-2xl overflow-hidden shadow-soft hover:shadow-large border border-neutral-100 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/modern/team.jpg') }}" alt="Team Member" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold mb-2 text-neutral-900">Marcus Rodriguez</h3>
                        <p class="text-secondary-600 font-semibold mb-4">CTO & Lead Architect</p>
                        <p class="text-neutral-600 leading-relaxed">
                            Technology expert specializing in AI, IoT, and sustainable software solutions. Drives innovation across all our digital platforms.
                        </p>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="group bg-white rounded-2xl overflow-hidden shadow-soft hover:shadow-large border border-neutral-100 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/modern/team.jpg') }}" alt="Team Member" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold mb-2 text-neutral-900">Dr. Emily Watson</h3>
                        <p class="text-tertiary-600 font-semibold mb-4">Head of Sustainability</p>
                        <p class="text-neutral-600 leading-relaxed">
                            Environmental scientist and sustainability strategist. Ensures all our solutions meet the highest environmental standards.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-24 bg-gradient-to-br from-neutral-900 via-primary-900 to-neutral-900 relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-10"></div>
        
        <!-- Floating Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-20 left-10 w-32 h-32 bg-primary-500/20 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-10 w-40 h-40 bg-secondary-500/20 rounded-full blur-3xl animate-float" style="animation-delay: 3s;"></div>
        </div>
        
        <div class="container mx-auto px-6 relative">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-8 text-white">
                    Our Impact in 
                    <span class="bg-gradient-to-r from-primary-400 to-secondary-400 bg-clip-text text-transparent">
                        Numbers
                    </span>
                </h2>
                <p class="text-xl text-neutral-200 max-w-3xl mx-auto">
                    See how our solutions are making a difference across industries and communities.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-white mb-4">150+</div>
                    <p class="text-neutral-300 text-lg">Projects Completed</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-white mb-4">40%</div>
                    <p class="text-neutral-300 text-lg">Average Energy Savings</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-white mb-4">25+</div>
                    <p class="text-neutral-300 text-lg">Countries Served</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-white mb-4">98%</div>
                    <p class="text-neutral-300 text-lg">Client Satisfaction</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call-to-Action -->
    <section class="relative py-24 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-neutral-50 to-primary-50"></div>
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl font-bold mb-8 text-neutral-900">
                    Ready to Join Our 
                    <span class="bg-gradient-to-r from-primary-600 to-secondary-600 bg-clip-text text-transparent">
                        Mission?
                    </span>
                </h2>
                <p class="text-xl md:text-2xl mb-12 text-neutral-600 leading-relaxed">
                    Let's work together to create innovative solutions that drive sustainable progress and make a positive impact on our world.
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                    <a href="/contact" class="group bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white px-10 py-4 rounded-xl font-semibold transition-all duration-300 shadow-glow hover:shadow-glow/80 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                        <span>Get in Touch</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="/services" class="group bg-white/80 backdrop-blur-xl hover:bg-white text-neutral-900 px-10 py-4 rounded-xl font-semibold transition-all duration-300 border border-neutral-200 hover:border-neutral-300 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                        <span>Explore Services</span>
                        <svg class="w-5 h-5 group-hover:rotate-45 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection