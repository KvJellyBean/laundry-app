<?php

namespace App\Policies;

use App\Models\ServicePackage;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ServicePackagePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if(auth()->user()->can('view service packages')){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ServicePackage $servicePackage): bool
    {
        if(auth()->user()->can('view service packages')){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if(auth()->user()->can('create service packages')){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ServicePackage $servicePackage): bool
    {
        if(auth()->user()->can('edit service packages')){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ServicePackage $servicePackage): bool
    {
        if(auth()->user()->can('edit service packages')){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ServicePackage $servicePackage): bool
    {
        if(auth()->user()->can('edit service packages')){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ServicePackage $servicePackage): bool
    {
        if(auth()->user()->hasRole('admin')){
            return true;
        } else {
            return false;
        }
    }
}
