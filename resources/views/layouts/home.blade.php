<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="/images/logo.ico" type="image/ico">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/fonts/lineicons/font-css/LineIcons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/css/flag-icon.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/style.css">

</head>

<body>
    <div id="app">
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
  @include('includes.header')
  @yield('content')
  @include('includes.footer')
</div>
    <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>
    
    <script src="/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/js/vendor/modernizr-3.7.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.easing.min.js"></script>
    <script src="/js/scrolling-nav.js"></script>
    <script src="/js/wow.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="{{ asset('/js/app.js') }}" defer></script>
</body>
</html>


