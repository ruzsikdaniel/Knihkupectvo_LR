<header>
    <article class="d-none d-lg-flex align-items-center">
        <div class="col-lg-4">
            <h1 id="site-title"><a href="{{ url('../homepage') }}">Kníhkupectvo LR</a></h1>
        </div>
        <div class="col-lg-4">
            <div id="search-panel" class="d-flex justify-content-center align-items-center gap-3">
                <input id="search-input" type="text" class="form-control" placeholder="Hľadať...">
                <button class="btn btn-outline-secondary">
                    <img src="{{ asset('images/search-icon.png') }}" alt="Hľadať">
                </button>
            </div>
        </div>
        <div class="col-lg-4 d-flex justify-content-center align-items-center gap-3">
            <a href="{{ url('/login') }}" class="btn btn-link">Prihláste sa</a>
            <div id="cart-panel">
                <button id="cart-button" class="btn btn-link">
                    <a href="{{ url('/shoppingcart') }}">
                        <img src=" {{ asset('images/cart-icon.png') }}" alt="Košík">
                    </a>
                </button>
                <button id="logout-button" class="btn btn-link">
                    <img src="{{ asset('images/logout-icon.png') }}" alt="Odhlásenie">
                </button>
            </div>
        </div>
    </article>

    <article class="d-lg-none">
        <div class="col-12">
            <h1 id="site-title"><a href="{{ url('/homepage') }}">Kníhkupectvo LR</a></h1>
        </div>
        <div class="col-12">
            <div id="search-panel" class="d-flex justify-content-center align-items-center gap-3">
                <input id="search-input" type="text" class="form-control" placeholder="Hľadať...">
                <button class="btn btn-outline-secondary">
                    <img src="{{ asset('images/search-icon.png') }}" alt="Hľadať">
                </button>
            </div>
        </div>
        <div class="col-12 text-center">
            <a href="{{ url('/login') }}" class="btn btn-link" id="username">Prihláste sa</a>
            <button id="cart-button" class="btn btn-link">
                <a href="{{ url('/shoppingcart') }}"><img src="{{ asset('images/cart-icon.png') }}" alt="Košík"></a>
            </button>
            <button id="logout-button" class="btn btn-link">
                <img src="{{asset('images/logout-icon.png')}}" alt="Odhlásenie">
            </button>
        </div>
    </article>
</header>
