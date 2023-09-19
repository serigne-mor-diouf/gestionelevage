<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddeleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if(Auth::check()){
            if($user->profil =='Administrateur'){
             return $next($request);
            }else{
                return response()->view('admin.accueil') ;
            }
        }
        else{
            return response()->retoute('login');
        }
    }
}
