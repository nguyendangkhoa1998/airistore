@extends('master')
@section('title','All Products')
@section('Breadcrumb')
<div class="breadcrumb-area bg--white-6 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title">All products</h1>
                <ul class="breadcrumb justify-content-center">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="current"><span><a href="{{route('shop.all')}}">all products</a></span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div id="content" class="main-content-wrapper">
    <div class="page-content-inner enable-page-sidebar">
        <div class="container-fluid">
            <div class="row shop-sidebar pt--45 pt-md--35 pt-sm--20 pb--60 pb-md--50 pb-sm--40">
                <div class="col-lg-9 order-lg-2" id="main-content">
                    <div class="shop-toolbar">
                        <div class="shop-toolbar__inner">
                            <div class="row align-items-center">
                                <div class="col-md-6 text-md-left text-center mb-sm--20">
                                    <div class="shop-toolbar__left">
                                        @php
                                        $from = ($products->currentPage() - 1)*$products->perPage()+1;
                                        $to = $products->lastPage() === $products->currentPage() ? $products->total() : $products->currentPage()*$products->perPage();
                                        @endphp
                                        <p class="product-pages">Showing {{$from}}-{{$to}} of {{$products->total()}} results</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shop-products"> 
                        <div class="row grid-space-20 xxl-block-grid-4">
                            @if(count($products) > 0 )
                            @foreach($products as $items)
                            <div class="col-lg-4 col-sm-6 mb--40 mb-md--30">
                                <div class="airi-product">
                                    <div class="product-inner">
                                        <figure class="product-image">
                                            <div class="product-image--holder">
                                                <a href="{{route('detail.product',['id'=>$items->id])}}">
                                                    <img src="{{$items->symbolic_image}}" alt="Product Image" class="primary-image">
                                                    <img src="{{$items->symbolic_image}}" alt="Product Image" class="secondary-image">
                                                </a>
                                            </div>
                                            <div class="airi-product-action">
                                                <div class="product-action">
                                                    <a class="quickview-btn action-btn" data-toggle="tooltip" data-placement="top" title="Quick Shop">
                                                        <span data-toggle="modal" data-target="#productModal">
                                                            <i class="dl-icon-view"></i>
                                                        </span>
                                                    </a>
                                                    <a class="add_to_cart_btn action-btn" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                        <i class="dl-icon-cart29"></i>
                                                    </a>
                                                    <a class="add_wishlist action-btn" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                        <i class="dl-icon-heart4"></i>
                                                    </a>
                                                    <a class="add_compare action-btn" href="compare.html" data-toggle="tooltip" data-placement="top" title="Add to Compare">
                                                        <i class="dl-icon-compare"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            @if($items->new==1)
                                            <span class="product-badge hot">New</span>
                                            @endif
                                        </figure>
                                        <div class="product-info text-center">
                                            <h3 class="product-title">
                                                <a href="product-details.html">{{$items->name}}</a>
                                            </h3>
                                            <span class="product-price-wrapper">
                                                <span class="money">${{$items->price}}</span>
                                                <span class="product-price-old">
                                                    <span class="money">$0</span>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <p> Không có sản phẩm nào.... </p>
                            @endif
                        </div>
                    </div>
                    <nav class="pagination-wrap">
                        <ul class="pagination">
                            {{$products->links()}}
                            {{--  <li><a href="shop-sidebar.html" class="prev page-number"><i class="fa fa-angle-double-left"></i></a></li>
                            <li><span class="current page-number">1</span></li>
                            <li><a href="shop-sidebar.html" class="page-number">2</a></li>
                            <li><a href="shop-sidebar.html" class="page-number">3</a></li>
                            <li><a href="shop-sidebar.html" class="next page-number"><i class="fa fa-angle-double-right"></i></a></li>  --}}
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 order-lg-1 mt--30 mt-md--40" id="primary-sidebar">
                    <div class="sidebar-widget">
                        <!-- Category Widget Start -->
                        <div class="product-widget categroy-widget mb--35 mb-md--30">
                            <h3 class="widget-title">Categories</h3>
                            <ul class="prouduct-categories product-widget__list">
                                @foreach($categories as $items)
                                <li><a href="{{route('shop',['id'=>$items->id])}}">{{$items->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('searchform_popup')
    <div class="searchform__popup" id="searchForm">
        <a href="#" class="btn-close"><i class="dl-icon-close"></i></a>
        <div class="searchform__body">
            <p>Start typing and press Enter to search</p>
            <form class="searchform" action="" method="get">
                <input type="text" name="keyword" value="" id="search" class="searchform__input" placeholder="Enter Products...">
                <button type="submit" class="searchform__submit"><i class="dl-icon-search10"></i></button>
            </form>
        </div>
    </div>
    @endsection