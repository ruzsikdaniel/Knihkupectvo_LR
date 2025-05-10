@extends('layouts.main')

@section('title', 'Pridať knihu')

@section('content')
    <article class="d-flex flex-column flex-lg-row">
        @csrf
        @method('PUT')

        <div class="w-100 w-md-50">
            <section id="item-gallery" class="d-flex flex-column align-items-center mb-4">
                <label for="image-upload" class="btn btn-secondary border-0">Pridať obrázok</label>
                <input id="image-upload" name="images[]" type="file" accept="image/jpeg, image/png" multiple style="display: none;">

                <div id="thumbnail-gallery" class="d-flex flex-wrap justify-content-center mt-3">
                    @forelse($book->pictures as $picture)
                        <img src="{{ $picture->path ? asset('storage/' . $picture->path) : $picture->url }}" alt="{{ $picture->title }}"
                             class="img-thumbnail m-1" style="max-width: 100px;">
                    @empty
                        <img src="{{ asset('images/book_128.png') }}" alt="Placeholder" class="img-thumbnail m-1" style="max-width: 100px;">
                    @endforelse
                </div>
            </section>
        </div>

        <div class="w-100 w-md-50">
            <form action="{{ route('admin.book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                <section id="item-page">
                    <h1>Úprava knihy</h1>

                    <label for="book-title">Názov knihy:</label>
                    <input type="text" class="form-control" name="book-title" value="{{ old('book-title', $book->name) }}" required />

                    <label for="book-author">Autor knihy:</label>
                    <input type="text" class="form-control" name="book-author" value="{{ old('book-author', $book->author) }}" required />

                    <label for="book-abstract">Abstrakt:</label>
                    <textarea name="book-abstract" rows="5" class="form-control" required>{{ old('book-abstract', $book->detail) }}</textarea>

                    <label for="book-genre">Žáner:</label>
                    <input type="text" class="form-control" name="book-genre" value="{{ old('book-genre', $book->genre) }}" required />

                    <label for="book-lang">Jazyk:</label>
                    <input type="text" class="form-control" name="book-lang" value="{{ old('book-lang', $book->language) }}" required />

                    <label for="book-pages">Počet strán:</label>
                    <input type="number" class="form-control" name="book-pages" value="{{ old('book-pages', $book->pages) }}" required />

                    <label for="book-publisher">Vydavateľstvo:</label>
                    <input type="text" class="form-control" name="book-publisher" value="{{ old('book-publisher', $book->publisher) }}" required />

                    <label for="book-year">Rok vydania:</label>
                    <input type="number" class="form-control" name="book-year" value="{{ old('book-year', $book->year) }}" required />

                    <label for="book-price">Cena (€):</label>
                    <input type="number" class="form-control" name="book-price" step="0.01"
                           value="{{ old('book-price', $book->price) }}" required />

                    <label>Dostupnosť:</label>
                    <div class="mb-3">
                        <input type="radio" id="in-stock" name="book-stock" value="1"
                            {{ old('book-stock', $book->stock) == 1 ? 'checked' : '' }}>
                        <label for="in-stock">Je na sklade</label>

                        <input type="radio" id="out-of-stock" name="book-stock" value="0"
                            {{ old('book-stock', $book->stock) == 0 ? 'checked' : '' }}>
                        <label for="out-of-stock">Nie je na sklade</label>
                    </div>
                </section>

                <section id="submit" class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary">Uložiť zmeny</button>

                    <form action="{{ route('admin.book.delete', $book->id) }}" method="POST" class="mt-2" onsubmit="return confirm('Naozaj chceš zmazať túto knihu?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Vymazať knihu</button>
                    </form>
                </section>
            </form>
        </div>
    </article>
@endsection
