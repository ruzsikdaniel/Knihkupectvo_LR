<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; //get the book model
use App\Models\Category; //get the book model
use App\Models\Category_book; //get the book model

class BookController extends Controller
{
    public function book_search(Request $request){ //for user return books
        $search1 = $request->search;
        $book = Book::where('name', 'LIKE', '%'.$search1.'%')->paginate(10);
        return view('findbooks', compact('book'));
    }

    public function findbook($request){ //for user return books
       // $search1 = $request->search;
        $book = Book::where('name', 'LIKE', '%'.$request.'%')->paginate(10);
        return view('admin.findbooks', compact('book'));
    }

    // public function findbook(Request $request){ //for admin return books
    //     $search1 = $request->search;
    //     $book = Book::where('name', 'LIKE', '%'.$search1.'%')->paginate(10);
    //     return view('admin.findbooks', compact('book'));
    // }
    public function book_details($id){ //get the details of the book
        $book = Book::find($id);
        return view('book', compact('book'));
    }

    public function admin_book_details($id){ //get the details of the book
        $book = Book::find($id);
        return view('admin.book', compact('book'));
    }

    public function category($name){ //get the details of the book
        $cat = Category::where('name', $name)->first(); //get the id of the category
        $cat_book = Category_Book::where('id_category', $cat->id)->get(); //get id of the books with the category
        $book = Book::whereIn('id', $cat_book->pluck('id_book'))->paginate(10); 

        return view('category', compact('book'));
    }

    public function category_log($name){ //get the details of the book
        $cat = Category::where('name', $name)->first(); //get the id of the category
        $cat_book = Category_Book::where('id_category', $cat->id)->get(); //get id of the books with the category
        $book = Book::whereIn('id', $cat_book->pluck('id_book'))->paginate(10); 

        return view('category', compact('book'));
    }

    public function category_admin($name){ //get the details of the book
        $cat = Category::where('name', $name)->first(); //get the id of the category
        $cat_book = Category_Book::where('id_category', $cat->id)->get(); //get id of the books with the category
        $book = Book::whereIn('id', $cat_book->pluck('id_book'))->paginate(10); 

        return view('admin.category', compact('book'));
    }
}
