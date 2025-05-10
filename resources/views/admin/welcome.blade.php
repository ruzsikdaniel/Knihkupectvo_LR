@extends('layouts.main')

@section('title', 'Admin - Hlavná stránka')

@section('content')

<article>
    <section id="intro">
        <h1>
            Vitajte na admin rozhraní!
        </h1>
    </section>

        <section id="category">
            <div id="category-header">
                <h2 id="category-name"><a href="category.html">Kategória 1</a></h2>
                <button class="filter">Filter 1</button>
                <button class="filter">Filter 2</button>
                <button class="filter">Filter 3</button>
            </div>
            <div id="carousel" class="d-flex align-items-center overflow-scroll">
                <ul id="carousel-list">
                    @foreach($book as $item)
                    <li class="book-item">
                        <span class="d-flex flex-column border p-2">
                            <a href="{{ route('admin.book', ['id' => $item->id]) }}" class="text-decoration-none">
                                <img src="{{ $item->pictures->first()->url ?? asset('images/book_128.png') }}" alt="Obálka knihy" class="img-fluid mb-2">
                            </a>

                            <div class="d-flex flex-column text-start mb-2">
                                <p id="item-title" class="mb-1 fw-bold">
                                    <a href="{{ route('admin.book', ['id' => $item->id]) }}" class="text-decoration-none">
                                        {{ $item->name }}
                                    </a>
                                </p>
                                <p class="text-muted mb-0">
                                    {{ $item->author }}
                                </p>
                            </div>

                            <div class="d-flex align-items-center gap-3">
                                <p id="item-price-{{ $item->id }}" class="item-price" class="mb-0">
                                    {{ number_format($item->price, 2, ',', ' ') }}€
                                </p>
                                <button class="btn btn-outline-secondary border-0 add-to-cart" data-book-id="{{ $item->id }} ">
                                    <img src="{{ asset('images/cart-icon.png') }}" alt="Košík">
                                </button>
                            </div>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </section>

    <section id="books">
        <div id="books-change">
            <button onclick="window.location.href='{{ route('admin.addBook') }}';" id="add-book" aria-label="Pridať Knihu">
                Pridať Knihu
            </button>
        </div>
    </section>
</article>
@endsection
