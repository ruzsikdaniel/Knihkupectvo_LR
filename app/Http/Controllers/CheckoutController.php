<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Payment;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Models\Purchase;

class CheckoutController extends Controller
{
    public function customer_info(){
        $total = $this->getCartTotal();
        return view('checkout.customer-info', compact('total'));
    }

    public function delivery(){
        $deliveries = Delivery::all();
        $payments = Payment::all();
        $total = $this->getCartTotal();

        return view('checkout.delivery', compact('deliveries', 'payments', 'total'));
    }

    public function payment(){
        $total = $this->getCartTotal();
        return view('checkout.payment', compact('total'));
    }


    public function storeCustomerInfo(){
        $validated = request()->validate([
            'firstname' => 'required|string|max:50|alpha',
            'surname' => 'required|string|max:50|alpha',
            'telephone' => 'required|digits_between:8,15',
            'email' => 'required|email|max:100',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100|alpha',
            'postcode' => 'required|digits:5',
        ],[
            'firstname.alpha' => 'Meno musí obsahovať iba písmená.',
            'surname.alpha' => 'Priezvisko musí obsahovať iba písmená.',
            'telephone.digits_between' => 'Telefónne číslo musí mať 8 až 15 číslic.',
            'postcode.digits' => 'PSČ musí mať presne 5 číslic.',
            'city.alpha' => 'Mesto/dedina musí obsahovať iba písmená.'
        ]);

        $purchase = new Purchase();
        $purchase->fill($validated);
        $purchase->isPaid = false;

        $purchase->delivery_id = null;
        $purchase->payment_id = null;

        $purchase->save();

        session(['purchase_id' => $purchase->id]);

        return redirect()->route('checkout.delivery');
    }
    public function storeDeliveryInfo(Request $request){
        $request->validate([
            'delivery_id' => 'required|integer|exists:deliveries,id',
            'payment_id' => 'required|integer|exists:payments,id',
        ]);

        $purchaseId = session('purchase_id');
        if (!$purchaseId) {
            return redirect()->route('checkout.customer-info')->withErrors('Nebol nájdený nákup.');
        }

        $purchase = Purchase::find($purchaseId);
        if (!$purchase) {
            return redirect()->route('checkout.customer-info')->withErrors('Záznam neexistuje.');
        }

        $purchase->delivery_id = $request->delivery_id;
        $purchase->payment_id = $request->payment_id;
        $purchase->save();

        return redirect()->route('checkout.payment');
    }

    public function processPayment(){
        $validated = request()->validate([
            'card_number' => ['required', 'regex:/^(\d{4}[\s\-]?){4}$/'],
            'expiry' => ['required', 'regex:/^(0[1-9]|1[0-2])\/\d{2}$/'],
            'cvv' => 'required|digits:3'
        ],[
            'card_number.regex' => "Číslo karty musí mať formát 'xxxx xxxx xxxx xxxx'.",
            'expiry.regex' => "Platnosť musí mať formát 'MM/YY.'",
            'cvv.digits' => "CVV musí mať presne 3 číslice."
        ]);

        $purchase = Purchase::find(session('purchase_id'));
        if ($purchase) {
            $purchase->isPaid = true;
            $purchase->save();
        }

        ShoppingCart::where('session_id', session()->getId())->delete();

        session()->forget('cart');
        session()->forget('purchase_id');

        return redirect()->route('home')->with('status', 'Objednávka bola úspešne zaplatená.');
    }

    public function getCartTotal(){
        return ShoppingCart::where('session_id', session()->getId())
            ->value('price') ?? 0.0;
    }

}
