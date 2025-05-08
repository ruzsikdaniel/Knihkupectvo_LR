<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class BookFind
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // user not logged in -> enable request to go through
        if(!Auth::check()){
            return $next($request);
        }

        // user logged in with role '1' - admin
        if(Auth::user()->role == '1'){

            // reroute directly to /findbook/{phrase}
            if(!$request->is('findbook')){
                return redirect('/findbook/' . $request->search);
            }
        }
        return $next($request);     // enable request
    }
}
