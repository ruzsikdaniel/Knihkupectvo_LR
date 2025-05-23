<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\ShoppingBook;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function show(Request $request){
        $cart = $this->getUserCart($request);

        $cartItems = $cart ? $cart->books: collect();
        $priceTotal = $cartItems->sum(fn($item) => $item->book?->price * $item->amount);

        $itemCount = $cartItems->sum('amount');

        return view('cart', [
            'cartItems' => $cartItems,
            'total' => $priceTotal,
            'itemCount' => $itemCount,
        ]);
    }

    public function add(Request $request){
        $bookId = $request->input('book_id');
        $sessionId = $request->session()->getId();
        $userId = Auth::check() ? Auth::id() : null;

        // najdi alebo vytvor kosik
        $cart = $this->getUserCart($request);

        if(!$cart){
            $cart = new ShoppingCart();
            $cart->id_user = $userId;
            $cart->session_id = $sessionId;
            $cart->price = 0;
            $cart->save();
        }

        // pozri, ci je kniha dostupna
        $book = Book::findOrFail($bookId);
        if(!$book->stock){
            return response()->json([
                'message' => 'Kniha nie je momentálne na sklade.',
            ], 400);
        }

        // pridaj / aktualizuj knihu v kosiku
        $bookInCart = ShoppingBook::firstOrNew([
            'id_cart' => $cart->id,
            'id_book' => $bookId
        ]);
        $bookInCart->amount = $bookInCart->exists ? $bookInCart->amount + 1 : 1;    // zvys pocet danej knihy o 1
        $bookInCart->save();

        // prepocitaj celkovu cenu kosika
        $total = $this->getUserCartTotal($cart);
        $cart->price = $total;
        $cart->save();

        // vrat spatnu vazbu
        return response()->json([
            'message' => 'Kniha bola úspešne pridaná do košíka.',
            'cart_total' => number_format($total, 2, ',', ' ')
        ]);
    }

    public function updateQuantity(Request $request)
    {
        // validuj AJAX request od updateCart.js
        $validated = $this->validateBookRequest($request, "UPDATE");

        // najdi kosik pouzivatela
        $cart = $this->getUserCart($request);
        if(!$cart)
            return response()->json(['error' => 'Košík neexistuje'], 404);

        // najdi knihu, ktorej chceme pocet zmenit
        $item = ShoppingBook::where('id_cart', $cart->id)
            ->where('id_book', $validated['book_id'])
            ->first();
        if (!$item)
            return response()->json(['error' => 'Položka neexistuje'], 404);

        // prepis hodnotu poctu podla requestu
        $item->amount = $request->quantity;
        $item->save();

        // prepocitaj ceny
        $cart->load('books.book');
        $cart->price = $this->getUserCartTotal($cart);
        $cart->save();

        // vrat JSON odpoved pre updadeCart.js
        return response()->json([
            'item_total' => number_format($item->book->price * $item->amount, 2, ',', ' '),
            'cart_total' => number_format($cart->price, 2, ',', ' '),
            'item_count' => $cart->books->sum('amount')
        ]);
    }

    public function remove(Request $request)
    {
        $validated = $this->validateBookRequest($request);

        $cart = $this->getUserCart($request);
        if(!$cart)
            return response()->json(['message' => 'Košík neexistuje.'], 404);


        // odstran polozku z pivot tabulky
        $cart->books()->where('id_book', $validated['book_id'])->delete();

        // prepocítaj cenu
        $cart->price = $this->getUserCartTotal($cart);
        $cart->save();

        return response()->json([
            'message' => 'Kniha bola odstránená z košíka.',
            'cart_total' => number_format($cart->price, 2, ',', ' '),
            'item_count' => $cart->books->sum('amount')
        ]);
    }

    public function validateBookRequest(Request $request, string $requestType = ''){
        if($requestType === 'UPDATE'){
            $request->validate([
                'book_id' => 'required|exists:books,id',
                'quantity' => 'required|integer|min:1'
            ]);
        }

        return $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);
    }

    private function getUserCart(Request $request)
    {
        $userId = Auth::check() ? Auth::id() : null;
        $sessionId = $request->session()->getId();

        return ShoppingCart::with('books.book')
            ->where('id_user', $userId)
            ->orWhere('session_id', $userId ? null : $sessionId)
            ->first();
    }

    private function getUserCartTotal(ShoppingCart $cart)
    {
        $cart->load('books.book');

        return $cart->books->sum(
            fn($item) => $item->book?->price * $item->amount
        );
    }
}
