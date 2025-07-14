@extends('layouts.app')

@section('title', $post->title)
@section('meta_description', $post->meta_description ?? Str::limit(strip_tags($post->excerpt), 160))
@section('meta_image', asset($post->featured_image))

@section('content')
<article class="bg-neutral-50" itemscope itemtype="http://schema.org/BlogPosting">
    <!-- Schema.org metadata -->
    <meta itemprop="headline" content="{{ $post->title }}">
    <meta itemprop="description" content="{{ $post->meta_description ?? Str::limit(strip_tags($post->excerpt), 160) }}">
    <meta itemprop="image" content="{{ asset($post->featured_image) }}">
    <meta itemprop="datePublished" content="{{ $post->published_at->toIso8601String() }}">
    <meta itemprop="dateModified" content="{{ $post->updated_at->toIso8601String() }}">

    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-primary-600 to-secondary-600">
        <div class="absolute inset-0 bg-dots-pattern opacity-10"></div>
        <div class="container mx-auto px-4 py-16 md:py-24">
            <div class="max-w-3xl mx-auto">
                <div class="flex items-center mb-8 animate-fade-in">
                    <a href="{{ route('blog.index') }}" class="text-white/80 hover:text-white flex items-center transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        {{ __('Back to Blog') }}
                    </a>
                </div>
                <div class="flex items-center mb-8 animate-slide-up">
                    <img src="{{ asset($post->author->avatar) }}" 
                         alt="{{ $post->author->name }}" 
                         class="w-12 h-12 rounded-full mr-4"
                         loading="lazy"
                         itemprop="image">
                    <div class="text-white">
                        <p class="font-medium" itemprop="author" itemscope itemtype="http://schema.org/Person">
                            <span itemprop="name">{{ $post->author->name }}</span>
                        </p>
                        <div class="text-sm space-x-4">
                            <time datetime="{{ $post->published_at->toIso8601String() }}" itemprop="datePublished" class="text-white/80">
                                {{ $post->published_at->format('M d, Y') }}
                            </time>
                            <span class="text-white/80">·</span>
                            <span class="text-white/80">{{ $post->read_time }} {{ __('min read') }}</span>
                        </div>
                    </div>
                </div>
                <h1 class="text-white mb-6 animate-slide-up" style="animation-delay: 100ms;" itemprop="headline">
                    {{ $post->title }}
                </h1>
                <div class="flex items-center space-x-4 animate-slide-up" style="animation-delay: 200ms;">
                    <a href="{{ route('blog.category', $post->category->slug) }}" 
                       class="bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-full backdrop-blur-sm border border-white/20 transition-colors duration-200">
                        {{ $post->category->name }}
                    </a>
                    @foreach($post->tags as $tag)
                    <a href="{{ route('blog.tag', $tag->slug) }}" 
                       class="text-white/80 hover:text-white transition-colors duration-200">
                        #{{ $tag->name }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container mx-auto px-4 py-12 md:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-soft p-8">
                    <div class="prose prose-lg max-w-none" itemprop="articleBody">
                        {!! $post->content !!}
                    </div>

                    <!-- Share Buttons -->
                    <div class="mt-12 pt-8 border-t border-neutral-200">
                        <h3 class="text-xl font-bold mb-4">{{ __('Share this article') }}</h3>
                        <div class="flex space-x-4">
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}" 
                               target="_blank"
                               rel="noopener noreferrer"
                               class="bg-[#1DA1F2] text-white p-2 rounded-lg hover:bg-[#1a91da] transition-colors duration-200">
                                <span class="sr-only">Share on Twitter</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($post->title) }}" 
                               target="_blank"
                               rel="noopener noreferrer"
                               class="bg-[#0A66C2] text-white p-2 rounded-lg hover:bg-[#095196] transition-colors duration-200">
                                <span class="sr-only">Share on LinkedIn</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                               target="_blank"
                               rel="noopener noreferrer"
                               class="bg-[#1877F2] text-white p-2 rounded-lg hover:bg-[#166fe5] transition-colors duration-200">
                                <span class="sr-only">Share on Facebook</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Author Bio -->
                    <div class="mt-12 pt-8 border-t border-neutral-200">
                        <h3 class="text-2xl font-bold mb-4">{{ __('About the Author') }}</h3>
                        <div class="flex items-start">
                            <img src="{{ asset($post->author->avatar) }}" 
                                 alt="{{ $post->author->name }}" 
                                 class="w-16 h-16 rounded-full mr-6"
                                 loading="lazy">
                            <div>
                                <h4 class="text-xl font-bold mb-2">{{ $post->author->name }}</h4>
                                <p class="text-neutral-600 mb-4">{{ $post->author->bio }}</p>
                                <div class="flex space-x-4">
                                    @if($post->author->twitter)
                                    <a href="{{ $post->author->twitter }}" 
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       class="text-[#1DA1F2] hover:text-[#1a91da] transition-colors duration-200">
                                        <span class="sr-only">Twitter</span>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                                        </svg>
                                    </a>
                                    @endif
                                    @if($post->author->linkedin)
                                    <a href="{{ $post->author->linkedin }}" 
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       class="text-[#0A66C2] hover:text-[#095196] transition-colors duration-200">
                                        <span class="sr-only">LinkedIn</span>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                        </svg>
                                    </a>
                                    @endif
                                    @if($post->author->github)
                                    <a href="{{ $post->author->github }}" 
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       class="text-neutral-900 hover:text-neutral-700 transition-colors duration-200">
                                        <span class="sr-only">GitHub</span>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-8">
                <!-- Related Posts -->
                <div class="bg-white rounded-2xl shadow-soft p-6">
                    <h3 class="text-xl font-bold mb-6">{{ __('Related Posts') }}</h3>
                    <div class="space-y-6">
                        @foreach($relatedPosts as $relatedPost)
                        <article class="group">
                            <h4 class="font-medium mb-2 group-hover:text-primary-600 transition-colors duration-200">
                                <a href="{{ route('blog.show', $relatedPost->slug) }}">
                                    {{ $relatedPost->title }}
                                </a>
                            </h4>
                            <div class="flex items-center text-sm text-neutral-500">
                                <span>{{ $relatedPost->author->name }}</span>
                                <span class="mx-2">·</span>
                                <time datetime="{{ $relatedPost->published_at->toIso8601String() }}">
                                    {{ $relatedPost->published_at->format('M d, Y') }}
                                </time>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>

                <!-- Categories -->
                <div class="bg-white rounded-2xl shadow-soft p-6">
                    <h3 class="text-xl font-bold mb-6">{{ __('More in') }} {{ $post->category->name }}</h3>
                    <div class="space-y-4">
                        @foreach($post->category->posts->take(5) as $categoryPost)
                        <a href="{{ route('blog.show', $categoryPost->slug) }}" 
                           class="block hover:text-primary-600 transition-colors duration-200 {{ $categoryPost->id === $post->id ? 'text-primary-600 font-medium' : '' }}">
                            {{ $categoryPost->title }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
@endsection 