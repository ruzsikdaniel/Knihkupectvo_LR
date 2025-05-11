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
    public function create(): View{
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request){

        // ziskaj sessionId pred regeneraciou
        $sessionId = $request->session()->getId();

        // ak su prihlasovacie udaje nespravne, vrat error
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            return back()->withErrors([
                'email' => 'Prihlasovacie údaje sú nesprávne.',
            ])->onlyInput('email');
        }

        // pouzivatel je admin -> presmeruj na admin rozhranie
        if ($request->user()->role === '1')
            return redirect('/admin');


        // over a prihlas pouzívatela
        $request->authenticate();
        $request->session()->regenerate();

        $userId = $request->user()->id;

        // najdi anonymny a user kosiky
        $sessionCart = ShoppingCart::where('session_id', $sessionId)
            ->whereNull('id_user')
            ->first();
        $userCart = ShoppingCart::where('id_user', $userId)->first();

        // prihlaseny pouzivatel este nema kosik
        //  - anonymny kosik sa prepise, ulozi sa do userCart a vynuluje sa
        if (!$userCart && $sessionCart) {
            $sessionCart->id_user = $userId;
            $sessionCart->session_id = null;
            $sessionCart->save();

            $userCart = $sessionCart;
            $sessionCart = null;
        }

        // pouzivatel ma oba kosíky -> spojime obe kosiky do userCart
        elseif ($userCart && $sessionCart) {
            // kazda kniha v anonymnom kosiku je priradena do user kosiku
            foreach ($sessionCart->books()->get() as $sessionBook) {
                // najdi knihu v user kosiku, co je zaroven v anonymnom kosiku
                $bookFound = $userCart->books()
                    ->where('id_book', $sessionBook->id_book)
                    ->first();

                // ak si nasiel taku knihu, prepis jej pocet
                if($bookFound){
                    $bookFound->amount += $sessionBook->amount;
                    $bookFound->save();
                }
                // nenasiel si zhodujucu knihu, tak ju pridaj podla anonymneho kosiku
                else{
                    $userCart->books()->create([
                        'id_book' => $sessionBook->id_book,
                        'amount' => $sessionBook->amount,
                        'price' => $sessionBook->price,
                    ]);
                }
            }

            // sessionCart uz nepotrebujeme
            $sessionCart->books()->delete();
            $sessionCart->delete();
        }

        // prepocitaj cenu userCart
        if($userCart){
            $userCart->load('books.book');

            $total = $userCart->books->sum(function ($item) {
                return $item->book?->price * $item->amount;
            });

            $userCart->price = $total;
            $userCart->save();
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
