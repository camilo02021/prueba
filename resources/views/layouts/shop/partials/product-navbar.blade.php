 <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src=" http://127.0.0.1:8000/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <a href="{{ route('cart.index') }}"> <i class="fa fa-shopping-cart"></i><span> Cesta </span></a>
            </div>
            <div class="header__top__right__auth">
                @guest
                    <a href="{{ route('login') }}"><i class="fa fa-user"></i> <strong> Iniciar Sesión </strong></a>
                @else
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-nav1').submit();">
                        <strong> Salir </strong>
                    </a>

                    <form id="logout-form-nav1" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
                
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Inicio</a></li>
                <li><a href="{{ route('checkout.index') }}">Order</a></li>
                <li><a href="#">Más</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="#">Cesta</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-phone"></i> 000 00000</li>
                <li><strong>!Order book!</strong></li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-phone"></i> 036 00000</li>
                                <li><strong>!Domicilio gratis!</strong></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__auth">
                                @guest
                                    <a href="{{ route('login') }}"><i class="fa fa-user"></i> <strong> Iniciar Sesión </strong></a>
                                @else
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-nav2').submit();">
                                        <strong> Salir </strong>
                                    </a>

                                    <form id="logout-form-nav2" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src=" http://127.0.0.1:8000/img/logo.png " alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{ route('landing-page') }}">Inicio</a></li>
                            <li><a href="#">Order book</a></li>
                            <li><a href="#">Cesta</a></li>
                            @auth
                                <li>
                                    <a href="#">Mi cuenta</a>      
                                </li>
                            @endauth
        
                        </ul>
                    </nav>
                    @include('cart.layout.cart-count')
                </div>  
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->