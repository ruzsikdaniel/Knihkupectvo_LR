<header>
    <article class="d-none d-lg-flex align-items-center">
        <div class="col-lg-4">
            <h1 id="site-title">
                <a href="{{ url('/') }}">
                    Kníhkupectvo LR
                </a>
            </h1>
        </div>
        <div class="col-lg-4">
            <div id="search-panel" class="d-flex justify-content-center align-items-center gap-3">
                <form action="{{url('book_search')}}" method="get" class="d-flex gap-2">
                    <input name="search" id="search-input" type="text" class="form-control" placeholder="Hľadať...">
                    <button class="btn btn-outline-secondary">
                        <img src="{{ asset('images/search-icon.png') }}" alt="Hľadať">
                    </button>
                </form>
            </div>
        </div>
        <div class="col-lg-4 d-flex justify-content-center align-items-center gap-3">
        @if (Route::has('login'))
        <nav class="flex items-center justify-end gap-4">
                    @auth
                    <form method="POST" action="{{ route('logout') }}">
                     @csrf
                        <button>
                        Log out
                        </button>
                    </form>

                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif


<!--standart header-->
            <!-- <a href="{{ url('/login') }}" class="btn btn-link">Prihláste sa</a>
            <div id="cart-panel">
                <button id="cart-button" class="btn btn-link">
                    <a href="{{ url('/shoppingcart') }}">
                        <img src=" {{ asset('images/cart-icon.png') }}" alt="Košík">
                    </a>
                </button>
                <button id="logout-button" class="btn btn-link">
                    <img src="{{ asset('images/logout-icon.png') }}" alt="Odhlásenie">
                </button>
            </div> -->
        </div>
    </article>

    <article class="d-lg-none">
        <div class="col-12">
            <h1 id="site-title"><a href="{{ url('/homepage') }}">Kníhkupectvo LR</a></h1>
        </div>
        <div class="col-12">
            <div id="search-panel" class="d-flex justify-content-center align-items-center gap-3">
                <form action="{{url('book_search')}}" method="get" class="d-flex gap-2">
                    <input name="search" id="search-input" type="text" class="form-control" placeholder="Hľadať...">
                    <button class="btn btn-outline-secondary">
                        <img src="{{ asset('images/search-icon.png') }}" alt="Hľadať">
                    </button>
                </form>
            </div>
        </div>
        <div class="col-12 text-center">
        @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                    <form method="POST" action="{{ route('logout') }}">
                     @csrf
                        <button>
                        Log out
                        </button>
                    </form>

                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif






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
