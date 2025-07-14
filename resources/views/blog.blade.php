@extends('layouts.app')

@section('title', __('Blog & Insights'))

@section('meta_description', 'Explore DigitAll\'s insights on sustainable technology, innovation, and environmental responsibility. Stay updated with our latest articles and expert perspectives.')

@section('content')
<div class="bg-neutral-50">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-primary-600 to-secondary-600 py-16 md:py-24">
        <div class="absolute inset-0 bg-dots-pattern opacity-10"></div>
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-white mb-6 animate-fade-in">
                    {{ __('Insights for a Sustainable Future') }}
                </h1>
                <p class="text-white/90 text-xl md:text-2xl leading-relaxed mb-8 animate-slide-up">
                    {{ __('Exploring the intersection of technology, sustainability, and innovation.') }}
                </p>
                <div class="flex flex-wrap justify-center gap-4 animate-slide-up" style="animation-delay: 200ms;">
                    <a href="#featured" class="bg-white/10 hover:bg-white/20 text-white px-6 py-3 rounded-xl font-medium transition-all duration-200 backdrop-blur-sm border border-white/20">
                        {{ __('Featured Articles') }}
                    </a>
                    <a href="#categories" class="bg-white text-primary-600 hover:text-primary-700 px-6 py-3 rounded-xl font-medium transition-all duration-200 shadow-soft hover:shadow-medium">
                        {{ __('Browse Categories') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Posts -->
    <section id="featured" class="container mx-auto px-4 py-16 md:py-24">
        <h2 class="text-center mb-12">{{ __('Featured Articles') }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredPosts as $post)
            <article class="bg-white rounded-2xl shadow-soft hover:shadow-medium transition-all duration-300 overflow-hidden group">
                <a href="{{ route('blog.show', $post->slug) }}" class="block aspect-video overflow-hidden">
                    <img src="{{ asset($post->featured_image) }}" 
                         alt="{{ $post->title }}" 
                         class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300"
                         loading="lazy">
                </a>
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset($post->author->avatar) }}" 
                             alt="{{ $post->author->name }}" 
                             class="w-10 h-10 rounded-full mr-4"
                             loading="lazy">
                        <div>
                            <p class="font-medium text-neutral-900">{{ $post->author->name }}</p>
                            <p class="text-sm text-neutral-500">{{ $post->published_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2 group-hover:text-primary-600 transition-colors duration-200">
                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                    </h3>
                    <p class="text-neutral-600 mb-4 line-clamp-2">{{ $post->excerpt }}</p>
                    <div class="flex items-center justify-between">
                        <a href="{{ route('blog.category', $post->category->slug) }}" 
                           class="bg-primary-50 text-primary-700 text-sm px-3 py-1 rounded-full hover:bg-primary-100 transition-colors duration-200">
                            {{ $post->category->name }}
                        </a>
                        <span class="text-sm text-neutral-500 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $post->read_time }} {{ __('min read') }}
                        </span>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </section>

    <!-- Categories and Latest Posts -->
    <section class="container mx-auto px-4 py-16 md:py-24">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Categories -->
            <div class="lg:col-span-1">
                <h3 id="categories" class="text-2xl font-bold mb-6">{{ __('Categories') }}</h3>
                <div class="bg-white rounded-2xl shadow-soft p-6">
                    @foreach($categories as $category)
                    <a href="{{ route('blog.category', $category->slug) }}" 
                       class="block py-3 first:pt-0 last:pb-0 hover:text-primary-600 transition-colors duration-200 group">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                @if($category->icon)
                                    <span class="text-neutral-400 group-hover:text-primary-500 transition-colors duration-200">
                                        {!! $category->icon !!}
                                    </span>
                                @endif
                                <span class="font-medium">{{ $category->name }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="bg-neutral-100 text-neutral-600 text-sm px-2 py-1 rounded-full">
                                    {{ $category->posts_count }}
                                </span>
                                <svg class="w-4 h-4 text-neutral-400 group-hover:text-primary-500 transform group-hover:translate-x-1 transition-all duration-200" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

            <!-- Latest Posts -->
            <div class="lg:col-span-2">
                <h3 class="text-2xl font-bold mb-6">{{ __('Latest Posts') }}</h3>
                @foreach($latestPosts as $post)
                <article class="bg-white rounded-2xl shadow-soft p-6 mb-6 hover:shadow-medium transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset($post->author->avatar) }}" 
                             alt="{{ $post->author->name }}" 
                             class="w-10 h-10 rounded-full mr-4"
                             loading="lazy">
                        <div>
                            <p class="font-medium text-neutral-900">{{ $post->author->name }}</p>
                            <p class="text-sm text-neutral-500">{{ $post->published_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                    <h4 class="text-xl font-bold mb-2 hover:text-primary-600 transition-colors duration-200">
                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                    </h4>
                    <p class="text-neutral-600 mb-4">{{ $post->excerpt }}</p>
                    <div class="flex flex-wrap items-center gap-3">
                        <a href="{{ route('blog.category', $post->category->slug) }}" 
                           class="bg-primary-50 text-primary-700 text-sm px-3 py-1 rounded-full hover:bg-primary-100 transition-colors duration-200">
                            {{ $post->category->name }}
                        </a>
                        @foreach($post->tags as $tag)
                        <a href="{{ route('blog.tag', $tag->slug) }}" 
                           class="text-sm text-neutral-600 hover:text-primary-600 transition-colors duration-200">
                            #{{ $tag->name }}
                        </a>
                        @endforeach
                        <span class="text-sm text-neutral-500 flex items-center ml-auto">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $post->read_time }} {{ __('min read') }}
                        </span>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection 