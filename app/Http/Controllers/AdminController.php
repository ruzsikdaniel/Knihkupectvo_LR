<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index(){
        $book = Book::all();
        $category = Category::query()->distinct()->pluck('name');
        return view('admin.welcome', compact('book', 'category'));
    }

    public function addBook(){
        $book = Book::all();
        $category = Category::query()->distinct()->pluck('name');
        return view('admin.add_book', compact('book', 'category'));
    }

    public function book($id){
        $book = Book::with('pictures')->findOrFail($id);
        $category = Category::query()->distinct()->pluck('name');
        return view('admin.book', compact('book', 'category'));
    }

    public function updateBook(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'book-title' => 'required|string|max:255',
            'book-author' => 'required|string|max:255',
            'book-abstract' => 'nullable|string|max:1500',
            'book-genre' => 'nullable|string|max:100',
            'book-language' => 'nullable|string|max:50',
            'book-pages' => 'nullable|numeric',
            'book-publisher' => 'nullable|string|max:100',
            'book-year' => 'nullable|numeric|min:1000|max:' . now()->year,
            'book-price' => 'required|numeric|min:0',
            'book-stock' => 'required|in:0,1',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $book->title = $validated['book-title'];
        $book->author = $validated['book-author'];
        $book->abstract = $validated['book-abstract'];
        $book->genre = $validated['book-genre'];
        $book->language = $validated['book-language'];
        $book->pages = $validated['book-pages'];
        $book->publisher = $validated['book-publisher'];
        $book->year = $validated['book-year'];
        $book->price = $validated['book-price'];
        $book->stock = $validated['book-stock'];
        $book->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $fileName = time() . '_' . $image->getClientOriginalName();
                $destination = public_path('images/book_images');

                if (!file_exists($destination)) {
                    mkdir($destination, 0755, true);
                }

                $image->move($destination, $fileName);

                $picture = new Picture();
                $picture->path = 'images/book_images/' . $fileName;
                $picture->url = asset('images/book_images/' . $fileName);
                $picture->title = $book->title . ' obrázok';
                $picture->save();

                $book->pictures()->syncWithoutDetaching([$picture->id]);
            }
        }
        Log::info('Zaznamenané vstupy:', $request->all());

        return redirect()->route('admin');
    }

    public function deleteBook($id)
    {
        $book = Book::findOrFail($id);
        $book->pictures()->detach();
        $book->delete();
        return route('admin');
    }

}
