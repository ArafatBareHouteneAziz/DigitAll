@extends('layouts.app')

@section('title', 'Page Not Found')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-neutral-50 to-primary-50 flex items-center justify-center">
    <div class="container mx-auto px-6 text-center">
        <!-- 404 Illustration -->
        <div class="mb-8">
            <div class="w-32 h-32 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-16 h-16 text-primary-600" fill="currentColor" stroke="currentColor" viewBox="0 0 375 350">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="m200 0a175 175 0 0 1 0 350h-50-100v-150h50v-50h50v100h50a75 75 0 0 0 0-150h-100v-50h50v-50m-50 50v-50h-50v50m0 0h-50v50h50m0 0v50h50v-50m0 0"
                    />
                </svg>
            </div>
        </div>

        <!-- Error Message -->
        <div class="mb-8">
            <h1 class="text-6xl md:text-8xl font-bold text-neutral-900 mb-4">404</h1>
            <h2 class="text-3xl md:text-4xl font-bold text-neutral-900 mb-4">Page Not Found</h2>
            <p class="text-xl text-neutral-600 max-w-2xl mx-auto leading-relaxed">
                Oops! The page you're looking for doesn't exist. It might have been moved, deleted, or you entered the wrong URL.
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
            <a href="/" class="bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-glow hover:shadow-glow/80 transform hover:-translate-y-1 inline-flex items-center justify-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span>Go Home</span>
            </a>
            <a href="/contact" class="bg-white border-2 border-primary-200 hover:border-primary-300 text-primary-600 px-8 py-4 rounded-xl font-semibold transition-all duration-300 transform hover:-translate-y-1 inline-flex items-center justify-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
                <span>Contact Support</span>
            </a>
        </div>

        <!-- Quick Links -->
        <div class="bg-white rounded-2xl shadow-soft border border-neutral-100 p-8 max-w-4xl mx-auto">
            <h3 class="text-2xl font-bold text-neutral-900 mb-6">Popular Pages</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <a href="/services" class="group block">
                    <div class="bg-neutral-50 rounded-xl p-6 transition-all duration-300 group-hover:bg-primary-50 group-hover:shadow-soft">
                        <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center mb-4 group-hover:bg-primary-200 transition-colors duration-200">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-semibold text-neutral-900 mb-2 group-hover:text-primary-600">Our Services</h4>
                        <p class="text-neutral-600 text-sm">Explore our digital innovation solutions</p>
                    </div>
                </a>

                <a href="/about" class="group block">
                    <div class="bg-neutral-50 rounded-xl p-6 transition-all duration-300 group-hover:bg-primary-50 group-hover:shadow-soft">
                        <div class="w-12 h-12 bg-secondary-100 rounded-xl flex items-center justify-center mb-4 group-hover:bg-secondary-200 transition-colors duration-200">
                            <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-semibold text-neutral-900 mb-2 group-hover:text-primary-600">About Us</h4>
                        <p class="text-neutral-600 text-sm">Learn about our mission and values</p>
                    </div>
                </a>

                <a href="/blog" class="group block">
                    <div class="bg-neutral-50 rounded-xl p-6 transition-all duration-300 group-hover:bg-primary-50 group-hover:shadow-soft">
                        <div class="w-12 h-12 bg-tertiary-100 rounded-xl flex items-center justify-center mb-4 group-hover:bg-tertiary-200 transition-colors duration-200">
                            <svg class="w-6 h-6 text-tertiary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-semibold text-neutral-900 mb-2 group-hover:text-primary-600">Blog</h4>
                        <p class="text-neutral-600 text-sm">Read our latest insights and updates</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 