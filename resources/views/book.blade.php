@extends('layouts.main')

@section('title', $book->name)

@section('content')

<div class="row d-none d-md-flex">
    <article class="col-md-6 d-flex flex-column align-items-center">
        <section id="item-gallery" class="d-flex flex-column align-items-center">
            <img src="{{ $book->pictures->first()->url ?? asset('images/book_128.png') }}" alt="Obalka knihy" class="img-fluid" id="item-image" />
            <div id="thumbnail-gallery">
                @forelse($book->pictures as $picture)
                    <img src="{{ $picture->url }}" alt="{{ $picture->title }}" class="img-thumbnail" style="max-width: 100px;">
                @empty
                    <img src="{{ asset('images/book_128.png') }}" alt="Placeholder" class="img-thumbnail" style="max-width: 100px;">
                @endforelse
            </div>
        </section>
        <section id="item-details">
            <h2>Základné údaje</h2>
            <dl>
                <dt>Žáner:</dt>
                <dd id="book-genre">{{$book->genre}}</a></dd>
                <dt>Jazyk:</dt>
                <dd id="book-lang">{{$book->language}}</dd>
                <dt>Počet strán:</dt>
                <dd id="book-pages"><a>{{$book->pages}}</a></dd>
                <dt>Vydavateľstvo:</dt>
                <dd id="book-publisher">{{$book->publisher}}</dd>
                <dt>Rok vydania:</dt>
                <dd id="book-year">{{$book->year}}</dd>
            </dl>
        </section>
    </article>

    <article class="col-md-6 d-flex flex-column align-items-center">
        ;<section id="item-page">
            <div id="item-title" class="d-flex flex-column justify-content-start">
                <h1 id="book-title">{{$book->name}}</h1>
                <h3 id="book-author">{{$book->author}}</h3>
            </div>
            <div id="item-abstract">
                <h2>Abstrakt</h2>
                <p>
                    {!!Str::limit($book->detail, 300)!!}
                </p>
            </div>
            <div id="item-status">
                <div id="item-info" class="d-flex flex-row justify-content-between align-items-center">
                    <div id="item-stock">
                        @if($book->state === 'je na sklade')
                            <p class="in-stock">{{$book->state}}</p>
                        @else
                            <p class="out-of-stock">{{$book->state}}</p>
                        @endif
                    </div>
                    <div class="item-price">
                        <h3 id="item-price-{{ $book->id }}" class="item-price"class="mb-0">
                            {{ number_format($book->price, 2, ',', ' ') }}€
                        </h3>
                    </div>
                </div>
                <div id="item-to-cart" class="d-flex flex-row justify-content-end">
                    <button class="add-to-cart" data-book-id="{{ $book->id }}">
                        Pridať do košíka
                    </button>
                </div>
            </div>

        </section>
        <section id="item-desc">
            <h2>Popis</h2>
            <p>{{$book->detail}}
            </p>
        </section>
    </article>
</div>


    <div class="row d-flex d-md-none">
        <article>
            <section id="item-gallery" class="d-flex flex-column align-items-center">
                <img src="{{ $book->pictures->first()->url ?? asset('images/book_128.png') }}" alt="Obalka knihy" class="img-fluid" id="item-image" />
                <div id="thumbnail-gallery">
                    @forelse($book->pictures as $picture)
                        <img src="{{ $picture->url }}" alt="{{ $picture->title }}" class="img-thumbnail" style="max-width: 100px;">
                    @empty
                        <img src="{{ asset('images/book_128.png') }}" alt="Placeholder" class="img-thumbnail" style="max-width: 100px;">
                    @endforelse
                </div>
            </section>

            <section id="item-page">
                <span id="item-title" class="d-flex flex-column justify-content-start">
                    <h1 id="book-title">{{$book->name}}</h1>
                    <h3 id="book-author">{{$book->author}}</h3>
                </span>
                <span id="item-abstract">
                    <h2>Abstrakt</h2>
                    <p>
                        {!!Str::limit($book->detail, 300)!!}
                    </p>
                </span>
                <div id="item-status">
                    <div id="item-info" class="d-flex flex-row justify-content-between align-items-center">
                        <div id="item-stock">
                            <p class="in-stock">{{$book->state}}</p>
                        </div>
                        <div class="item-price">
                            <h3 class="item-price">
                                {{number_format($book->price, 2, ',', ' ')}}€
                            </h3>
                        </div>
                    </div>
                    <div id="item-to-cart" class="d-flex flex-row justify-content-end">
                        <button class="add-to-cart" data-book-id="{{ $book->id }}">
                            Pridať do košíka
                        </button>
                    </div>
                </div>
            </section>

            <section id="item-details">
            <h2>Základné údaje</h2>
                <dl>
                    <dt>Žáner:</dt>
                    <dd id="book-genre">{{$book->genre}}</a></dd>
                    <dt>Jazyk:</dt>
                    <dd id="book-lang">{{$book->language}}</dd>
                    <dt>Počet strán:</dt>
                    <dd id="book-pages"><a>{{$book->pages}}</a></dd>
                    <dt>Vydavateľstvo:</dt>
                    <dd id="book-publisher">{{$book->publisher}}</dd>
                    <dt>Rok vydania:</dt>
                    <dd id="book-year">{{$book->year}}</dd>
                </dl>
            </section>

            <section id="item-desc">
                <h2>Popis</h2>
                <p>
                    {{$book->detail}}
                </p>
            </section>
        </article>
    </div>

@endsection
