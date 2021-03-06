<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ __('Infinite | Dashboard') }}</title>
  <link href="https://cdn.lineicons.com/1.0.1/LineIcons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy|Righteous&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link rel="icon" href="/img/infinity.svg">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="/css/custom.css">
</head>

<body style="background: linear-gradient(49deg, rgb(27, 36, 47) 0%, rgb(30, 37, 45) 100%);">
  {{-- navbar --}}
  @include('layouts.backend.navbar')
  <div class="container-fluid">
    <div class="row">
      {{-- sidebar --}}
      <div class="col-lg-1">
        <div class="side">
          <ul class="navbar-nav sidebar mt-5">
            <!-- Dashboard -->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
              <a class="nav-link" href="{{route('dashboard')}}">
                <i class="lni-dashboard"></i>
              </a>
            </li>
            <!-- Users -->
            <li class="nav-item dropdown" data-toggle="tooltip" data-placement="right" title="Users">
              <a class="nav-link" href="/dashboard/users">
                <i class="lni-users"></i>
              </a>
            </li>
            <!-- posts -->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Posts">
              <a class="nav-link" href="/dashboard/posts">
                <i class="lni-write"></i>
              </a>
            </li>
            <!-- categories -->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tags">
              <a class="nav-link" href="/dashboard/tags">
                <i class="lni-slack"></i>
              </a>
            </li>
          </ul>
          <div class="toggle"></div>
        </div>
      </div>
      {{-- main --}}
      <div class="col-lg-10">
        <main class="p-4">
          @yield('content')
        </main>
      </div>
    </div>
  </div>
  <!-- Scripts -->
  <script src="/js/jquery-3.3.1.min.js"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>