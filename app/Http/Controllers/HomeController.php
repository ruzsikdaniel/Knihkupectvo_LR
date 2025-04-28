<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; //get the book model
use App\Models\Category; //get the book model

class HomeController extends Controller
{
    public function index(){
        $book = Book::paginate(10);
        $category = Category::query()->distinct()->pluck('name'); //get the 5 categories
        return view('admin.index', compact('book', 'category'));
    }
}
