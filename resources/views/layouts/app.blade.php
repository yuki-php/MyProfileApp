<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyProfileApp') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/utility.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
            <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                    <img class='navbar-logo' src="{{ asset('images/logo.jpg') }}">
                    {{ config('app.name', 'MyProfileApp') }}
                    </a>
                <div class="btn-list-top d-none d-md-block">
                    <a href="https://twitter.com/Engyk6?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-screen-name="false" data-lang="ja" data-show-count="false">Follow @Engyk6</a>
                    <iframe src="http://ghbtns.com/github-btn.html?user=yuki-php&type=follow&count=false" allowtransparency="true" frameborder="0" scrolling="0" width="165" height="20"></iframe>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item bg-info d-none d-md-block contact">
                            <a href="{{ route('contact') }}" class="nav-link ">メールでお問い合わせ</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('create') }}" class='nav-link'>記事を投稿</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                            <li>
                                <div class="d-md-none">
                                 <a href="{{ route('contact') }}" class="nav-link ">お問い合わせ</a>
                                </div>
                            </li>
                            <li>
                                <div class="btn-class d-md-none mt-2">
                                <a href="https://twitter.com/Engyk6?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-screen-name="false" data-lang="ja" data-show-count="false">Follow @Engyk6</a>
                                <iframe src="http://ghbtns.com/github-btn.html?user=yuki-php&type=follow&count=false" allowtransparency="true" frameborder="0" scrolling="0" width="165" height="20"></iframe>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="main">
            @if (session('flash_message'))
                <div class="flash_message bg-success text-center py-3 my-0 mb30">
                    {{ session('flash_message') }}
                </div>
            @endif
            @yield('content')
        </main>
        <footer class='footer p20'>
          <small class='copyright'>Yuki's MyProfile App 2020 copyright</small>
        </footer>
    </div>
</body>
</html>
