@extends('master')
@section('title','Shop')
@section('Breadcrumb')
	<div class="breadcrumb-area bg--white-6 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="page-title">{{$name_categories_child}}</h1>
                        <ul class="breadcrumb justify-content-center">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li class="current"><span>{{$name_categories_child}}</span></li>
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
                                                {{--  <div class="product-view-count">
                                                    <p>Show</p>
                                                    <ul>
                                                        <li><a href="shop-sidebar.html">6</a></li>
                                                        <li class="active"><a href="shop-sidebar.html">12</a></li>
                                                        <li><a href="shop-sidebar.html">15</a></li>
                                                    </ul>
                                                </div>  --}}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="shop-toolbar__right">
                                                <a href="#" class="product-filter-btn shop-toolbar__btn">
                                                    <span>Filters</span>
                                                    <i></i>
                                                </a>
                                                <div class="product-ordering">
                                                    <a href="#" class="product-ordering__btn shop-toolbar__btn">
                                                        <span>Short By</span>
                                                        <i></i>
                                                    </a>
                                                    <ul class="product-ordering__list">
                                                        <li class="active"><a href="#">Sort by popularity</a></li>
                                                        <li><a href="#">Sort by average rating</a></li>
                                                        <li><a href="#">Sort by newness</a></li>
                                                        <li><a href="#">Sort by price: low to high</a></li>
                                                        <li><a href="#">Sort by price: high to low</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="advanced-product-filters">
                                    <div class="product-filter">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="product-widget product-widget--price">
                                                    <h3 class="widget-title">Price</h3>
                                                    <ul class="product-widget__list">
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span class="ammount">$20.00</span>
                                                                <span> - </span>
                                                                <span class="ammount">$40.00</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span class="ammount">$40.00</span>
                                                                <span> - </span>
                                                                <span class="ammount">$50.00</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span class="ammount">$50.00</span>
                                                                <span> - </span>
                                                                <span class="ammount">$60.00</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span class="ammount">$60.00</span>
                                                                <span> - </span>
                                                                <span class="ammount">$80.00</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span class="ammount">$80.00</span>
                                                                <span> - </span>
                                                                <span class="ammount">$100.00</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span class="ammount">$100.00</span>
                                                                <span> + </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="product-widget product-widget--brand">
                                                    <h3 class="widget-title">Brands</h3>
                                                    <ul class="product-widget__list">
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span>Airi</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span>Mango</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span>Valention</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span>Zara</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="product-widget product-widget--color">
                                                    <h3 class="widget-title">Color</h3>
                                                    <ul class="product-widget__list product-color-swatch">
                                                        <li>
                                                            <a href="shop-sidebar.html" class="product-color-swatch-btn blue">
                                                                <span class="product-color-swatch-label">Blue</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html" class="product-color-swatch-btn green">
                                                                <span class="product-color-swatch-label">Green</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html" class="product-color-swatch-btn pink">
                                                                <span class="product-color-swatch-label">Pink</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html" class="product-color-swatch-btn red">
                                                                <span class="product-color-swatch-label">Red</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html" class="product-color-swatch-btn grey">
                                                                <span class="product-color-swatch-label">Grey</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="product-widget product-widget--size">
                                                    <h3 class="widget-title">Size</h3>
                                                    <ul class="product-widget__list">
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span>L</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span>M</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span>S</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span>XL</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <span>XXL</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn-close"><i class="dl-icon-close"></i></a>
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
                                                                    <a class="add_to_cart_btn action-btn" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Add to Cart" data-idProduct="{{$items->id}}">
                                                                        <i class="dl-icon-cart29"></i> 
                                                                </div>
                                                                
                                                            </div>
                                                        </figure>
                                                        <div class="product-info text-center">
                                                            <h3 class="product-title">
                                                                <a href="product-details.html">{{$items->name}}</a>
                                                            </h3>
                                                            <span class="product-price-wrapper">
                                                                <span class="money">${{$items->unit_price}}</span>
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
                                </ul>
                            </nav>
                        </div>
                        <div class="col-lg-3 order-lg-1 mt--30 mt-md--40" id="primary-sidebar">
                            <div class="sidebar-widget">
                                <!-- Category Widget Start -->
                                <div class="product-widget categroy-widget mb--35 mb-md--30">
                                    <h3 class="widget-title">Categories child</h3>
                                    <ul class="prouduct-categories product-widget__list">
                                        @foreach($categories_child as $items)
                                            <li>
                                                <a href="{{route('list.products',['id'=>$items->id])}}">{{$items->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- Promo Widget End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection