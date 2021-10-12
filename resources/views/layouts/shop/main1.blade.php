<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Puedes realizar tu orden a diferentes tiendas, recive tu pedido en menos de 45 minutos y paga en el momento de la entrega. Una forma fácil, sencilla y eficiente de obtener tus productos sin moverte de donde estes y no vale más.">
        <meta name="keywords" content="domicilios caicedonia, caicedonia, compradonia, caicedonia online, tuguiakey, tu guia key">
        <meta name="author" content="Compradonia">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        
        <title>Compradonia | Domicilios en Caicedonia</title>


        <link rel="icon" href="{{ asset('aliados/img/favicon.png') }}" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('aliados/css/bootstrap.min.css')}}" />
       
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="{{ asset('aliados/css/owl.carousel.min.css')}}" />
        
        
        <!-- font awesome CSS -->
        <link rel="stylesheet" href="{{ asset('aliados/css/magnific-popup.css')}}" />
        <!-- swiper CSS -->
        <link rel="stylesheet" href="{{ asset('aliados/css/slick.css')}}" />
        <!-- style CSS -->
        <link rel="stylesheet" href="{{ asset('aliados/css/style.css') }} " />
        <!-- dist  -->
        <link rel="stylesheet" href="{{asset('dist/css/foundation.css')}}"/>
        
    </head>
    <body>
        @include('layouts.shop.partials.navbar')
    <div>
        @yield('content')
    </div>
    

    <!-- jquery plugins here-->
    <script src="aliados/js/jquery-1.12.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="aliados/js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="aliados/js/jquery.magnific-popup.js"></script>
    <!-- particles js -->
    <script src="aliados/js/owl.carousel.min.js"></script>
    <script src="aliados/js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="aliados/js/custom.js"></script>
 
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('dist/js/vendor/foundation.js')}}"></script>
    <script>
        $(document).foundation();
    </script>
    </body>
</html>