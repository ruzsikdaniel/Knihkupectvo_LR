@extends('layouts.main')

@section('title', 'Nákup - Povinnosť platby')

@section('content')

<article id="payment-screen">
    <section>
        <h1>
            Platba kartou
        </h1>
    </section>

    <section>
        <form method="POST" action="{{ route('checkout.payment.process') }}">
            @csrf
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
            <div class="form-group">
                <label for="card_number">
                    Číslo karty:
                </label>
                <input type="text" id="card_number" name="card_number" required autocomplete="card_number" maxlength="19"/>
            </div>

            <div class="form-group">
                <label for="expiry">
                    Platnosť:
                </label>
                <input type="text" id="expiry" name="expiry" required autocomplete="expiry" maxlength="5"/>
            </div>

            <div class="form-group">
                <label for="cvv">
                    CVC/CVV:
                </label>
                <input type="password" id="cvv" name="cvv" required autocomplete="cvv" maxlength="3"/>
            </div>

            <div class="payment-button">
                <button type="submit" class="btn btn-success">
                    Zaplatiť
                </button>
            </div>
            <div class="payment-button">
                <a href="{{ route('checkout.delivery') }}">
                    Zrušit platbu
                </a>
            </div>
        </form>
    </section>
</article>
@endsection
