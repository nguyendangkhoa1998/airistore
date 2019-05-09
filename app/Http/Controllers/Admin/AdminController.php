<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Products;

class AdminController extends Controller
{
    public function Index()
    {
        $products = Products::all();
        $products_disable = Products::where('status',0)->get();
        $products_enable  = Products::where('status',1)->get();
        return view('administrator.pages.dashboard',compact('products','products_enable','products_disable'));
    }

    public function Logout()
    {
        Auth::logout();
        return 'Logout';
    }
}
