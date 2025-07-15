<?php

namespace App\Filament\Widgets;

use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables;
use App\Models\Message;

class RecentMessages extends BaseWidget
{
    protected static ?string $heading = 'Recent Messages';
    
    protected int | string | array $columnSpan = 'full';
    
    protected static ?string $pollingInterval = '30s';
    
    protected static bool $isLazy = false;

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->query(
                Message::query()
                    ->with(['sender', 'receiver'])
                    ->latest()
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('subject')
                    ->limit(30)
                    ->searchable(),
                Tables\Columns\TextColumn::make('sender.name')
                    ->label('From')
                    ->badge(),
                Tables\Columns\TextColumn::make('receiver.name')
                    ->label('To')
                    ->badge(),
                Tables\Columns\IconColumn::make('is_read')
                    ->boolean()
                    ->label('Read'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->url(fn (Message $record): string => \App\Filament\Resources\MessageResource::getUrl('view', ['record' => $record]))
                    ->icon('heroicon-m-eye')
                    ->color('info'),
            ]);
    }
} 