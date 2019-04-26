@extends('master')
@section('title','Cart')
@section('Breadcrumb')
	 <div class="breadcrumb-area bg--white-6 breadcrumb-bg-1 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="page-title">Cart</h1>
                        <ul class="breadcrumb justify-content-center">
                            <li><a href="index.html">Home</a></li>
                            <li class="current"><span>Cart</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('content')
	<div id="content" class="main-content-wrapper">
            <div class="page-content-inner">
                <div class="container">
                    <div class="row pt--80 pb--80 pt-md--45 pt-sm--25 pb-md--60 pb-sm--40">
                        @if(Session::has('cart'))
                        <div class="col-lg-7 mb-md--30">
                            <form class="cart-form" action="#">
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <div class="table-content table-responsive">
                                            <table class="table text-center">
                                                <thead>
                                                    <tr>
                                                        <th>&nbsp;</th>
                                                        <th>&nbsp;</th>
                                                        <th class="text-left">Product</th>
                                                        <th>price</th>
                                                        <th>quantity</th>
                                                        <th>total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(Session::has('cart'))
                                                    @foreach($product_cart as $product)
                                                    <tr>
                                                        <td class="product-remove text-left"><a href="{{route('delete.cart',['id'=>$product['item']['id']])}}"><i class="dl-icon-close"></i></a></td>
                                                        <td class="product-thumbnail text-left">
                                                            <img src="{{$product['item']['symbolic_image']}}" alt="Product Thumnail">
                                                        </td>
                                                        <td class="product-name text-left wide-column">
                                                            <h3>
                                                                <a href="{{route('detail.product',['id'=>$product['item']['id']])}}">{{$product['item']['name']}}</a>
                                                            </h3>
                                                        </td>
                                                        <td class="product-price">
                                                            <span class="product-price-wrapper">
                                                                <span class="money">${{$product['item']['unit_price']}}</span>
                                                            </span>
                                                        </td>
                                                        <td class="product-quantity">
                                                            <div class="quantity">
                                                                <input type="text" class="quantity-input" name="qty" value="{{$product['qty']}}" disabled>
                                                            </div>
                                                        </td>
                                                        <td class="product-total-price">
                                                            <span class="product-price-wrapper">
                                                                <span class="money"><strong>${{
                                                                    $product['qty']*$product['item']['unit_price']
                                                                }}</strong></span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>  
                                    </div>
                                </div>
                                <div class="row no-gutters border-top pt--20 mt--20">
                                   <!--  <div class="col-sm-6">
                                        <div class="coupon">
                                            <input type="text" id="coupon" name="coupon" class="cart-form__input" placeholder="Coupon Code">
                                            <button type="submit" class="cart-form__btn">Apply Coupon</button>
                                        </div>
                                    </div> -->
<!--                                     <div class="col-sm-7 text-sm-right">
                                        <button type="submit" class="cart-form__btn">Clear Cart</button>
                                        <button type="submit" class="cart-form__btn">Update Cart</button>
                                    </div> -->
                                </div>
                            </form>
                                                        <div class="cart-collaterals">
                                <div class="cart-totals">
                                    <h5 class="mb--15">Cart totals</h5>
                                    <div class="table-content table-responsive">
                                        <table class="table order-table">
                                            <tbody>
                                                <tr>
                                                    <th>Subtotal</th>
                                                    <td>${{$totalPrice}}</td>  
                                                </tr>
                                                <tr>
                                                    <th>Shipping</th>
                                                    <td>
                                                        <span>$0</span>
                                                    </td>  
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Total</th>
                                                    <td>
                                                        <span class="product-price-wrapper">
                                                            <span class="money">${{$totalPrice}}</span>
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="checkout-title mt--10">
                                <h2>Billing Details</h2>
                            </div>
                            <div class="checkout-form">
                                <form action="{{route('order')}}" method="post" class="form form--checkout">
                                    @csrf
                                    <div class="form-row mb--30">
                                        <div class="form__group col-12">
                                            <label for="billing_company" class="form__label form__label--2">Name</label>
                                            <input type="text" value=" @if(Auth::check('user')) {{Auth::user()->name}}@endif" name="name" class="form__input form__input--2" required="" placeholder="Your name">
                                        </div>
                                    </div>
                                    <div class="form-row mb--30">
                                        <div class="form__group col-12">
                                            <label for="billing_phone" class="form__label form__label--2">Phone <span class="required">*</span></label>
                                            <input type="text" value="@if(Auth::check('user')){{Auth::user()->phone_number}}@endif"  name="phone_number" required="" id="billing_phone" class="form__input form__input--2">
                                        </div>
                                    </div>
                                    <div class="form-row mb--30">
                                        <div class="form__group col-12">
                                            <label for="shipping address" class="form__label form__label--2">Shipping address  <span class="required">*</span></label>
                                            <input type="text" value="{{Auth::user()->address}}" name="shipping_address" class="form__input form__input--2" placeholder="Shipping address">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form__group col-12">
                                            <label for="orderNotes" class="form__label form__label--2">Order Notes</label>
                                            <textarea class="form__input form__input--2 form__input--textarea" id="orderNotes" name="note"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row mb--30">
                                        <div class="form__group col-12">
                                            <label for="paymen method" class="form__label form__label--2">Payment method  <span class="required">*</span></label>
                                            <input type="radio"  value="COD" checked=""  name="payment_method" id="" class="">: COD </br></br>
                                            <input type="radio"  value="ATM"  name="payment_method" id="" class="">: ATM
                                        </div>
                                    </div>
                                <button type="button" class="btn btn-fullwidth btn-style-1" data-toggle="modal" data-target="#myModal">
                                    Order
                                </button>
                                <!-- Modal -->
                                  <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">
                                    
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Order</h4>
                                        </div>
                                        <div class="modal-body">
                                          <h3>You want to order ?</h3>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-success">Confirm</button>
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                      
                                    </div>
                                  </div>
                                </form>
                            </div>
                        </div>
                        @else
                        @if(Session('mess'))
                        <h3 class="alert alert-success">{{Session('mess')}}</h3>
                        @else
                        <h3>Chưa có sản phẩm nào trong giỏ hàng</h3>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
@endsection