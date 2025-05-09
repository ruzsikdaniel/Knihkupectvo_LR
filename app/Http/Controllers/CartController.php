<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\ShoppingBook;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function show(Request $request){
        $userId = Auth::check() ? Auth::id() : null;
        $sessionId = $request->session()->getId();

        $cart = ShoppingCart::with(['books.book'])
            ->where('id_user', $userId)
            ->orWhere('session_id', $userId ? null : $sessionId)
            ->first();

        $cartItems = $cart ? $cart->books: collect();
        $priceTotal = $cartItems->sum(fn($item) => $item->book?->price * $item->number);

        $itemCount = $cartItems->sum('number');

        return view('cart', [
            'cartItems' => $cartItems,
            'total' => $priceTotal,
            'itemCount' => $itemCount,
        ]);
    }

    public function add(Request $request){
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        $bookId = $request->input('book_id');
        $sessionId = $request->session()->getId();
        $userId = Auth::check() ? Auth::id() : null;



        // najdi alebo vytvor kosik
        $cart = ShoppingCart::with(['books.book'])
            ->where('id_user', $userId)
            ->orWhere('session_id', $userId ? null : $sessionId)
            ->first();

        if(!$cart){
            $cart = new ShoppingCart();
            $cart->id_user = $userId;
            $cart->session_id = $userId ? null : $sessionId;
            $cart->price = 0;
            $cart->save();
        }

        // pozri, ci je kniha dostupna
        $book = Book::findOrFail($bookId);
        if ($book->state === 'nie je na sklade') {
            return response()->json([
                'message' => 'Kniha nie je momentálne na sklade.',
            ], 400);
        }

        // pridaj / aktualizuj knihu v kosiku
        $bookInCart = ShoppingBook::firstOrNew([
            'id_card' => $cart->id,
            'id_book' => $bookId
        ]);
        $bookInCart->number = $bookInCart->exists ? $bookInCart->number + 1 : 1;    // zvys pocet danej knihy o 1
        $bookInCart->save();

        // prepocitaj celkovu cenu kosika
        $cart->load('books.book');
        $total = $cart->books->sum(
            fn($item) => $item->book?->price * $item->number
        );
        $cart->price = $total;
        $cart->save();

        // vrat spatnu vazbu
        return response()->json([
            'message' => 'Kniha bola úspešne pridaná do košíka.',
            'cart_total' => $total
        ]);
    }

    public function updateQuantity(Request $request)
    {
        // validuj AJAX request od updateCart.js
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        // nacitaj userId a sessionId
        $userId = Auth::check() ? Auth::id() : null;
        $sessionId = $request->session()->getId();

        // najdi kosik pouzivatela
        $cart = ShoppingCart::where('id_user', $userId)
            ->orWhere('session_id', $userId ? null : $sessionId)
            ->first();
        if(!$cart)
            return response()->json(['error' => 'Košík neexistuje'], 404);

        // najdi knihu, ktorej chceme pocet zmenit
        $item = ShoppingBook::where('id_card', $cart->id)
            ->where('id_book', $request->book_id)
            ->first();
        if (!$item)
            return response()->json(['error' => 'Položka neexistuje'], 404);

        // prepis hodnotu poctu podla requestu
        $item->number = $request->quantity;
        $item->save();

        // prepocitaj ceny
        $cart->load('books.book');
        $cart->price = $cart->books->sum(fn($i) => $i->book->price * $i->number);
        $cart->save();

        // vrat JSON odpoved pre updadeCart.js
        return response()->json([
            'item_total' => number_format($item->book->price * $item->number, 2, ',', ' '),
            'cart_total' => number_format($cart->price, 2, ',', ' '),
            'item_count' => $cart->books->sum('number')
        ]);
    }
}
