@extends('master')
@section('title','My Order')
@section('Breadcrumb')
<div class="breadcrumb-area bg--white-6 breadcrumb-bg-1 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="page-title">My Order</h1>
                        <ul class="breadcrumb justify-content-center">
                            <li><a href="index.html">Home</a></li>
                            <li class="current"><span>My Order</span></li>
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
                    <div class="row justify-content-center pt--75 pb--80 pt-md--55 pb-md--60 pt-sm--35 pb-sm--40">
                        <div class="col-lg-6">
                            <form class="form form--track" action="">
                                <div class="form__group mb--30">
                                    <label for="order_id" class="form__label form__label--3">Order ID</label>
                                    <input type="text" name="order_id" name="order_id" class="form__input form__input--3" placeholder="Found in your order confirmation email.">
                                </div>
                                <div class="form__group mb--30">
                                    <label for="billing_email" class="form__label form__label--3">Billing email</label>
                                    <input type="text" name="billing_email" name="billing_email" class="form__input form__input--3" placeholder="Email you used during checkout.">
                                </div>
                                <div class="form__group text-center">
                                    <input type="submit" value="Track" class="btn btn-submit btn-style-1">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('script')

@endsection