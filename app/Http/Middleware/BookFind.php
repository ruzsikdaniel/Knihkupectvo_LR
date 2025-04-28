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
            return $next($request);
        }
        if(Auth::user()->role == '1'){
            if(!$request->is('findbook')){
                return redirect('/findbook/' . $request->search);

                //return redirect('/findbook', $request->search);
            }
        }
        // {route('category_details', $categories)}}">
        return $next($request);
    }
}
