<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessageResource\Pages;
use App\Filament\Resources\MessageResource\RelationManagers;
use App\Models\Message;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MessageResource extends Resource
{
    protected static ?string $model = Message::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $navigationGroup = 'Communication';
    
    protected static ?int $navigationSort = 1;
    
    protected static ?string $recordTitleAttribute = 'subject';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Message Information')
                    ->schema([
                        Forms\Components\TextInput::make('subject')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter message subject'),
                        
                Forms\Components\Select::make('sender_id')
                    ->relationship('sender', 'name')
                    ->required()
                            ->searchable()
                            ->preload()
                            ->placeholder('Select sender'),
                        
                Forms\Components\Select::make('receiver_id')
                    ->relationship('receiver', 'name')
                    ->required()
                            ->searchable()
                            ->preload()
                            ->placeholder('Select receiver'),
                        
                Forms\Components\Select::make('project_id')
                    ->relationship('project', 'title')
                            ->searchable()
                            ->preload()
                            ->placeholder('Select related project (optional)'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Message Content')
                    ->schema([
                Forms\Components\RichEditor::make('content')
                    ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'link',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                                'h4',
                            ])
                            ->placeholder('Write your message here...'),
                        
                Forms\Components\FileUpload::make('attachments')
                    ->multiple()
                            ->directory('message-attachments')
                            ->disk('public')
                            ->visibility('public')
                            ->helperText('Upload message attachments'),
                    ]),
                
                Forms\Components\Section::make('Message Status')
                    ->schema([
                        Forms\Components\Toggle::make('is_read')
                            ->label('Mark as Read')
                            ->default(false)
                            ->helperText('Toggle to mark message as read'),
                        
                        Forms\Components\DateTimePicker::make('read_at')
                            ->label('Read At')
                            ->placeholder('Automatically set when marked as read'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('subject')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('sender.name')
                    ->searchable()
                    ->sortable()
                    ->label('From'),
                
                Tables\Columns\TextColumn::make('receiver.name')
                    ->searchable()
                    ->sortable()
                    ->label('To'),
                
                Tables\Columns\TextColumn::make('project.title')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info')
                    ->label('Project'),
                
                Tables\Columns\TextColumn::make('content')
                    ->limit(100)
                    ->label('Preview'),
                
                Tables\Columns\IconColumn::make('is_read')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->label('Read'),
                
                Tables\Columns\TextColumn::make('read_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_read')
                    ->label('Read Status'),
                
                Tables\Filters\SelectFilter::make('project')
                    ->relationship('project', 'title')
                    ->multiple()
                    ->preload()
                    ->label('Project'),
                
                Tables\Filters\SelectFilter::make('sender')
                    ->relationship('sender', 'name')
                    ->multiple()
                    ->preload()
                    ->label('Sender'),
                
                Tables\Filters\SelectFilter::make('receiver')
                    ->relationship('receiver', 'name')
                    ->multiple()
                    ->preload()
                    ->label('Receiver'),
                
                Tables\Filters\Filter::make('date_range')
                    ->form([
                        Forms\Components\DatePicker::make('start_date')
                            ->placeholder('Start Date'),
                        Forms\Components\DatePicker::make('end_date')
                            ->placeholder('End Date'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['start_date'],
                                fn (Builder $query, $startDate): Builder => $query->where('created_at', '>=', $startDate),
                            )
                            ->when(
                                $data['end_date'],
                                fn (Builder $query, $endDate): Builder => $query->where('created_at', '<=', $endDate),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->icon('heroicon-o-eye'),
                    Tables\Actions\EditAction::make()
                        ->icon('heroicon-o-pencil'),
                    Tables\Actions\Action::make('mark_as_read')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(function (Message $record): void {
                            $record->update([
                                'is_read' => true,
                                'read_at' => now(),
                            ]);
                        })
                        ->requiresConfirmation()
                        ->modalHeading('Mark as Read')
                        ->modalDescription('Are you sure you want to mark this message as read?')
                        ->modalSubmitActionLabel('Yes, mark as read')
                        ->visible(fn (Message $record): bool => !$record->is_read),
                    Tables\Actions\Action::make('mark_as_unread')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->action(function (Message $record): void {
                            $record->update([
                                'is_read' => false,
                                'read_at' => null,
                            ]);
                        })
                        ->requiresConfirmation()
                        ->modalHeading('Mark as Unread')
                        ->modalDescription('Are you sure you want to mark this message as unread?')
                        ->modalSubmitActionLabel('Yes, mark as unread')
                        ->visible(fn (Message $record): bool => $record->is_read),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation(),
                    Tables\Actions\BulkAction::make('mark_as_read')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(function ($records): void {
                            $records->each(function ($record) {
                                $record->update([
                                    'is_read' => true,
                                    'read_at' => now(),
                                ]);
                            });
                        })
                        ->requiresConfirmation(),
                    Tables\Actions\BulkAction::make('mark_as_unread')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->action(function ($records): void {
                            $records->each(function ($record) {
                                $record->update([
                                    'is_read' => false,
                                    'read_at' => null,
            ]);
                            });
                        })
                        ->requiresConfirmation(),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->paginated([10, 25, 50, 100]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMessages::route('/'),
            'create' => Pages\CreateMessage::route('/create'),
            'view' => Pages\ViewMessage::route('/{record}'),
            'edit' => Pages\EditMessage::route('/{record}/edit'),
        ];
    }
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('is_read', false)->count();
    }
    
    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }
}
