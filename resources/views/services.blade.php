@extends('layouts.app')

@section('title', 'Services')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-24 bg-gradient-to-br from-neutral-50 to-primary-50 overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="max-w-4xl mx-auto text-center">
                <span class="inline-block bg-gradient-to-r from-primary-50 to-secondary-50 text-primary-600 px-6 py-3 rounded-full text-sm font-semibold mb-6 border border-primary-100">
                    🚀 Our Services
                </span>
                <h1 class="text-4xl md:text-6xl font-bold mb-8 text-neutral-900">
                    Innovative Solutions for a 
                    <span class="bg-gradient-to-r from-primary-600 to-secondary-600 bg-clip-text text-transparent">
                        Sustainable Future
                    </span>
                </h1>
                <p class="text-xl md:text-2xl text-neutral-600 max-w-3xl mx-auto leading-relaxed">
                    We combine cutting-edge technology with environmental responsibility to create solutions that drive progress while protecting our planet.
                </p>
            </div>
        </div>
    </section>

    <!-- Eco-Smart Home Solutions -->
    <section id="eco-smart-home" class="py-24 bg-white relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1">
                    <span class="inline-block bg-gradient-to-r from-secondary-50 to-secondary-100 text-secondary-600 px-4 py-2 rounded-full text-sm font-semibold mb-6 border border-secondary-200">
                        🏠 Smart Living
                    </span>
                    <h2 class="text-4xl md:text-5xl font-bold mb-8 text-neutral-900">
                        Eco-Smart Home 
                        <span class="bg-gradient-to-r from-secondary-600 to-secondary-700 bg-clip-text text-transparent">
                            Solutions
                        </span>
                    </h2>
                    <p class="text-xl text-neutral-600 mb-8 leading-relaxed">
                        Transform your home into an energy-efficient, sustainable living space with our cutting-edge smart home solutions that reduce your carbon footprint while enhancing your lifestyle.
                    </p>
                    <ul class="space-y-6 mb-10">
                        <li class="flex items-start space-x-4">
                            <div class="w-6 h-6 bg-secondary-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-neutral-900 mb-1">Smart Energy Management</h4>
                                <p class="text-neutral-600">Intelligent monitoring and control systems that optimize energy consumption in real-time.</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-4">
                            <div class="w-6 h-6 bg-secondary-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-neutral-900 mb-1">Automated Climate Control</h4>
                                <p class="text-neutral-600">AI-powered systems that maintain optimal temperature and humidity while minimizing energy waste.</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-4">
                            <div class="w-6 h-6 bg-secondary-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-neutral-900 mb-1">Water Conservation</h4>
                                <p class="text-neutral-600">Smart irrigation and water monitoring systems that reduce consumption by up to 40%.</p>
                            </div>
                        </li>
                    </ul>
                    <a href="/contact" class="group bg-gradient-to-r from-secondary-600 to-secondary-700 hover:from-secondary-700 hover:to-secondary-800 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-glow-green hover:shadow-glow-green/80 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                        <span>Request a Demo</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
                <div class="order-1 lg:order-2 relative">
                    <div class="relative h-96 lg:h-[500px] rounded-2xl overflow-hidden shadow-large">
                        <img src="{{ asset('images/modern/eco-smart-home.jpg') }}" alt="Eco-Smart Home" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>
                    <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-secondary-500/20 rounded-full blur-2xl"></div>
                    <div class="absolute -top-6 -right-6 w-32 h-32 bg-primary-500/20 rounded-full blur-2xl"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Green Robotics & Automation -->
    <section id="green-robotics" class="py-24 bg-gradient-to-br from-neutral-50 to-secondary-50 relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1 relative">
                    <div class="relative h-96 lg:h-[500px] rounded-2xl overflow-hidden shadow-large">
                        <img src="{{ asset('images/modern/green-robotics.jpg') }}" alt="Green Robotics" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-secondary-500/20 rounded-full blur-2xl"></div>
                    <div class="absolute -top-6 -left-6 w-32 h-32 bg-tertiary-500/20 rounded-full blur-2xl"></div>
                </div>
                <div class="order-1 lg:order-2">
                    <span class="inline-block bg-gradient-to-r from-secondary-50 to-secondary-100 text-secondary-600 px-4 py-2 rounded-full text-sm font-semibold mb-6 border border-secondary-200">
                        🤖 Green Automation
                    </span>
                    <h2 class="text-4xl md:text-5xl font-bold mb-8 text-neutral-900">
                        Green Robotics & 
                        <span class="bg-gradient-to-r from-secondary-600 to-secondary-700 bg-clip-text text-transparent">
                            Automation
                        </span>
                    </h2>
                    <p class="text-xl text-neutral-600 mb-8 leading-relaxed">
                        Revolutionize your operations with our eco-friendly robotics and automation solutions that increase efficiency while reducing environmental impact.
                    </p>
                    <ul class="space-y-6 mb-10">
                        <li class="flex items-start space-x-4">
                            <div class="w-6 h-6 bg-secondary-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-neutral-900 mb-1">Energy-Efficient Systems</h4>
                                <p class="text-neutral-600">Robotics designed with low-power consumption and renewable energy integration.</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-4">
                            <div class="w-6 h-6 bg-secondary-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-neutral-900 mb-1">Sustainable Manufacturing</h4>
                                <p class="text-neutral-600">Automated processes that minimize waste and optimize resource utilization.</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-4">
                            <div class="w-6 h-6 bg-secondary-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-neutral-900 mb-1">Smart Waste Management</h4>
                                <p class="text-neutral-600">Intelligent sorting and recycling systems that maximize material recovery.</p>
                            </div>
                        </li>
                    </ul>
                    <a href="/services#green-robotics" class="group bg-gradient-to-r from-secondary-600 to-secondary-700 hover:from-secondary-700 hover:to-secondary-800 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-glow-green hover:shadow-glow-green/80 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                        <span>Learn More</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Digital Innovation -->
    <section id="digital-innovation" class="py-24 bg-white relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1">
                    <span class="inline-block bg-gradient-to-r from-primary-50 to-primary-100 text-primary-600 px-4 py-2 rounded-full text-sm font-semibold mb-6 border border-primary-200">
                        💡 Digital Innovation
                    </span>
                    <h2 class="text-4xl md:text-5xl font-bold mb-8 text-neutral-900">
                        Digital Innovation for a 
                        <span class="bg-gradient-to-r from-primary-600 to-primary-700 bg-clip-text text-transparent">
                            Better Planet
                        </span>
                    </h2>
                    <p class="text-xl text-neutral-600 mb-8 leading-relaxed">
                        Leverage cutting-edge digital solutions to drive sustainable growth and environmental protection through intelligent technology integration.
                    </p>
                    <ul class="space-y-6 mb-10">
                        <li class="flex items-start space-x-4">
                            <div class="w-6 h-6 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-neutral-900 mb-1">IoT Environmental Monitoring</h4>
                                <p class="text-neutral-600">Real-time sensors and data collection systems for comprehensive environmental tracking.</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-4">
                            <div class="w-6 h-6 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-neutral-900 mb-1">AI-Powered Analytics</h4>
                                <p class="text-neutral-600">Machine learning algorithms that predict and optimize sustainability outcomes.</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-4">
                            <div class="w-6 h-6 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-neutral-900 mb-1">Blockchain Transparency</h4>
                                <p class="text-neutral-600">Immutable tracking systems for sustainable supply chains and carbon credits.</p>
                            </div>
                        </li>
                    </ul>
                    <a href="/projects" class="group bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-glow hover:shadow-glow/80 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                        <span>See Projects</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
                <div class="order-1 lg:order-2 relative">
                    <div class="relative h-96 lg:h-[500px] rounded-2xl overflow-hidden shadow-large">
                        <img src="{{ asset('images/modern/digital-innovation.jpg') }}" alt="Digital Innovation" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>
                    <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-primary-500/20 rounded-full blur-2xl"></div>
                    <div class="absolute -top-6 -right-6 w-32 h-32 bg-tertiary-500/20 rounded-full blur-2xl"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Consulting Services -->
    <section id="consulting" class="py-24 bg-gradient-to-br from-neutral-50 to-tertiary-50 relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1 relative">
                    <div class="relative h-96 lg:h-[500px] rounded-2xl overflow-hidden shadow-large">
                        <img src="{{ asset('images/modern/consulting.jpg') }}" alt="Consulting Services" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-tertiary-500/20 rounded-full blur-2xl"></div>
                    <div class="absolute -top-6 -left-6 w-32 h-32 bg-primary-500/20 rounded-full blur-2xl"></div>
                </div>
                <div class="order-1 lg:order-2">
                    <span class="inline-block bg-gradient-to-r from-tertiary-50 to-tertiary-100 text-tertiary-600 px-4 py-2 rounded-full text-sm font-semibold mb-6 border border-tertiary-200">
                        🎯 Strategic Consulting
                    </span>
                    <h2 class="text-4xl md:text-5xl font-bold mb-8 text-neutral-900">
                        Consulting for Sustainable 
                        <span class="bg-gradient-to-r from-tertiary-600 to-tertiary-700 bg-clip-text text-transparent">
                            Tech Strategies
                        </span>
                    </h2>
                    <p class="text-xl text-neutral-600 mb-8 leading-relaxed">
                        Expert guidance to help your organization embrace sustainable technology solutions and achieve your environmental goals.
                    </p>
                    <ul class="space-y-6 mb-10">
                        <li class="flex items-start space-x-4">
                            <div class="w-6 h-6 bg-tertiary-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-tertiary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-neutral-900 mb-1">Sustainability Audits</h4>
                                <p class="text-neutral-600">Comprehensive assessments of your current technology infrastructure and environmental impact.</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-4">
                            <div class="w-6 h-6 bg-tertiary-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-tertiary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-neutral-900 mb-1">Implementation Strategies</h4>
                                <p class="text-neutral-600">Roadmaps for integrating green technology solutions into your existing operations.</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-4">
                            <div class="w-6 h-6 bg-tertiary-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-tertiary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-neutral-900 mb-1">Impact Optimization</h4>
                                <p class="text-neutral-600">Continuous improvement strategies to maximize environmental and business benefits.</p>
                            </div>
                        </li>
                    </ul>
                    <a href="/contact" class="group bg-gradient-to-r from-tertiary-600 to-tertiary-700 hover:from-tertiary-700 hover:to-tertiary-800 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-glow-purple hover:shadow-glow-purple/80 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                        <span>Get a Quote</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Software Development -->
    <section id="software-development" class="py-24 bg-white relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1">
                    <span class="inline-block bg-gradient-to-r from-primary-50 to-primary-100 text-primary-600 px-4 py-2 rounded-full text-sm font-semibold mb-6 border border-primary-200">
                        💻 Custom Development
                    </span>
                    <h2 class="text-4xl md:text-5xl font-bold mb-8 text-neutral-900">
                        Software Development for 
                        <span class="bg-gradient-to-r from-primary-600 to-primary-700 bg-clip-text text-transparent">
                            Sustainability
                        </span>
                    </h2>
                    <p class="text-xl text-neutral-600 mb-8 leading-relaxed">
                        Custom software solutions designed to support your sustainability goals and streamline your environmental initiatives.
                    </p>
                    <ul class="space-y-6 mb-10">
                        <li class="flex items-start space-x-4">
                            <div class="w-6 h-6 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-neutral-900 mb-1">Energy Monitoring Apps</h4>
                                <p class="text-neutral-600">Real-time applications for tracking and optimizing energy consumption across facilities.</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-4">
                            <div class="w-6 h-6 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-neutral-900 mb-1">Sustainability Platforms</h4>
                                <p class="text-neutral-600">Comprehensive systems for managing and reporting on environmental impact metrics.</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-4">
                            <div class="w-6 h-6 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-neutral-900 mb-1">Green Automation Tools</h4>
                                <p class="text-neutral-600">Software solutions that automate sustainable practices and reduce manual intervention.</p>
                            </div>
                        </li>
                    </ul>
                    <a href="/contact" class="group bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-glow hover:shadow-glow/80 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                        <span>Request a Consultation</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
                <div class="order-1 lg:order-2 relative">
                    <div class="relative h-96 lg:h-[500px] rounded-2xl overflow-hidden shadow-large">
                        <img src="{{ asset('images/modern/software-development.jpg') }}" alt="Software Development" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>
                    <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-primary-500/20 rounded-full blur-2xl"></div>
                    <div class="absolute -top-6 -right-6 w-32 h-32 bg-secondary-500/20 rounded-full blur-2xl"></div>
                </div>
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
                    Ready to Build a 
                    <span class="bg-gradient-to-r from-primary-400 to-secondary-400 bg-clip-text text-transparent">
                        Sustainable Future?
                    </span>
                </h2>
                <p class="text-xl md:text-2xl mb-12 text-neutral-200 leading-relaxed">
                    Let's work together to create innovative solutions that drive progress while protecting our planet for future generations.
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                    <a href="/contact" class="group bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white px-10 py-4 rounded-xl font-semibold transition-all duration-300 shadow-glow hover:shadow-glow/80 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                        <span>Start Your Project</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="/about" class="group bg-white/10 backdrop-blur-xl hover:bg-white/20 text-white px-10 py-4 rounded-xl font-semibold transition-all duration-300 border border-white/20 hover:border-white/40 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                        <span>Learn About Us</span>
                        <svg class="w-5 h-5 group-hover:rotate-45 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection 