@extends('layouts.app')

@section('title', 'My Projects')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-neutral-50 to-primary-50">
    <div class="container mx-auto px-6 py-12">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-neutral-900 mb-2">My Projects</h1>
                    <p class="text-lg text-neutral-600">Manage and track your digital projects</p>
                </div>
                <a href="{{ route('projects.create') }}" class="bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 shadow-glow hover:shadow-glow/80 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    <span>New Project</span>
                </a>
            </div>
        </div>

        <!-- Projects Grid -->
        @if($projects->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($projects as $project)
                    <div class="bg-white rounded-2xl shadow-soft hover:shadow-large border border-neutral-100 hover:border-primary-200 transition-all duration-300 transform hover:-translate-y-2">
                        <div class="p-6">
                            <!-- Status Badge -->
                            <div class="flex items-center justify-between mb-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    @if($project->status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($project->status === 'in_progress') bg-blue-100 text-blue-800
                                    @else bg-green-100 text-green-800
                                    @endif">
                                    {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                </span>
                                <span class="text-sm text-neutral-500">{{ $project->created_at->diffForHumans() }}</span>
                            </div>

                            <!-- Project Title -->
                            <h3 class="text-xl font-bold text-neutral-900 mb-2">{{ $project->title }}</h3>
                            
                            <!-- Service -->
                            @if($project->service)
                                <p class="text-sm text-primary-600 font-medium mb-3">{{ $project->service->name }}</p>
                            @endif

                            <!-- Description -->
                            <p class="text-neutral-600 mb-4">{{ Str::limit($project->description, 120) }}</p>

                            <!-- Budget -->
                            <div class="flex items-center text-sm text-neutral-500 mb-4">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                </svg>
                                <span>Budget: ${{ number_format($project->budget, 2) }}</span>
                            </div>

                            <!-- Actions -->
                            <div class="flex items-center justify-between">
                                <a href="{{ route('projects.show', $project) }}" class="text-primary-600 hover:text-primary-700 font-semibold text-sm">
                                    View Details
                                </a>
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('projects.edit', $project) }}" class="text-neutral-500 hover:text-neutral-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $projects->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-12">
                <div class="w-24 h-24 bg-gradient-to-br from-primary-50 to-primary-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-neutral-900 mb-2">No Projects Yet</h3>
                <p class="text-neutral-600 mb-6">Start your first project to get things moving!</p>
                <a href="{{ route('projects.create') }}" class="bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 shadow-glow hover:shadow-glow/80 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    <span>Create Your First Project</span>
                </a>
            </div>
        @endif
    </div>
</div>
@endsection 