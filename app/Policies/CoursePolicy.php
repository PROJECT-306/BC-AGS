<?php

namespace App\Policies;

use App\Models\User;
use App\Gates\RoleGates;

class CoursePolicy
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

    public function view(User $user, Course $course)
    {
        return $this->roleGates->canManageCourses($user);
    }

    public function create(User $user)
    {
        return $this->roleGates->canManageCourses($user);
    }

    public function update(User $user, Course $course)
    {
        return $this->roleGates->canManageCourses($user);
    }

    public function delete(User $user, Course $course)
    {
        return $this->roleGates->canManageCourses($user);
    }

    public function restore(User $user, Course $course)
    {
        return $this->roleGates->canManageCourses($user);
    }

    public function forceDelete(User $user, Course $course)
    {
        return $this->roleGates->canManageCourses($user);
    }
}
