@extends('layouts.main')

@section('title', $categoryName)

@section('content')

<article id="category">
    <section>
        <h1 id="category-title">
            <a href="{{ route('category_details', $categoryName) }}" class="text-decoration-none">
                {{ $categoryName }}
            </a>
        </h1>
    </section>

    <section id="category-grid">
        @foreach($book as $item)
            <span id="grid-item" class="d-flex flex-column border book-item">
                <img src="{{$item->pictures->first()->url ?? asset('images/book_128.png') }}" alt="Obálka knihy"
                     class="img-fluid">

                <div class="d-flex flex-column text-left">
                    <p id="item-title">
                        <a href="{{ route('book_details', $item->id) }}">
                            {{$item->title}}
                        </a>
                    </p>
                    <p class="text-muted">
                        {{$item->author}}
                    </p>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <p class="item-price">
                        {{number_format($item->price, 2, ',', ' ')}}€
                    </p>
                    <button class="btn btn-outline-secondary border-0 add-to-cart" data-book-id="{{ $item->id }}">
                        <img src="{{asset('images/cart-icon.png')}}" alt="Košík">
                    </button>
                </div>
            </span>
        @endforeach
    </section>
    <div id="pagination-container" class="d-flex justify-content-center align-items-center">
        {{$book->onEachSide(1)->links()}}
    </div>
</article>
@endsection
