@extends('layouts.app')

@section('title', $service->name)

@section('content')
<div class="min-h-screen bg-gradient-to-br from-neutral-50 to-primary-50">
    <div class="container mx-auto px-6 py-12">
        <!-- Breadcrumb -->
        <nav class="mb-8">
            <ol class="flex items-center space-x-2 text-sm text-neutral-600">
                <li><a href="/" class="hover:text-primary-600">{{ __('Home') }}</a></li>
                <li><span class="mx-2">/</span></li>
                <li><a href="/services" class="hover:text-primary-600">{{ __('Services') }}</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-neutral-900 font-medium">{{ $service->name }}</li>
            </ol>
        </nav>

        <!-- Service Header -->
        <div class="bg-white rounded-2xl shadow-soft border border-neutral-100 p-8 mb-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Service Image -->
                <div class="relative">
                    @if($service->image_path)
                        {{ asset('storage/' . $service->image_path) }}
                        <img src="{{ asset($service->image_path) }}" alt="{{ $service->name }}" class="w-full h-64 object-cover rounded-xl">
                    @else
                        <div class="w-full h-64 bg-gradient-to-br from-primary-100 to-primary-200 rounded-xl flex items-center justify-center">
                            <svg class="w-16 h-16 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- Service Info -->
                <div>
                    <div class="mb-4">
                        <span class="inline-block bg-gradient-to-r from-primary-50 to-secondary-50 text-primary-600 px-4 py-2 rounded-full text-sm font-semibold border border-primary-100">
                            {{ $service->category }}
                        </span>
                    </div>
                    
                    <h1 class="text-4xl font-bold text-neutral-900 mb-4">{{ $service->name }}</h1>
                    
                    <p class="text-lg text-neutral-600 mb-6 leading-relaxed">{{ $service->description }}</p>
                    
                    <div class="flex items-center justify-between mb-6">
                        <div class="text-3xl font-bold text-primary-600">
                            ${{ number_format($service->base_price, 2) }}
                        </div>
                        <div class="text-sm text-neutral-500">
                            {{ __('Starting price') }}
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('projects.create') }}" class="bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-glow hover:shadow-glow/80 transform hover:-translate-y-1 inline-flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            <span>{{ __('Start Project') }}</span>
                        </a>
                        <a href="/contact" class="bg-white border-2 border-primary-200 hover:border-primary-300 text-primary-600 px-8 py-4 rounded-xl font-semibold transition-all duration-300 transform hover:-translate-y-1 inline-flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            <span>{{ __('Get Quote') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Service Features -->
        @if($service->features && count($service->features) > 0)
            <div class="bg-white rounded-2xl shadow-soft border border-neutral-100 p-8 mb-8">
                <h2 class="text-3xl font-bold text-neutral-900 mb-6">{{ __('Key Features') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($service->features as $feature)
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mt-1">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <p class="text-neutral-700">{{ $feature }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Related Services -->
        @if($relatedServices->count() > 0)
            <div class="bg-white rounded-2xl shadow-soft border border-neutral-100 p-8">
                <h2 class="text-3xl font-bold text-neutral-900 mb-6">{{ __('Related Services') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($relatedServices as $relatedService)
                        <a href="{{ route('services.show', $relatedService) }}" class="group block">
                            <div class="bg-neutral-50 rounded-xl p-6 transition-all duration-300 group-hover:bg-primary-50 group-hover:shadow-soft">
                                <h3 class="text-xl font-bold text-neutral-900 mb-2 group-hover:text-primary-600">{{ $relatedService->name }}</h3>
                                <p class="text-neutral-600 mb-4">{{ Str::limit($relatedService->description, 100) }}</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-primary-600 font-semibold">${{ number_format($relatedService->base_price, 2) }}</span>
                                    <span class="text-sm text-neutral-500 group-hover:text-primary-600">{{ __('Learn More') }} →</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection 