<?php

namespace App\Policies;

use App\Models\User;
use App\Gates\RoleGates;

class StudentPolicy
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

    public function view(User $user, Student $student)
    {
        return $this->roleGates->canManageUsers($user);
    }

    public function create(User $user)
    {
        return $this->roleGates->canManageUsers($user);
    }

    public function update(User $user, Student $student)
    {
        return $this->roleGates->canManageUsers($user);
    }

    public function delete(User $user, Student $student)
    {
        return $this->roleGates->canManageUsers($user);
    }

    public function restore(User $user, Student $student)
    {
        return $this->roleGates->canManageUsers($user);
    }

    public function forceDelete(User $user, Student $student)
    {
        return $this->roleGates->canManageUsers($user);
    }
}
