<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AutoCheckPermission
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

        if(auth()->guard()->user()->hasRole('super admin')){
            return $next($request);  
        }

        $routeName = $request->route()->getName();
        $permission = Permission::whereRaw("FIND_IN_SET ('$routeName', route)")->first();
        if ($permission) {
            if ($request->guard('admin')->user()->can($permission->name)) {
                        return $next($request);  
            }
        }else{
            abort(403);
        }

    }
}
