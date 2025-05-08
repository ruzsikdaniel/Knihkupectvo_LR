<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Shopping_Book;
use App\Models\Shopping_Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function show(Request $request){
        $userId = Auth::check() ? Auth::id() : null;
        $sessionId = $request->session()->getId();

        $cart = Shopping_Card::with(['books.book'])
            ->where('id_user', $userId)
            ->orWhere('session_id', $userId ? null : $sessionId)
            ->first();

        $books = $cart ? $cart->books: collect();

        return view('cart', ['book' => $books]);
    }

    public function add(Request $request){

        $request->validate([
            'book_id' => 'required|exists:books,id',
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
            ['number' => 1]
        );
        $bookInCart->save();


        // aktualizuj cenu v kosiku
        $total = $cart->books->sum(
            function ($item) {
                return $item->book->price * $item->number;
            }
        );

        $cart->price = $total;
        $cart->save();

        return response()->json([
            'message' => 'Kniha pridana do kosika.', 'cart_total' => $total
        ]);

    }
}
