@extends('layouts.shop.main')

@section('content')
    <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

     <!-- Page Preloder Begin -->
     @include('layouts.shop.partials.preloader')
     <!-- Page Preloder End -->

     <!-- Navbar Section Begin -->
     @include('layouts.shop.partials.navbar')
    <!-- Navbar Section End -->

    <!-- ShoppingCart BreadCrumb Begin -->
    @include('cart.layout.cart-breadcrumb')
    <!-- ShoppingCart BreadCrumb End -->
    
    <!-- Cart Section Begin -->
    @include('cart.layout.cart')
    <!-- Cart Section End -->

    <!-- Footer Section Begin -->
    @include('layouts.shop.partials.footer')
    <!-- Footer Section End -->


@endsection

