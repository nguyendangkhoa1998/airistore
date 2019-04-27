@if(Session::has('cart'))
<aside class="mini-cart" id="miniCart">
            <div class="mini-cart-wrapper">
                <a href="#" class="btn-close"><i class="dl-icon-close"></i></a>
                <div class="mini-cart-inner">
                    <h5 class="mini-cart__heading mb--40 mb-lg--30">Shopping Cart</h5>
                    <div class="mini-cart__content">
                        <ul class="mini-cart__list">
                            
                            @foreach($product_cart as $product)
                            <li class="mini-cart__product">
                                <a href="{{route('delete.cart',['id'=>$product['item']['id']])}}" class="remove-from-cart remove">
                                    <i class="dl-icon-close"></i>
                                </a>
                                <div class="mini-cart__product__image">
                                    <img src="{{$product['item']['symbolic_image']}}" alt="products">
                                </div>
                                <div class="mini-cart__product__content">
                                    <a class="mini-cart__product__title" href="{{route('detail.product',['id'=>$product['item']['id']])}}">{{$product['item']['name']}}</a>
                                    <span class="mini-cart__product__quantity">{{$product['qty']}} x ${{$product['item']['unit_price']}}</span>
                                </div>
                           </li>
                           @endforeach
                        </ul>
                        <div class="mini-cart__total">
                            <span>Subtotal</span>
                            <span class="ammount">$ {{$totalPrice}}</span>
                        </div>
                        <div class="mini-cart__buttons">
                            <a href="{{route('view.cart')}}" class="btn btn-fullwidth btn-style-1">View Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        @else
        <aside class="mini-cart" id="miniCart">
            <div class="mini-cart-wrapper">
                <a href="#" class="btn-close"><i class="dl-icon-close"></i></a>
                <div class="mini-cart-inner">
                    <h5 class="mini-cart__heading mb--40 mb-lg--30">Shopping Cart</h5>
                    <div class="mini-cart__content">
                        <p>Cart empty</p>
                    </div>
                </div>
            </div>
        </aside>
        @endif