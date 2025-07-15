@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="min-h-screen bg-gradient-to-br from-neutral-50 to-primary-50">
    <div class="container mx-auto px-6 py-12">
        <!-- Breadcrumb -->
        <nav class="mb-8">
            <ol class="flex items-center space-x-2 text-sm text-neutral-600">
                <li><a href="/" class="hover:text-primary-600">{{ __('Home') }}</a></li>
                <li><span class="mx-2">/</span></li>
                <li><a href="/blog" class="hover:text-primary-600">{{ __('Blog') }}</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-neutral-900 font-medium">{{ $post->title }}</li>
            </ol>
        </nav>

        <!-- Article Header -->
        <article class="bg-white rounded-2xl shadow-soft border border-neutral-100 overflow-hidden mb-8">
            <!-- Featured Image -->
            <div class="relative h-96 bg-gradient-to-br from-primary-100 to-primary-200">
                @if(isset($post->featured_image))
                    <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="w-24 h-24 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                    </div>
                @endif
            </div>

            <!-- Article Content -->
            <div class="p-8">
                <!-- Meta Information -->
                <div class="flex items-center space-x-4 text-sm text-neutral-500 mb-6">
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span>{{ $post->author }}</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>{{ $post->published_at->format('M d, Y') }}</span>
                    </div>
                </div>

                <!-- Title -->
                <h1 class="text-4xl md:text-5xl font-bold text-neutral-900 mb-6 leading-tight">{{ $post->title }}</h1>

                <!-- Excerpt -->
                <p class="text-xl text-neutral-600 mb-8 leading-relaxed">{{ $post->excerpt }}</p>

                <!-- Tags -->
                @if(isset($post->tags) && count($post->tags) > 0)
                    <div class="flex flex-wrap gap-2 mb-8">
                        @foreach($post->tags as $tag)
                            <span class="bg-primary-50 text-primary-600 px-3 py-1 rounded-full text-sm font-medium border border-primary-100">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                @endif

                <!-- Article Body -->
                <div class="prose prose-lg max-w-none">
                    <div class="text-neutral-700 leading-relaxed space-y-6">
                        {!! nl2br(e($post->content)) !!}
                    </div>
                </div>

                <!-- Share Buttons -->
                <div class="border-t border-neutral-200 mt-8 pt-8">
                    <h3 class="text-lg font-semibold text-neutral-900 mb-4">{{ __('Share this article') }}</h3>
                    <div class="flex space-x-4">
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" target="_blank" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                            <span>{{ __('Twitter') }}</span>
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" target="_blank" class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                            <span>{{ __('LinkedIn') }}</span>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            <span>{{ __('Facebook') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </article>

        <!-- Back to Blog -->
        <div class="text-center">
            <a href="/blog" class="inline-flex items-center space-x-2 text-primary-600 hover:text-primary-700 font-semibold">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span>{{ __('Back to Blog') }}</span>
            </a>
        </div>
    </div>
</div>
@endsection 