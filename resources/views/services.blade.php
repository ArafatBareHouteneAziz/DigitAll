@extends('layouts.app')

@section('title', 'Our Services')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-neutral-900 via-primary-900 to-neutral-900">
        <div class="absolute inset-0 bg-hero-pattern opacity-10"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                    {{ __('Professional') }}
                    <span class="bg-gradient-to-r from-primary-400 to-secondary-400 bg-clip-text text-transparent">
                        {{ __('Technology Services') }}
                    </span>
                </h1>
                <p class="text-xl text-neutral-200 mb-8">
                    {{ __('Comprehensive technology solutions delivered with expertise and environmental responsibility.') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Software Development -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold text-neutral-900 mb-12">
                    {{ __('Software Development') }}
                </h2>

                <div class="space-y-12">
                    <!-- Web Development -->
                    <div class="bg-white rounded-2xl p-8 shadow-soft border border-neutral-100">
                        <h3 class="text-2xl font-bold text-neutral-900 mb-4">{{ __('Web Development') }}</h3>
                        <p class="text-neutral-600 mb-6">
                            {{ __('Custom web applications built with modern technologies and best practices. We create responsive, scalable, and maintainable solutions.') }}
                    </p>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Custom Web Applications') }}
                            </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('E-commerce Solutions') }}
                        </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Progressive Web Apps') }}
                        </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('API Development') }}
                        </li>
                    </ul>
                    </div>

                    <!-- Mobile Development -->
                    <div class="bg-white rounded-2xl p-8 shadow-soft border border-neutral-100">
                        <h3 class="text-2xl font-bold text-neutral-900 mb-4">{{ __('Mobile Development') }}</h3>
                        <p class="text-neutral-600 mb-6">
                            {{ __('Native and cross-platform mobile applications that deliver exceptional user experience and performance.') }}
                        </p>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('iOS Applications') }}
                            </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Android Applications') }}
                            </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Cross-platform Solutions') }}
                            </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Mobile UI/UX Design') }}
                            </li>
                        </ul>
                    </div>

                    <!-- Custom Software -->
                    <div class="bg-white rounded-2xl p-8 shadow-soft border border-neutral-100">
                        <h3 class="text-2xl font-bold text-neutral-900 mb-4">{{ __('Custom Software') }}</h3>
                        <p class="text-neutral-600 mb-6">
                            {{ __('Tailored software solutions designed to meet your specific business needs and challenges.') }}
                    </p>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Business Process Automation') }}
                            </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Data Management Systems') }}
                        </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Integration Solutions') }}
                        </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Legacy System Modernization') }}
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Electronics & Robotics -->
    <section class="py-20 bg-neutral-50">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold text-neutral-900 mb-12">
                    {{ __('Electronics & Robotics') }}
                </h2>

                <div class="space-y-12">
                    <!-- Embedded Systems -->
                    <div class="bg-white rounded-2xl p-8 shadow-soft border border-neutral-100">
                        <h3 class="text-2xl font-bold text-neutral-900 mb-4">{{ __('Embedded Systems') }}</h3>
                        <p class="text-neutral-600 mb-6">
                            {{ __('Specialized embedded solutions for various industries, focusing on efficiency and reliability.') }}
                    </p>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Microcontroller Programming') }}
                            </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Sensor Integration') }}
                        </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Real-time Systems') }}
                        </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Custom Hardware Solutions') }}
                        </li>
                    </ul>
                    </div>

                    <!-- Robotics -->
                    <div class="bg-white rounded-2xl p-8 shadow-soft border border-neutral-100">
                        <h3 class="text-2xl font-bold text-neutral-900 mb-4">{{ __('Robotics Development') }}</h3>
                        <p class="text-neutral-600 mb-6">
                            {{ __('Advanced robotics solutions for automation and process optimization.') }}
                        </p>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Industrial Automation') }}
                            </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Robot Programming') }}
                            </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Process Automation') }}
                            </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Custom Robotics Solutions') }}
                            </li>
                        </ul>
                    </div>

                    <!-- IoT Solutions -->
                    <div class="bg-white rounded-2xl p-8 shadow-soft border border-neutral-100">
                        <h3 class="text-2xl font-bold text-neutral-900 mb-4">{{ __('IoT Solutions') }}</h3>
                        <p class="text-neutral-600 mb-6">
                            {{ __('Connected device solutions that enable smart monitoring and control.') }}
                    </p>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Sensor Networks') }}
                            </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Remote Monitoring') }}
                        </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Smart Device Integration') }}
                        </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('IoT Data Analytics') }}
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Consulting & Training -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold text-neutral-900 mb-12">
                    {{ __('Consulting & Training') }}
                </h2>

                <div class="space-y-12">
                    <!-- Technical Consulting -->
                    <div class="bg-white rounded-2xl p-8 shadow-soft border border-neutral-100">
                        <h3 class="text-2xl font-bold text-neutral-900 mb-4">{{ __('Technical Consulting') }}</h3>
                        <p class="text-neutral-600 mb-6">
                            {{ __('Expert guidance on technology implementation and optimization.') }}
                        </p>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-tertiary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Technology Assessment') }}
                            </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-tertiary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Solution Architecture') }}
                            </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-tertiary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Process Optimization') }}
                            </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-tertiary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Technical Strategy') }}
                            </li>
                        </ul>
                            </div>

                    <!-- Professional Training -->
                    <div class="bg-white rounded-2xl p-8 shadow-soft border border-neutral-100">
                        <h3 class="text-2xl font-bold text-neutral-900 mb-4">{{ __('Professional Training') }}</h3>
                        <p class="text-neutral-600 mb-6">
                            {{ __('Comprehensive training programs for technical skill development.') }}
                        </p>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-tertiary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Software Development') }}
                            </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-tertiary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Electronics & IoT') }}
                        </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-tertiary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Robotics Programming') }}
                        </li>
                            <li class="flex items-center text-neutral-600">
                                <svg class="w-5 h-5 mr-3 text-tertiary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('Custom Workshops') }}
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-gradient-to-br from-neutral-900 via-primary-900 to-neutral-900">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-8">
                    {{ __('Ready to Start Your Next Project?') }}
                </h2>
                <p class="text-xl text-neutral-200 mb-12">
                    {{ __('Let\'s discuss how we can help you achieve your technology goals while maintaining environmental responsibility.') }}
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    <a href="/contact" class="inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-primary-600 bg-white rounded-xl hover:bg-neutral-100 transition-colors duration-300">
                        {{ __('Contact Us') }}
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="/portfolio" class="inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white border-2 border-white rounded-xl hover:bg-white/10 transition-colors duration-300">
                        {{ __('View Portfolio') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection 