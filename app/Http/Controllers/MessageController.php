<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Auth::user()->receivedMessages()
            ->with(['sender', 'project'])
            ->latest()
            ->paginate(20);

        $unreadCount = Auth::user()->unreadMessages()->count();

        return view('messages.index', compact('messages', 'unreadCount'));
    }

    public function show(Message $message)
    {
        $this->authorize('view', $message);

        // Mark as read if it's a received message
        if ($message->receiver_id === Auth::id() && !$message->is_read) {
            $message->update(['is_read' => true]);
        }

        $message->load(['sender', 'receiver', 'project']);

        return view('messages.show', compact('message'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'project_id' => 'nullable|exists:projects,id',
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $message = new Message($validated);
        $message->sender_id = Auth::id();
        $message->is_read = false;
        $message->save();

        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    public function markAsRead(Message $message)
    {
        $this->authorize('update', $message);
        
        $message->update(['is_read' => true]);
        
        return response()->json(['success' => true]);
    }

    public function destroy(Message $message)
    {
        $this->authorize('delete', $message);
        
        $message->delete();
        
        return redirect()->route('messages.index')
            ->with('success', 'Message deleted successfully!');
    }

    // Chatbot functionality
    public function chatbot(Request $request)
    {
        $message = $request->input('message');
        
        // Simple chatbot responses
        $responses = [
            'hello' => 'Hello! How can I help you today?',
            'help' => 'I can help you with project information, service details, or general inquiries. What would you like to know?',
            'services' => 'We offer Digital Innovation, Sustainable Solutions, and Enterprise Solutions. You can view all services at /services',
            'contact' => 'You can contact us through our contact form at /contact or send us a message here.',
            'project' => 'To create a new project, go to your dashboard and click "Create Project". You can also view existing projects there.',
        ];

        $response = 'I\'m here to help! You can ask me about our services, projects, or how to contact us.';
        
        foreach ($responses as $keyword => $reply) {
            if (stripos($message, $keyword) !== false) {
                $response = $reply;
                break;
            }
        }

        return response()->json([
            'response' => $response,
            'timestamp' => now()->format('H:i'),
        ]);
    }
} 