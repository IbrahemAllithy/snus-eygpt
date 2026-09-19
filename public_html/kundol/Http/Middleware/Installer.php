<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Installer
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (! file_exists(storage_path('installed'))) {
            return redirect('/install');
        } else {
            return $next($request);
        }

    }
}
