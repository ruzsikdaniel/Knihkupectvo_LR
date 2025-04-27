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
                        <button class="btn btn-outline-primary filter">{{$categories->name}}</button>
                    @endforeach
                </div>

            <div id="category-header" class="d-flex align-items-center mb-3 gap-5">

                <h2 id="category-name">
                    <a href="/html/category.html" class="text-decoration-none">Fantasy</a>
                </h2>

            </div>



            <div id="carousel" class="d-flex align-items-center overflow-scroll">
                <ul id="carousel-list">
                    @foreach($book as $books)
                        <li class="book-item">
                            <span class="d-flex flex-column border p-2">
                                <img src="https://mrtns.sk/tovar/_l/2828/l2828965.jpg?v=17433079752" alt="Obálka knihy" class="img-fluid mb-2">
                                <div class="d-flex flex-column text-start mb-2">
                                    <p id="item-title" class="mb-1 fw-bold"><a href="/html/item.html"
                                                                            class="text-decoration-none">{{$books->name}}</a></p>
                                    <p class="text-muted mb-0">{{$books->autor}}</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p id="item-price-gross" class="mb-0">{{$books->price}}€</p>
                                    <button class="btn btn-outline-secondary">
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
