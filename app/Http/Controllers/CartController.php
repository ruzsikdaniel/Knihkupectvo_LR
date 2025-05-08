<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Shopping_Book;
use App\Models\Shopping_Card;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show(){
        $books = Book::take(2)->get();  // for testing purposes the first and second book

        return view('cart', ['book' => $books]);
    }

    public function add(Request $request){
        $request->validate([
            'book_id' => 'required|uuid|exists:books,id',
        ]);

        $bookId = $request->input('book_id');
        $sessionId = $request->session()->getId();
        $userId = Auth::check() ? Auth::id() : null;

        // najdi kosik podla user_id alebo session_id
        $cart = Shopping_Card::firstOrCreate(
            ['id_user' => $userId, 'session_id' => $userId ? null : $sessionId],
            ['price' => 0]
        );

        // pridaj / aktualizuj knihu v kosiku
        $bookInCart = Shopping_Book::firstOrCreate(
            ['id_card' => $cart->id, 'id_book' => $bookId],
            ['number' => 0]
        );

        // pridaj jednu knihu do kosiku
        $bookInCart->number += 1;
        $bookInCart->save();

        // aktualizuj cenu v kosiku
        $total = $cart->books->sum(
            function ($item) {
                return $item->price * $item->number;
            }
        );
        $cart->price = $total;
        $cart->save();

        return response()->json([
            'message' => 'Kniha pridana do kosika.', 'cart_total' => total
        ]);

    }
}
