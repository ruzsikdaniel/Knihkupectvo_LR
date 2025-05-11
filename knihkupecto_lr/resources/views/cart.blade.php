@extends('layouts.main')

@section('title', 'Nákupný košík')

@section('content')
    <section class="container">
        <h1>
            Nákupný košík
        </h1>
    </section>

    <article id="cart" class="d-none d-lg-flex flex-column container">
    @if(isset($cartItems) && count($cartItems) > 0)
        @foreach($cartItems as $item)
        <section class="d-flex justify-content-between align-items-center cart-item" id="cart-item-{{ $item->book->id }}">
            <span class="d-flex justify-content-start align-items-center item-data">
                <img class="col-3 item-icon"
                     src="{{ optional($item->book->pictures->first())->url ?? asset('images/book_128.png') }}"
                     alt="Obálka knihy"/>
                <div class="col-12">
                    <p class="item-title">
                        <a href="{{ route('book', $item->book->id) }}">
                            {{ $item->book->title }}
                        </a>
                        <br>
                        <a>
                            {{ $item->book->author }}
                        </a>
                    </p>
                </div>
            </span>
            <span class="d-flex justify-content-end align-items-center item-control">
                <div>
                    @if($item->book->stock)
                        <p class="in-stock">
                            je na sklade
                        </p>
                    @else
                        <p class="out-of-stock">
                            nie je na sklade
                        </p>
                    @endif
                </div>
                <label>
                    <input type="number" class="item-count" value="{{ $item->number }}" min="1" data-book-id="{{ $item->book->id }}">
                </label>
                <button class="btn item-delete" data-book-id="{{ $item->book->id }}">
                    <img src="{{ asset('images/delete.png') }}"/>
                </button>
                <p id="item-total-{{ $item->book->id }}" class="total-price-book">
                    Suma: {{ number_format($item->book->price * $item->amount, 2, ',', ' ') }}€
                </p>
            </span>
        </section>
        @endforeach
        <section id="cart-summary" class="d-flex justify-content-end">
            <div id="sum-prices">
                <p class="total-price-cart">
                    Suma: {{ number_format($total, 2, ',', ' ') }}€
                </p>
            </div>
        </section>
    @else
        <p>
            Váš košík je prázdny.
        </p>
    @endif
    </article>

    <article id="cart" class="d-lg-none container">
    @if(isset($cartItems) && count($cartItems) > 0)
        @foreach($cartItems as $item)
            <section class="cart-item" id="cart-item-{{ $item->book->id }}">
                <span class="d-flex justify-content-between align-items-center item-data">
                    <div class="d-flex flex-row">
                        <img class="col-3 item-icon" src="{{ optional($item->book->pictures->first())->url ?? asset('images/book_128.png') }}" alt="Obálka knihy"/>
                        <div class="d-flex align-items-center">
                            <p class="item-title">
                                <a href="{{ route('book', $item->book->id) }}">
                                    {{ $item->book->title }}
                                </a>
                                <br>
                                <a>
                                    {{ $item->book->author }}
                                </a>
                            </p>
                        </div>
                    </div>
                    <p id="item-total-{{ $item->book->id }}" class="total-price-book">
                        Suma: {{ number_format($item->book->price * $item->amount, 2, ',', ' ') }}€
                    </p>
                </span>
                <span class="d-flex justify-content-start item-control">
                    <div class="d-flex align-items-center gap-3">
                        @if($item->book->stock)
                            <p class="in-stock">
                                je na sklade
                            </p>
                        @else
                            <p class="out-of-stock">
                                nie je na sklade
                            </p>
                        @endif
                        <label>
                            <input type="number" class="item-count" value="{{ $item->amount }}" min="1" data-book-id="{{ $item->book->id }}">
                        </label>
                        <button class="btn border-0 item-delete" data-book-id="{{ $item->book->id }}">
                            <img src="{{ asset('images/delete.png') }}" alt="Odstrániť"/>
                        </button>
                    </div>
                </span>
            </section>
        @endforeach

        <section id="cart-summary" class="d-flex justify-content-end">
            <div id="sum-prices">
                <p class="total-price-cart">
                    Suma: {{ number_format($total, 2, ',', ' ') }}€
                </p>
            </div>
        </section>
    @else
        <p>
            Váš košík je prázdny.
        </p>
    @endif
    </article>

    <section id="navigation-buttons" class="d-flex justify-content-around">
        <button onclick="window.location.href=' {{ route('home') }} '">Späť na nákup</button>
        <button onclick="window.location.href=' {{ route('checkout.customer-info') }}'">Pokračovať na platbu</button>
    </section>
@endsection
