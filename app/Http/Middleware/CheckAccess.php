<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class CheckAccess
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (auth()->check()) {
            $userRole = auth()->user()->userRole()?->user_role_number;
            
            // SuperAdmin can access everything
            if ($userRole === 'ROLE-001') {
                return $next($request);
            }
            
            // Check if the user's role matches any of the allowed roles
            $allowedRoles = array_flip($roles);
            if (isset($allowedRoles[$userRole])) {
                return $next($request);
            }
        }

        return redirect()->route('dashboard')->with('error', 'You do not have permission to access this page.');
    }
}
