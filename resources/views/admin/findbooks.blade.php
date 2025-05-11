@extends('layouts.main')

@section('title', 'Vyhľadanie')

@section('content')

    <article id="category">
        <section id="category-grid">
            @foreach($book as $item)
                <li class="book-item">
                    <span class="d-flex flex-column border p-2">
                        <a href="{{ route('admin.book', ['id' => $item->id]) }}" class="text-decoration-none">
                            <x-book-image :book="$item" class="img-thumbnail" alt="Obrázok knihy {{ $item->name }}" />
                        </a>

                        <div class="d-flex flex-column text-start mb-2">
                            <p id="item-title" class="mb-1 fw-bold">
                                <a href="{{ route('admin.book', ['id' => $item->id]) }}" class="text-decoration-none">
                                    {{ $item->title }}
                                </a>
                            </p>
                            <p class="text-muted mb-0">
                                {{ $item->author }}
                            </p>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <p id="item-price-{{ $item->id }}" class="item-price" class="mb-0">
                                {{ number_format($item->price, 2, ',', ' ') }}€
                            </p>
                            <form method="POST" action="{{ route('admin.book.delete', $item->id) }}" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn p-0 border-0 bg-transparent book-delete" data-title="{{ $item->title }}">
                                    <img src="{{ asset('images/delete.png') }}" alt="Vymazať" style="width: 20px; height: auto;">
                                </button>
                            </form>
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
