<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AppointmentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->guard('department')->user()->appointment_permission != 'on'){
            return back();
        }
        return $next($request);
    }
}
