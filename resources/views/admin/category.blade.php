@extends('layouts.main')

    @section('title', 'Hlavná stránka')

    @section('content')
    <article id="category">
        <section id="category-grid">
            @foreach($book as $books)
                <span id="grid-item" class="d-flex flex-column border">
                    <img src="https://mrtns.sk/tovar/_l/2531/l2531895.jpg?v=17433329282" alt="Obálka knihy" class="img-fluid">

                    <div class="d-flex flex-column text-left">
                        <p id="item-title"><a href="/html/item.html">{{$books->name}}</a></p>
                        <p class="text-muted">{{$books->author}}</p>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <p class="item-price">
                            {{number_format($books->price, 2, ',', ' ')}} €
                        </p>
                        <button class="btn btn-outline-secondary">
                            <img src="{{ asset('images/cart-icon.png') }}" alt="Košík">
                        </button>
                    </div>
                </span>
            @endforeach
        <div id="pagination-container" class="d-flex justify-content-center align-items-center">
                {{$book->onEachSide(1)->links()}}
            </div>
    </article>
@endsection
