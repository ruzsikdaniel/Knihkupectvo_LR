@extends('layouts.main')

@section('title', 'Registrácia')

@section('content')
<article>
    <section id="register-screen" class="d-flex flex-column">
        <h1 id="register-title">
            Registrácia
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

        <form method="POST" action="{{ route('register') }}">
        @csrf
            <div id="form-group" class="d-flex align-items-center">
                <label for="name" :value="__('Name')">
                    Prihlasovacie meno
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="name" name="name" :value="old('name')" required autofocus autocomplete="name">
                </div>
            </div>

            <div id="form-group" class="d-flex align-items-center">
                <label for="email" :value="__('Email')">
                    Email
                </label>
                <div class="col-md-8">
                    <input type="email" class="form-control" id="email" name="email" :value="old('email')" required autofocus autocomplete="email">
                </div>
            </div>

            <div id="form-group" class="d-flex align-items-center">
                <label for="password" :value="__('Password')">
                    Heslo
                </label>
                <div class="col-md-8 d-flex">
                    <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
                </div>
            </div>

            <div id="form-group" class="d-flex align-items-center">
                <label for="password_confirmation" :value="__('Confirm Password')">
                    Opakujte heslo
                </label>
                <div class="col-md-8 d-flex">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <div id="btn-register" class="text-center">
                <button type="submit">
                    {{ __('Zaregistrovať sa!') }}
                </button>
            </div>
        </form>
    </section>
</article>
@endsection
