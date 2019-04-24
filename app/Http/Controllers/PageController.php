<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

use App\Category;
use App\CategoriesChild;
use App\Products;
use App\Orders;
use App\OrderDetail;
use App\OrderStatus;
use App\Comments;
use App\User;
use App\Banners;



class PageController extends Controller
{   
	
	// Home page
    public function Index()
    {

    	// Get products is new
        $new_products=Products::where('is_new',1)->where('status',1)->take(12)->get();

        // Get banners
        $banners=Banners::where('status',1)->get();

        return view('pages.homepage',compact('new_products','banners'));

    }

    // Get form register
    public function Register()
    {
    	echo 'register';
    }

    // Post register
    public function PostRegister(Request $request)
    {
    	echo 'post register';
    }

    // Get form login
    public function Login()
    {
    	echo 'login';
    }

    // Post login
    public function PostLogin(Request $request)
    {
    	echo 'post login';
    }

    // Get list products
    public function ListProducts($id)
    {
    	echo 'list products';
    }

    // Detail product
    public function DetailProducts($id,Request $request)
    {
    	echo 'detail';
    }

    // Comment product
    public function PostComment(Request $request)
    {
    	echo 'post comment';
    }

    // My order
    public function MyOrder()
    {
    	echo 'my order';
    }

    // Detail order
    public function DetailOrder($id,Request $request)
    {
    	echo 'detail order';
    }
}
