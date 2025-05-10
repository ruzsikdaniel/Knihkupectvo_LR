<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(){
        $book = Book::paginate(10);
        $category = Category::query()->distinct()->pluck('name');
        return view('admin.index', compact('book', 'category'));
    }
}
