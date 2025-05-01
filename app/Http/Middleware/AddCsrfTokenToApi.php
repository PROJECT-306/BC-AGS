<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AddCsrfTokenToApi
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->is('api/*')) {
            $response = $next($request);
            $response->withCookie(Cookie::make('XSRF-TOKEN', csrf_token(), 3600));
            return $response;
        }

        return $next($request);
    }
}
