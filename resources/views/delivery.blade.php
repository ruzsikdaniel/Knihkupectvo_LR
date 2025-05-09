@extends('layouts.main')

@section('title', 'Doprava a platba')

@section('content')

<article class="cart">
    <section class="deliver-style">
        <div class="row">
            <h1 class="col-4">Váš košík</h1>
            <div id="change-shoppingcart-link" class="col-4">
                <a href="{{ route('cart') }}">
                    Upraviť
                </a>
            </div>
            <div id="suma-shoppingcart" class="col-4">
                <p id="total-price-gross" class="col-4">
                    Suma:
                    <a>
                        21,28€
                    </a>
                </p>
            </div>
        </div>
    </section>

    <section class="deliver-style container">
        <h1>Spôsob doručenia</h1>
        <div class="book-about-add">
            <input id="deliver-1" type="radio" name="deliver-type">
            <label for="deliver-1">
                Slovenská pošta
            </label>
        </div>
        <div class="book-about-add">
            <input id="deliver-2" type="radio" name="deliver-type">
            <label for="deliver-2">
                Packeta
            </label>
        </div>
        <div class="book-about-add">
            <input id="deliver-3" type="radio" name="deliver-type">
            <label for="deliver-3">
                DPD
            </label>
        </div>
        <div class="book-about-add">
            <input id="deliver-4" type="radio" name="deliver-type">
            <label for="deliver-4">
                Na adresu
            </label>
        </div>
    </section>

    <section class="deliver-style container">
        <h1>Spôsob platby</h1>
        <div class="book-about-add">
            <input id="pay-1" type="radio" name="pay-type">
            <label for="pay-1">
                Kartou online
            </label>
        </div>
        <div class="book-about-add">
            <input id="pay-2" type="radio" name="pay-type">
            <label for="pay-2">
                Pri vyzdvihnutí
            </label>
        </div>
        <div class="book-about-add">
            <input id="pay-3" type="radio" name="pay-type">
            <label for="pay-3">
                PayPal
            </label>
        </div>
        <div class="book-about-add">
            <input id="pay-3" type="radio" name="pay-type">
            <label for="pay-3">
                GooglePay
            </label>
        </div>
    </section>

    <section id="navigation-buttons" class="d-flex container">
        <a href="{{ route('payment') }}" class="btn btn-primary w-100">
            Zaplatiť
        </a>
    </section>
</article>
@endsection
