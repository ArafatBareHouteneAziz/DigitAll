@extends('layouts.app')

@section('title', $project->title)

@section('content')
<div class="min-h-screen bg-gradient-to-br from-neutral-50 to-primary-50">
    <div class="container mx-auto px-6 py-12">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-neutral-900 mb-2">{{ $project->title }}</h1>
                    <p class="text-lg text-neutral-600">Project Details & Communication</p>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('projects.edit', $project) }}" class="bg-white border-2 border-primary-200 hover:border-primary-300 text-primary-600 px-6 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        <span>Edit Project</span>
                    </a>
                    <a href="{{ route('projects.index') }}" class="text-neutral-600 hover:text-neutral-700 font-semibold">
                        ← Back to Projects
                    </a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Project Details -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Project Info Card -->
                <div class="bg-white rounded-2xl shadow-soft border border-neutral-100 p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-neutral-900">Project Information</h2>
                        <span class="px-4 py-2 rounded-full text-sm font-semibold
                            @if($project->status === 'pending') bg-yellow-100 text-yellow-800
                            @elseif($project->status === 'in_progress') bg-blue-100 text-blue-800
                            @else bg-green-100 text-green-800
                            @endif">
                            {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold text-neutral-900 mb-2">Service</h3>
                            <p class="text-primary-600 font-medium">{{ $project->service->name ?? 'Not specified' }}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-neutral-900 mb-2">Budget</h3>
                            <p class="text-2xl font-bold text-primary-600">${{ number_format($project->budget, 2) }}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-neutral-900 mb-2">Start Date</h3>
                            <p class="text-neutral-700">{{ $project->start_date->format('M d, Y') }}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-neutral-900 mb-2">End Date</h3>
                            <p class="text-neutral-700">{{ $project->end_date->format('M d, Y') }}</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-neutral-900 mb-2">Description</h3>
                        <p class="text-neutral-700 leading-relaxed">{{ $project->description }}</p>
                    </div>

                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-neutral-900 mb-2">Requirements</h3>
                        <p class="text-neutral-700 leading-relaxed">{{ $project->requirements }}</p>
                    </div>

                    @if($project->attachments && count($project->attachments) > 0)
                        <div class="mt-6">
                            <h3 class="text-lg font-semibold text-neutral-900 mb-4">Attachments</h3>
                            <div class="space-y-2">
                                @foreach($project->attachments as $attachment)
                                    <a href="{{ asset('storage/' . $attachment['path']) }}" target="_blank" class="flex items-center space-x-3 p-3 bg-neutral-50 rounded-lg hover:bg-neutral-100 transition-colors duration-200">
                                        <svg class="w-5 h-5 text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                        </svg>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-neutral-900">{{ $attachment['name'] }}</p>
                                            <p class="text-xs text-neutral-500">{{ number_format($attachment['size'] / 1024, 1) }} KB</p>
                                        </div>
                                        <svg class="w-4 h-4 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Messages Section -->
                <div class="bg-white rounded-2xl shadow-soft border border-neutral-100 p-8">
                    <h2 class="text-2xl font-bold text-neutral-900 mb-6">Project Messages</h2>
                    
                    @if($project->messages->count() > 0)
                        <div class="space-y-4 max-h-96 overflow-y-auto">
                            @foreach($project->messages as $message)
                                <div class="flex items-start space-x-3">
                                    <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <span class="text-primary-600 font-semibold text-sm">
                                            {{ substr($message->sender->name, 0, 1) }}
                                        </span>
                                    </div>
                                    <div class="flex-1 bg-neutral-50 rounded-xl p-4">
                                        <div class="flex items-center justify-between mb-2">
                                            <h4 class="font-semibold text-neutral-900">{{ $message->sender->name }}</h4>
                                            <span class="text-xs text-neutral-500">{{ $message->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p class="text-neutral-700">{{ $message->content }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="w-12 h-12 text-neutral-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            <p class="text-neutral-600">No messages yet. Start the conversation!</p>
                        </div>
                    @endif

                    <!-- Send Message Form -->
                    <form action="{{ route('messages.store') }}" method="POST" class="mt-6">
                        @csrf
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                        <input type="hidden" name="receiver_id" value="{{ $project->user_id }}">
                        <input type="hidden" name="receiver_type" value="App\Models\User">
                        <input type="hidden" name="subject" value="Project: {{ $project->title }}">
                        
                        <div class="flex space-x-3">
                            <textarea name="content" rows="3" class="flex-1 border border-neutral-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent" placeholder="Type your message..." required></textarea>
                            <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-xl font-semibold transition-colors duration-200 self-end">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Project Stats -->
                <div class="bg-white rounded-2xl shadow-soft border border-neutral-100 p-6">
                    <h3 class="text-lg font-semibold text-neutral-900 mb-4">Project Stats</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-neutral-600">Created</span>
                            <span class="font-medium">{{ $project->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-neutral-600">Messages</span>
                            <span class="font-medium">{{ $project->messages->count() }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-neutral-600">Days Remaining</span>
                            <span class="font-medium">{{ max(0, now()->diffInDays($project->end_date, false)) }}</span>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-2xl shadow-soft border border-neutral-100 p-6">
                    <h3 class="text-lg font-semibold text-neutral-900 mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        <a href="{{ route('messages.index') }}" class="flex items-center space-x-3 p-3 bg-neutral-50 rounded-lg hover:bg-neutral-100 transition-colors duration-200">
                            <svg class="w-5 h-5 text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            <span class="text-sm font-medium">View All Messages</span>
                        </a>
                        <a href="/contact" class="flex items-center space-x-3 p-3 bg-neutral-50 rounded-lg hover:bg-neutral-100 transition-colors duration-200">
                            <svg class="w-5 h-5 text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            <span class="text-sm font-medium">Contact Support</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 