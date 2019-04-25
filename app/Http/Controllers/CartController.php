<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Cart;
use App\Products;
use App\Orders;
use App\OrderDetail;
use App\OrderStatus;



class CartController extends Controller
{
    public function AddCart(Request $request,$id)
    {

    	  $product=Products::find($id);

	      $oldCart=Session('cart')?Session::get('cart'):null;

	      $cart=new Cart($oldCart);

	      $cart->add($product,$id);

	      $request->session()->put('cart',$cart);

	      return redirect()->back()->with('success','Added product to cart');

    }

    public function DeleteCart($id)
    {

    	$oldCart=Session::has('cart')?Session::get('cart'):null;

        $cart=new Cart($oldCart);

        $cart->removeItem($id);

        if (count($cart->items)>0) {

            Session::put('cart',$cart);

        }else {

            Session::forget('cart');

        }

        return redirect()->back()->with('success','Delete the product from the shopping cart');
    }


    public function ViewCart()
    {
    	if (Session::has('cart')) {

            $oldCart=Session::get('cart');

            $cart=new Cart($oldCart);

            return view('pages.cart',['product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);

        }

        return view('pages.cart');

    }

    public function Order(Request $request)
    {
    	$cart=Session::get('cart');

        $order= new Orders();

        $order->user_id=Auth::id();

        $order->total_price=$cart->totalPrice;

        $order->shipping_address=$request->shipping_address;

        $order->payment_method=$request->payment_method;

        $order->status=1;

        $order->note=$request->note;

        $order->save();

        foreach ($cart->items as $key => $value) {

            $order_detail=new OrderDetail;

            $order_detail->order_id=$order->id;

            $order_detail->product_id=$key;

            $order_detail->quantity=$value['qty'];

            $order_detail->unit_price=($value['price']/$value['qty']);

            $order_detail->save();

        }

        $product=Products::find(Auth::id());

        $product->quantity=($product->quantity-$value['qty']);

        $product->save();

        Session::forget('cart');

        return redirect()->back()->with('mess','Order Success');
    }
}
