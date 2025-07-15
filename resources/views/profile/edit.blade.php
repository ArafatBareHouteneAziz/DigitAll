@extends('layouts.app')

@section('title', 'Profile Settings')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-neutral-50 to-primary-50">
    <div class="container mx-auto px-6 py-12">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-neutral-900 mb-2">Profile Settings</h1>
                    <p class="text-lg text-neutral-600">Manage your account information and preferences</p>
                </div>
                <a href="{{ route('dashboard') }}" class="text-primary-600 hover:text-primary-700 font-semibold">
                    ← Back to Dashboard
                </a>
            </div>
        </div>

        <div class="max-w-4xl mx-auto space-y-8">
            <!-- Profile Information -->
            <div class="bg-white rounded-2xl shadow-soft border border-neutral-100 p-8">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-primary-100 to-primary-200 rounded-xl flex items-center justify-center">
                        <span class="text-primary-600 font-semibold text-lg">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-neutral-900">Profile Information</h2>
                        <p class="text-neutral-600">Update your account information and email address</p>
                    </div>
                </div>
                @include('profile.partials.update-profile-information-form')
            </div>

            <!-- Update Password -->
            <div class="bg-white rounded-2xl shadow-soft border border-neutral-100 p-8">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-100 to-green-200 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-neutral-900">Update Password</h2>
                        <p class="text-neutral-600">Ensure your account is using a long, random password to stay secure</p>
                    </div>
                </div>
                @include('profile.partials.update-password-form')
            </div>

            <!-- Delete Account -->
            <div class="bg-white rounded-2xl shadow-soft border border-neutral-100 p-8">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-100 to-red-200 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-neutral-900">Delete Account</h2>
                        <p class="text-neutral-600">Permanently delete your account and all of its data</p>
                    </div>
                </div>
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
@endsection
