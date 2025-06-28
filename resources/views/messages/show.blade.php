@extends('layouts.app')

@section('title', $message->subject)

@section('content')
<div class="min-h-screen bg-gradient-to-br from-neutral-50 to-primary-50">
    <div class="container mx-auto px-6 py-12">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-neutral-900 mb-2">{{ $message->subject }}</h1>
                    <p class="text-lg text-neutral-600">Message Details</p>
                </div>
                <a href="{{ route('messages.index') }}" class="text-primary-600 hover:text-primary-700 font-semibold">
                    ← Back to Messages
                </a>
            </div>
        </div>

        <!-- Message Card -->
        <div class="bg-white rounded-2xl shadow-soft border border-neutral-100 p-8 max-w-4xl mx-auto">
            <!-- Message Header -->
            <div class="flex items-start space-x-4 mb-6">
                <div class="w-12 h-12 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="text-primary-600 font-semibold text-lg">
                        {{ substr($message->sender->name, 0, 1) }}
                    </span>
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-2">
                        <h2 class="text-xl font-bold text-neutral-900">{{ $message->sender->name }}</h2>
                        <span class="text-sm text-neutral-500">{{ $message->created_at->format('M d, Y \a\t g:i A') }}</span>
                    </div>
                    <p class="text-neutral-600">{{ $message->sender->email }}</p>
                </div>
            </div>

            <!-- Message Content -->
            <div class="bg-neutral-50 rounded-xl p-6 mb-6">
                <div class="prose prose-lg max-w-none">
                    <p class="text-neutral-700 leading-relaxed whitespace-pre-wrap">{{ $message->content }}</p>
                </div>
            </div>

            <!-- Message Metadata -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <h3 class="text-sm font-semibold text-neutral-900 mb-2">From</h3>
                    <p class="text-neutral-700">{{ $message->sender->name }} ({{ $message->sender->email }})</p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-neutral-900 mb-2">To</h3>
                    <p class="text-neutral-700">{{ $message->receiver->name }} ({{ $message->receiver->email }})</p>
                </div>
                @if($message->project)
                    <div>
                        <h3 class="text-sm font-semibold text-neutral-900 mb-2">Related Project</h3>
                        <a href="{{ route('projects.show', $message->project) }}" class="text-primary-600 hover:text-primary-700 font-medium">
                            {{ $message->project->title }}
                        </a>
                    </div>
                @endif
                <div>
                    <h3 class="text-sm font-semibold text-neutral-900 mb-2">Status</h3>
                    <span class="px-3 py-1 rounded-full text-xs font-semibold
                        @if($message->is_read) bg-green-100 text-green-800
                        @else bg-yellow-100 text-yellow-800
                        @endif">
                        {{ $message->is_read ? 'Read' : 'Unread' }}
                    </span>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between pt-6 border-t border-neutral-200">
                <div class="flex items-center space-x-4">
                    @if(!$message->is_read && $message->receiver_id === auth()->id())
                        <button onclick="markAsRead({{ $message->id }})" class="text-primary-600 hover:text-primary-700 font-semibold text-sm">
                            Mark as Read
                        </button>
                    @endif
                    <a href="mailto:{{ $message->sender->email }}?subject=Re: {{ $message->subject }}" class="text-primary-600 hover:text-primary-700 font-semibold text-sm">
                        Reply via Email
                    </a>
                </div>
                <div class="flex items-center space-x-2">
                    <form action="{{ route('messages.destroy', $message) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this message?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 font-semibold text-sm">
                            Delete Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
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