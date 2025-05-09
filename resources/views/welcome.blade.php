@extends('layouts.main')

@section('title', 'Hlavná stránka')

@section('content')
    <article>
        <section>
            <div class="flex-row d-flex justify-content-between align-items-center gap-5" id="intro">
                <h1>Vitajte v našom kníhkupectve!</h1>
                <div class="d-flex justify-content-end">
                    <img id="banner" alt="Banner" class="img-fluid"
                         src="https://img.freepik.com/free-photo/high-angle-books-with-copy-space_23-2148827189.jpg?t=st=1746749949~exp=1746753549~hmac=608227947be6fe3324b6416cc37d251f688778f60790e6003666bff7f6d0245f&w=996">
                </div>
            </div>
        </section>

        <section id="category">
            <div>
                @foreach($category as $categories)
                    <a href="{{route('category_details', $categories)}}">
                        <button class="btn btn-outline-primary filter" style="margin-bottom:5px">
                            {{$categories}}
                        </button>
                    </a>
                @endforeach
            </div>

            <div id="carousel" class="d-flex align-items-center overflow-scroll">
                <ul id="carousel-list">
                    @foreach($book as $item)
                        <li class="book-item">
                        <span class="d-flex flex-column border p-2">
                            <a href="{{route('book_details', $item->id)}}" class="text-decoration-none">
                            <img src="{{$item->pictures->first()->url ?? asset('images/book_128.png') }}"
                                 alt="Obálka knihy" class="img-fluid mb-2"></a>
                            <div class="d-flex flex-column text-start mb-2">
                                <p id="item-title" class="mb-1 fw-bold">
                                    <a href="{{route('book_details', $item->id)}}"
                                       class="text-decoration-none">{{$item->name}}
                                    </a>
                                </p>
                                <p class="text-muted mb-0">{{$item->author}}</p>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <p id="item-price-{{ $item->id }}" class="item-price" class="mb-0">
                                    {{ number_format($item->price, 2, ',', ' ') }}€
                                </p>
                                <button class="btn btn-outline-secondary border-0 add-to-cart"
                                        data-book-id="{{ $item->id }} ">
                                    <img src="{{ asset('images/cart-icon.png') }}" alt="Košík">
                                </button>
                            </div>
                        </span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div id="pagination-container" class="d-flex justify-content-center align-items-center">
                {{$book->onEachSide(1)->links()}}
            </div>
        </section>
    </article>
@endsection
