<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; //get the book model

class BookController extends Controller
{
    public function book_search(Request $request){ //for user return books
        $search = $request->search;
        $book = Book::where('name', 'LIKE', '%'.$search.'%')->paginate(10);
        return view('findbooks', compact('book'));
    }

    public function findbook(Request $request){ //for admin return books
        $search = $request->search;
        $book = Book::where('name', 'LIKE', '%'.$search.'%')->paginate(10);
        return view('admin.findbooks', compact('book'));
    }
}
