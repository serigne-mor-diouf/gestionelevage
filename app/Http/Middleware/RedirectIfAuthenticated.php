<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   // app/Http/Middleware/RedirectIfAuthenticated.php

public function handle($request, Closure $next, $guard = null)
{
    if (Auth::guard($guard)->check()) {
       // return redirect('/'); // Modifier cette ligne pour rediriger où vous le souhaitez
    }

    return $next($request);
}

}
