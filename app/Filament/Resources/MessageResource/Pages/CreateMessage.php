<?php

namespace App\Filament\Resources\MessageResource\Pages;

use App\Filament\Resources\MessageResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;
use App\Models\Message;

class CreateMessage extends CreateRecord
{
    protected static string $resource = MessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('back_to_messages')
                ->label('Back to Messages')
                ->url(MessageResource::getUrl('index'))
                ->icon('heroicon-o-arrow-left')
                ->color('gray')
                ->tooltip('Return to messages list'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return MessageResource::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Message sent successfully';
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Set default values if not provided
        $data['sender_type'] = $data['sender_type'] ?? 'App\Models\Employee';
        $data['receiver_type'] = $data['receiver_type'] ?? 'App\Models\User';
        
        // Mark as unread by default
        $data['is_read'] = $data['is_read'] ?? false;
        
        return $data;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Handle reply parameters
        $replyTo = request()->get('reply_to');
        $subject = request()->get('subject');
        $receiverId = request()->get('receiver_id');
        $receiverType = request()->get('receiver_type');
        $projectId = request()->get('project_id');

        if ($replyTo) {
            // If this is a reply, pre-fill the form
            $originalMessage = Message::find($replyTo);
            if ($originalMessage) {
                $data['subject'] = $subject ?? 'Re: ' . $originalMessage->subject;
                $data['receiver_id'] = $receiverId ?? $originalMessage->sender_id;
                $data['receiver_type'] = $receiverType ?? $originalMessage->sender_type;
                $data['project_id'] = $projectId ?? $originalMessage->project_id;
                
                // Add original message content as reference
                $data['content'] = "\n\n--- Original Message ---\n" . 
                    "From: " . ($originalMessage->sender->name ?? 'Unknown') . "\n" .
                    "Subject: " . $originalMessage->subject . "\n" .
                    "Date: " . $originalMessage->created_at->format('M d, Y H:i') . "\n\n" .
                    strip_tags($originalMessage->content);
            }
        }

        return $data;
    }

    public function getTitle(): string
    {
        $replyTo = request()->get('reply_to');
        if ($replyTo) {
            return 'Reply to Message';
        }
        return 'Send New Message';
    }
}
