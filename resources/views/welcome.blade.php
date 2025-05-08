@extends('layouts.main')

@section('title', 'Hlavná stránka')

@section('content')
    <article>
        <section>
            <div class="flex-row d-flex justify-content-between align-items-center gap-5" id="intro">
                <div class="">
                    <h1>Vitajte!</h1>
                </div>
                <div class="d-flex justify-content-end">
                    <!-- image from: https://www.freepik.com/free-photo/high-angle-books-with-copy-space_12151836.htm-->
                    <img id="banner" src="/images/banner.png" alt="Banner" class="img-fluid">
                </div>
            </div>
        </section>

        <section id="category">
                <div>
                    @foreach($category as $categories)
                        <a href="{{route('category_details', $categories)}}">
                            <button class="btn btn-outline-primary filter" style="margin-bottom:5px">{{$categories}}</button>
                        </a>
                    @endforeach
                </div>

            <!-- <div id="category-header" class="d-flex align-items-center mb-3 gap-5">

                <h2 id="category-name">
                    <a href="/html/category.html" class="text-decoration-none">Fantasy</a>
                </h2>

            </div> -->



            <div id="carousel" class="d-flex align-items-center overflow-scroll">
                <ul id="carousel-list">
                    @foreach($book as $books)
                        <li class="book-item">
                            <span class="d-flex flex-column border p-2">
                                <a href="{{route('book_details', $books->id)}}" class="text-decoration-none">
                                <img src="{{$books->pictures->first()->url ?? asset('images/book_128.png') }}" alt="Obálka knihy" class="img-fluid mb-2"></a>
                                <div class="d-flex flex-column text-start mb-2">
                                    <p id="item-title" class="mb-1 fw-bold">
                                        <a href="{{route('book_details', $books->id)}}"
                                           class="text-decoration-none">{{$books->name}}
                                        </a>
                                    </p>
                                    <p class="text-muted mb-0">{{$books->author}}</p>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <p id="item-price-gross" class="mb-0">
                                        {{number_format($books->price, 2, ',', ' ')}}€
                                    </p>
                                    <button class="btn btn-outline-secondary" id="add-to-cart">
                                        <img src="/images/cart-icon.png" alt="Košík">
                                    </button>
                                </div>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
            {{$book->onEachSide(1)->links()}}
        </section>
    </article>
@endsection
