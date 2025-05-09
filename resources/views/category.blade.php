@extends('layouts.main')

@section('title', 'Hlavná stránka')

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
                            <a href="{{ route('book_details', $item->id) }}">{{$item->name}}</a>
                        </p>
                        <p class="text-muted">{{$item->author}}</p>
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
            <!-- <span id="grid-item" class="d-flex flex-column border">
                <img src="https://mrtns.sk/tovar/_m/1807/m1807783.jpg?v=17417487272" alt="Obálka knihy" class="img-fluid">

                <div class="d-flex flex-column text-left">
                    <p id="item-title"><a href="/html/item.html">Básne SK/CZ 2023</a></p>
                    <p class="text-muted">Literárny klub, 2022</p>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <p class="item-price">7,88€</p>
                    <button class="btn btn-outline-secondary">
                        <img src="/images/cart-icon.png" alt="Košík">
                    </button>
                </div>
            </span>

            <span id="grid-item" class="d-flex flex-column border">
                <img src="https://mrtns.sk/tovar/_m/2217/m2217101.jpg?v=17433079822" alt="Obálka knihy" class="img-fluid">

                <div class="d-flex flex-column text-left">
                    <p id="item-title"><a href="/html/item.html">Napokon iba láska</a></p>
                    <p class="text-muted">Milan Rúfus</p>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <p class="item-price">19,99€</p>
                    <button class="btn btn-outline-secondary">
                        <img src="/images/cart-icon.png" alt="Košík">
                    </button>
                </div>
            </span>

            <span id="grid-item" class="d-flex flex-column border">
                <img src="https://mrtns.sk/tovar/_m/2401/m2401227.jpg?v=17433079822" alt="Obálka knihy" class="img-fluid">

                <div class="d-flex flex-column text-left">
                    <p id="item-title"><a href="/html/item.html">Mlčanie a iné zločiny</a></p>
                    <p class="text-muted">Iva Vranská Rojková</p>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <p class="item-price">12,26€</p>
                    <button class="btn btn-outline-secondary">
                        <img src="/images/cart-icon.png" alt="Košík">
                    </button>
                </div>
            </span>

            <span id="grid-item" class="d-flex flex-column border">
                <img src="https://mrtns.sk/tovar/_l/1760/l1760077.jpg?v=17433588072" alt="Obálka knihy" class="img-fluid">

                <div class="d-flex flex-column text-left">
                    <p id="item-title"><a href="/html/item.html">Psychológia peňazí</a></p>
                    <p class="text-muted">Morgan Housel</p>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <p class="item-price">14,31€</p>
                    <button class="btn btn-outline-secondary">
                        <img src="/images/cart-icon.png" alt="Košík">
                    </button>
                </div>
            </span>

            <span id="grid-item" class="d-flex flex-column border">
                <img src="https://mrtns.sk/tovar/_l/151/l151454.jpg?v=17433080002" alt="Obálka knihy" class="img-fluid">

                <div class="d-flex flex-column text-left">
                    <p id="item-title"><a href="/html/item.html">Najbohatší muž v Babylone</a></p>
                    <p class="text-muted">George S. Clason</p>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <p class="item-price">11,50€</p>
                    <button class="btn btn-outline-secondary">
                        <img src="/images/cart-icon.png" alt="Košík">
                    </button>
                </div>
            </span>

            <span id="grid-item" class="d-flex flex-column border">
                <img src="https://mrtns.sk/tovar/_l/2646/l2646555.jpg?v=17433079782" alt="Obálka knihy" class="img-fluid">

                <div class="d-flex flex-column text-left">
                    <p id="item-title"><a href="/html/item.html">F1: Prísne tajné</a></p>
                    <p class="text-muted">Damon Hill Giles Richards</p>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <p class="item-price">14,25€</p>
                    <button class="btn btn-outline-secondary">
                        <img src="/images/cart-icon.png" alt="Košík">
                    </button>
                </div>
            </span>
        </section> -->

            <!-- <section id="pagination" class="mt-4 d-flex justify-content-center">
                <button class="btn btn-outline-secondary me-2" aria-label="Previous page">❮</button>
                    <span id="page"><a href="#">1</a></span>
                    <span id="page"><a href="#">2</a></span>
                    <span id="page"><a href="#">3</a></span>
                    <span id="page"><a href="#">4</a></span>
                <button class="btn btn-outline-secondary ms-2" aria-label="Next page">❯</button>
            </section> -->
        {{$book->onEachSide(1)->links()}}

    </article>
@endsection
