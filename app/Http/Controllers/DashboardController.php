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
        
        // Get message statistics
        $totalMessages = $user->receivedMessages()->count();
        $unreadMessages = $user->receivedMessages()->where('is_read', false)->count();
        
        // Get service statistics
        $totalServices = Service::where('is_active', true)->count();
        $userServices = $user->projects()->with('service')->get()->pluck('service.name')->unique()->count();
        
        // Get recent projects
        $recentProjects = $user->projects()
            ->with('service')
            ->latest()
            ->take(5)
            ->get();
        
        // Get recent messages
        $recentMessages = $user->receivedMessages()
            ->with(['sender', 'receiver'])
            ->latest()
            ->take(5)
            ->get();
        
        // Calculate project growth (simplified)
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
        
        // Calculate message growth
        $lastMonthMessages = $user->receivedMessages()
            ->where('created_at', '>=', Carbon::now()->subMonth())
            ->count();
        $previousMonthMessages = $user->receivedMessages()
            ->whereBetween('created_at', [
                Carbon::now()->subMonths(2),
                Carbon::now()->subMonth()
            ])
            ->count();
        
        $messageGrowth = $previousMonthMessages > 0 
            ? round((($lastMonthMessages - $previousMonthMessages) / $previousMonthMessages) * 100, 1)
            : 0;
        
        return view('dashboard', compact(
            'totalProjects',
            'activeProjects',
            'completedProjects',
            'pendingProjects',
            'totalMessages',
            'unreadMessages',
            'totalServices',
            'userServices',
            'recentProjects',
            'recentMessages',
            'projectGrowth',
            'messageGrowth'
        ));
    }
} 