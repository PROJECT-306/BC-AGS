<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
=======
use App\Models\Student;
use App\Models\User;
use App\Models\Course;
use App\Models\Subject;
>>>>>>> origin/kyle-policies

class DashboardController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $user = Auth::user();
        
        // Check if user is authenticated
        if (!$user) {
            abort(403, 'User not authenticated.');
        }

        // Load the user role relationship
        $user->load('userRole');
        
        // Get the role number
        $roleNumber = $user->userRole?->user_role_number;
        
        // Check if we have a valid role
        if (empty($roleNumber)) {
            abort(403, 'User role not assigned.');
        }

        // Determine the role name based on role number
        $role = match($roleNumber) {
            'ROLE-001' => 'superadmin',
            'ROLE-002' => 'admin',
            'ROLE-003' => 'instructor',
            default => null,
        };

        if (empty($role)) {
            abort(403, 'Invalid user role.');
        }

        // Check if the dashboard view exists for this role
        $viewPath = "dashboards.$role";
        if (view()->exists($viewPath)) {
            return view($viewPath);
        }

        // If view doesn't exist, show a default error
        abort(404, 'Dashboard view not found for this role.');
=======
        // Fetch totals for dashboard
        $totalStudents = Student::count();
        $totalInstructors = User::where('user_role_id', 'instructor')->count(); 
        $totalCourses = Course::count();
        $totalSubjectsAssigned = Subject::count(); 

        // Return the dashboard view with data
        return view('dashboard', compact(
            'totalStudents',
            'totalInstructors',
            'totalCourses',
            'totalSubjectsAssigned'
        ));
>>>>>>> origin/kyle-policies
    }
}
