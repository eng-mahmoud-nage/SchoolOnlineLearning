<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

    public function handle($request, Closure $next, ...$guards)
    {
        if ($guards[0] === "admin" && !auth()->guard($guards[0])->check()) {
            // dd($guards, auth()->guard($guards[0])->check());
            return redirect('/sys-login');
        }
       else if ($guards[0] === "std" && !auth()->guard($guards[0])->check()) {
        // dd($guards, auth()->guard($guards[0])->check());
            return redirect('/std-login');
        }
        return $next($request);

    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    // protected function redirectTo($request, Closure $next, $guard = null)
    // {
    //     if (! $request->expectsJson() && $gaurd == 'admin' && ! auth()->guard($guard)->check()) {
    //         return redirect(url('/sys-login'));
    //     }
    //     else if (! $request->expectsJson() && $gaurd == 'admin' && ! auth()->guard($guard)->check()) {
    //         dd(auth()->guard());
    //         return redirect(url('/std-login'));
    //     }
    // }
}
