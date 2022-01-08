<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BedMiddleware
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
        if(auth()->guard('department')->user()->bed_permission != 'on'){
            return back();
        }
        return $next($request);
    }
}
