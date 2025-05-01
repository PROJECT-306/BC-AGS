<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $role = strtolower($user->user_role?->user_role_name); // e.g., 'instructor', 'superadmin'

        if (view()->exists("dashboards.$role")) {
            return view("dashboards.$role");
        }

        abort(403, 'Dashboard not available for this role.');
    }
}
