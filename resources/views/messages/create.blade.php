@extends('layouts.app')

@section('title', 'Send Message')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800">
    <div class="container mx-auto px-6 py-12">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <div class="flex items-center space-x-3 mb-2">
                        <div class="h-10 w-10 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full flex items-center justify-center">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                        </div>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ __('Contact Admin') }}</h1>
                    </div>
                    <p class="text-lg text-gray-600 dark:text-gray-400">{{ __('Send a message to the admin team for support and inquiries') }}</p>
                </div>
                <a href="{{ route('messages.index') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    {{ __('Back to Messages') }}
                </a>
            </div>
        </div>

        <!-- Message Form -->
        <div class="max-w-2xl mx-auto">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 p-8">
                @if(session('success'))
                    <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-400 px-6 py-4 rounded-xl mb-6">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="font-semibold">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-400 px-6 py-4 rounded-xl mb-6">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 text-red-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                            <span class="font-semibold">{{ __('Please fix the following errors:') }}</span>
                        </div>
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('messages.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Recipient Selection -->
                    <div>
                        <label for="receiver_id" class="block text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2">
                            {{ __('Send to Admin/Support Team') }} *
                        </label>
                        <select name="receiver_id" id="receiver_id" class="w-full border border-gray-300 dark:border-gray-600 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                            <option value="">{{ __('Select an admin/support team member') }}</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('receiver_id') == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->name }} ({{ $employee->email }}) - {{ $employee->position ?? 'Admin' }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="receiver_type" value="App\Models\Employee">
                    </div>

                    <!-- Project Selection (Optional) -->
                    <div>
                        <label for="project_id" class="block text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2">
                            {{ __('Related Project (Optional)') }}
                        </label>
                        <select name="project_id" id="project_id" class="w-full border border-gray-300 dark:border-gray-600 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                            <option value="">{{ __('No specific project') }}</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                                    {{ $project->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Subject -->
                    <div>
                        <label for="subject" class="block text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2">
                            {{ __('Subject') }} *
                        </label>
                        <input type="text" name="subject" id="subject" value="{{ old('subject') }}" 
                               class="w-full border border-gray-300 dark:border-gray-600 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white" 
                               placeholder="{{ __('Enter message subject') }}" required>
                    </div>

                    <!-- Message Content -->
                    <div>
                        <label for="content" class="block text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2">
                            {{ __('Message') }} *
                        </label>
                        <textarea name="content" id="content" rows="6" 
                                  class="w-full border border-gray-300 dark:border-gray-600 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white" 
                                  placeholder="{{ __('Type your message here...') }}" required>{{ old('content') }}</textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end space-x-4 pt-4">
                        <a href="{{ route('messages.index') }}" 
                           class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-xl font-semibold hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                            {{ __('Cancel') }}
                        </a>
                        <button type="submit" 
                                class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-8 py-3 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 inline-flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            <span>{{ __('Send to Admin') }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // No specific JavaScript logic needed for this form as it only shows one recipient type.
});
</script>
@endsection 