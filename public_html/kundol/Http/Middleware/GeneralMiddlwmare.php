<?php

namespace App\Http\Middleware;

use App\Models\Admin\MenuBuilder;
use Closure;
use DB;
use Illuminate\Http\Request;

class GeneralMiddlwmare
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (file_exists(storage_path('installed'))) {
            try {
                // Check if menu_builders table exists (works for both MySQL and SQLite)
                if (\Schema::hasTable('menu_builders')) {
                    $header_menu = MenuBuilder::first();
                    \View::share('header_menu', $header_menu);
                }
            } catch (\Exception $e) {
                // Silently fail if table doesn't exist
            }
        }

        return $next($request);
    }
}
