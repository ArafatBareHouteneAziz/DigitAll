<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!-- Primary Meta Tags -->
        <title>{{ config('app.name', 'DigitAll') }}@hasSection('title') - @yield('title')@endif</title>
        <meta name="title" content="{{ config('app.name', 'DigitAll') }}@hasSection('title') - @yield('title')@endif">
        <meta name="description" content="@yield('meta_description', 'DigitAll - Innovative Tech Solutions for a Sustainable Future. We combine cutting-edge technology with environmental responsibility.')">
        
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="{{ config('app.name', 'DigitAll') }}@hasSection('title') - @yield('title')@endif">
        <meta property="og:description" content="@yield('meta_description', 'DigitAll - Innovative Tech Solutions for a Sustainable Future. We combine cutting-edge technology with environmental responsibility.')">
        <meta property="og:image" content="@yield('meta_image', asset('images/og-image.jpg'))">
        
        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ url()->current() }}">
        <meta property="twitter:title" content="{{ config('app.name', 'DigitAll') }}@hasSection('title') - @yield('title')@endif">
        <meta property="twitter:description" content="@yield('meta_description', 'DigitAll - Innovative Tech Solutions for a Sustainable Future. We combine cutting-edge technology with environmental responsibility.')">
        <meta property="twitter:image" content="@yield('meta_image', asset('images/og-image.jpg'))">

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
        <link rel="manifest" href="{{ asset('site.webmanifest') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        
        <!-- Scripts and Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Alpine.js -->
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Custom Styles -->
        <style>
            [x-cloak] { display: none !important; }
            
            /* Smooth Scrolling */
            html {
                scroll-behavior: smooth;
            }
            
            /* Typography */
            @layer base {
                h1 { @apply text-4xl md:text-5xl lg:text-6xl font-bold leading-tight; }
                h2 { @apply text-3xl md:text-4xl font-bold leading-tight; }
                h3 { @apply text-2xl md:text-3xl font-bold leading-tight; }
                h4 { @apply text-xl md:text-2xl font-bold leading-tight; }
                p { @apply text-base md:text-lg leading-relaxed; }
            }
            
            /* Custom Scrollbar */
            ::-webkit-scrollbar {
                width: 10px;
                height: 10px;
            }
            
            ::-webkit-scrollbar-track {
                background: theme('colors.neutral.100');
            }
            
            ::-webkit-scrollbar-thumb {
                background: theme('colors.primary.200');
                border-radius: 5px;
            }
            
            ::-webkit-scrollbar-thumb:hover {
                background: theme('colors.primary.300');
            }
        </style>
    </head>
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/6875189fb00c4c190e1c937d/1j04mgd0a';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    <body class="font-sans antialiased bg-neutral-50 text-neutral-900 min-h-screen flex flex-col">
        <!-- Skip to main content for accessibility -->
        <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-primary-600 text-white px-4 py-2 rounded-lg z-50">
            {{ __('Skip to main content') }}
        </a>

        <!-- Header -->
        <header class="bg-white/80 backdrop-blur-xl fixed w-full top-0 z-50 border-b border-neutral-200/50 shadow-soft">
            <nav class="container mx-auto px-6 py-4" x-data="{ isOpen: false }">
                <div class="flex justify-between items-center">
                    <!-- Logo -->
                    <a href="/" class="flex items-center space-x-3 group">
                        <div class="relative">
                            <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl flex items-center justify-center shadow-glow group-hover:shadow-glow/80 transition-all duration-300">
                                <svg class="w-6 h-6 text-white" fill="white" stroke="currentColor" viewBox="0 0 375 350">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="m200 0a175 175 0 0 1 0 350h-50-100v-150h50v-50h50v100h50a75 75 0 0 0 0-150h-100v-50h50v-50m-50 50v-50h-50v50m0 0h-50v50h50m0 0v50h50v-50m0 0"/>
                                </svg>
                            </div>
                            <div class="absolute -inset-1 bg-gradient-to-r from-primary-400 to-secondary-400 rounded-xl blur opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                        </div>
                        <div>
                            <span class="text-2xl font-bold bg-gradient-to-r from-neutral-900 to-neutral-700 bg-clip-text text-transparent">Digit'</span><span class="text-2xl font-bold bg-gradient-to-r from-primary-600 to-secondary-600 bg-clip-text text-transparent">'All</span>
                        </div>
                    </a>

                    <!-- Desktop Navigation -->
                    <div class="hidden lg:flex items-center space-x-8">
                        <a href="/about" class="text-neutral-600 hover:text-primary-600 font-medium transition-all duration-200 relative group">
                            {{ __('About Us') }}
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-primary-500 to-secondary-500 group-hover:w-full transition-all duration-300"></span>
                        </a>
                        <a href="/services" class="text-neutral-600 hover:text-primary-600 font-medium transition-all duration-200 relative group">
                            {{ __('Services') }}
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-primary-500 to-secondary-500 group-hover:w-full transition-all duration-300"></span>
                        </a>
                        <a href="/blog" class="text-neutral-600 hover:text-primary-600 font-medium transition-all duration-200 relative group">
                            {{ __('Blog/Insights') }}
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-primary-500 to-secondary-500 group-hover:w-full transition-all duration-300"></span>
                        </a>
                        
                        @auth
                            <!-- Authenticated User Menu -->
                            <div class="relative" x-data="{ isUserOpen: false }">
                                <button @click="isUserOpen = !isUserOpen" class="flex items-center space-x-2 text-neutral-600 hover:text-primary-600 transition-colors duration-200">
                                    <div class="w-8 h-8 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full flex items-center justify-center">
                                        <span class="text-primary-600 font-semibold text-sm">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                    </div>
                                    <span class="hidden sm:block text-sm font-medium">{{ auth()->user()->name }}</span>
                                    <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': isUserOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </button>
                                
                                <!-- User dropdown -->
                                <div x-show="isUserOpen" 
                                    @click.away="isUserOpen = false"
                                    x-transition:enter="transition ease-out duration-200" 
                                    x-transition:enter-start="opacity-0 transform scale-95 -translate-y-2" 
                                    x-transition:enter-end="opacity-100 transform scale-100 translate-y-0" 
                                    x-transition:leave="transition ease-in duration-150" 
                                    x-transition:leave-start="opacity-100 transform scale-100 translate-y-0" 
                                    x-transition:leave-end="opacity-0 transform scale-95 -translate-y-2"
                                    class="absolute right-0 mt-2 w-56 bg-white/95 backdrop-blur-xl rounded-xl shadow-large border border-neutral-200/50 py-2 z-50">
                                    
                                    <div class="px-4 py-3 border-b border-neutral-200">
                                        <p class="text-sm font-medium text-neutral-900">{{ auth()->user()->name }}</p>
                                        <p class="text-xs text-neutral-500">{{ auth()->user()->email }}</p>
                                    </div>
                                    
                                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-4 py-2 text-neutral-600 hover:text-primary-600 hover:bg-neutral-50 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                                        </svg>
                                        <span>Dashboard</span>
                                    </a>
                                    
                                    <a href="{{ route('projects.index') }}" class="flex items-center space-x-3 px-4 py-2 text-neutral-600 hover:text-primary-600 hover:bg-neutral-50 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        <span>My Projects</span>
                                    </a>
                                    
                                    <a href="{{ route('messages.index') }}" class="flex items-center space-x-3 px-4 py-2 text-neutral-600 hover:text-primary-600 hover:bg-neutral-50 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                        </svg>
                                        <span>Messages</span>
                                        @if(auth()->user()->unreadMessages()->count() > 0)
                                            <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">{{ auth()->user()->unreadMessages()->count() }}</span>
                                        @endif
                                    </a>
                                    
                                    <a href="{{ route('profile.edit') }}" class="flex items-center space-x-3 px-4 py-2 text-neutral-600 hover:text-primary-600 hover:bg-neutral-50 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        <span>Profile</span>
                                    </a>
                                    
                                    <div class="border-t border-neutral-200 mt-2 pt-2">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="flex items-center space-x-3 px-4 py-2 text-neutral-600 hover:text-red-600 hover:bg-red-50 transition-all duration-200 w-full text-left">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                                </svg>
                                                <span>Logout</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- Guest User -->
                            <a href="/contact" class="bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white px-6 py-3 rounded-xl font-medium transition-all duration-200 shadow-medium hover:shadow-large transform hover:-translate-y-0.5">
                                {{ __('Get Started') }}
                            </a>
                            <a href="{{ route('login') }}" class="text-neutral-600 hover:text-primary-600 font-medium transition-all duration-200">
                                {{ __('Login') }}
                            </a>
                        @endauth
                        
                        <!-- linked to ShabbyTech Website on same ip but different port 81 -->
                        <a href="http://{{ env('SHABBY_URL') }}" target="_blank" class="text-neutral-600 hover:text-primary-600 font-medium transition-all duration-200 relative group">
                            {{ __('ShabbyTech') }}
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-primary-500 to-secondary-500 group-hover:w-full transition-all duration-300"></span>
                        </a>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex items-center space-x-2">
                        <button @click="isOpen = !isOpen" class="lg:hidden text-neutral-600 hover:text-primary-600 transition-colors duration-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path x-show="!isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                                <path x-show="isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                        <!-- language selector with flag icons inside dropdown menu -->
                        <div class="relative" x-data="{ isLanguageOpen: false }">
                            <button @click="isLanguageOpen = !isLanguageOpen" class="flex items-center space-x-2 text-neutral-600 hover:text-primary-600 transition-colors duration-200">
                                <!-- Current language flag -->
                                <span class="text-lg">
                                    @if(app()->getLocale() == 'en')
                                        🇺🇸
                                    @elseif(app()->getLocale() == 'es')
                                        🇪🇸
                                    @elseif(app()->getLocale() == 'fr')
                                        🇫🇷
                                    @elseif(app()->getLocale() == 'de')
                                        🇩🇪
                                    @else
                                        🌐
                                    @endif
                                </span>
                                <span class="hidden sm:block text-sm font-medium">{{ strtoupper(app()->getLocale()) }}</span>
                                <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': isLanguageOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            
                            <!-- Language dropdown -->
                            <div x-show="isLanguageOpen" 
                                @click.away="isLanguageOpen = false"
                                x-transition:enter="transition ease-out duration-200" 
                                x-transition:enter-start="opacity-0 transform scale-95 -translate-y-2" 
                                x-transition:enter-end="opacity-100 transform scale-100 translate-y-0" 
                                x-transition:leave="transition ease-in duration-150" 
                                x-transition:leave-start="opacity-100 transform scale-100 translate-y-0" 
                                x-transition:leave-end="opacity-0 transform scale-95 -translate-y-2"
                                class="absolute right-0 mt-2 w-48 bg-white/95 backdrop-blur-xl rounded-xl shadow-large border border-neutral-200/50 py-2 z-50">
                                
                                <a href="{{ route('language.switch', 'en') }}" class="flex items-center space-x-3 px-4 py-2 text-neutral-600 hover:text-primary-600 hover:bg-neutral-50 transition-all duration-200">
                                    <span class="text-lg">🇺🇸</span>
                                    <span class="font-medium">English</span>
                                    @if(app()->getLocale() == 'en')
                                        <svg class="w-4 h-4 text-primary-600 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    @endif
                                </a>
                                
                                <a href="{{ route('language.switch', 'es') }}" class="flex items-center space-x-3 px-4 py-2 text-neutral-600 hover:text-primary-600 hover:bg-neutral-50 transition-all duration-200">
                                    <span class="text-lg">🇪🇸</span>
                                    <span class="font-medium">Español</span>
                                    @if(app()->getLocale() == 'es')
                                        <svg class="w-4 h-4 text-primary-600 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    @endif
                                </a>
                                
                                <a href="{{ route('language.switch', 'fr') }}" class="flex items-center space-x-3 px-4 py-2 text-neutral-600 hover:text-primary-600 hover:bg-neutral-50 transition-all duration-200">
                                    <span class="text-lg">🇫🇷</span>
                                    <span class="font-medium">Français</span>
                                    @if(app()->getLocale() == 'fr')
                                        <svg class="w-4 h-4 text-primary-600 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    @endif
                                </a>
                                
                                <a href="{{ route('language.switch', 'de') }}" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-neutral-50 transition-colors duration-200 {{ app()->getLocale() == 'de' ? 'bg-primary-50 text-primary-600' : 'text-neutral-600' }}">
                                    <span class="text-lg">🇩🇪</span>
                                    <span class="text-sm font-medium">{{ __('Deutsch') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile Navigation -->
                <div x-show="isOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-2" class="lg:hidden mt-6 bg-white/95 backdrop-blur-xl rounded-2xl shadow-large border border-neutral-200/50 p-6">
                    <div class="space-y-4">
                        <a href="/about" class="block py-3 text-neutral-600 hover:text-primary-600 font-medium transition-colors duration-200">{{ __('About Us') }}</a>
                        <a href="/services" class="block py-3 text-neutral-600 hover:text-primary-600 font-medium transition-colors duration-200">{{ __('Services') }}</a>
                        <a href="/blog" class="block py-3 text-neutral-600 hover:text-primary-600 font-medium transition-colors duration-200">{{ __('Blog/Insights') }}</a>
                        <a href="/contact" class="block py-3 text-primary-600 font-medium">{{ __('Contact') }}</a>
                        <a href="http://{{ env('SHABBY_URL') }}" target="_blank" class="block py-3 text-neutral-600 hover:text-primary-600 font-medium transition-colors duration-200">{{ __('ShabbyTech') }}</a>
                        
                        @auth
                            <!-- Mobile User Menu -->
                            <div class="pt-4 border-t border-neutral-200">
                                <div class="flex items-center space-x-3 mb-4">
                                    <div class="w-10 h-10 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full flex items-center justify-center">
                                        <span class="text-primary-600 font-semibold">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                    </div>
                                    <div>
                                        <p class="font-medium text-neutral-900">{{ auth()->user()->name }}</p>
                                        <p class="text-sm text-neutral-500">{{ auth()->user()->email }}</p>
                                    </div>
                                </div>
                                
                                <div class="space-y-2">
                                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 py-3 text-neutral-600 hover:text-primary-600 font-medium transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                                        </svg>
                                        <span>Dashboard</span>
                                    </a>
                                    
                                    <a href="{{ route('projects.index') }}" class="flex items-center space-x-3 py-3 text-neutral-600 hover:text-primary-600 font-medium transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        <span>My Projects</span>
                                    </a>
                                    
                                    <a href="{{ route('messages.index') }}" class="flex items-center space-x-3 py-3 text-neutral-600 hover:text-primary-600 font-medium transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                        </svg>
                                        <span>Messages</span>
                                        @if(auth()->user()->unreadMessages()->count() > 0)
                                            <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">{{ auth()->user()->unreadMessages()->count() }}</span>
                                        @endif
                                    </a>
                                    
                                    <a href="{{ route('profile.edit') }}" class="flex items-center space-x-3 py-3 text-neutral-600 hover:text-primary-600 font-medium transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        <span>Profile</span>
                                    </a>
                                    
                                    <form method="POST" action="{{ route('logout') }}" class="pt-2 border-t border-neutral-200">
                                        @csrf
                                        <button type="submit" class="flex items-center space-x-3 py-3 text-neutral-600 hover:text-red-600 font-medium transition-colors duration-200 w-full text-left">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                            </svg>
                                            <span>Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <!-- Mobile Guest Menu -->
                            <div class="pt-4 border-t border-neutral-200">
                                <a href="{{ route('login') }}" class="block py-3 text-neutral-600 hover:text-primary-600 font-medium transition-colors duration-200">{{ __('Login') }}</a>
                                <a href="{{ route('register') }}" class="block py-3 text-primary-600 font-medium">{{ __('Register') }}</a>
                            </div>
                        @endauth
                        
                        <!-- Mobile Language Selector -->
                        <div class="pt-4 border-t border-neutral-200">
                            <h4 class="text-sm font-semibold text-neutral-700 mb-3">{{ __('Language') }}</h4>
                            <div class="grid grid-cols-2 gap-2">
                                <a href="{{ route('language.switch', 'en') }}" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-neutral-50 transition-colors duration-200 {{ app()->getLocale() == 'en' ? 'bg-primary-50 text-primary-600' : 'text-neutral-600' }}">
                                    <span class="text-lg">🇺🇸</span>
                                    <span class="text-sm font-medium">{{ __('English') }}</span>
                                </a>
                                <a href="{{ route('language.switch', 'es') }}" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-neutral-50 transition-colors duration-200 {{ app()->getLocale() == 'es' ? 'bg-primary-50 text-primary-600' : 'text-neutral-600' }}">
                                    <span class="text-lg">🇪🇸</span>
                                    <span class="text-sm font-medium">{{ __('Español') }}</span>
                                </a>
                                <a href="{{ route('language.switch', 'fr') }}" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-neutral-50 transition-colors duration-200 {{ app()->getLocale() == 'fr' ? 'bg-primary-50 text-primary-600' : 'text-neutral-600' }}">
                                    <span class="text-lg">🇫🇷</span>
                                    <span class="text-sm font-medium">{{ __('Français') }}</span>
                                </a>
                                <a href="{{ route('language.switch', 'de') }}" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-neutral-50 transition-colors duration-200 {{ app()->getLocale() == 'de' ? 'bg-primary-50 text-primary-600' : 'text-neutral-600' }}">
                                    <span class="text-lg">🇩🇪</span>
                                    <span class="text-sm font-medium">{{ __('Deutsch') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Main Content -->
        <main id="main-content" class="flex-grow pt-20">
            <!-- Flash Messages -->
            @if (session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="fixed top-24 right-4 z-50">
                    <div class="bg-green-50 text-green-800 px-4 py-3 rounded-lg shadow-lg border border-green-100 flex items-center space-x-3">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <p>{{ session('success') }}</p>
                        <button @click="show = false" class="text-green-600 hover:text-green-800">
                            <span class="sr-only">Dismiss</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="fixed top-24 right-4 z-50">
                    <div class="bg-red-50 text-red-800 px-4 py-3 rounded-lg shadow-lg border border-red-100 flex items-center space-x-3">
                        <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <p>{{ session('error') }}</p>
                        <button @click="show = false" class="text-red-600 hover:text-red-800">
                            <span class="sr-only">Dismiss</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gradient-to-br from-neutral-900 via-neutral-800 to-neutral-900 text-white relative overflow-hidden mt-auto">
            <!-- Background Pattern -->
            <div class="absolute inset-0 bg-hero-pattern opacity-5"></div>
            
            <div class="container mx-auto px-6 py-16 relative">
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
                    <!-- Company Info -->
                    <div class="lg:col-span-2">
                        <div class="flex items-center space-x-3 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-secondary-500 rounded-xl flex items-center justify-center shadow-glow">
                                <svg class="w-7 h-7 text-white" fill="white" stroke="currentColor" viewBox="0 0 375 350">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="m200 0a175 175 0 0 1 0 350h-50-100v-150h50v-50h50v100h50a75 75 0 0 0 0-150h-100v-50h50v-50m-50 50v-50h-50v50m0 0h-50v50h50m0 0v50h50v-50m0 0"/>
                                </svg>
                            </div>
                            <div>
                                <span class="text-3xl font-bold text-white">Digit</span>
                                <span class="text-3xl font-bold bg-gradient-to-r from-primary-400 to-secondary-400 bg-clip-text text-transparent">All</span>
                            </div>
                        </div>
                        <p class="text-neutral-300 text-lg mb-8 leading-relaxed">
                            {{ __('Pioneering innovative technology solutions that drive sustainable progress and create a better future for all.') }}
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-neutral-800 hover:bg-primary-600 rounded-xl flex items-center justify-center transition-all duration-200 group">
                                <svg class="w-5 h-5 text-neutral-400 group-hover:text-white transition-colors duration-200" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-neutral-800 hover:bg-primary-600 rounded-xl flex items-center justify-center transition-all duration-200 group">
                                <svg class="w-5 h-5 text-neutral-400 group-hover:text-white transition-colors duration-200" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-xl font-semibold mb-6 text-white">{{ __('Quick Links') }}</h3>
                        <ul class="space-y-3">
                            <li><a href="/" class="text-neutral-300 hover:text-white transition-colors duration-200 hover:translate-x-1 transform inline-block">{{ __('Home') }}</a></li>
                            <li><a href="/about" class="text-neutral-300 hover:text-white transition-colors duration-200 hover:translate-x-1 transform inline-block">{{ __('About Us') }}</a></li>
                            <li><a href="/services" class="text-neutral-300 hover:text-white transition-colors duration-200 hover:translate-x-1 transform inline-block">{{ __('Services') }}</a></li>
                            <li><a href="/blog" class="text-neutral-300 hover:text-white transition-colors duration-200 hover:translate-x-1 transform inline-block">{{ __('Blog/Insights') }}</a></li>
                            <li><a href="/contact" class="text-neutral-300 hover:text-white transition-colors duration-200 hover:translate-x-1 transform inline-block">{{ __('Contact') }}</a></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <h3 class="text-xl font-semibold mb-6 text-white">{{ __('Get in Touch') }}</h3>
                        <ul class="space-y-3">
                            <li class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <a href="mailto:info@digit--all.com" class="text-neutral-300 hover:text-white transition-colors duration-200">{{ __('info@digit--all.com') }}</a>
                            </li>
                            <li class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                </svg>
                                <a href="https://www.digit--all.com" class="text-neutral-300 hover:text-white transition-colors duration-200">{{ __('www.digit--all.com') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="mt-12 pt-8 border-t border-neutral-700">
                    <div class="flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0">
                        <p class="text-neutral-400">{{ __('© 2025 DigitAll. All rights reserved.') }}</p>
                        <div class="flex space-x-6">
                            <span class="text-sm text-neutral-400">{{ __('#InnovationMeetsSustainability') }}</span>
                            <span class="text-sm text-neutral-400">{{ __('#FutureOfTech') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Loading Indicator -->
        <div x-data="{ loading: false }" 
             x-show="loading" 
             x-on:loading.window="loading = true" 
             x-on:loaded.window="loading = false"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-50"
             style="display: none;">
            <div class="bg-white rounded-xl p-4 shadow-xl">
                <div class="animate-spin rounded-full h-12 w-12 border-4 border-primary-400 border-t-transparent"></div>
            </div>
        </div>
    </body>
</html>
