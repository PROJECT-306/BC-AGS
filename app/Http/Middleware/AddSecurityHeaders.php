<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddSecurityHeaders
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Security Headers
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'geolocation=(self), microphone=(self), camera=(self)');
        
        // CSP (Content Security Policy)
        $csp = [
            'default-src' => ["'self'"],
            'script-src' => ["'self'", "'unsafe-inline'"],
            'style-src' => ["'self'", "'unsafe-inline'"],
            'img-src' => ["'self'", 'data:', 'https:'],
            'connect-src' => ["'self'"],
            'font-src' => ["'self'"],
            'object-src' => ["'none'"],
            'media-src' => ["'self'"],
            'frame-src' => ["'self'"],
        ];

        $cspString = implode('; ', array_map(
            function ($value, $key) {
                return $key . ' ' . implode(' ', $value);
            },
            $csp,
            array_keys($csp)
        ));

        $response->headers->set('Content-Security-Policy', $cspString);

        return $response;
    }
}
