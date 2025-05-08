<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show(){
        $books = Book::take(2)->get();  // for testing purposes the first and second book

        return view('cart', ['book' => $books]);
    }
}
