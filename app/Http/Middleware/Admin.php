<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // ak pouzivatel nie je admin, posli ho na pouzivatelsku stranku
        if(!Auth::check() || Auth::user()->role !== '1'){
            return redirect('/');
        }
        return $next($request);
    }
}
