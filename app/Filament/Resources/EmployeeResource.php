<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationGroup = 'User Management';
    
    protected static ?int $navigationSort = 2;
    
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter full name'),
                        
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->placeholder('Enter email address'),
                        
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->maxLength(20)
                            ->placeholder('Enter phone number'),
                        
                        Forms\Components\TextInput::make('address')
                            ->maxLength(500)
                            ->placeholder('Enter address'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Account Settings')
                    ->schema([
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                            ->required(fn (string $context): bool => $context === 'create')
                            ->minLength(8)
                            ->maxLength(255)
                            ->placeholder('Enter password')
                            ->helperText('Minimum 8 characters'),
                        
                        Forms\Components\TextInput::make('password_confirmation')
                            ->password()
                            ->same('password')
                            ->required(fn (string $context): bool => $context === 'create')
                            ->placeholder('Confirm password'),
                        
                        Forms\Components\DateTimePicker::make('email_verified_at')
                            ->label('Email Verified At')
                            ->placeholder('Leave empty if not verified'),
                        
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active Employee')
                            ->default(true)
                            ->helperText('Only active employees can access the system'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Employee Details')
                    ->schema([
                        Forms\Components\Select::make('department')
                            ->options([
                                'development' => 'Development',
                                'design' => 'Design',
                                'marketing' => 'Marketing',
                                'sales' => 'Sales',
                                'support' => 'Support',
                                'management' => 'Management',
                            ])
                            ->placeholder('Select department'),
                        
                        Forms\Components\TextInput::make('position')
                            ->maxLength(255)
                            ->placeholder('Enter job position'),
                        
                        Forms\Components\TextInput::make('employee_id')
                            ->maxLength(50)
                            ->placeholder('Enter employee ID'),
                        
                        Forms\Components\DatePicker::make('hire_date')
                            ->placeholder('Select hire date'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Additional Information')
                    ->schema([
                        Forms\Components\Textarea::make('bio')
                            ->maxLength(1000)
                            ->rows(3)
                            ->placeholder('Tell us about yourself...'),
                        
                        Forms\Components\FileUpload::make('avatar')
                            ->image()
                            ->imageEditor()
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth('200')
                            ->imageResizeTargetHeight('200')
                            ->disk('public')
                            ->directory('employee-avatars')
                            ->visibility('public')
                            ->helperText('Upload profile picture'),
                        
                        Forms\Components\KeyValue::make('metadata')
                            ->keyLabel('Key')
                            ->valueLabel('Value')
                            ->columnSpanFull()
                            ->helperText('Add additional employee metadata'),
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                    ->circular()
                    ->size(50),
                
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Email copied to clipboard'),
                
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                
                Tables\Columns\TextColumn::make('department')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'development' => 'info',
                        'design' => 'warning',
                        'marketing' => 'success',
                        'sales' => 'danger',
                        'support' => 'gray',
                        'management' => 'primary',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('position')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                
                Tables\Columns\TextColumn::make('employee_id')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                
                Tables\Columns\TextColumn::make('hire_date')
                    ->date()
                    ->sortable()
                    ->toggleable(),
                
                Tables\Columns\IconColumn::make('email_verified_at')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->label('Verified'),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->label('Active'),
                
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
                Tables\Filters\SelectFilter::make('department')
                    ->options([
                        'development' => 'Development',
                        'design' => 'Design',
                        'marketing' => 'Marketing',
                        'sales' => 'Sales',
                        'support' => 'Support',
                        'management' => 'Management',
                    ])
                    ->multiple()
                    ->preload(),
                
                Tables\Filters\TernaryFilter::make('email_verified_at')
                    ->label('Email Verification'),
                
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Account Status'),
                
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
                    Tables\Actions\Action::make('verify_email')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(function (Employee $record): void {
                            $record->update(['email_verified_at' => now()]);
                        })
                        ->requiresConfirmation()
                        ->modalHeading('Verify Email')
                        ->modalDescription('Are you sure you want to mark this email as verified?')
                        ->modalSubmitActionLabel('Yes, verify email')
                        ->visible(fn (Employee $record): bool => !$record->email_verified_at),
                    Tables\Actions\Action::make('toggle_status')
                        ->icon('heroicon-o-arrow-path')
                        ->color('warning')
                        ->action(function (Employee $record): void {
                            $record->update(['is_active' => !$record->is_active]);
                        })
                        ->requiresConfirmation()
                        ->modalHeading('Toggle Employee Status')
                        ->modalDescription('Are you sure you want to change the active status of this employee?')
                        ->modalSubmitActionLabel('Yes, toggle status'),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation(),
                    Tables\Actions\BulkAction::make('activate')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(function ($records): void {
                            $records->each(function ($record) {
                                $record->update(['is_active' => true]);
                            });
                        })
                        ->requiresConfirmation(),
                    Tables\Actions\BulkAction::make('deactivate')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->action(function ($records): void {
                            $records->each(function ($record) {
                                $record->update(['is_active' => false]);
                            });
                        })
                        ->requiresConfirmation(),
                    Tables\Actions\BulkAction::make('verify_emails')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(function ($records): void {
                            $records->each(function ($record) {
                                $record->update(['email_verified_at' => now()]);
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'view' => Pages\ViewEmployee::route('/{record}'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('is_active', true)->count();
    }
    
    public static function getNavigationBadgeColor(): ?string
    {
        return 'success';
    }
}
