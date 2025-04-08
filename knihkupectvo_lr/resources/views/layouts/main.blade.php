<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Essential for responsiveness -->
    <title>@yield('title', 'Kníhkupectvo LR')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-YSK9u6O3EpekaV53H6dJG0HJ9n68Tmwwy0g76pqYD9JyHkXt0w7CzPomLllvMf1C" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    </head>
<body>
    @include('partials.header')
    <main>
        @yield('content')
    </main>
    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Q2ZrDO+nYRJPRT225AxN4QaTTvKul3L7V5nM/FVbSLpp89n6HWxOLWfNbfKcFe7L" crossorigin="anonymous"></script>
</body>
</html>
