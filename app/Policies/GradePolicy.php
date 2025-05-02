<?php

namespace App\Policies;

use App\Models\User;
use App\Gates\RoleGates;

class GradePolicy
{
    protected $roleGates;

    public function __construct(RoleGates $roleGates)
    {
        $this->roleGates = $roleGates;
    }

    public function viewAny(User $user)
    {
        return $this->roleGates->canManageGrades($user);
    }

    public function view(User $user, Grade $grade)
    {
        return $this->roleGates->canManageGrades($user);
    }

    public function create(User $user)
    {
        return $this->roleGates->canManageGrades($user);
    }

    public function update(User $user, Grade $grade)
    {
        return $this->roleGates->canManageGrades($user);
    }

    public function delete(User $user, Grade $grade)
    {
        return $this->roleGates->canManageGrades($user);
    }

    public function restore(User $user, Grade $grade)
    {
        return $this->roleGates->canManageGrades($user);
    }

    public function forceDelete(User $user, Grade $grade)
    {
        return $this->roleGates->canManageGrades($user);
    }
}
