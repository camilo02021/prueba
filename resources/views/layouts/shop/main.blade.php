<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Books | Inicio</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet"  href="{{ asset('css/bootstrap.min.css')}}" type="text/css">

    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" type="text/css">

    <!-- Foundation -->
    <link rel="stylesheet" href="{{ asset('dist/css/foundation.css')}}"/>
</head>

<body>

    <div>
        @yield('content')
    </div>

    <!-- Js Plugins -->
    
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('dist/js/vendor/foundation.js')}}"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>