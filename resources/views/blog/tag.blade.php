@extends('layouts.app')

@section('title', '#' . $tag->name . ' - Blog')
@section('meta_description', 'Explore articles tagged with #' . $tag->name . ' on DigitAll\'s blog. Find insights and discussions about ' . $tag->name . ' in technology and sustainability.')

@section('content')
<div class="bg-neutral-50">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-primary-600 to-secondary-600 py-16 md:py-24">
        <div class="absolute inset-0 bg-dots-pattern opacity-10"></div>
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <div class="flex items-center justify-center mb-8 animate-fade-in">
                    <a href="{{ route('blog.index') }}" class="text-white/80 hover:text-white flex items-center transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        {{ __('Back to Blog') }}
                    </a>
                </div>
                <h1 class="text-white mb-6 animate-slide-up">
                    <span class="text-5xl block mb-4">#</span>
                    {{ $tag->name }}
                </h1>
                <p class="text-white/90 text-xl md:text-2xl leading-relaxed animate-slide-up" style="animation-delay: 100ms;">
                    {{ __('Explore articles related to') }} {{ $tag->name }}
                </p>
            </div>
        </div>
    </div>

    <!-- Posts Grid -->
    <div class="container mx-auto px-4 py-16 md:py-24">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
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
                            <time datetime="{{ $post->published_at->toIso8601String() }}" class="text-sm text-neutral-500">
                                {{ $post->published_at->format('M d, Y') }}
                            </time>
                        </div>
                    </div>
                    <h2 class="text-xl font-bold mb-2 group-hover:text-primary-600 transition-colors duration-200">
                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                    </h2>
                    <p class="text-neutral-600 mb-4 line-clamp-2">{{ $post->excerpt }}</p>
                    <div class="flex flex-wrap items-center gap-3">
                        <a href="{{ route('blog.category', $post->category->slug) }}" 
                           class="bg-primary-50 text-primary-700 text-sm px-3 py-1 rounded-full hover:bg-primary-100 transition-colors duration-200">
                            {{ $post->category->name }}
                        </a>
                        <span class="text-sm text-neutral-500 flex items-center ml-auto">
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

        <!-- Pagination -->
        @if($posts->hasPages())
        <div class="mt-12">
            <div class="bg-white rounded-2xl shadow-soft p-4">
                {{ $posts->links() }}
            </div>
        </div>
        @endif
    </div>
</div>
@endsection 
@endsection 