<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orders;
use App\OrderDetail;
use App\Products;
class OrderController extends Controller
{
	public function Index(Request $request)
	{	
		$keyword = $request->keyword;
		if (!$keyword) {
			$keyword = null;
			$orders = Orders::orderBy('id','desc')->paginate(10);
			return view('administrator.pages.orders.list_orders',compact('orders','keyword'));
		}else{
			$orders = Orders::where('id','like',"%$keyword%")->orderBy('id','desc')->paginate(10);
			$orders->setPath(route('index.order'))->withPath(route('index.order').'?keyword='.$keyword);
			return view('administrator.pages.orders.list_orders',compact('orders','keyword'));
		}
	}
	public function EditOrder($idOrder)
	{
		$order = Orders::findOrFail($idOrder);
		$orders_detail = OrderDetail::where('order_id',$order->id)->get();
		foreach ($orders_detail as $order_detail) {
			$products[] = Products::where('id',$order_detail->product_id)->first();
		}
		$customer = $order->RelationshipUsers;
		return view('administrator.pages.orders.edit_order',compact('order','customer','products'));
	}

	public function CancelOrder($idOrder)
	{
		$order = Orders::findOrFail($idOrder);
		$order->status = 4;
		$order->save();

		return redirect()->back()->with('alert_success','Order canceled');
	}
}
