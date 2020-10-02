<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta name="viewport" content="width=device-width" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/8a24754f95.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- DATE PICKER -->
</head>
<body class="with-custom-webkit-scrollbars with-custom-css-scrollbars" data-dm-shortcut-enabled="true" data-sidebar-shortcut-enabled="true" data-set-preferred-mode-onload="true">
  <!-- Modals go here -->
  <!-- Reference: https://www.gethalfmoon.com/docs/modal -->

  <!-- Page wrapper start -->
  <div class="page-wrapper with-navbar">

    <!-- Sticky alerts (toasts), empty container -->
    <!-- Reference: https://www.gethalfmoon.com/docs/sticky-alerts-toasts -->
    <div class="sticky-alerts"></div>

    <!-- Navbar start -->
    <nav class="navbar">
      <!-- Reference: https://www.gethalfmoon.com/docs/navbar -->
        <a href="#" class="navbar-brand">
            <img src="https://i.ibb.co/NmqbYc8/the-domain.png" alt="The Domain">
        </a>
        <span class="navbar-text ml-5"> <!-- ml-5 = margin-left: 0.5rem (5px) -->
            <span class="badge text-monospace">v1.0</span> <!-- text-monospace = font-family shifted to monospace -->
        </span>
        <ul class="navbar-nav d-none d-md-flex"> 
            <li class="nav-item">
                <a href="{{ route('documentation') }}" class="nav-link">Docs</a>
            </li>
            <li class="nav-item dropdown with-arrow">
                <a class="nav-link" data-toggle="dropdown" id="sorting-dropdown-toggle">
                    Sort By 
                    <i class="fa fa-angle-down ml-5" aria-hidden="true"></i> <!-- ml-5= margin-left: 0.5rem (5px) -->
                </a>
                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="sorting-dropdown-toggle">
                    <a href="{{ route('book.index') }}" class="dropdown-item">{{ __('Top Rated') }}</a>
                    <a href="{{ route('book.hot') }}" class="dropdown-item">{{ __('Trending') }}</a>
                    <a href="{{ route('book.recommended') }}" class="dropdown-item">{{ __('Recommended') }}</a>
                </div>
            </li>
            @auth
                @if (Auth::user()->role == "Curator" AND Auth::user()->status == "Approved")
                    <li class="nav-item">
                        <a href="{{ route('book.create') }}" class="nav-link">Add Book</a>
                    </li>
                    @elseif (Auth::user()->role == "Curator")
                    <span class="navbar-text">
                        Waiting for approval 
                    </span>
                @endif
            @endauth
        </ul>
        <ul class="navbar-nav ml-auto"> <!-- ml-auto = margin-left: auto -->
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
                <li class="nav-item dropdown with-arrow">
                <a class="nav-link" data-toggle="dropdown" id="user-dropdown-toggle">
                    {{ Auth::user()->name }}
                    <i class="fa fa-angle-down ml-5" aria-hidden="true"></i> <!-- ml-5= margin-left: 0.5rem (5px) -->
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="user-dropdown-toggle">
                    @if (Auth::user()->role == "Administrator")
                        <a class="dropdown-item" href="{{ route('admin.list_curators') }}">Show Curators</a>
                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
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
    </nav>
    <!-- Navbar end -->

    <!-- Content wrapper start -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- Content wrapper end -->

  </div>
  <!-- Page wrapper end -->
</body>
</html>
