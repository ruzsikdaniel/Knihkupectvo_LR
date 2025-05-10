@extends('layouts.main')

@section('title', 'Doprava a platba')

@section('content')

<article class="cart">
    <section class="deliver-style">
        <div class="row">
            <h1 class="col-4">Váš košík</h1>

            <div id="change-shoppingcart-link" class="col-4">
                <a href="{{ route('cart') }}">Upraviť</a>
            </div>

            <div id="suma-shoppingcart" class="col-4">
                <p id="total-price-gross" class="col-4">
                    Suma: {{ number_format($total, 2, ',', ' ') }} €
                </p>
            </div>
        </div>
    </section>

    <form method="POST" action="{{ route('checkout.delivery.store') }}">
        @csrf
        <section class="deliver-style container">
            <h1>Spôsob doručenia</h1>
            @foreach ($deliveries as $delivery)
                <div class="book-about-add">
                    <input id="delivery-{{ $delivery->id }}" type="radio" name="delivery_id" value="{{ $delivery->id }}" required>
                    <label for="delivery-{{ $delivery->id }}">{{ $delivery->method }} ({{ $delivery->price }} €)</label>
                </div>
            @endforeach
        </section>

        <section class="deliver-style container">
            <h1>Spôsob platby</h1>
            @foreach ($payments as $payment)
                <div class="book-about-add">
                    <input id="payment-{{ $payment->id }}" type="radio" name="payment_id" value="{{ $payment->id }}" required>
                    <label for="payment-{{ $payment->id }}">{{ $payment->method }} ({{ $payment->price }} €)</label>
                </div>
            @endforeach
        </section>

        <section id="navigation-buttons" class="d-flex container">
            <button type="submit" class="btn btn-primary border-0 w-100">
                Pokračovať na platbu
            </button>
        </section>
    </form>


</article>
@endsection
