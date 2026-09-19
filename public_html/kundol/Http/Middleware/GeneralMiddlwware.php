<?php

namespace App\Http\Middleware;

use App\Models\Admin\MenuBuilder;
use Closure;
use DB;
use Illuminate\Http\Request;

class GeneralMiddlwware
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $query = 'SHOW TABLES LIKE "menu_builders"';

        if (file_exists(storage_path('installed'))) {

            $sql = DB::Select($query);
            if ($sql) {
                $header_menu = MenuBuilder::first();
                \View::share('header_menu', $header_menu);
            }

        }

        return $next($request);
    }
}
