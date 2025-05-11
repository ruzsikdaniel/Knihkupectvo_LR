@extends('layouts.main')

@section('title', 'Kategória - ' . $categoryName)

@section('content')

<article id="category">
    <section>
        <h1 id="category-title">
            <a href="{{ route('category', $categoryName) }}" class="text-decoration-none">
                {{ $categoryName }}
            </a>
        </h1>
    </section>

    <section id="category-grid">
        @foreach($book as $item)
            <li class="book-item">
                <span class="d-flex flex-column border p-2">
                    <a href="{{ route('book', $item->id) }}" class="text-decoration-none">
                        <img src="{{ $item->pictures->first()->url ?? asset('images/book_128.png') }}" alt="Obálka knihy" class="img-fluid mb-2">
                    </a>

                    <div class="d-flex flex-column text-start mb-2">
                        <p id="item-title" class="mb-1 fw-bold">
                            <a href="{{ route('book', $item->id) }}" class="text-decoration-none">
                                {{ $item->title }}
                            </a>
                        </p>
                        <p class="text-muted mb-0">
                            {{ $item->author }}
                        </p>
                    </div>

                    <div class="d-flex justify-content-between align-items-center gap-3">
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
    </section>
    <div id="pagination-container" class="d-flex justify-content-center align-items-center">
        {{$book->onEachSide(1)->links()}}
    </div>
</article>
@endsection
