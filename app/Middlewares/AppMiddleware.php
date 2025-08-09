<?php

namespace App\Middlewares;

use Omega\Http\Request;
use Omega\Http\Response;

class AppMiddleware
{
    public function handle(Request $request, \Closure $next): Response
    {
        // do your stuff
        return $next($request);
    }
}
