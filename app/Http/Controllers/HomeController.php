<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 1) {
            return redirect('/admin');
        }

        return view('welcome');
    }

}
