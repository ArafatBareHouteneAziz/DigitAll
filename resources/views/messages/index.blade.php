@extends('layouts.app')

@section('title', 'Messages')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-neutral-50 to-primary-50">
    <div class="container mx-auto px-6 py-12">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-neutral-900 mb-2">Messages</h1>
                    <p class="text-lg text-neutral-600">Stay connected with your projects and team</p>
                </div>
                <div class="flex items-center space-x-4">
                    @if($unreadCount > 0)
                        <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            {{ $unreadCount }} unread
                        </span>
                    @endif
                    <button id="chatbot-toggle" class="bg-gradient-to-r from-secondary-600 to-secondary-700 hover:from-secondary-700 hover:to-secondary-800 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 shadow-glow hover:shadow-glow/80 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        <span>AI Assistant</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Messages List -->
        @if($messages->count() > 0)
            <div class="bg-white rounded-2xl shadow-soft border border-neutral-100 overflow-hidden">
                @foreach($messages as $message)
                    <a href="{{ route('messages.show', $message) }}" class="block border-b border-neutral-100 last:border-b-0 hover:bg-neutral-50 transition-colors duration-200">
                        <div class="p-6">
                            <div class="flex items-start justify-between">
                                <div class="flex items-start space-x-4 flex-1">
                                    <!-- Avatar -->
                                    <div class="w-12 h-12 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full flex items-center justify-center flex-shrink-0">
                                        <span class="text-primary-600 font-semibold text-lg">
                                            {{ substr($message->sender->name, 0, 1) }}
                                        </span>
                                    </div>

                                    <!-- Message Content -->
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center space-x-2 mb-2">
                                            <h3 class="text-lg font-semibold text-neutral-900 truncate">
                                                {{ $message->sender->name }}
                                            </h3>
                                            @if(!$message->is_read)
                                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                            @endif
                                        </div>
                                        
                                        <p class="text-lg font-medium text-neutral-900 mb-1">{{ $message->subject }}</p>
                                        <p class="text-neutral-600 mb-2 line-clamp-2">{{ Str::limit($message->content, 150) }}</p>
                                        
                                        <div class="flex items-center space-x-4 text-sm text-neutral-500">
                                            <span>{{ $message->created_at->diffForHumans() }}</span>
                                            @if($message->project)
                                                <span class="bg-primary-50 text-primary-600 px-2 py-1 rounded-full text-xs">
                                                    {{ $message->project->title }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="flex items-center space-x-2 ml-4">
                                    @if(!$message->is_read)
                                        <button onclick="markAsRead({{ $message->id }})" class="text-primary-600 hover:text-primary-700 p-2 rounded-lg hover:bg-primary-50">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                        </button>
                                    @endif
                                    <form action="{{ route('messages.destroy', $message) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this message?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 p-2 rounded-lg hover:bg-red-50">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $messages->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-12">
                <div class="w-24 h-24 bg-gradient-to-br from-primary-50 to-primary-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-neutral-900 mb-2">No Messages Yet</h3>
                <p class="text-neutral-600 mb-6">You'll see messages from your projects and team here.</p>
                <button id="chatbot-toggle" class="bg-gradient-to-r from-secondary-600 to-secondary-700 hover:from-secondary-700 hover:to-secondary-800 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 shadow-glow hover:shadow-glow/80 transform hover:-translate-y-1 inline-flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    <span>Chat with AI Assistant</span>
                </button>
            </div>
        @endif
    </div>
</div>

<!-- Chatbot Modal -->
<div id="chatbot-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md max-h-[600px] flex flex-col">
            <!-- Chatbot Header -->
            <div class="bg-gradient-to-r from-secondary-600 to-secondary-700 text-white p-4 rounded-t-2xl">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold">AI Assistant</h3>
                            <p class="text-sm opacity-90">How can I help you today?</p>
                        </div>
                    </div>
                    <button id="chatbot-close" class="text-white/80 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Chat Messages -->
            <div id="chat-messages" class="flex-1 p-4 overflow-y-auto space-y-4 max-h-96">
                <div class="flex items-start space-x-3">
                    <div class="w-8 h-8 bg-secondary-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <div class="bg-neutral-100 rounded-2xl px-4 py-3 max-w-xs">
                        <p class="text-sm text-neutral-700">Hello! I'm your AI assistant. I can help you with project information, service details, or general inquiries. What would you like to know?</p>
                    </div>
                </div>
            </div>

            <!-- Chat Input -->
            <div class="p-4 border-t border-neutral-200">
                <form id="chat-form" class="flex space-x-3">
                    <input type="text" id="chat-input" placeholder="Type your message..." class="flex-1 border border-neutral-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-secondary-500 focus:border-transparent">
                    <button type="submit" class="bg-secondary-600 hover:bg-secondary-700 text-white px-4 py-3 rounded-xl transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Chatbot functionality
document.addEventListener('DOMContentLoaded', function() {
    const chatbotToggle = document.getElementById('chatbot-toggle');
    const chatbotModal = document.getElementById('chatbot-modal');
    const chatbotClose = document.getElementById('chatbot-close');
    const chatForm = document.getElementById('chat-form');
    const chatInput = document.getElementById('chat-input');
    const chatMessages = document.getElementById('chat-messages');

    // Toggle chatbot
    chatbotToggle.addEventListener('click', function() {
        chatbotModal.classList.remove('hidden');
    });

    chatbotClose.addEventListener('click', function() {
        chatbotModal.classList.add('hidden');
    });

    // Close on outside click
    chatbotModal.addEventListener('click', function(e) {
        if (e.target === chatbotModal) {
            chatbotModal.classList.add('hidden');
        }
    });

    // Handle chat form submission
    chatForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const message = chatInput.value.trim();
        if (!message) return;

        // Add user message
        addMessage(message, 'user');
        chatInput.value = '';

        // Send to backend
        fetch('/messages/chatbot', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ message: message })
        })
        .then(response => response.json())
        .then(data => {
            addMessage(data.response, 'bot');
        })
        .catch(error => {
            addMessage('Sorry, I encountered an error. Please try again.', 'bot');
        });
    });

    function addMessage(text, sender) {
        const messageDiv = document.createElement('div');
        messageDiv.className = 'flex items-start space-x-3';
        
        if (sender === 'user') {
            messageDiv.innerHTML = `
                <div class="flex-1"></div>
                <div class="bg-secondary-600 text-white rounded-2xl px-4 py-3 max-w-xs">
                    <p class="text-sm">${text}</p>
                </div>
            `;
        } else {
            messageDiv.innerHTML = `
                <div class="w-8 h-8 bg-secondary-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
                <div class="bg-neutral-100 rounded-2xl px-4 py-3 max-w-xs">
                    <p class="text-sm text-neutral-700">${text}</p>
                </div>
            `;
        }

        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
});

// Mark message as read
function markAsRead(messageId) {
    fetch(`/messages/${messageId}/read`, {
        method: 'PUT',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    });
}
</script>
@endsection 