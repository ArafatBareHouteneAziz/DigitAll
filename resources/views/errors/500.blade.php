@extends('layouts.app')

@section('title', __('Server Error'))

@section('content')
<div class="min-h-screen bg-gradient-to-br from-neutral-50 to-primary-50 flex items-center justify-center">
    <div class="container mx-auto px-6 text-center">
        <!-- 500 Illustration -->
        <div class="mb-8">
            <div class="w-32 h-32 bg-gradient-to-br from-red-100 to-red-200 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-16 h-16 text-red-600" fill="currentColor" stroke="currentColor" viewBox="0 0 375 350">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="m200 0a175 175 0 0 1 0 350h-50-100v-150h50v-50h50v100h50a75 75 0 0 0 0-150h-100v-50h50v-50m-50 50v-50h-50v50m0 0h-50v50h50m0 0v50h50v-50m0 0"
                    />
                </svg>
            </div>
        </div>

        <!-- Error Message -->
        <div class="mb-8">
            <h1 class="text-6xl md:text-8xl font-bold text-neutral-900 mb-4">500</h1>
            <h2 class="text-3xl md:text-4xl font-bold text-neutral-900 mb-4">{{ __('Server Error') }}</h2>
            <p class="text-xl text-neutral-600 max-w-2xl mx-auto leading-relaxed">
                {{ __('Something went wrong on our end. Our team has been notified and is working to fix the issue. Please try again in a few moments.') }}
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
            <button onclick="location.reload()" class="bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-glow hover:shadow-glow/80 transform hover:-translate-y-1 inline-flex items-center justify-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                <span>{{ __('Try Again') }}</span>
            </button>
            <a href="/" class="bg-white border-2 border-primary-200 hover:border-primary-300 text-primary-600 px-8 py-4 rounded-xl font-semibold transition-all duration-300 transform hover:-translate-y-1 inline-flex items-center justify-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span>{{ __('Go Home') }}</span>
            </a>
        </div>

        <!-- Status Information -->
        <div class="bg-white rounded-2xl shadow-soft border border-neutral-100 p-8 max-w-2xl mx-auto">
            <h3 class="text-2xl font-bold text-neutral-900 mb-6">{{ __('What you can do:') }}</h3>
            <div class="space-y-4 text-left">
                <div class="flex items-start space-x-3">
                    <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-1 flex-shrink-0">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <p class="text-neutral-700">{{ __('Refresh the page and try again') }}</p>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-1 flex-shrink-0">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <p class="text-neutral-700">{{ __('Clear your browser cache and cookies') }}</p>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-1 flex-shrink-0">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <p class="text-neutral-700">{{ __('Try accessing the site from a different browser') }}</p>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-1 flex-shrink-0">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <p class="text-neutral-700">{{ __('Contact our support team if the problem persists') }}</p>
                </div>
            </div>
            
            <div class="mt-8 pt-6 border-t border-neutral-200">
                <a href="/contact" class="inline-flex items-center space-x-2 text-primary-600 hover:text-primary-700 font-semibold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    <span>{{ __('Contact Support') }}</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 