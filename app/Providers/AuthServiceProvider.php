<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\UserPolicy;
use App\Gates\RoleGates;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        App\Models\User::class => UserPolicy::class,
        App\Models\Course::class => CoursePolicy::class,
        App\Models\Student::class => StudentPolicy::class,
        App\Models\FinalGrade::class => GradePolicy::class,
        App\Models\Subject::class => SubjectPolicy::class,
        App\Models\ClassSection::class => ClassSectionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        $roleGates = new RoleGates();

        Gate::define('is-superadmin', function ($user) use ($roleGates) {
            return $roleGates->isSuperAdmin($user);
        });

        Gate::define('is-admin', function ($user) use ($roleGates) {
            return $roleGates->isAdmin($user);
        });

        Gate::define('is-instructor', function ($user) use ($roleGates) {
            return $roleGates->isInstructor($user);
        });

        Gate::define('is-chairperson', function ($user) use ($roleGates) {
            return $roleGates->isChairperson($user);
        });

        Gate::define('is-dean', function ($user) use ($roleGates) {
            return $roleGates->isDean($user);
        });

        Gate::define('can-manage-users', function ($user) use ($roleGates) {
            return $roleGates->canManageUsers($user);
        });

        Gate::define('can-manage-courses', function ($user) use ($roleGates) {
            return $roleGates->canManageCourses($user);
        });

        Gate::define('can-manage-grades', function ($user) use ($roleGates) {
            return $roleGates->canManageGrades($user);
        });

        Gate::define('can-view-dashboard', function ($user) use ($roleGates) {
            return $roleGates->canViewDashboard($user);
        });
    }
}
