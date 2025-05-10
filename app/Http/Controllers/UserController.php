<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;


class UserController extends Controller
{
    public function show(){
        $book = Book::paginate(10);
        $category = Category::query()->distinct()->pluck('name');
        return view('welcome', compact('book', 'category'));
    }
}
