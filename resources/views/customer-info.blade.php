@extends('layouts.main')

@section('title', 'Vaše údaje')

@section('content')

<section class="deliver-style">
    <div class="row">
        <h1 class="col-4">
            Váš košík
        </h1>
        <!-- TODO: reformat id and class names -->
        <div id="change-shoppingcart-link" class="col-4">
            <a href="{{ route('cart') }}">
                Upraviť
            </a>
        </div>
        <div id="suma-shoppingcart" class="col-4">
            <p id="total-price-gross" class="col-4">
                <!-- current cart total price here -->
            </p>
        </div>
    </div>
</section>
<article id="register-screen">
    <section>
        <form action="/register" method="POST">
            <div id="form-group" class="row align-items-center">
                <label for="username" class="col-md-4 col-form-label">
                    Meno
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="username" name="username" maxlength="20" required autocomplete="username">
                </div>
                <label for="nameu" class="col-md-4 col-form-label">
                    Priezvisko
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="nameu" name="username" maxlength="20" required autocomplete="username">
                </div>
                <label for="mobil" class="col-md-4 col-form-label">
                    Mobil
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="mobil" name="username" maxlength="10" required autocomplete="username">
                </div>
                <label for="mail" class="col-md-4 col-form-label">
                    E-mail
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="mail" name="username" maxlength="20" required autocomplete="username">
                </div>
                <label for="address" class="col-md-4 col-form-label">
                    Adresa
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="address" name="username" maxlength="20" required autocomplete="username">
                </div>
                <label for="mesto" class="col-md-4 col-form-label">
                    Mesto/dedina
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="mesto" name="username" maxlength="20" required autocomplete="username">
                </div>
                <label for="psc" class="col-md-4 col-form-label">
                    PSČ
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="psc" minlength="5" maxlength="5" name="username" required autocomplete="username">
                </div>
            </div>
            <div id="btn-register" class="text-center">
                <button type="submit">
                    <a href="{{ route('delivery') }}">
                        Pokračovať na spôsob platby
                    </a>
                </button>
            </div>
        </form>
    </section>
</article>
@endsection
