@extends('layouts.main')

@section('title', 'Hlavná stránka')

@section('content')

<article>
        <section id="login-screen" class="d-flex flex-column">
            <h1 id="login-title">Prihlásenie</h1>
    
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
            @csrf
                <div id="form-group" class="d-none d-lg-flex flex-row justify-content-center align-items-center">
                    <label for="email" class="col-md-4 col-form-label" :value="__('Email')">Prihlasovacy email</label>
                    <div class="col-md-8">
                        <input type="text" id="email" class="form-control" name="email" :value="old('email')" required 
                        autofocus  autocomplete="username"/>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- <div id="form-group" class="d-lg-none flex-row justify-content-center align-items-center">
                <label for="email" class="col-md-4 col-form-label" :value="__('Email')">Prihlasovacy email</label>
                    <div class="col-md-8">
                        <input type="text" id="email" class="form-control" name="email" :value="old('email')" required 
                        autofocus  autocomplete="username"/>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div> -->

                <div id="form-group" class="d-none d-lg-flex flex-row justify-content-center align-items-center">
                    <label for="password" class="col-md-4 col-form-label" :value="__('Password')">Heslo</label>
                    <div id="password-wrapper" class="col-md-8 d-flex">
                        <input type="password" id="password" class="form-control" name="password" required 
                        autofocus autocomplete="current-password"/>
                        <button type="button" id="uncover-pass" class="btn btn-outline-secondary ms-2">
                            <img src="/images/eye-icon.png" alt="Zobraziť heslo">
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- <div id="form-group" class="d-lg-none flex-row justify-content-center align-items-center">
                    <label for="password"  :value="__('Password')">Heslo</label>
                    <div id="password-wrapper">
                        <input type="password" id="password" class="form-control" name="password" required 
                        autofocus autocomplete="current-password"/>
                        <button type="button" id="uncover-pass" class="btn btn-outline-secondary ms-2">
                            <img src="/images/eye-icon.png" alt="Zobraziť heslo">
                        </button>
                    </div>
                </div> -->
    
                <!-- <p id="login-error" class="error-message" style="color: red; display: none;">
                    Používateľské meno alebo heslo sú nesprávne!
                </p> -->
    
                <div id="login-info" class="text-center">
                    <p>Nemáte konto? <a href="{{ route('register') }}">Zaregistrujte sa</a></p>
                </div>
    
                <div id="btn-login" class="text-center">
                    <button type="submit" >{{ __('Prihlásiť sa') }}
                    </button>
                </div>
                
            </form>
        </section>



    </article>



@endsection


<script>
function togglePasswordVisibility() {
    const passwordField = document.getElementById('password');
    const type = passwordField.type === 'password' ? 'text' : 'password';
    passwordField.type = type;
}
</script>
<!--            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
            -->
