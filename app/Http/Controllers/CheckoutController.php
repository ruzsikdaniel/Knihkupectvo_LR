<?php

namespace App\Http\Controllers;

class CheckoutController extends Controller
{
    public function customer_info(){
        return view('customer-info');
    }

    public function delivery(){
        return view('delivery');
    }

    public function payment(){
        return view('payment');
    }
}
