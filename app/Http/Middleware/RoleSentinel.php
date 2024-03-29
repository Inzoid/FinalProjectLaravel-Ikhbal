<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class RoleSentinel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Sentinel::getUser()->hasAccess('admin')) {
            return $next($request);
        }else {
            return redirect()->route('index');
        }
    }
}
