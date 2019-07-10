<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orders;

class OrderController extends Controller
{
    public function Index()
    {
    	$keyword = null;
    	
    	$orders = Orders::orderBy('id','desc')->paginate(10);

    	return view('administrator.pages.orders.list_orders',compact('orders','keyword'));

    }
}
