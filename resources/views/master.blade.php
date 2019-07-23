<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/img/icon.png">
    <base href="{{asset('/')}}" >
    <!-- Title -->
    <title>@yield('title','Airi Fashion')</title>
    <!-- ************************* CSS Files ************************* -->
    @include('layouts.page_css')
</head>
<body>
    <div class="ai-preloader active">
        <div class="ai-preloader-inner h-100 d-flex align-items-center justify-content-center">
            <div class="ai-child ai-bounce1"></div>
            <div class="ai-child ai-bounce2"></div>
            <div class="ai-child ai-bounce3"></div>
        </div>
    </div>
    <!-- Main Wrapper Start -->
    <div class="wrapper">
        <!-- Header Area Start -->
        @include('layouts.header')
        <!-- Header Area End -->
        <!-- Breadcrumb area Start -->
        @yield('Breadcrumb')
        <!-- Breadcrumb area End -->
        <!-- Main Content Wrapper Start --> 
        @yield('content')
        @yield('script')
    </div>
    <!-- Main Content Wrapper Start -->
    <!-- Footer Start -->
    @include('layouts.footer')
    <!-- Footer End -->
    <!-- Search from Start --> 
    @yield('searchform_popup')
    <!-- Search from End --> 
    <!-- Side Navigation Start -->
    @include('layouts.side_navigation')
    <!-- Side Navigation End -->
    <!-- Mini Cart Start -->
    @include('layouts.mini_cart')
    <!-- Mini Cart End -->
    <!-- Global Overlay Start -->
    <div class="ai-global-overlay"></div>
    <!-- Global Overlay End -->
    <!-- Modal Start -->
    @include('layouts.modal_start')
    <!-- Modal End -->
</div>
<!-- Main Wrapper End -->
<!-- ************************* JS Files ************************* -->
@include('layouts.page_js')
</body>
</html>