@extends('layouts.main')

@section('title', 'Nákup - Vaše údaje')

@section('content')

<section class="deliver-style">
    <div class="row">
        <h1 class="col-4">
            Váš košík
        </h1>
        <div id="change-shoppingcart-link" class="col-4">
            <a href="{{ route('cart') }}">
                Upraviť
            </a>
        </div>
        <div id="suma-shoppingcart" class="col-4">
            <p id="total-price-gross" class="col-4">
                Suma: {{ number_format($total, 2, ',', ' ') }} €
            </p>
        </div>
    </div>
</section>

<article id="register-screen">
    <section>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('checkout.customer.store') }}">
            @csrf
            <div class="row align-items-center">
                <label for="name_u" class="col-md-4 col-form-label">
                    Meno
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="name_u" name="name_u" required>
                </div>

                <label for="surname_u" class="col-md-4 col-form-label">
                    Priezvisko
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="surname_u" name="surname_u" required>
                </div>

                <label for="telephone" class="col-md-4 col-form-label">
                    Telefónne číslo
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="telephone" name="telephone" required>
                </div>

                <label for="email" class="col-md-4 col-form-label">
                    E-mail
                </label>
                <div class="col-md-8">
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <label for="address" class="col-md-4 col-form-label">
                    Adresa
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>

                <label for="city" class="col-md-4 col-form-label">
                    Mesto/dedina
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>

                <label for="postcode" class="col-md-4 col-form-label">
                    PSČ
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="postcode" name="postcode" required maxlength="5">
                </div>
            </div>
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">
                    Pokračovať na spôsob platby
                </button>
            </div>
        </form>
    </section>
</article>
@endsection
