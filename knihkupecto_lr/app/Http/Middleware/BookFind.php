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
        if(!Auth::check()){
            return $next($request); // pre neprihlasenych userov
        }

        // user logged in with role '1' - admin
        if(Auth::user()->role === '1'){
            // ak poziadavka je na /admin/...  presmeruj ho na /admin/book_search
            if(!$request->is('admin/*')){
                $query = $request->getQueryString();
                $redirect = '/admin/book_search' . ($query ? '?'.$query : '');

                return redirect($redirect);     // pre admina
            }
        }

        return $next($request);     // pre prihlasenych userov
    }
}
