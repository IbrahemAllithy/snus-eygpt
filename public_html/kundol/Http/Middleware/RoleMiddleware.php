<?php

namespace App\Http\Middleware;

use App;
use App\Models;
use Auth;
use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // $lan = Auth::user()->language->code;
        // App::setLocale($lan);
        // if(Auth::check()){

        //     $current_path = \Request::route()->getName();
        //     $permission_id = Models\Admin\Permission::where('value',$current_path)->value('id');
        //     $sql = Models\Admin\PermissionRole::where('permission_id',$permission_id)->where('role_id',Auth::user()->role_id)->first();
        //     if(!isset($sql->id))
        //         return response()->json(['status'=>'permissionError', 'msg' => "Sorry you don't have a Permission to access this page"], 200);
        // }
        // else{
        //     return response()->json(['status'=>'loginError', 'msg' => "Please Login!"], 200);
        // }
        return $next($request);
    }
}
