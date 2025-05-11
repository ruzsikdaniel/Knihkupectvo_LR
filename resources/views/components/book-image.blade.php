@php
    $picture = $book->pictures->first();
    $src = $picture
            ? ($picture->path ? asset($picture->path) : $picture->url)
            : asset('images/book_128.png');
@endphp
<img src="{{ $src }}" class="{{ $class }}" alt="{{ $alt }}">
