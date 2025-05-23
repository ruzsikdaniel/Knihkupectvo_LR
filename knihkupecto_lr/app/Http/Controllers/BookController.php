<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; //get the book model
use App\Models\Category; //get the book model
use App\Models\BookCategory; //get the book model

class BookController extends Controller
{
    public function book_search(Request $request){
        $search1 = $request->search;
        $book = Book::with('pictures')
            ->where('title', 'ILIKE', '%'.$search1.'%')
            ->paginate(10);
        return view('findbooks', compact('book'));
    }

    public function book($id){
        $book = Book::with('pictures')->find($id);
        return view('book', compact('book'));
    }

    public function category($name){
        $cat = Category::where('name', $name)->first();
        $cat_book = BookCategory::where('id_category', $cat->id)->get();
        $book = Book::with('pictures')->whereIn('id', $cat_book->pluck('id_book'))->paginate(10);

        return view('category', [
            'book' => $book,
            'categoryName' => $cat->name
        ]);
    }
}
