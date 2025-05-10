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
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
        @csrf
            <div class="d-none d-lg-flex flex-column">
                <div id="form-group" class="d-flex flex-row justify-content-center align-items-center">
                    <label for="email" class="col-md-4 col-form-label" :value="__('Email')">
                        Email
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="email" class="form-control"
                               name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
                    </div>
                </div>

                <div id="form-group" class="d-flex flex-row justify-content-center align-items-center">
                    <label for="password" class="col-md-4 col-form-label" :value="__('Password')">
                        Heslo
                    </label>
                    <div id="password-wrapper" class="col-md-8 d-flex">
                        <input type="password" id="password" class="form-control"
                               name="password" required autocomplete="current-password" />
                    </div>
                </div>
            </div>

            <div class="d-flex d-lg-none flex-column">
                <div id="form-group" class="d-flex flex-column justify-content-center align-items-center mb-3">
                    <label for="email" class="mb-2" :value="__('Email')">
                        Email
                    </label>
                    <div>
                        <input type="text" id="email" class="form-control"
                               name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
                    </div>
                </div>

                <div id="form-group" class="d-flex flex-column justify-content-center align-items-center">
                    <label for="password" class="mb-2" :value="__('Password')">
                        Heslo
                    </label>
                    <div id="password-wrapper">
                        <input type="password" id="password" class="form-control"
                               name="password" required autocomplete="current-password" />
                    </div>
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
