<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CheckSuperAdmin
{
    public function handle(Request $request, Closure $next)
    {
        try {
            if (Auth::check() && in_array(Auth::user()->userRole()?->user_role_number, ['ROLE-001', 'ROLE-002', 'ROLE-003'])) {
                return $next($request);
            }
            
            return redirect()->route('dashboard')->with('error', 'You do not have permission to access this page.');
        } catch (BindingResolutionException $e) {
            \Log::error('CheckSuperAdmin middleware error: ' . $e->getMessage());
            return redirect()->route('dashboard')->with('error', 'An error occurred while checking permissions.');
        }
    }
}
