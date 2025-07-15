<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Contracts\Auth\Authenticatable;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Authenticatable $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Authenticatable $user, Project $project): bool
    {
        // Handle both User and Employee models
        if ($user instanceof User) {
        return $user->id === $project->user_id;
        } elseif ($user instanceof Employee) {
            // For employees, allow access to all projects or implement specific logic
            return true;
        }
        
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Authenticatable $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Authenticatable $user, Project $project): bool
    {
        // Handle both User and Employee models
        if ($user instanceof User) {
        return $user->id === $project->user_id;
        } elseif ($user instanceof Employee) {
            // For employees, allow access to all projects or implement specific logic
            return true;
        }
        
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Authenticatable $user, Project $project): bool
    {
        // Handle both User and Employee models
        if ($user instanceof User) {
        return $user->id === $project->user_id;
        } elseif ($user instanceof Employee) {
            // For employees, allow access to all projects or implement specific logic
            return true;
        }
        
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Authenticatable $user, Project $project): bool
    {
        // Handle both User and Employee models
        if ($user instanceof User) {
        return $user->id === $project->user_id;
        } elseif ($user instanceof Employee) {
            // For employees, allow access to all projects or implement specific logic
            return true;
        }
        
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Authenticatable $user, Project $project): bool
    {
        // Handle both User and Employee models
        if ($user instanceof User) {
        return $user->id === $project->user_id;
        } elseif ($user instanceof Employee) {
            // For employees, allow access to all projects or implement specific logic
            return true;
        }
        
        return false;
    }
} 