<!DOCTYPE html>
<html>

<head>
  {{-- <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title','Dashboard')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/backend/plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="/backend/css/AdminLTE.css">
  <link rel="stylesheet" href="/backend/css/skins/_all-skins.min.css"> --}}
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ __('Infinite | Dashboard') }}</title>
  <link href="https://cdn.lineicons.com/1.0.1/LineIcons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="/css/custom.css">
</head>

<body id='app'>
  {{-- navbar --}}
  @include('layouts.backend.navbar')
  <main class="py-4">
    @yield('content')
  </main>
  {{-- <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <!-- Content -->
        @yield('content')
      </div>
    </div>
  </div> --}}

  <!-- Scripts -->
  <script src="/backend/js/jquery-2.2.3.min.js"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>