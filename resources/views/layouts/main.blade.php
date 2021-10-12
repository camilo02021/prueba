<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
       Compradonia | @yield('title','')
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="icon" href="{{ asset('aliados/img/favicon.png') }}" />

    <link rel="stylesheet" href="{{asset('dist/css/foundation.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/css/app.css')}}"/>
    
</head>
<body>
<div  id="app">

<header>
    <div class="top-nav container">
      <div class="top-nav-left">
          <div class="logo"><img src="{{ asset('aliados/img/logo.png') }}" width="200px" alt="logo" /></div>
      </div>
      <div class="top-nav-right">
          @if (! (request()->is('checkout') || request()->is('guestCheckout')))
          @include('partials.menus.main-right')
          @endif
      </div>
    </div> <!-- end top-nav -->
</header>
    <div>
        @yield('content')
    </div>
</div>


<footer class="footer">
    <div class="footer-content container">
        <img src="{{ asset('aliados/img/logo.png') }}" width="100px" alt="logo" />
  
        @include('partials.menus.footer')
        
        
    </div> <!-- end footer-content -->

    <div class="footer-compradonia">
        <strong> <div class="made-with">Compradonia <i class="fa fa-copyright"></i> </div> </strong> 
    </div> <!-- end footer-content -->
</footer>

<script src="{{asset('dist/js/vendor/jquery.js')}}"></script>
<script src="{{asset('dist/js/app.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('dist/js/vendor/foundation.js')}}"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>
