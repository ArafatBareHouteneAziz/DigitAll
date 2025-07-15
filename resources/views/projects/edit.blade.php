@extends('layouts.app')

@section('title', 'Edit Project - ' . $project->title)

@section('content')
<div class="min-h-screen bg-gradient-to-br from-neutral-50 to-primary-50">
    <div class="container mx-auto px-6 py-12">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-neutral-900 mb-2">Edit Project</h1>
                    <p class="text-lg text-neutral-600">Update your project details</p>
                </div>
                <a href="{{ route('projects.show', $project) }}" class="text-primary-600 hover:text-primary-700 font-semibold">
                    ← Back to Project
                </a>
            </div>
        </div>

        <!-- Project Form -->
        <div class="bg-white rounded-2xl shadow-soft border border-neutral-100 p-8">
            <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Service Selection -->
                        <div>
                            <label for="service_id" class="block text-sm font-semibold text-neutral-900 mb-2">Service Type *</label>
                            <select name="service_id" id="service_id" class="w-full border border-neutral-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent" required>
                                <option value="">Select a service</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" {{ old('service_id', $project->service_id) == $service->id ? 'selected' : '' }}>
                                        {{ $service->name }} - ${{ number_format($service->base_price, 2) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('service_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Project Title -->
                        <div>
                            <label for="title" class="block text-sm font-semibold text-neutral-900 mb-2">Project Title *</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" class="w-full border border-neutral-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent" placeholder="Enter project title" required>
                            @error('title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Budget -->
                        <div>
                            <label for="budget" class="block text-sm font-semibold text-neutral-900 mb-2">Budget (USD) *</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-neutral-500">$</span>
                                <input type="number" name="budget" id="budget" value="{{ old('budget', $project->budget) }}" step="0.01" min="0" class="w-full border border-neutral-300 rounded-xl pl-8 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent" placeholder="0.00" required>
                            </div>
                            @error('budget')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Timeline -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="start_date" class="block text-sm font-semibold text-neutral-900 mb-2">Start Date *</label>
                                <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $project->start_date->format('Y-m-d')) }}" class="w-full border border-neutral-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent" required>
                                @error('start_date')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="end_date" class="block text-sm font-semibold text-neutral-900 mb-2">End Date *</label>
                                <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $project->end_date->format('Y-m-d')) }}" class="w-full border border-neutral-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent" required>
                                @error('end_date')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Project Status -->
                        <div>
                            <label for="status" class="block text-sm font-semibold text-neutral-900 mb-2">Project Status *</label>
                            <select name="status" id="status" class="w-full border border-neutral-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent" required>
                                <option value="pending" {{ old('status', $project->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="in_progress" {{ old('status', $project->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="completed" {{ old('status', $project->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                            @error('status')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Project Description -->
                        <div>
                            <label for="description" class="block text-sm font-semibold text-neutral-900 mb-2">Project Description *</label>
                            <textarea name="description" id="description" rows="4" class="w-full border border-neutral-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent" placeholder="Describe your project goals and objectives" required>{{ old('description', $project->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Requirements -->
                        <div>
                            <label for="requirements" class="block text-sm font-semibold text-neutral-900 mb-2">Requirements *</label>
                            <textarea name="requirements" id="requirements" rows="4" class="w-full border border-neutral-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent" placeholder="List specific requirements and features needed" required>{{ old('requirements', $project->requirements) }}</textarea>
                            @error('requirements')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Existing Attachments -->
                        @if($project->attachments && count($project->attachments) > 0)
                            <div>
                                <label class="block text-sm font-semibold text-neutral-900 mb-2">Current Attachments</label>
                                <div class="space-y-2">
                                    @foreach($project->attachments as $index => $attachment)
                                        <div class="flex items-center justify-between p-3 bg-neutral-50 rounded-lg">
                                            <div class="flex items-center space-x-3">
                                                <svg class="w-5 h-5 text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                                </svg>
                                                <div>
                                                    <p class="text-sm font-medium text-neutral-900">{{ $attachment['name'] }}</p>
                                                    <p class="text-xs text-neutral-500">{{ number_format($attachment['size'] / 1024, 1) }} KB</p>
                                                </div>
                                            </div>
                                            <a href="{{ asset('storage/' . $attachment['path']) }}" target="_blank" class="text-primary-600 hover:text-primary-700">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                                </svg>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- New File Attachments -->
                        <div>
                            <label for="attachments" class="block text-sm font-semibold text-neutral-900 mb-2">Add New Attachments (Optional)</label>
                            <div class="border-2 border-dashed border-neutral-300 rounded-xl p-6 text-center hover:border-primary-300 transition-colors duration-200">
                                <input type="file" name="attachments[]" id="attachments" multiple class="hidden" accept=".pdf,.doc,.docx,.txt,.jpg,.jpeg,.png,.gif">
                                <div class="space-y-2">
                                    <svg class="w-12 h-12 text-neutral-400 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                    </svg>
                                    <p class="text-neutral-600">Click to upload files or drag and drop</p>
                                    <p class="text-sm text-neutral-500">PDF, DOC, TXT, JPG, PNG (Max 10MB each)</p>
                                </div>
                            </div>
                            @error('attachments.*')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-8 pt-6 border-t border-neutral-200">
                    <div class="flex items-center justify-between">
                        <a href="{{ route('projects.show', $project) }}" class="text-neutral-600 hover:text-neutral-700 font-semibold">
                            Cancel
                        </a>
                        <button type="submit" class="bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-glow hover:shadow-glow/80 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Update Project</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// File upload handling
document.getElementById('attachments').addEventListener('change', function(e) {
    const files = e.target.files;
    const container = e.target.parentElement;
    
    if (files.length > 0) {
        container.innerHTML = `
            <div class="space-y-2">
                <svg class="w-8 h-8 text-green-500 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <p class="text-green-600 font-medium">${files.length} file(s) selected</p>
                <p class="text-sm text-neutral-500">Ready to upload</p>
            </div>
        `;
    }
});

// Date validation
document.getElementById('start_date').addEventListener('change', function() {
    const startDate = this.value;
    const endDateInput = document.getElementById('end_date');
    
    if (startDate) {
        endDateInput.min = startDate;
    }
});
</script>
@endsection 