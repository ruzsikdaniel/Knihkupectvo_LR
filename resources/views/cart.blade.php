@extends('layouts.main')

@section('title', 'Nákupný košík')

@section('content')

<section>
    <h1>Nákupný košík</h1>
</section>

<article id="cart" class="d-none d-lg-flex flex-column">
    @foreach($book as $item)
        <section id="cart-item" class="d-flex justify-content-between align-items-center">
        <span id="item-data" class="d-flex justify-content-start align-items-center">
            <img id="item-icon" class="col-3"
                 src="{{ $item->pictures->first()->url ?? asset('images/book_128.png') }}" alt="Obálka knihy"/>
            <div class="col-12">
                <p id="item-title">
                    <a href="{{ route('book_details', $item->id) }}"> {{ $item->name }} </a>
                    <br>
                    <a> {{ $item->author }} </a>
                </p>
            </div>
        </span>
            <span id="item-control" class="d-flex justify-content-end align-items-center">
            <div id="stock-info">
                <!-- TODO: pridat vypocet knih na sklade / staticky pocet pre kazdu knihu -->
                @if($item->state === 'je na sklade')
                    <p id="in-stock">4 na sklade</p>
                @else
                    <p id="out-of-stock">0 na sklade</p>
                @endif
            </div>
            <label>
                <input id="item-count" type="number" min="1" max="10" value="1">
            </label>
            <button id="item-delete" class="btn">
                <img src="{{ asset('images/delete.png') }}"/>
            </button>
            <p id="item-price-gross">
                {{ number_format($item->price, 2, ',', ' ') }}€
            </p>
        </span>
        </section>
    @endforeach
</article>

<article id="cart" class="d-lg-none">
    @foreach($book as $item)
        <section id="cart-item">
        <span id="item-data" class="d-flex justify-content-between align-items-center">
            <div class="d-flex flex-row">
                <img id="item-icon" class="col-3"
                     src="{{ $item->pictures->first()->url ?? asset('images/book_128.png') }}" alt="Obálka knihy"/>
                <div class="d-flex align-items-center">
                    <p id="item-title">
                        <a href="{{ route('book_details', $item->id) }}"> {{ $item->name }} </a>
                        <br>
                        <a> {{ $item->author }} </a>
                    </p>
                </div>
            </div>
            <p id="item-price-gross">
                {{ number_format($item->price, 2, ',', ' ') }}€
            </p>
        </span>
            <span id="item-control" class="d-flex justify-content-start">
            <div id="stock-info" class="d-flex align-items-center gap-3">
                <!-- TODO: pridat vypocet knih na sklade / staticky pocet pre kazdu knihu -->
                @if($item->state === 'je na sklade')
                    <p id="in-stock">4 na sklade</p>
                @else
                    <p id="out-of-stock">0 na sklade</p>
                @endif
                <label>
                    <input id="item-count" type="number" min="1" max="10" value="1">
                </label>
                <button id="item-delete" class="btn">
                    <img src="{{ asset('images/delete.png') }}"/>
                </button>
            </div>
        </span>
        </section>
    @endforeach

    <section id="cart-summary" class="d-flex justify-content-end">
        <div id="sum-prices">
            <p id="total-price-gross">
                Suma: {{ number_format($item->sum('price'), 2, ',', ' ') }}€    <!-- TODO: vypocita sumu $book->price kazdej knihy v kosiku -->
            </p>
        </div>
    </section>
</article>

<section id="navigation-buttons" class="d-flex justify-content-around">
    <button onclick="window.location.href=' {{ route('home') }} '">Späť na nákup</button>
    <button onclick="window.location.href=' {{ route('home') }}'">Pokračovať na platbu</button>
    <!-- TODO: pridat route na addData.html -->
</section>
@endsection
