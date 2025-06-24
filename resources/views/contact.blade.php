@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-24 bg-gradient-to-br from-neutral-50 to-primary-50 overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="max-w-4xl mx-auto text-center">
                <span class="inline-block bg-gradient-to-r from-primary-50 to-secondary-50 text-primary-600 px-6 py-3 rounded-full text-sm font-semibold mb-6 border border-primary-100">
                    📞 {{ __('Get in Touch') }}
                </span>
                <h1 class="text-4xl md:text-6xl font-bold mb-8 text-neutral-900">
                    {{ __('Let\'s Build a') }} 
                    <span class="bg-gradient-to-r from-primary-600 to-secondary-600 bg-clip-text text-transparent">
                        {{ __('Sustainable Future') }}
                    </span>
                </h1>
                <p class="text-xl md:text-2xl text-neutral-600 max-w-3xl mx-auto leading-relaxed">
                    {{ __('Ready to transform your ideas into sustainable technology solutions? We\'re here to help you make a positive impact.') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Form & Info -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- Contact Form -->
                <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-large border border-neutral-100 p-8 lg:p-12">
                    <h2 class="text-3xl font-bold mb-8 text-neutral-900">{{ __('Send Us a Message') }}</h2>

                    @if(session('success'))
                        <div class="bg-gradient-to-r from-secondary-50 to-secondary-100 border border-secondary-200 text-secondary-700 px-6 py-4 rounded-xl relative mb-8" role="alert">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-secondary-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="font-semibold">{{ session('success') }}</span>
                            </div>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="bg-gradient-to-r from-red-50 to-red-100 border border-red-200 text-red-700 px-6 py-4 rounded-xl relative mb-8" role="alert">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-red-600 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <p class="font-semibold mb-2">{{ __('Please fix the following errors:') }}</p>
                                    <ul class="list-disc list-inside space-y-1">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-neutral-700 font-semibold mb-3">{{ __('Full Name') }}</label>
                                <input type="text" id="name" name="name" required value="{{ old('name') }}"
                                    class="w-full px-4 py-4 rounded-xl border border-neutral-200 focus:outline-none focus:ring-2 focus:ring-primary-400 focus:border-transparent bg-white/50 backdrop-blur-xl transition-all duration-200 @error('name') border-red-300 focus:ring-red-400 @enderror"
                                    placeholder="{{ __('Enter your full name') }}">
                            </div>
                            <div>
                                <label for="email" class="block text-neutral-700 font-semibold mb-3">{{ __('Email Address') }}</label>
                                <input type="email" id="email" name="email" required value="{{ old('email') }}"
                                    class="w-full px-4 py-4 rounded-xl border border-neutral-200 focus:outline-none focus:ring-2 focus:ring-primary-400 focus:border-transparent bg-white/50 backdrop-blur-xl transition-all duration-200 @error('email') border-red-300 focus:ring-red-400 @enderror"
                                    placeholder="{{ __('Enter your email address') }}">
                            </div>
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-neutral-700 font-semibold mb-3">{{ __('Subject') }}</label>
                            <select id="subject" name="subject" required
                                class="w-full px-4 py-4 rounded-xl border border-neutral-200 focus:outline-none focus:ring-2 focus:ring-primary-400 focus:border-transparent bg-white/50 backdrop-blur-xl transition-all duration-200 @error('subject') border-red-300 focus:ring-red-400 @enderror">
                                <option value="">{{ __('Select a subject') }}</option>
                                <option value="general" {{ old('subject') == 'general' ? 'selected' : '' }}>{{ __('General Inquiry') }}</option>
                                <option value="eco-smart-home" {{ old('subject') == 'eco-smart-home' ? 'selected' : '' }}>{{ __('Eco-Smart Home Solutions') }}</option>
                                <option value="green-robotics" {{ old('subject') == 'green-robotics' ? 'selected' : '' }}>{{ __('Green Robotics & Automation') }}</option>
                                <option value="digital-innovation" {{ old('subject') == 'digital-innovation' ? 'selected' : '' }}>{{ __('Digital Innovation') }}</option>
                                <option value="consulting" {{ old('subject') == 'consulting' ? 'selected' : '' }}>{{ __('Consulting Services') }}</option>
                                <option value="software" {{ old('subject') == 'software' ? 'selected' : '' }}>{{ __('Software Development') }}</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="message" class="block text-neutral-700 font-semibold mb-3">{{ __('Message') }}</label>
                            <textarea id="message" name="message" rows="6" required
                                class="w-full px-4 py-4 rounded-xl border border-neutral-200 focus:outline-none focus:ring-2 focus:ring-primary-400 focus:border-transparent bg-white/50 backdrop-blur-xl transition-all duration-200 @error('message') border-red-300 focus:ring-red-400 @enderror"
                                placeholder="{{ __('Tell us about your project or inquiry...') }}">{{ old('message') }}</textarea>
                        </div>
                        
                        <button type="submit"
                            class="w-full group bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-semibold py-4 rounded-xl transition-all duration-300 shadow-glow hover:shadow-glow/80 transform hover:-translate-y-1 inline-flex items-center justify-center space-x-2">
                            <span>{{ __('Send Message') }}</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="space-y-8">
                    <div class="bg-gradient-to-br from-neutral-50 to-primary-50 rounded-2xl p-8 lg:p-12 border border-neutral-100">
                        <h2 class="text-3xl font-bold mb-8 text-neutral-900">{{ __('Contact Information') }}</h2>
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-primary-50 to-primary-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-neutral-900 mb-1">{{ __('Email') }}</h3>
                                    <a href="mailto:info@digitall.com" class="text-primary-600 hover:text-primary-700 transition-colors duration-200">{{ __('info@digitall.com') }}</a>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-secondary-50 to-secondary-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-neutral-900 mb-1">{{ __('Website') }}</h3>
                                    <a href="https://www.digitall.com" class="text-secondary-600 hover:text-secondary-700 transition-colors duration-200">{{ __('www.digitall.com') }}</a>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-tertiary-50 to-tertiary-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-tertiary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-neutral-900 mb-1">{{ __('Response Time') }}</h3>
                                    <p class="text-neutral-600">{{ __('We typically respond within 24 hours') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="bg-gradient-to-br from-neutral-50 to-secondary-50 rounded-2xl p-8 lg:p-12 border border-neutral-100">
                        <h2 class="text-3xl font-bold mb-8 text-neutral-900">{{ __('Connect With Us') }}</h2>
                        <div class="flex space-x-4 mb-6">
                            <a href="#" class="w-12 h-12 bg-gradient-to-br from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 rounded-xl flex items-center justify-center transition-all duration-200 shadow-medium hover:shadow-large transform hover:-translate-y-1 group">
                                <svg class="w-6 h-6 text-white group-hover:scale-110 transition-transform duration-200" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                                </svg>
                            </a>
                            <a href="#" class="w-12 h-12 bg-gradient-to-br from-secondary-500 to-secondary-600 hover:from-secondary-600 hover:to-secondary-700 rounded-xl flex items-center justify-center transition-all duration-200 shadow-medium hover:shadow-large transform hover:-translate-y-1 group">
                                <svg class="w-6 h-6 text-white group-hover:scale-110 transition-transform duration-200" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                            </a>
                        </div>
                        <div class="space-y-2">
                            <p class="text-sm text-neutral-600 font-medium">#DigitAllForGreenTech</p>
                            <p class="text-sm text-neutral-600 font-medium">#WorldEnvironmentDay</p>
                            <p class="text-sm text-neutral-600 font-medium">#SustainableInnovation</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-24 bg-gradient-to-br from-neutral-50 to-secondary-50 relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-8 text-neutral-900">
                    {{ __('Find Us') }} 
                    <span class="bg-gradient-to-r from-secondary-600 to-secondary-700 bg-clip-text text-transparent">
                        {{ __('Worldwide') }}
                    </span>
                </h2>
                <p class="text-xl text-neutral-600 max-w-3xl mx-auto">
                    {{ __('We work with clients globally to create sustainable technology solutions that make a difference.') }}
                </p>
            </div>
            
            <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-large border border-neutral-100 overflow-hidden">
                <div class="h-96 lg:h-[500px] relative">
                    <!-- Replace with actual map implementation -->
                    <div class="absolute inset-0 bg-gradient-to-br from-neutral-100 to-neutral-200 flex items-center justify-center">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-glow">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <p class="text-neutral-600 font-semibold">{{ __('Interactive Map Coming Soon') }}</p>
                            <p class="text-neutral-500 text-sm mt-2">{{ __('We\'re working on an interactive map to show our global presence') }}</p>
                        </div>
                    </div>
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
                    {{ __('Ready to Start Your') }} 
                    <span class="bg-gradient-to-r from-primary-400 to-secondary-400 bg-clip-text text-transparent">
                        {{ __('Sustainable Journey?') }}
                    </span>
                </h2>
                <p class="text-xl md:text-2xl mb-12 text-neutral-200 leading-relaxed">
                    {{ __('Let\'s work together to create innovative solutions that drive sustainable progress and make a positive impact on our world.') }}
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                    <a href="/services" class="group bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white px-10 py-4 rounded-xl font-semibold transition-all duration-300 shadow-glow hover:shadow-glow/80 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                        <span>{{ __('Explore Services') }}</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="/about" class="group bg-white/10 backdrop-blur-xl hover:bg-white/20 text-white px-10 py-4 rounded-xl font-semibold transition-all duration-300 border border-white/20 hover:border-white/40 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                        <span>{{ __('Learn About Us') }}</span>
                        <svg class="w-5 h-5 group-hover:rotate-45 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection 