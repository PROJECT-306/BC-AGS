<?php

namespace App\Policies;

use App\Models\User;
use App\Gates\RoleGates;

class SubjectPolicy
{
    protected $roleGates;

    public function __construct(RoleGates $roleGates)
    {
        $this->roleGates = $roleGates;
    }

    public function viewAny(User $user)
    {
        return $this->roleGates->canManageCourses($user);
    }

    public function view(User $user, Subject $subject)
    {
        return $this->roleGates->canManageCourses($user);
    }

    public function create(User $user)
    {
        return $this->roleGates->canManageCourses($user);
    }

    public function update(User $user, Subject $subject)
    {
        return $this->roleGates->canManageCourses($user);
    }

    public function delete(User $user, Subject $subject)
    {
        return $this->roleGates->canManageCourses($user);
    }
}
