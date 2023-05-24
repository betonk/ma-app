<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ $title }}</title> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Scripts -->
    @livewireStyles
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css',
    // 'public/assets/plugins/fontawesome/js/all.min.js', 'public/assets/css/portal.css', 'public/assets/plugins/popper.min.js', 'public/assets/plugins/bootstrap/js/bootstrap.min.js', 'public/assets/plugins/chart.js/chart.min.js', 'public/assets/js/index-charts.js', 'public/assets/js/app.js'
    ])

    @livewireScripts
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @guest
                @if (Route::has('login'))
                <a class="navbar-brand" href="{{ url('/') }}">
                    Marahobina
                </a>
                @endif
                @else
                <a class="navbar-brand" href="{{ url('/member/home') }}">
                    Marahobina
                </a>
                @endguest
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}" class=""><button class="btn btn-primary text-white">Login</button></a>
                        </li>
                        @endif
                        {{-- @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif --}}
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                {{-- <a class="dropdown-item" href="{{ Route('account.member') }}">
                                {{ __('Account') }}
                                </a> --}}
                                {{-- <a class="dropdown-item" href="{{ Route('transaction.member') }}">
                                {{ __('Transaction') }}
                                </a> --}}
                                <a class="dropdown-item" href="{{ Route('profile') }}">
                                    {{ __('Profile') }}
                                </a>
                                @if (Auth::check() && Auth::user()->role == "user")
                                <a class="dropdown-item" href="{{ route('product.cart') }}">
                                    {{ __('Cart') }}
                                </a>
                                @endif
                                <hr class="dropdown-divider">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @livewireScripts
</body>

</html>