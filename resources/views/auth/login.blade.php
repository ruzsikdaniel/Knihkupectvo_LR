@extends('layouts.main')

@section('title', 'Prihlásenie')

@section('content')

<article>
    <section id="login-screen" class="d-flex flex-column">
        <h1 id="login-title">
            Prihlásenie
        </h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
        @csrf
            <div class="d-flex flex-column flex-lg-row align-items-center mb-3">
                <label for="email" class="col-lg-4 col-form-label">
                    Email
                </label>
                <div>
                    <input type="text" id="email" class="form-control" name="email"
                           value="{{ old('email') }}" required autocomplete="username" />
                </div>
            </div>

            <div class="d-flex flex-column flex-lg-row align-items-center mb-3">
                <label for="password" class="col-lg-4 col-form-label">
                    Heslo
                </label>
                <div>
                    <input type="password" id="password" class="form-control" name="password"
                           required autocomplete="current-password" />
                </div>
            </div>

            <div id="login-info" class="text-center">
                <p>Nemáte konto?
                    <a href="{{ route('register') }}">
                        Zaregistrujte sa
                    </a>
                </p>
            </div>

            <div id="btn-login" class="text-center">
                <button type="submit">
                    {{ __('Prihlásiť sa') }}
                </button>
            </div>
        </form>
    </section>

</article>
@endsection
