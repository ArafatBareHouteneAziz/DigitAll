<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Business Management';
    
    protected static ?int $navigationSort = 2;
    
    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Project Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter project title'),
                        
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                            ->searchable()
                            ->preload()
                            ->placeholder('Select client'),
                        
                Forms\Components\Select::make('service_id')
                    ->relationship('service', 'name')
                    ->required()
                            ->searchable()
                            ->preload()
                            ->placeholder('Select service'),
                        
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                            ->required()
                            ->default('pending')
                            ->placeholder('Select status'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Project Details')
                    ->schema([
                        Forms\Components\RichEditor::make('description')
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
                            ->placeholder('Describe the project in detail...'),
                        
                        Forms\Components\Textarea::make('requirements')
                            ->columnSpanFull()
                            ->rows(4)
                            ->placeholder('List project requirements...'),
                    ]),
                
                Forms\Components\Section::make('Timeline & Budget')
                    ->schema([
                Forms\Components\TextInput::make('budget')
                    ->numeric()
                            ->prefix('$')
                            ->minValue(0)
                            ->step(0.01)
                            ->placeholder('0.00'),
                        
                        Forms\Components\DatePicker::make('start_date')
                            ->placeholder('Select start date'),
                        
                        Forms\Components\DatePicker::make('end_date')
                            ->placeholder('Select end date')
                            ->after('start_date'),
                        
                        Forms\Components\Placeholder::make('duration')
                            ->content(function ($get) {
                                $startDate = $get('start_date');
                                $endDate = $get('end_date');
                                
                                if ($startDate && $endDate) {
                                    $start = \Carbon\Carbon::parse($startDate);
                                    $end = \Carbon\Carbon::parse($endDate);
                                    $duration = $start->diffInDays($end);
                                    return "{$duration} days";
                                }
                                
                                return 'Not set';
                            })
                            ->label('Duration'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Attachments & Metadata')
                    ->schema([
                        Forms\Components\FileUpload::make('attachments')
                            ->multiple()
                            ->directory('project-attachments')
                            ->downloadable(true)
                            ->disk('public')
                            ->directory('project-attachments')
                            ->visibility('public')
                            ->acceptedFileTypes(['image/*', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'text/plain'])
                            ->maxFiles(10)
                            ->maxSize(10240) // 10MB
                            ->helperText('Upload project-related files (PDF, DOC, TXT, JPG, PNG - Max 10MB each)'),
                        
                        Forms\Components\KeyValue::make('metadata')
                            ->keyLabel('Key')
                            ->valueLabel('Value')
                            ->columnSpanFull()
                            ->helperText('Add additional project metadata'),
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->sortable()
                    ->label('Client'),
                
                Tables\Columns\TextColumn::make('service.name')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info'),
                
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'gray',
                        'in_progress' => 'warning',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                    })
                    ->formatStateUsing(fn (string $state): string => ucwords(str_replace('_', ' ', $state))),
                
                Tables\Columns\TextColumn::make('budget')
                    ->money('USD')
                    ->sortable()
                    ->color('success'),
                
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                
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
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->multiple()
                    ->preload(),
                
                Tables\Filters\SelectFilter::make('service')
                    ->relationship('service', 'name')
                    ->multiple()
                    ->preload(),
                
                Tables\Filters\SelectFilter::make('user')
                    ->relationship('user', 'name')
                    ->multiple()
                    ->preload()
                    ->label('Client'),
                
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
                                fn (Builder $query, $startDate): Builder => $query->where('start_date', '>=', $startDate),
                            )
                            ->when(
                                $data['end_date'],
                                fn (Builder $query, $endDate): Builder => $query->where('end_date', '<=', $endDate),
                            );
                    }),
                
                Tables\Filters\Filter::make('budget_range')
                    ->form([
                        Forms\Components\TextInput::make('min_budget')
                            ->numeric()
                            ->placeholder('Min Budget'),
                        Forms\Components\TextInput::make('max_budget')
                            ->numeric()
                            ->placeholder('Max Budget'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['min_budget'],
                                fn (Builder $query, $minBudget): Builder => $query->where('budget', '>=', $minBudget),
                            )
                            ->when(
                                $data['max_budget'],
                                fn (Builder $query, $maxBudget): Builder => $query->where('budget', '<=', $maxBudget),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->icon('heroicon-o-eye'),
                    Tables\Actions\EditAction::make()
                        ->icon('heroicon-o-pencil'),
                    Tables\Actions\Action::make('update_status')
                        ->icon('heroicon-o-arrow-path')
                        ->color('warning')
                        ->form([
                            Forms\Components\Select::make('status')
                                ->options([
                                    'pending' => 'Pending',
                                    'in_progress' => 'In Progress',
                                    'completed' => 'Completed',
                                    'cancelled' => 'Cancelled',
                                ])
                                ->required(),
                        ])
                        ->action(function (Project $record, array $data): void {
                            $record->update(['status' => $data['status']]);
                        })
                        ->requiresConfirmation()
                        ->modalHeading('Update Project Status')
                        ->modalDescription('Are you sure you want to update the project status?')
                        ->modalSubmitActionLabel('Yes, update status'),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation(),
                    Tables\Actions\BulkAction::make('mark_completed')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(function ($records): void {
                            $records->each(function ($record) {
                                $record->update(['status' => 'completed']);
                            });
                        })
                        ->requiresConfirmation(),
                    Tables\Actions\BulkAction::make('mark_in_progress')
                        ->icon('heroicon-o-play')
                        ->color('warning')
                        ->action(function ($records): void {
                            $records->each(function ($record) {
                                $record->update(['status' => 'in_progress']);
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'view' => Pages\ViewProject::route('/{record}'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'in_progress')->count();
    }
    
    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }
}
