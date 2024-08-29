<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CanonicalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        if ($response instanceof \Illuminate\Http\Response) {
            $url = url($request->path()); // Modify based on your URL structure
            $response->headers->set('Link', '<'.$url.'>; rel="canonical"', false);
        }
        return $response;
    }
}
