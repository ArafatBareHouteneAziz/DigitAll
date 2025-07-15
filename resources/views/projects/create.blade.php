@extends('layouts.app')

@section('title', 'Create New Project')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-neutral-50 to-primary-50">
    <div class="container mx-auto px-6 py-12">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-neutral-900 mb-2">{{ __('Create New Project') }}</h1>
                    <p class="text-lg text-neutral-600">{{ __('Start your digital innovation journey') }}</p>
                </div>
                <a href="{{ route('projects.index') }}" class="text-primary-600 hover:text-primary-700 font-semibold">
                    ← {{ __('Back to Projects') }}
                </a>
            </div>
        </div>

        <!-- Project Form -->
        <div class="bg-white rounded-2xl shadow-soft border border-neutral-100 p-8">
            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Service Selection -->
                        <div>
                            <label for="service_id" class="block text-sm font-semibold text-neutral-900 mb-2">{{ __('Service Type') }} *</label>
                            <select name="service_id" id="service_id" class="w-full border border-neutral-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent" required>
                                <option value="">{{ __('Select a service') }}</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
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
                            <label for="title" class="block text-sm font-semibold text-neutral-900 mb-2">{{ __('Project Title') }} *</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full border border-neutral-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent" placeholder="{{ __('Enter project title') }}" required>
                            @error('title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Budget -->
                        <div>
                            <label for="budget" class="block text-sm font-semibold text-neutral-900 mb-2">{{ __('Budget (USD)') }} *</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-neutral-500">$</span>
                                <input type="number" name="budget" id="budget" value="{{ old('budget') }}" step="0.01" min="0" class="w-full border border-neutral-300 rounded-xl pl-8 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent" placeholder="0.00" required>
                            </div>
                            @error('budget')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Timeline -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="start_date" class="block text-sm font-semibold text-neutral-900 mb-2">{{ __('Start Date') }} *</label>
                                <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" class="w-full border border-neutral-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent" required>
                                @error('start_date')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="end_date" class="block text-sm font-semibold text-neutral-900 mb-2">{{ __('End Date') }} *</label>
                                <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" class="w-full border border-neutral-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent" required>
                                @error('end_date')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Project Description -->
                        <div>
                            <label for="description" class="block text-sm font-semibold text-neutral-900 mb-2">{{ __('Project Description') }} *</label>
                            <textarea name="description" id="description" rows="4" class="w-full border border-neutral-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent" placeholder="{{ __('Describe your project goals and objectives') }}" required>{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Requirements -->
                        <div>
                            <label for="requirements" class="block text-sm font-semibold text-neutral-900 mb-2">{{ __('Requirements') }} *</label>
                            <textarea name="requirements" id="requirements" rows="4" class="w-full border border-neutral-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent" placeholder="{{ __('List specific requirements and features needed') }}" required>{{ old('requirements') }}</textarea>
                            @error('requirements')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- File Attachments -->
                        <div>
                            <label for="attachments" class="block text-sm font-semibold text-neutral-900 mb-2">{{ __('Attachments (Optional)') }}</label>
                            <div id="file-upload-area" class="border-2 border-dashed border-neutral-300 rounded-xl p-6 text-center hover:border-primary-300 transition-colors duration-200 cursor-pointer">
                                <input type="file" name="attachments[]" id="attachments" multiple class="hidden" accept=".pdf,.doc,.docx,.txt,.jpg,.jpeg,.png,.gif">
                                <div id="upload-content" class="space-y-2">
                                    <svg class="w-12 h-12 text-neutral-400 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                    </svg>
                                    <p class="text-neutral-600">{{ __('Click to upload files or drag and drop') }}</p>
                                    <p class="text-sm text-neutral-500">{{ __('PDF, DOC, TXT, JPG, PNG (Max 10MB each)') }}</p>
                                </div>
                                <div id="file-list" class="mt-4 space-y-2 hidden"></div>
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
                        <a href="{{ route('projects.index') }}" class="text-neutral-600 hover:text-neutral-700 font-semibold">
                            {{ __('Cancel') }}
                        </a>
                        <button type="submit" class="bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-glow hover:shadow-glow/80 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            <span>{{ __('Create Project') }}</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// File upload handling
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('attachments');
    const uploadArea = document.getElementById('file-upload-area');
    const uploadContent = document.getElementById('upload-content');
    const fileList = document.getElementById('file-list');
    
    // Click to upload
    uploadArea.addEventListener('click', function() {
        fileInput.click();
    });
    
    // Drag and drop functionality
    uploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        uploadArea.classList.add('border-primary-500', 'bg-primary-50');
    });
    
    uploadArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        uploadArea.classList.remove('border-primary-500', 'bg-primary-50');
    });
    
    uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        uploadArea.classList.remove('border-primary-500', 'bg-primary-50');
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            handleFileSelection(files);
        }
    });
    
    // File input change
    fileInput.addEventListener('change', function(e) {
        const files = e.target.files;
        if (files.length > 0) {
            handleFileSelection(files);
        }
    });
    
    function handleFileSelection(files) {
        // Hide upload content and show file list
        uploadContent.classList.add('hidden');
        fileList.classList.remove('hidden');
        
        // Clear previous file list
        fileList.innerHTML = '';
        
        // Add each file to the list
        Array.from(files).forEach((file, index) => {
            const fileItem = document.createElement('div');
            fileItem.className = 'flex items-center justify-between p-3 bg-neutral-50 rounded-lg';
            
            const fileSize = (file.size / 1024).toFixed(1);
            const fileExtension = file.name.split('.').pop().toUpperCase();
            
            fileItem.innerHTML = `
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center">
                        <span class="text-xs font-semibold text-primary-600">${fileExtension}</span>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-neutral-900">${file.name}</p>
                        <p class="text-xs text-neutral-500">${fileSize} KB</p>
                    </div>
                </div>
                <button type="button" class="text-red-500 hover:text-red-700" onclick="removeFile(${index})">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            `;
            
            fileList.appendChild(fileItem);
        });
        
        // Show success message
        const successMessage = document.createElement('div');
        successMessage.className = 'mt-4 p-3 bg-green-50 border border-green-200 rounded-lg';
        successMessage.innerHTML = `
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="text-sm text-green-700">${files.length} {{ __('file(s) selected') }}</span>
            </div>
        `;
        fileList.appendChild(successMessage);
    }
    
    // Global function to remove files
    window.removeFile = function(index) {
        const dt = new DataTransfer();
        const files = fileInput.files;
        
        for (let i = 0; i < files.length; i++) {
            if (i !== index) {
                dt.items.add(files[i]);
            }
        }
        
        fileInput.files = dt.files;
        
        if (fileInput.files.length === 0) {
            // No files left, show upload content
            uploadContent.classList.remove('hidden');
            fileList.classList.add('hidden');
        } else {
            // Re-render file list
            handleFileSelection(fileInput.files);
        }
    };
});

// Date validation
document.getElementById('start_date').addEventListener('change', function() {
    const startDate = this.value;
    const endDateInput = document.getElementById('end_date');
    
    if (startDate) {
        endDateInput.min = startDate;
    }
});

// Set minimum start date to today
document.addEventListener('DOMContentLoaded', function() {
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('start_date').min = today;
});
</script>
@endsection 