<?php

namespace App\Filament\Resources\MessageResource\Pages;

use App\Filament\Resources\MessageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Models\Message;

class ListMessages extends ListRecords
{
    protected static string $resource = MessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus')
                ->label('Send New Message')
                ->tooltip('Create a new message'),
            Actions\Action::make('mark_all_read')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->label('Mark All as Read')
                ->action(function () {
                    Message::where('is_read', false)->update([
                        'is_read' => true,
                        'read_at' => now(),
                    ]);
                    $this->notify('success', 'All messages marked as read');
                })
                ->requiresConfirmation()
                ->modalHeading('Mark All as Read')
                ->modalDescription('Are you sure you want to mark all unread messages as read?')
                ->modalSubmitActionLabel('Yes, mark all as read')
                ->visible(fn () => Message::where('is_read', false)->count() > 0)
                ->tooltip('Mark all unread messages as read'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            // You can add widgets here if needed
        ];
    }
}
