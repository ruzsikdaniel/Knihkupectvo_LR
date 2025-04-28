<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; //get the book model
use App\Models\Category; //get the book model


class UserController extends Controller
{
    public function show(){ //just main page of the unlogged user
        $book = Book::paginate(10);
        $category = Category::query()->distinct()->pluck('name'); //get the 5 categories

        //$category = Category::take(5)->get(); //get the 5 categories
        //$genres = Book::select('genre')
        return view('welcome', compact('book', 'category'));
    }
    public function show_logged(){ //logged user main
        $category = Category::query()->distinct()->pluck('name'); //get the 5 categories
        $book = Book::paginate(10);
        return view('dashboard', compact('book', 'category'));
    }

    
}
