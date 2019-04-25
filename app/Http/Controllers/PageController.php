<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Category;
use App\CategoriesChild;
use App\Products;
use App\Orders;
use App\OrderDetail;
use App\OrderStatus;
use App\Comments;
use App\User;
use App\Banners;
use App\Cart;



class PageController extends Controller
{   
	
	// Home page
    public function Index()
    {

    	// Get products is new
        $new_products=Products::where('is_new',1)
            ->where('status',1)
            ->where('quantity','>',0)
            ->take(12)
            ->get();

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
    	return view('pages.login');
    }


    // Post login
    public function PostLogin(Request $request)
    {

        // Validation login
    	$request->validate([
            'email'=>'required|max:50|min:10',
            'password'=>'required|max:16|min:6'
        ],[
            'email.required'=>'email must not be empty',
            'email.max'=>'email no more than 50 characters',
            'email.min'=>'email no less than 10 characters',
            'password.required'=>'password must not be empty',
            'password.max'=>'password no more than 16 characters',
            'password.min'=>'password no less than 6 characters',
        ]);

        //Check Auth login
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect(route('home'));
        }else{
            return redirect(route('login'))->with('alert', 'Account or password incorrect !');
        }

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
