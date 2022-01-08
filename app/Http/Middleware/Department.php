<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Department
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
        if(auth()->guard('department')->check() == false){
            return redirect('/department/login');
        }
        return $next($request);
    }
}
