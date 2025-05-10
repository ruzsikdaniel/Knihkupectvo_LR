<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use App\Models\ShoppingCart;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request){
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            return back()->withErrors([
                'email' => 'Prihlasovacie údaje sú nesprávne.',
            ])->onlyInput('email');
        }

        // získaj sessionId pred regeneraciou
        $sessionId = $request->session()->getId();

        // over a prihlas pouzívatela
        $request->authenticate();
        $request->session()->regenerate();

        // pouzivatel je admin -> presmeruj na admin rozhranie
        if ($request->user()->role === '1') {
            return redirect('admin/dashboard');
        }

        $userId = $request->user()->id;

        // najdi session a user kosiky
        $sessionCart = ShoppingCart::where('session_id', $sessionId)
            ->whereNull('id_user')
            ->first();
        $userCart = ShoppingCart::where('id_user', $userId)->first();

        // pouzivatel este nema kosik – sessionCart sa nacita do userCart
        if (!$userCart && $sessionCart) {
            $sessionCart->id_user = $userId;
            $sessionCart->save();

            $userCart = $sessionCart;

            Log::info('Prevod sessionCart na userCart', [
                'user_id' => $userId,
                'session_id' => $sessionId,
                'session_cart_id' => $sessionCart->id,
                'books_count' => $sessionCart->books()->count(),
                'cart_price_before' => $sessionCart->price,
            ]);

            // vynulujeme $sessionCart, nevymazeme
            $sessionCart = null;
        }

        // pouzivatel ma oba kosíky -> spojime obe kosiky do userCart
        elseif ($userCart && $sessionCart) {
            Log::info('Mergenutie userCart a sessionCart', [
                'user_id' => $userId,
                'session_cart_id' => $sessionCart->id,
                'user_cart_id' => $userCart->id,
                'session_books_count' => $sessionCart->books()->count(),
                'user_books_count_before' => $userCart->books()->count(),
                'user_cart_price_before' => $userCart->price,
            ]);

            foreach ($sessionCart->books()->get() as $sessionBook) {
                $existingBook = $userCart->books()
                    ->where('id_book', $sessionBook->id_book)
                    ->first();

                if ($existingBook) {
                    $existingBook->number += $sessionBook->number;
                    $existingBook->save();
                } else {
                    $userCart->books()->create([
                        'id_book' => $sessionBook->id_book,
                        'number' => $sessionBook->number,
                        'price' => $sessionBook->price,
                    ]);
                }
            }

            // SessionCart uz nepotrebujeme
            $sessionCart->books()->delete();
            $sessionCart->delete();
        }

        // prepocitaj cenu userCart
        if($userCart){
            $userCart->load('books.book');

            $total = $userCart->books->sum(function ($item) {
                return $item->book?->price * $item->number;
            });

            $userCart->price = $total;
            $userCart->save();

            Log::info('Cena prepocítana', [
                'user_id' => $userId,
                'price' => $total
            ]);
        }

        return redirect('/');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // po odhlaseni sa vygeneruje novy session ID
        $request->session()->regenerate();

        return redirect()->route('home');
    }
}
