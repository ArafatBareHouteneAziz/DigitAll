@extends('layouts.app')

@section('title', 'Blog & Insights')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-24 bg-gradient-to-br from-neutral-50 to-primary-50 overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="max-w-4xl mx-auto text-center">
                <span class="inline-block bg-gradient-to-r from-primary-50 to-secondary-50 text-primary-600 px-6 py-3 rounded-full text-sm font-semibold mb-6 border border-primary-100">
                    📚 Blog & Insights
                </span>
                <h1 class="text-4xl md:text-6xl font-bold mb-8 text-neutral-900">
                    Stay Updated with the 
                    <span class="bg-gradient-to-r from-primary-600 to-secondary-600 bg-clip-text text-transparent">
                        Latest in Tech
                    </span>
                </h1>
                <p class="text-xl md:text-2xl text-neutral-600 max-w-3xl mx-auto leading-relaxed">
                    Discover insights, trends, and innovations in sustainable technology that are shaping our future.
                </p>
            </div>
        </div>
    </section>

    <!-- Featured Post -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <article class="max-w-5xl mx-auto bg-white rounded-2xl overflow-hidden shadow-large border border-neutral-100">
                <div class="relative h-96 lg:h-[500px]">
                    <img src="{{ asset('images/modern/blog-1.jpg') }}" alt="Featured post image" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <div class="absolute top-6 left-6">
                        <span class="bg-gradient-to-r from-secondary-500 to-secondary-600 text-white px-4 py-2 rounded-full text-sm font-semibold">Featured</span>
                    </div>
                </div>
                <div class="p-8 lg:p-12">
                    <div class="flex items-center mb-6">
                        <span class="text-neutral-500">June 7, 2025</span>
                        <span class="mx-3 text-neutral-300">•</span>
                        <span class="text-primary-600 font-semibold">Sustainability</span>
                        <span class="mx-3 text-neutral-300">•</span>
                        <span class="text-neutral-500">8 min read</span>
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-bold mb-6 text-neutral-900">World Environment Day 2025: Technology's Role in Environmental Protection</h2>
                    <p class="text-xl text-neutral-600 mb-8 leading-relaxed">Explore how cutting-edge technology is revolutionizing environmental conservation and sustainability practices in 2025 and beyond. From AI-powered monitoring systems to blockchain-based carbon tracking, discover the innovations driving positive environmental change.</p>
                    <div class="flex items-center justify-between">
                        <a href="/blog/world-environment-day-2025" class="group inline-flex items-center text-primary-600 hover:text-primary-700 font-semibold text-lg">
                            Read Full Article
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full flex items-center justify-center">
                                <span class="text-primary-600 font-semibold">ET</span>
                            </div>
                            <div>
                                <p class="font-semibold text-neutral-900">Dr. Emma Thompson</p>
                                <p class="text-sm text-neutral-500">Chief Sustainability Officer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <!-- Article Listings -->
    <section class="py-24 bg-gradient-to-br from-neutral-50 to-secondary-50 relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <!-- Filters -->
            <div class="mb-16">
                <div class="flex flex-wrap gap-4 justify-center">
                    <button class="bg-gradient-to-r from-secondary-600 to-secondary-700 text-white px-6 py-3 rounded-xl text-sm font-semibold shadow-medium">All Articles</button>
                    <button class="bg-white/80 backdrop-blur-xl hover:bg-white text-neutral-600 hover:text-secondary-600 px-6 py-3 rounded-xl text-sm font-semibold border border-neutral-200 hover:border-secondary-200 transition-all duration-200">Sustainability</button>
                    <button class="bg-white/80 backdrop-blur-xl hover:bg-white text-neutral-600 hover:text-secondary-600 px-6 py-3 rounded-xl text-sm font-semibold border border-neutral-200 hover:border-secondary-200 transition-all duration-200">Technology</button>
                    <button class="bg-white/80 backdrop-blur-xl hover:bg-white text-neutral-600 hover:text-secondary-600 px-6 py-3 rounded-xl text-sm font-semibold border border-neutral-200 hover:border-secondary-200 transition-all duration-200">Innovation</button>
                </div>
            </div>

            <!-- Articles Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Article 1 -->
                <article class="group bg-white rounded-2xl overflow-hidden shadow-soft hover:shadow-large border border-neutral-100 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/modern/blog-2.jpg') }}" alt="Blog post image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center mb-4">
                            <span class="text-sm text-neutral-500">May 15, 2025</span>
                            <span class="mx-2 text-neutral-300">•</span>
                            <span class="text-sm text-primary-600 font-semibold">Technology</span>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-neutral-900 group-hover:text-primary-600 transition-colors duration-200">The Future of Green Technology</h3>
                        <p class="text-neutral-600 mb-6 leading-relaxed">Discover the latest trends in sustainable technology and how they're shaping our future across industries.</p>
                        <a href="/blog/future-of-green-technology" class="inline-flex items-center text-primary-600 hover:text-primary-700 font-semibold group/link">
                            Read More
                            <svg class="w-5 h-5 ml-2 group-hover/link:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Article 2 -->
                <article class="group bg-white rounded-2xl overflow-hidden shadow-soft hover:shadow-large border border-neutral-100 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/modern/blog-3.jpg') }}" alt="Blog post image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center mb-4">
                            <span class="text-sm text-neutral-500">May 10, 2025</span>
                            <span class="mx-2 text-neutral-300">•</span>
                            <span class="text-sm text-secondary-600 font-semibold">Innovation</span>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-neutral-900 group-hover:text-secondary-600 transition-colors duration-200">Sustainable Software Development Practices</h3>
                        <p class="text-neutral-600 mb-6 leading-relaxed">Learn how software development can contribute to environmental sustainability through efficient coding practices.</p>
                        <a href="/blog/sustainable-software-development" class="inline-flex items-center text-secondary-600 hover:text-secondary-700 font-semibold group/link">
                            Read More
                            <svg class="w-5 h-5 ml-2 group-hover/link:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Article 3 -->
                <article class="group bg-white rounded-2xl overflow-hidden shadow-soft hover:shadow-large border border-neutral-100 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/modern/blog-1.jpg') }}" alt="Blog post image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center mb-4">
                            <span class="text-sm text-neutral-500">May 5, 2025</span>
                            <span class="mx-2 text-neutral-300">•</span>
                            <span class="text-sm text-tertiary-600 font-semibold">Sustainability</span>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-neutral-900 group-hover:text-tertiary-600 transition-colors duration-200">Smart Homes and Sustainability</h3>
                        <p class="text-neutral-600 mb-6 leading-relaxed">Explore how smart home technology is revolutionizing sustainable living and reducing environmental impact.</p>
                        <a href="/blog/smart-homes-and-sustainability" class="inline-flex items-center text-tertiary-600 hover:text-tertiary-700 font-semibold group/link">
                            Read More
                            <svg class="w-5 h-5 ml-2 group-hover/link:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Article 4 -->
                <article class="group bg-white rounded-2xl overflow-hidden shadow-soft hover:shadow-large border border-neutral-100 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/modern/blog-2.jpg') }}" alt="Blog post image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center mb-4">
                            <span class="text-sm text-neutral-500">April 28, 2025</span>
                            <span class="mx-2 text-neutral-300">•</span>
                            <span class="text-sm text-primary-600 font-semibold">Technology</span>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-neutral-900 group-hover:text-primary-600 transition-colors duration-200">AI in Environmental Monitoring</h3>
                        <p class="text-neutral-600 mb-6 leading-relaxed">How artificial intelligence is transforming environmental monitoring and conservation efforts worldwide.</p>
                        <a href="/blog/ai-environmental-monitoring" class="inline-flex items-center text-primary-600 hover:text-primary-700 font-semibold group/link">
                            Read More
                            <svg class="w-5 h-5 ml-2 group-hover/link:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Article 5 -->
                <article class="group bg-white rounded-2xl overflow-hidden shadow-soft hover:shadow-large border border-neutral-100 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/modern/blog-3.jpg') }}" alt="Blog post image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center mb-4">
                            <span class="text-sm text-neutral-500">April 20, 2025</span>
                            <span class="mx-2 text-neutral-300">•</span>
                            <span class="text-sm text-secondary-600 font-semibold">Innovation</span>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-neutral-900 group-hover:text-secondary-600 transition-colors duration-200">Blockchain for Carbon Credits</h3>
                        <p class="text-neutral-600 mb-6 leading-relaxed">Exploring how blockchain technology is revolutionizing carbon credit trading and environmental accountability.</p>
                        <a href="/blog/blockchain-carbon-credits" class="inline-flex items-center text-secondary-600 hover:text-secondary-700 font-semibold group/link">
                            Read More
                            <svg class="w-5 h-5 ml-2 group-hover/link:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Article 6 -->
                <article class="group bg-white rounded-2xl overflow-hidden shadow-soft hover:shadow-large border border-neutral-100 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/modern/blog-1.jpg') }}" alt="Blog post image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center mb-4">
                            <span class="text-sm text-neutral-500">April 15, 2025</span>
                            <span class="mx-2 text-neutral-300">•</span>
                            <span class="text-sm text-tertiary-600 font-semibold">Sustainability</span>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-neutral-900 group-hover:text-tertiary-600 transition-colors duration-200">Circular Economy in Tech</h3>
                        <p class="text-neutral-600 mb-6 leading-relaxed">How the circular economy model is being applied to technology manufacturing and waste reduction.</p>
                        <a href="/blog/circular-economy-tech" class="inline-flex items-center text-tertiary-600 hover:text-tertiary-700 font-semibold group/link">
                            Read More
                            <svg class="w-5 h-5 ml-2 group-hover/link:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </article>
            </div>

            <!-- Pagination -->
            <div class="mt-16 flex justify-center">
                <nav class="inline-flex rounded-xl shadow-soft border border-neutral-200 bg-white">
                    <a href="#" class="px-4 py-3 rounded-l-xl border-r border-neutral-200 bg-white text-sm font-semibold text-neutral-500 hover:bg-neutral-50 transition-colors duration-200">
                        Previous
                    </a>
                    <a href="#" class="px-4 py-3 border-r border-neutral-200 bg-gradient-to-r from-primary-600 to-primary-700 text-white text-sm font-semibold">
                        1
                    </a>
                    <a href="#" class="px-4 py-3 border-r border-neutral-200 bg-white text-sm font-semibold text-neutral-600 hover:bg-neutral-50 transition-colors duration-200">
                        2
                    </a>
                    <a href="#" class="px-4 py-3 border-r border-neutral-200 bg-white text-sm font-semibold text-neutral-600 hover:bg-neutral-50 transition-colors duration-200">
                        3
                    </a>
                    <a href="#" class="px-4 py-3 rounded-r-xl bg-white text-sm font-semibold text-neutral-500 hover:bg-neutral-50 transition-colors duration-200">
                        Next
                    </a>
                </nav>
            </div>
        </div>
    </section>

    <!-- Newsletter Signup -->
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
                    Stay Updated with Our 
                    <span class="bg-gradient-to-r from-primary-400 to-secondary-400 bg-clip-text text-transparent">
                        Latest Insights
                    </span>
                </h2>
                <p class="text-xl md:text-2xl mb-12 text-neutral-200 leading-relaxed">
                    Join our newsletter to receive the latest updates on sustainable technology, innovation trends, and industry insights.
                </p>
                <div class="max-w-2xl mx-auto">
                    <form class="flex flex-col sm:flex-row gap-4">
                        <input type="email" placeholder="Enter your email address" class="flex-1 px-6 py-4 rounded-xl bg-white/10 backdrop-blur-xl border border-white/20 text-white placeholder-neutral-300 focus:outline-none focus:ring-2 focus:ring-primary-400 focus:border-transparent">
                        <button type="submit" class="group bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-glow hover:shadow-glow/80 transform hover:-translate-y-1 inline-flex items-center justify-center space-x-2">
                            <span>Subscribe</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </button>
                    </form>
                    <p class="text-sm text-neutral-300 mt-6">No spam, unsubscribe at any time. We respect your privacy.</p>
                </div>
            </div>
        </div>
    </section>
@endsection 