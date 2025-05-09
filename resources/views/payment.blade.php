@extends('layouts.main')

@section('title', 'Povinnosť platby')

@section('content')

<article id="payment-screen">
    <section>
        <h1>Platba kartou</h1>
    </section>

    <section>
        <form method="POST">
            <div class="form-group">
                <label for="cardnumber">
                    Číslo karty:
                </label>
                <input type="text" id="cardnumber" name="cardnumber" required autocomplete="cardnumber"/>
                <!-- format .... .... .... .... -->
            </div>

            <div class="form-group">
                <label for="expiry">
                    Platnosť:
                </label>
                <input type="text" id="expiry" name="expiry" required autocomplete="expiry"/>
                <!-- format ../.. -->
            </div>

            <div class="form-group">
                <label for="expiry">
                    CVC/CVV:
                </label>
                <input type="password" id="password" name="password" required autocomplete="cvv"/>
                <!-- format ... -->
            </div>
            <div class="pay-group">
                <button type="submit">
                    Zaplatiť
                </button>
            </div>
            <div class="pay-group">
                <a href="{{ route('delivery') }}">
                    Zrušit platbu
                </a>
            </div>
        </form>
    </section>
</article>
@endsection
