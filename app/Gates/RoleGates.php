<?php

namespace App\Gates;

use App\Models\User;

class RoleGates
{
    public function isAdmin(User $user)
    {
        return in_array($user->user_role_number, ['ROLE-001', 'ROLE-002']); // SuperAdmin and Admin
    }

    public function isSuperAdmin(User $user)
    {
        return $user->user_role_number === 'ROLE-001';
    }

    public function isInstructor(User $user)
    {
        return $user->user_role_number === 'ROLE-003';
    }

    public function isChairperson(User $user)
    {
        return $user->user_role_number === 'ROLE-004';
    }

    public function isDean(User $user)
    {
        return $user->user_role_number === 'ROLE-005';
    }

    public function canManageUsers(User $user)
    {
        return $this->isSuperAdmin($user);
    }

    public function canManageCourses(User $user)
    {
        return in_array($user->user_role_id, [1, 2, 3]); // SuperAdmin, Admin, and Instructor
    }

    public function canManageGrades(User $user)
    {
        return in_array($user->user_role_id, [1, 2, 3]); // SuperAdmin, Admin, and Instructor
    }

    public function canViewDashboard(User $user)
    {
        return $user->user_role_id !== null; // Any logged in user
    }
}
