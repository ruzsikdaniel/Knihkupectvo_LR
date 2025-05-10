<header>
    <article class="d-none d-lg-flex align-items-center">
        <div class="col-lg-4">
            <h1 id="site-title">
                <a href="{{ route('home') }}">
                    Kníhkupectvo LR
                </a>
            </h1>
        </div>
        <div class="col-lg-4">
            <div id="search-panel" class="gap-3 d-flex justify-content-center">
                <form action="{{url('book_search')}}" method="get" class="d-flex justify-content-between align-items-center w-100">
                    <input name="search" type="text" class="form-control flex-grow-1 me-2 search-input" placeholder="Hľadať...">
                    <button class="btn flex-shrink-0">
                        <img src="{{ asset('images/search-icon.png') }}" alt="Hľadať">
                    </button>
                </form>
            </div>
        </div>

        <div class="col-lg-4 d-flex justify-content-center align-items-center gap-3">
            @if (Route::has('login'))
            <nav class="d-flex justify-content-between align-items-center">
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button id="logout-button" class="btn btn-link">
                        <img src="{{ asset('images/logout-icon.png') }}" alt="Odhlásenie">
                    </button>
                </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-link">
                        Prihláste sa
                    </a>
                @endauth
                <div id="cart-panel">
                    <button class="btn btn-link cart-button">
                        <a href="{{ route('cart') }}" class="cart-link">
                            <img src="{{ asset('images/cart-icon.png') }}" alt="Košík">
                        </a>
                    </button>
                </div>
            </nav>
           @endif
        </div>
    </article>

    <article class="d-lg-none">
        <div class="col-12">
            <h1 id="site-title">
                <a href="{{ route('home') }}">
                    Kníhkupectvo LR
                </a>
            </h1>
        </div>
        <div class="col-12">
            <div id="search-panel" class="gap-3 d-flex justify-content-center">
                <form action="{{ url('book_search') }}" method="get" class="d-flex justify-content-between align-items-center">
                    <input name="search" type="text" class="form-control flex-grow-1 me-2 search-input" placeholder="Hľadať...">
                    <button class="btn flex-shrink-0">
                        <img src="{{ asset('images/search-icon.png') }}" alt="Hľadať">
                    </button>
                </form>
            </div>
        </div>
        <div class="col-12 text-center">
            @if (Route::has('login'))
                <nav class="d-flex justify-content-center align-items-center">
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                                <button id="logout-button" class="btn btn-link">
                                    <img src="{{ asset('images/logout-icon.png') }}" alt="Odhlásenie">
                                </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-link">
                            Prihláste sa
                        </a>
                    @endauth
                    <div id="cart-panel">
                        <a href="{{ route('cart') }}" class="cart-link">
                            <img src="{{ asset('images/cart-icon.png') }}" alt="Košík">
                        </a>
                    </div>
                </nav>
            @endif
        </div>
    </article>
</header>
