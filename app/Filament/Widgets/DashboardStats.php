<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Project;
use App\Models\Message;
use App\Models\Employee;

class DashboardStats extends BaseWidget
{
    protected static ?string $pollingInterval = '30s';
    
    protected static bool $isLazy = false;
    
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('Registered users')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
            
            Stat::make('Active Projects', Project::where('status', 'active')->count())
                ->description('Ongoing projects')
                ->descriptionIcon('heroicon-m-folder')
                ->color('info'),
            
            Stat::make('Unread Messages', Message::where('is_read', false)->count())
                ->description('Pending messages')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('warning'),
            
            Stat::make('Admin Employees', Employee::where('is_active', true)->count())
                ->description('Active staff')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary'),
        ];
    }
} 