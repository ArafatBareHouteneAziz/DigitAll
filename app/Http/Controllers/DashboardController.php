<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Message;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get project statistics
        $totalProjects = $user->projects()->count();
        $activeProjects = $user->projects()->where('status', 'in_progress')->count();
        $completedProjects = $user->projects()->where('status', 'completed')->count();
        $pendingProjects = $user->projects()->where('status', 'pending')->count();
        
        // Calculate total revenue
        $totalRevenue = $user->projects()->where('status', 'completed')->sum('budget');
        
        // Get recent projects
        $recentProjects = $user->projects()
            ->with('service')
            ->latest()
            ->take(5)
            ->get();
        
        // Calculate percentage changes (simplified - you might want to implement more sophisticated logic)
        $lastMonthProjects = $user->projects()
            ->where('created_at', '>=', Carbon::now()->subMonth())
            ->count();
        $previousMonthProjects = $user->projects()
            ->whereBetween('created_at', [
                Carbon::now()->subMonths(2),
                Carbon::now()->subMonth()
            ])
            ->count();
        
        $projectGrowth = $previousMonthProjects > 0 
            ? round((($lastMonthProjects - $previousMonthProjects) / $previousMonthProjects) * 100, 1)
            : 0;
        
        // Revenue growth calculation
        $lastMonthRevenue = $user->projects()
            ->where('status', 'completed')
            ->where('updated_at', '>=', Carbon::now()->subMonth())
            ->sum('budget');
        $previousMonthRevenue = $user->projects()
            ->where('status', 'completed')
            ->whereBetween('updated_at', [
                Carbon::now()->subMonths(2),
                Carbon::now()->subMonth()
            ])
            ->sum('budget');
        
        $revenueGrowth = $previousMonthRevenue > 0 
            ? round((($lastMonthRevenue - $previousMonthRevenue) / $previousMonthRevenue) * 100, 1)
            : 0;
        
        return view('dashboard', compact(
            'totalProjects',
            'activeProjects',
            'completedProjects',
            'pendingProjects',
            'totalRevenue',
            'recentProjects',
            'projectGrowth',
            'revenueGrowth'
        ));
    }
} 