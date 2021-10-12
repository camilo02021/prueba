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
    <link rel="stylesheet" href="{{asset('dist/css/foundation.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/css/app.css')}}"/>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">


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
            
                @guest
                <button class="navbutton navbutton3"> <a href="{{ route('register') }}">Registrarse</a></button>
                <button class="navbutton navbutton3"> <a href="{{ route('login') }}">Entrar</a></button>
                @else
                <button class="navbutton navbutton1"><a href="{{ route('orders.index') }}">Mi Cuenta</a></button>
                <button class="navbutton navbutton1"><a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Salir </a> </button>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                @endguest
        
        @endif
        </div>
    </div> <!-- end top-nav -->
</header>
    <div>
        @yield('content')
    </div>


    <div>
        <div class="reveal" id="checkoutDetailModal" data-reveal>
            <cart-detail :cart="cart" :carttotal="cartTotal" :totalitems="totalItems"></cart-detail>

            <button class="close-button" data-close aria-label="Close modal" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
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


<script>
    $(document).foundation();
</script>

</body>
</html>
