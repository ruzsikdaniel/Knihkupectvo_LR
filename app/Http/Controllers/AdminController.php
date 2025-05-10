<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Picture;
use Illuminate\Http\Request;

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

    public function updateBook(Request $request, $id){
        $book = Book::findOrFail($id);

        // Validácia vstupov
        $validated = $request->validate([
            'book-title' => 'required|string|max:255',
            'book-author' => 'required|string|max:255',
            'book-abstract' => 'nullable|string|max:1500',
            'book-genre' => 'nullable|string|max:100',
            'book-lang' => 'nullable|string|max:50',
            'book-pages' => 'nullable|numeric',
            'book-publisher' => 'nullable|string|max:100',
            'book-year' => 'nullable|numeric|min:1000|max:' . now()->year,
            'book-price' => 'required|numeric|min:0',
            'book-stock' => 'required|integer|min:0',
            'images.*' => 'nullable|image|max:2048',
        ]);

        // Aktualizácia údajov knihy
        $book->title = $validated['book-title'];
        $book->author = $validated['book-author'];
        $book->abstract = $validated['book-abstract'];
        $book->genre = $validated['book-genre'];
        $book->language = $validated['book-lang'];
        $book->pages = $validated['book-pages'];
        $book->publisher = $validated['book-publisher'];
        $book->year = $validated['book-year'];
        $book->price = $validated['book-price'];
        $book->stock = $validated['book-stock'];
        $book->save();

        // Spracovanie obrázkov
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('book_images', 'public');

                $picture = new Picture();
                $picture->url = '/storage/' . $path;
                $picture->title = $book->title . ' obrázok';
                $picture->save();

                // Napojenie na knihu cez pivot tabuľku
                $book->pictures()->attach($picture->id);
            }
        }

        return redirect()->route('admin.book.edit', $book->id)->with('success', 'Kniha bola úspešne upravená.');
    }

    public function deleteBook($id)
    {
        $book = Book::findOrFail($id);

        // Odpojiť obrázky z pivot tabuľky (bez mazania súborov a picture záznamov)
        $book->pictures()->detach();

        // Alebo ak chceš zmazať aj obrázky z disk + databázy:
        /*
        foreach ($book->pictures as $picture) {
            if (Storage::disk('public')->exists(str_replace('/storage/', '', $picture->url))) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $picture->url));
            }
            $picture->delete();
        }
        */

        $book->delete();

        return redirect('/admin')->with('success', 'Kniha bola úspešne vymazaná.');
    }

}
