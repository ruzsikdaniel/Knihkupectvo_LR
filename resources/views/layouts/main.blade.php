<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Essential for responsiveness -->
    <title>@yield('title', 'Kníhkupectvo LR')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpYIyfPnH+Kj+8abtTE1Pi6jizoUq" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}"> -->

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
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
