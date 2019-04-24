@extends('master')
@section('title','Collection')
@section('Breadcrumb')
<div class="breadcrumb-area bg--white-6 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="page-title">Shop Collections</h1>
                        <ul class="breadcrumb justify-content-center">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('shop.all')}}">Shop All</a></li>
                            <li class="current"><span>Shop Collections</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('content')
<div id="content" class="main-content-wrapper">
            <div class="shop-page-wrapper">
                <div class="container-fluid p-0">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <div class="banner-box banner-type-3 banner-type-3-1 banner-hover-1">
                                <div class="banner-inner">
                                    <div class="banner-image">
                                        <img src="assets/img/banner/m07-banner1.jpg" alt="Banner">
                                    </div>
                                    <div class="banner-info">
                                        <p class="banner-title-1 lts-13 lts-lg-4 text-uppercase">New Season</p>
                                        <h2 class="banner-title-2">The <strong>Interview</strong></h2>
                                    </div>
                                    <a class="banner-link banner-overlay" href="shop-sidebar.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="banner-box banner-type-3 banner-type-3-1 banner-hover-1">
                                <div class="banner-inner">
                                    <div class="banner-image">
                                        <img src="assets/img/banner/m07-banner2.jpg" alt="Banner">
                                    </div>
                                    <div class="banner-info">
                                        <p class="banner-title-1 lts-13 lts-lg-4 text-uppercase">New Men</p>
                                        <h2 class="banner-title-2">Autumn <strong>Winter</strong></h2>
                                    </div>
                                    <a class="banner-link banner-overlay" href="shop-sidebar.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="banner-box banner-type-3 banner-type-3-1 banner-hover-1">
                                <div class="banner-inner">
                                    <div class="banner-image">
                                        <img src="assets/img/banner/m07-banner3.jpg" alt="Banner">
                                    </div>
                                    <div class="banner-info">
                                        <p class="banner-title-1 lts-13 lts-lg-4 text-uppercase">Hello</p>
                                        <h2 class="banner-title-2">Woman <strong>2019</strong></h2>
                                    </div>
                                    <a class="banner-link banner-overlay" href="shop-sidebar.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="banner-box banner-type-3 banner-type-3-1 banner-hover-1">
                                <div class="banner-inner">
                                    <div class="banner-image">
                                        <img src="assets/img/banner/m07-banner4.jpg" alt="Banner">
                                    </div>
                                    <div class="banner-info">
                                        <p class="banner-title-1 lts-13 lts-lg-4 text-uppercase">New Season</p>
                                        <h2 class="banner-title-2">Man <strong>T-Shirt</strong></h2>
                                    </div>
                                    <a class="banner-link banner-overlay" href="shop-sidebar.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="banner-box banner-type-3 banner-type-3-1 banner-hover-1">
                                <div class="banner-inner">
                                    <div class="banner-image">
                                        <img src="assets/img/banner/m07-banner5.jpg" alt="Banner">
                                    </div>
                                    <div class="banner-info">
                                        <p class="banner-title-1 lts-13 lts-lg-4 text-uppercase">Woman 2019</p>
                                        <h2 class="banner-title-2">Floral <strong>Dress</strong></h2>
                                    </div>
                                    <a class="banner-link banner-overlay" href="shop-sidebar.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="banner-box banner-type-3 banner-type-3-1 banner-hover-1">
                                <div class="banner-inner">
                                    <div class="banner-image">
                                        <img src="assets/img/banner/m07-banner6.jpg" alt="Banner">
                                    </div>
                                    <div class="banner-info">
                                        <p class="banner-title-1 lts-13 lts-lg-4 text-uppercase">Jacket</p>
                                        <h2 class="banner-title-2">Man <strong>2019</strong></h2>
                                    </div>
                                    <a class="banner-link banner-overlay" href="shop-sidebar.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection