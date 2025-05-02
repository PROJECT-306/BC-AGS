<?php

namespace App\Policies;

use App\Models\User;
use App\Gates\RoleGates;

class UserPolicy
{
    protected $roleGates;

    public function __construct(RoleGates $roleGates)
    {
        $this->roleGates = $roleGates;
    }

    public function viewAny(User $user)
    {
        return $this->roleGates->canManageUsers($user);
    }

    public function view(User $user, User $model)
    {
        return $this->roleGates->canManageUsers($user);
    }

    public function create(User $user)
    {
        return $this->roleGates->canManageUsers($user);
    }

    public function update(User $user, User $model)
    {
        return $this->roleGates->canManageUsers($user);
    }

    public function delete(User $user, User $model)
    {
        return $this->roleGates->canManageUsers($user);
    }

    public function restore(User $user, User $model)
    {
        return $this->roleGates->canManageUsers($user);
    }

    public function forceDelete(User $user, User $model)
    {
        return $this->roleGates->canManageUsers($user);
    }
}
