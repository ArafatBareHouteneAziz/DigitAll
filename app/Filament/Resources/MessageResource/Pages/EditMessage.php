<?php

namespace App\Filament\Resources\MessageResource\Pages;

use App\Filament\Resources\MessageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMessage extends EditRecord
{
    protected static string $resource = MessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('reply')
                ->icon('heroicon-o-arrow-uturn-left')
                ->color('info')
                ->label('Reply')
                ->url(fn (): string => MessageResource::getUrl('create', [
                    'reply_to' => $this->record->id,
                    'subject' => 'Re: ' . $this->record->subject,
                    'receiver_id' => $this->record->sender_id,
                    'receiver_type' => $this->record->sender_type,
                    'project_id' => $this->record->project_id,
                ]))
                ->openUrlInNewTab(false)
                ->tooltip('Reply to this message'),
            Actions\ViewAction::make()
                ->icon('heroicon-o-eye')
                ->tooltip('View message details'),
            Actions\Action::make('mark_as_read')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->action(function () {
                    $this->record->update([
                        'is_read' => true,
                        'read_at' => now(),
                    ]);
                    $this->notify('success', 'Message marked as read');
                })
                ->requiresConfirmation()
                ->modalHeading('Mark as Read')
                ->modalDescription('Are you sure you want to mark this message as read?')
                ->modalSubmitActionLabel('Yes, mark as read')
                ->visible(fn () => !$this->record->is_read)
                ->tooltip('Mark as read'),
            Actions\Action::make('mark_as_unread')
                ->icon('heroicon-o-x-circle')
                ->color('danger')
                ->action(function () {
                    $this->record->update([
                        'is_read' => false,
                        'read_at' => null,
                    ]);
                    $this->notify('success', 'Message marked as unread');
                })
                ->requiresConfirmation()
                ->modalHeading('Mark as Unread')
                ->modalDescription('Are you sure you want to mark this message as unread?')
                ->modalSubmitActionLabel('Yes, mark as unread')
                ->visible(fn () => $this->record->is_read)
                ->tooltip('Mark as unread'),
            Actions\DeleteAction::make()
                ->icon('heroicon-o-trash')
                ->tooltip('Delete message'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return MessageResource::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Message updated successfully';
    }
}
