<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProprietaireMiddelleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $proprietaire = Auth::Proprietaire();
        if(Auth::check()){
            if($proprietaire->profil =='Proprietaire'){
            }
            else{
                return response()->view('proprietaires.accueil') ;
            }
           }
            else{
                return response()->retoute('login');
            }
    }
}
