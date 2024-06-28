<?php

namespace App\Http\Middleware;

use App\Enums\UserType;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->user_type == UserType::USER) {
            return $next($request);
        } else {
            $notification = array(
                'message' => 'Unauthorized permission',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
