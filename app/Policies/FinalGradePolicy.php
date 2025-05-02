<?php

namespace App\Policies;

use App\Models\FinalGrade;
use App\Models\User;
use App\Gates\RoleGates;

class FinalGradePolicy
{
    protected $roleGates;

    public function __construct(RoleGates $roleGates)
    {
        $this->roleGates = $roleGates;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $this->roleGates->canManageGrades($user);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, FinalGrade $finalGrade): bool
    {
        return $this->roleGates->canManageGrades($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $this->roleGates->canManageGrades($user);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, FinalGrade $finalGrade): bool
    {
        return $this->roleGates->canManageGrades($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, FinalGrade $finalGrade): bool
    {
        return $this->roleGates->canManageGrades($user);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, FinalGrade $finalGrade): bool
    {
        return $this->roleGates->canManageGrades($user);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, FinalGrade $finalGrade): bool
    {
        return false;
    }
}
