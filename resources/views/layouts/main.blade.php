<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ __('Infinite') }}</title>
  {{-- <link href="https://cdn.lineicons.com/1.0.1/LineIcons.min.css" rel="stylesheet"> --}}
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"> --}}
  <!-- Fonts -->
  {{-- <link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet"> --}}
  {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
  {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
  {{-- <link href="https://fonts.googleapis.com/css?family=Beth+Ellen&display=swap" rel="stylesheet"> --}}
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"> --}}
  <link rel="icon" href="/img/infinity.svg">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="/css/custom.css">
</head>

<body>
  {{-- <div class="loading">
    <img src="/img/infinity.svg" alt="loading" width="150">
  </div> --}}
  <div id="app" style="min-height:100vh">
    <nav id="navbar" class="navbar navbar-expand-md navbar-dark bg-dark shadow">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}" style="color:dimgrey">
          <img src="/img/infinity.svg" width="30">{{ __(' | Infinity') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <i class="lni-angle-double-down"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
          </ul>
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
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
            <li class="nav-item">
              <a class="nav-link" href="{{ route('blog') }}">{{ __('Home') }}</a>
            </li>
            @if(Auth::user()->isAdmin())
            <li class="nav-item">
              <a class="nav-link" href="{{ route('dashboard') }}">
                {{ __('Dashboard') }}
              </a>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="/author/{{Auth::user()->userName}}">{{ Auth::user()->firstName() }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-0" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="ml-1 fas fa-sign-out-alt"></i>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
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
  {{-- <div class="change-color">
    <img src="/img/moon.svg" width="40">
  </div> --}}
  @include('layouts.footer')
  <!-- Scripts -->
  <script src="/js/jquery-3.3.1.min.js"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="/js/script.js"></script>
</body>

</html>