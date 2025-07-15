<?php

namespace App\Filament\Resources\MessageResource\Pages;

use App\Filament\Resources\MessageResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class ViewMessage extends ViewRecord
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
            Actions\EditAction::make()
                ->icon('heroicon-o-pencil')
                ->tooltip('Edit message'),
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

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Message Details')
                    ->description('Basic message information')
                    ->icon('heroicon-o-information-circle')
                    ->schema([
                        Infolists\Components\TextEntry::make('subject')
                            ->label('Subject')
                            ->size(Infolists\Components\TextEntry\TextEntrySize::Large)
                            ->weight('bold')
                            ->columnSpanFull(),
                        
                        Infolists\Components\Grid::make(3)
                            ->schema([
                                Infolists\Components\TextEntry::make('sender.name')
                                    ->label('From')
                                    ->badge()
                                    ->color('info'),
                                
                                Infolists\Components\TextEntry::make('receiver.name')
                                    ->label('To')
                                    ->badge()
                                    ->color('success'),
                                
                                Infolists\Components\TextEntry::make('project.title')
                                    ->label('Project')
                                    ->badge()
                                    ->color('warning')
                                    ->placeholder('No project linked'),
                            ]),
                        
                        Infolists\Components\Grid::make(2)
                            ->schema([
                                Infolists\Components\TextEntry::make('created_at')
                                    ->label('Sent At')
                                    ->dateTime()
                                    ->icon('heroicon-o-clock'),
                                
                                Infolists\Components\TextEntry::make('read_at')
                                    ->label('Read At')
                                    ->dateTime()
                                    ->icon('heroicon-o-check-circle')
                                    ->placeholder('Not read yet')
                                    ->color(fn ($record) => $record->is_read ? 'success' : 'danger'),
                            ]),
                    ]),
                
                Infolists\Components\Section::make('Message Content')
                    ->description('Message body and attachments')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        Infolists\Components\TextEntry::make('content')
                            ->label('Content')
                            ->html()
                            ->columnSpanFull()
                            ->prose()
                            ->markdown(false),
                        
                        Infolists\Components\TextEntry::make('attachments')
                            ->label('Attachments')
                            ->listWithLineBreaks()
                            ->bulleted()
                            ->placeholder('No attachments')
                            ->columnSpanFull()
                            ->visible(fn ($record) => !empty($record->attachments)),
                    ]),
                
                Infolists\Components\Section::make('Message Status')
                    ->description('Current message status')
                    ->icon('heroicon-o-check-circle')
                    ->schema([
                        Infolists\Components\Grid::make(2)
                            ->schema([
                                Infolists\Components\IconEntry::make('is_read')
                                    ->label('Read Status')
                                    ->boolean()
                                    ->trueIcon('heroicon-o-check-circle')
                                    ->falseIcon('heroicon-o-x-circle')
                                    ->trueColor('success')
                                    ->falseColor('danger'),
                                
                                Infolists\Components\TextEntry::make('updated_at')
                                    ->label('Last Updated')
                                    ->dateTime()
                                    ->icon('heroicon-o-arrow-path'),
                            ]),
                    ]),
            ]);
    }
} 