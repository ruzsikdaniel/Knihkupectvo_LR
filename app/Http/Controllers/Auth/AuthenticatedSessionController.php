<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Shopping_Card;

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
    public function store(LoginRequest $request): RedirectResponse // every time someone tries to log in
    {
        $request->authenticate();
        $request->session()->regenerate();

        $sessionId = $request->session()->getId();  // get sessionId
        $userId = $request->user()->id;             // get userId (if logged in)

        // get the cart from both the session and the user
        $sessionCart = Shopping_Card::where('session_id', $sessionId)->first();
        $userCart = Shopping_Card::where('id_user', $userId)->first();

        // merge two carts, if both exist
        if($userCart && $sessionCart){
            foreach($sessionCart->books as $sessionItem){
                $item = $userCart->books()
                    ->where('id_book', $sessionItem->id_book)->first();

                if($item){
                    $item->number += $sessionItem->number;
                    $item->save();
                }
                else{
                    $userCart->books()->create([
                        'id_book' => $sessionItem->id_book,
                        'number' => $sessionItem->number,
                    ]);
                }
            }
        }

        // user is an admin
        if($request->user()->role === '1'){
            return redirect('admin/dashboard');
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

        return redirect()->route('home');
    }
}
