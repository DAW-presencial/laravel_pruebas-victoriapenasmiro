<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PruebaMiddelware
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
        echo "middelware proyecto de login";
        return $next($request);
    }
}
