<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orders;
use App\OrderDetail;
use App\Products;
class OrderController extends Controller
{
	public function Index()
	{
		$keyword = null;
		$orders = Orders::orderBy('id','desc')->paginate(10);
		return view('administrator.pages.orders.list_orders',compact('orders','keyword'));
	}
	public function EditOrder($idOrder)
	{
		$order = Orders::findOrFail($idOrder);
		$orders_detail = OrderDetail::where('order_id',$order->id)->get();
		$my_product_ids = array();
		foreach ($orders_detail as $order_detail) {
			$my_product_ids[].= $order_detail->product_id;
		}
		$products = array();
 		foreach($my_product_ids as $my_product_id ){
 			$products['name']= Products::select('name')->where('id',$my_product_id)->first();
 			$products['unit_price']= Products::select('unit_price')->where('id',$my_product_id)->first();
		}
		$customer = $order->RelationshipUsers;
		return view('administrator.pages.orders.edit_order',compact('order','customer','products'));
	}
}
