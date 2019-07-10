<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;

use App\User;


class CustomerController extends Controller
{
    // Get form register
    public function Register()
    {
    	return view('pages.register');
    }


    // Post register
    public function PostRegister(Request $request)
    {
    	$request->validate([
            'name'          =>'required|max:50|min:2',
            'email'         =>'required|max:50|min:10|unique:users,email',
            'phone_number'  =>'required|numeric|min:9',
            'address'       =>'required',
            'password'      =>'required|max:16|min:6'
        ],[
            'name.required'     =>'name must not be empty',
            'name.max'          =>'name no more than 50 characters',
            'name.min'          =>'name no less than 2 characters',
            'email.required'    =>'email must not be empty',
            'email.max'         =>'email no more than 50 characters',
            'email.min'         =>'email no less than 10 characters',
            'email.unique'      =>'Email already exists',
            'phone_number.min'  =>'no less than 9 characters',
            'address.required'  =>'address must not be empty',
            'password.required' =>'password must not be empty',
            'password.max'      =>'password no more than 16 characters',
            'password.min'      =>'password no less than 6 characters',
        ]);

        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone_number=$request->phone_number;
        $user->address=$request->address;
        $user->password=Hash::make($request->password);
        $user->role=1;
        $user->save();

        return redirect(route('login'))->with('alert','Register success');
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
            'email'     => 'required|max:50|min:10',
            'password'  => 'required|max:16|min:6'
        ],[
            'email.required'    => 'email must not be empty',
            'email.max'         => 'email no more than 50 characters',
            'email.min'         => 'email no less than 10 characters',
            'password.required' => 'password must not be empty',
            'password.max'      => 'password no more than 16 characters',
            'password.min'      => 'password no less than 6 characters',
        ]);

        //Check Auth login
        if(  Auth::attempt(['email' => $request->email, 'password' => $request->password,'role' => 1])){

            return redirect()->route('home');

        }else{

            return redirect(route('login'))->with('alert', 'Account incorrect !');

        }

    }

    // Customer logout
    public function Logout()
    {
        Session::forget('cart');

        Auth::logout();

        return redirect()->back();
    }
}
