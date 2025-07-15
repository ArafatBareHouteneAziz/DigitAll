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
use App\Models\User;

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
                    ->description('Basic message details and recipients')
                    ->icon('heroicon-o-information-circle')
                    ->schema([
                        Forms\Components\TextInput::make('subject')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter message subject')
                            ->columnSpanFull(),
                        
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('sender_id')
                                    ->label('From (Employee)')
                                    ->options(function() {
                                        return \App\Models\Employee::where('is_active', true)
                                            ->pluck('name', 'id')
                                            ->prepend('Select sender', '');
                                    })
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    ->placeholder('Select sender')
                                    ->default(function() {
                                        // Default to current employee if available
                                        if (auth()->guard('employee')->check()) {
                                            return auth()->guard('employee')->id();
                                        }
                                        return null;
                                    })
                                    ->live()
                                    ->afterStateUpdated(function ($state, $set) {
                                        if ($state) {
                                            $set('sender_type', 'App\Models\Employee');
                                        }
                                    }),
                                
                                Forms\Components\Select::make('receiver_id')
                                    ->label('Send to User')
                                    ->options(function() {
                                        return User::where('is_active', true)
                                            ->pluck('name', 'id')
                                            ->prepend('Select user', '');
                                    })
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    ->placeholder('Select user to send message to')
                                    ->live()
                                    ->afterStateUpdated(function ($state, $set) {
                                        if ($state) {
                                            $set('receiver_type', 'App\Models\User');
                                        }
                                    }),
                            ]),
                        
                        Forms\Components\Select::make('project_id')
                            ->relationship('project', 'title')
                            ->searchable()
                            ->preload()
                            ->placeholder('Select related project (optional)')
                            ->helperText('Link this message to a specific project'),
                        
                        Forms\Components\Hidden::make('receiver_type')
                            ->default('App\Models\User'),
                        
                        Forms\Components\Hidden::make('sender_type')
                            ->default('App\Models\Employee'),
                    ]),
                
                Forms\Components\Section::make('Message Content')
                    ->description('Write your message content')
                    ->icon('heroicon-o-document-text')
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
                                'blockquote',
                                'codeBlock',
                            ])
                            ->placeholder('Write your message here...')
                            ->helperText('Use the toolbar to format your message'),
                        
                        Forms\Components\FileUpload::make('attachments')
                            ->multiple()
                            ->directory('message-attachments')
                            ->disk('public')
                            ->visibility('public')
                            ->helperText('Upload message attachments (images, documents, etc.)')
                            ->acceptedFileTypes(['image/*', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                            ->maxFiles(5)
                            ->maxSize(10240), // 10MB
                    ]),
                
                Forms\Components\Section::make('Message Status')
                    ->description('Manage message read status')
                    ->icon('heroicon-o-check-circle')
                    ->schema([
                        Forms\Components\Toggle::make('is_read')
                            ->label('Mark as Read')
                            ->default(false)
                            ->helperText('Toggle to mark message as read')
                            ->onIcon('heroicon-s-check-circle')
                            ->offIcon('heroicon-s-x-circle'),
                        
                        Forms\Components\DateTimePicker::make('read_at')
                            ->label('Read At')
                            ->placeholder('Automatically set when marked as read')
                            ->helperText('Timestamp when message was read'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->with(['sender', 'receiver', 'project']))
            ->columns([
                Tables\Columns\TextColumn::make('subject')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(50)
                    ->tooltip(function ($record) {
                        return $record->subject;
                    }),
                
                Tables\Columns\TextColumn::make('sender_name')
                    ->label('From')
                    ->getStateUsing(fn ($record) => $record->sender->name ?? 'Unknown')
                    ->searchable(false)
                    ->sortable(false)
                    ->badge()
                    ->color('info'),
                
                Tables\Columns\TextColumn::make('receiver_name')
                    ->label('To')
                    ->getStateUsing(fn ($record) => $record->receiver->name ?? 'Unknown')
                    ->searchable(false)
                    ->sortable(false)
                    ->badge()
                    ->color('success'),
                
                Tables\Columns\TextColumn::make('project.title')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('warning')
                    ->label('Project')
                    ->limit(20),
                
                Tables\Columns\TextColumn::make('content')
                    ->limit(80)
                    ->label('Preview')
                    ->html()
                    ->wrap()
                    ->tooltip(function ($record) {
                        return strip_tags($record->content);
                    }),
                
                Tables\Columns\IconColumn::make('is_read')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->label('Read')
                    ->tooltip(function ($record) {
                        return $record->is_read ? 'Read' : 'Unread';
                    }),
                
                Tables\Columns\TextColumn::make('attachments')
                    ->label('Attachments')
                    ->getStateUsing(fn ($record) => $record->attachments ? count($record->attachments) : 0)
                    ->badge()
                    ->color('gray')
                    ->tooltip(function ($record) {
                        return $record->attachments ? count($record->attachments) . ' attachment(s)' : 'No attachments';
                    }),
                
                Tables\Columns\TextColumn::make('read_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Read At'),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Sent At'),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Updated At'),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_read')
                    ->label('Read Status')
                    ->placeholder('All messages')
                    ->trueLabel('Read messages')
                    ->falseLabel('Unread messages'),
                
                Tables\Filters\SelectFilter::make('project')
                    ->relationship('project', 'title')
                    ->multiple()
                    ->preload()
                    ->label('Project')
                    ->placeholder('All projects'),
                
                Tables\Filters\Filter::make('date_range')
                    ->form([
                        Forms\Components\DatePicker::make('start_date')
                            ->placeholder('Start Date')
                            ->label('From'),
                        Forms\Components\DatePicker::make('end_date')
                            ->placeholder('End Date')
                            ->label('To'),
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
                    })
                    ->label('Date Range'),
                
                Tables\Filters\Filter::make('has_attachments')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('attachments'))
                    ->label('Has Attachments')
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->icon('heroicon-o-eye')
                        ->tooltip('View message details'),
                    Tables\Actions\EditAction::make()
                        ->icon('heroicon-o-pencil')
                        ->tooltip('Edit message'),
                    Tables\Actions\Action::make('reply')
                        ->icon('heroicon-o-arrow-uturn-left')
                        ->color('info')
                        ->url(fn (Message $record): string => MessageResource::getUrl('create', [
                            'reply_to' => $record->id,
                            'subject' => 'Re: ' . $record->subject,
                            'receiver_id' => $record->sender_id,
                            'receiver_type' => $record->sender_type,
                            'project_id' => $record->project_id,
                        ]))
                        ->openUrlInNewTab(false)
                        ->tooltip('Reply to this message'),
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
                        ->visible(fn (Message $record): bool => !$record->is_read)
                        ->tooltip('Mark as read'),
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
                        ->visible(fn (Message $record): bool => $record->is_read)
                        ->tooltip('Mark as unread'),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation()
                        ->modalHeading('Delete Messages')
                        ->modalDescription('Are you sure you want to delete the selected messages? This action cannot be undone.')
                        ->modalSubmitActionLabel('Yes, delete messages'),
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
                        ->requiresConfirmation()
                        ->modalHeading('Mark as Read')
                        ->modalDescription('Are you sure you want to mark the selected messages as read?')
                        ->modalSubmitActionLabel('Yes, mark as read'),
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
                        ->requiresConfirmation()
                        ->modalHeading('Mark as Unread')
                        ->modalDescription('Are you sure you want to mark the selected messages as unread?')
                        ->modalSubmitActionLabel('Yes, mark as unread'),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->paginated([10, 25, 50, 100])
            ->poll('30s'); // Auto-refresh every 30 seconds
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
