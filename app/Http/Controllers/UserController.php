<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; //get the book model


class UserController extends Controller
{
    public function show(){
        $book = Book::paginate(10);
        return view('welcome', compact('book'));
    }
    public function show_logged(){
        $book = Book::paginate(10);
        return view('dashboard', compact('book'));
    }

    
}
