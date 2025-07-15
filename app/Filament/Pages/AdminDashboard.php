<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\DashboardStats;
use App\Filament\Widgets\RecentMessages;
use App\Filament\Widgets\RecentProjects;

class AdminDashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    
    protected static ?string $navigationLabel = 'Dashboard';
    
    protected static ?int $navigationSort = -2;
    
    protected static string $view = 'filament.pages.admin-dashboard';
    
    public function getTitle(): string
    {
        return 'Admin Dashboard';
    }
    
    protected function getHeaderWidgets(): array
    {
        return [
            DashboardStats::class,
        ];
    }
    
    protected function getFooterWidgets(): array
    {
        return [
            RecentMessages::class,
            RecentProjects::class,
        ];
    }
} 