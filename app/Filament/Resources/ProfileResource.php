<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Filament\Resources\ProfileResource\RelationManagers;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationGroup = 'User Management';
    
    protected static ?int $navigationSort = 3;
    
    protected static ?string $recordTitleAttribute = 'user.name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('User Information')
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->placeholder('Select user'),
                    ]),
                
                Forms\Components\Section::make('Contact Information')
                    ->schema([
                Forms\Components\TextInput::make('phone_number')
                    ->tel()
                            ->maxLength(255)
                            ->placeholder('Enter phone number'),
                        
                Forms\Components\TextInput::make('website')
                    ->url()
                            ->maxLength(255)
                            ->placeholder('Enter website URL')
                            ->helperText('Include http:// or https://'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Professional Information')
                    ->schema([
                        Forms\Components\TextInput::make('company_name')
                            ->maxLength(255)
                            ->placeholder('Enter company name'),
                        
                        Forms\Components\TextInput::make('position')
                            ->maxLength(255)
                            ->placeholder('Enter job position'),
                        
                        Forms\Components\Textarea::make('bio')
                            ->maxLength(1000)
                            ->rows(4)
                            ->placeholder('Tell us about yourself...')
                            ->helperText('Maximum 1000 characters'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Media & Social Links')
                    ->schema([
                Forms\Components\FileUpload::make('profile_photo_path')
                    ->image()
                            ->imageEditor()
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth('400')
                            ->imageResizeTargetHeight('400')
                            ->disk('public')
                            ->directory('profile-photos')
                            ->visibility('public')
                            ->helperText('Upload profile photo (recommended: 400x400px)'),
                        
                Forms\Components\KeyValue::make('social_links')
                    ->keyLabel('Platform')
                    ->valueLabel('URL')
                            ->reorderable()
                            ->helperText('Add your social media links (e.g., LinkedIn, Twitter, GitHub)'),
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('profile_photo_path')
                    ->circular()
                    ->size(50),
                
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                
                Tables\Columns\TextColumn::make('company_name')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info'),
                
                Tables\Columns\TextColumn::make('position')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                
                Tables\Columns\TextColumn::make('website')
                    ->searchable()
                    ->sortable()
                    ->url(fn (Profile $record): string => $record->website)
                    ->openUrlInNewTab()
                    ->toggleable(),
                
                Tables\Columns\TextColumn::make('bio')
                    ->limit(100)
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('social_links')
                    ->listWithLineBreaks()
                    ->limitList(3)
                    ->expandableLimitedList()
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
                Tables\Filters\SelectFilter::make('user')
                    ->relationship('user', 'name')
                    ->multiple()
                    ->preload()
                    ->label('User'),
                
                Tables\Filters\Filter::make('has_company')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('company_name'))
                    ->label('Has Company'),
                
                Tables\Filters\Filter::make('has_website')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('website'))
                    ->label('Has Website'),
                
                Tables\Filters\Filter::make('has_photo')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('profile_photo_path'))
                    ->label('Has Profile Photo'),
                
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
                    Tables\Actions\Action::make('view_user')
                        ->icon('heroicon-o-user')
                        ->color('info')
                        ->url(fn (Profile $record): string => route('filament.admin.resources.users.edit', $record->user))
                        ->openUrlInNewTab()
                        ->label('View User'),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
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
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'view' => Pages\ViewProfile::route('/{record}'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    
    public static function getNavigationBadgeColor(): ?string
    {
        return 'info';
    }
}
