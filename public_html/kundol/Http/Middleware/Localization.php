<?php

namespace App\Http\Middleware;

use App;
use App\Models\Localization as LocaleModal;
use Closure;
use DB;
use Illuminate\Http\Request;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $query = 'SHOW TABLES LIKE "localizations"';

        if (file_exists(storage_path('installed'))) {
            $sql = DB::select($query);
            if ($sql) {
                $isExisted = LocaleModal::where('ip', \Request::ip())->first();
                if ($isExisted) {
                    App::setLocale($isExisted->current_language);
                }
            }

        }

        return $next($request);

    }
}
