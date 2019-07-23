<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Products;
use App\User;
use App\Orders;
class AdminController extends Controller
{
    public function Index()
    {
        $LifeTimeSale = Orders::select('total_price')->get();
        $orders = Orders::select('id')->get();
        $totalprice = array();
        foreach($LifeTimeSale as $item){
            array_push($totalprice, $item->total_price);
        }
        $products = Products::all();
        $users = User::select('name')->get();
        $products_disable = Products::where('status',0)->get();
        $products_enable  = Products::where('status',1)->get();
        return view('administrator.pages.dashboard',compact('products','products_enable','products_disable','users','totalprice','orders'));
    }
    public function Logout()
    {
        Auth::logout();
        return 'Logout';
    }
}
