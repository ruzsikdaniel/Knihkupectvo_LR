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
            <div id="category-header" class="d-flex align-items-center mb-3 gap-5">
                <h2 id="category-name">
                    <a href="/html/category.html" class="text-decoration-none">Fantasy</a>
                </h2>
                <div>
                    <button class="btn btn-outline-primary filter">Filter 1</button>
                    <button class="btn btn-outline-primary filter">Filter 2</button>
                    <button class="btn btn-outline-primary filter">Filter 3</button>
                </div>
            </div>
            <div id="carousel" class="d-flex align-items-center overflow-scroll">
                <ul id="carousel-list">
                    <li class="book-item">
                        <span class="d-flex flex-column border p-2">
                            <img src="https://mrtns.sk/tovar/_l/2531/l2531895.jpg?v=17433329282" alt="Obálka knihy" class="img-fluid mb-2">
                            <div class="d-flex flex-column text-start mb-2">
                                <p id="item-title" class="mb-1 fw-bold"><a href="/html/item.html"
                                                                           class="text-decoration-none">Sunrise on the Reaping</a></p>
                                <p class="text-muted mb-0">Suzanne Collins</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p id="item-price-gross" class="mb-0">21,28€</p>
                                <button class="btn btn-outline-secondary">
                                    <img src="/images/cart-icon.png" alt="Košík">
                                </button>
                            </div>
                        </span>
                    </li>

                    <li class="book-item">
                        <span class="d-flex flex-column border p-2">
                            <img src="https://mrtns.sk/tovar/_l/2820/l2820275.jpg?v=17433079752" alt="Obálka knihy" class="img-fluid mb-2">
                            <div class="d-flex flex-column text-start mb-2">
                                <p id="item-title" class="mb-1 fw-bold"><a href="/html/item.html"
                                                                           class="text-decoration-none">Balada o nešťastných koncích</a></p>
                                <p class="text-muted mb-0">Stephanie Garber</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p id="item-price-gross" class="mb-0">15,68€</p>
                                <button class="btn btn-outline-secondary">
                                    <img src="/images/cart-icon.png" alt="Košík">
                                </button>
                            </div>
                        </span>
                    </li>

                    <li class="book-item">
                        <span class="d-flex flex-column border p-2">
                            <img src="https://mrtns.sk/tovar/_l/2830/l2830893.jpg?v=17433079762" alt="Obálka knihy" class="img-fluid mb-2">
                            <div class="d-flex flex-column text-start mb-2">
                                <p id="item-title" class="mb-1 fw-bold"><a href="/html/item.html"
                                                                           class="text-decoration-none">Zišli sa v Bagdade</a></p>
                                <p class="text-muted mb-0">Agatha Christie</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p id="item-price-gross" class="mb-0">14,60€</p>
                                <button class="btn btn-outline-secondary">
                                    <img src="/images/cart-icon.png" alt="Košík">
                                </button>
                            </div>
                        </span>
                    </li>

                    <li class="book-item">
                        <span class="d-flex flex-column border p-2">
                            <img src="https://mrtns.sk/tovar/_l/2828/l2828965.jpg?v=17433079752" alt="Obálka knihy" class="img-fluid mb-2">
                            <div class="d-flex flex-column text-start mb-2">
                                <p id="item-title" class="mb-1 fw-bold"><a href="/html/item.html"
                                                                           class="text-decoration-none">Láska slečny Elliotovej</a></p>
                                <p class="text-muted mb-0">Jane Austen</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p id="item-price-gross" class="mb-0">15,10€</p>
                                <button class="btn btn-outline-secondary">
                                    <img src="/images/cart-icon.png" alt="Košík">
                                </button>
                            </div>
                        </span>
                    </li>

                    <li class="book-item">
                        <span class="d-flex flex-column border p-2">
                            <img src="https://mrtns.sk/tovar/_l/2853/l2853799.jpg?v=17433079762" alt="Obálka knihy" class="img-fluid mb-2">
                            <div class="d-flex flex-column text-start mb-2">
                                <p id="item-title" class="mb-1 fw-bold"><a href="/html/item.html"
                                                                           class="text-decoration-none">O láske a iných démonoch</a></p>
                                <p class="text-muted mb-0">Gabriel García Márquez</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p id="item-price-gross" class="mb-0">13,46€</p>
                                <button class="btn btn-outline-secondary">
                                    <img src="/images/cart-icon.png" alt="Košík">
                                </button>
                            </div>
                        </span>
                    </li>

                    <li class="book-item">
                        <span class="d-flex flex-column border p-2">
                            <img src="https://mrtns.sk/tovar/_l/182/l182117.jpg?v=17433080002" alt="Obálka knihy" class="img-fluid mb-2">
                            <div class="d-flex flex-column text-start mb-2">
                                <p id="item-title" class="mb-1 fw-bold"><a href="/html/item.html"
                                                                           class="text-decoration-none">Milujte sa s láskou</a></p>
                                <p class="text-muted mb-0">Kamil Peteraj</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p id="item-price-gross" class="mb-0">12,99€</p>
                                <button class="btn btn-outline-secondary">
                                    <img src="/images/cart-icon.png" alt="Košík">
                                </button>
                            </div>
                        </span>
                    </li>

                    <li class="book-item">
                        <span class="d-flex flex-column border p-2">
                            <img src="https://mrtns.sk/tovar/_l/2342/l2342421.jpg?v=17433079832" alt="Obálka knihy" class="img-fluid mb-2">
                            <div class="d-flex flex-column text-start mb-2">
                                <p id="item-title" class="mb-1 fw-bold"><a href="/html/item.html"
                                                                           class="text-decoration-none">Básne SK/CZ 2023</a></p>
                                <p class="text-muted mb-0">Autorský kolektív</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p id="item-price-gross" class="mb-0">7,00€</p>
                                <button class="btn btn-outline-secondary">
                                    <img src="/images/cart-icon.png" alt="Košík">
                                </button>
                            </div>
                        </span>
                    </li>
                </ul>
            </div>
        </section>
    </article>
@endsection
