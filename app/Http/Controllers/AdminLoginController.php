<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class AdminLoginController extends Controller
{
    //Login
    public function Login()
    {

        return view('administrator.pages.login');

    }

    //Login
    public function PostLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required',
            'password' =>'required|min:6|max:16'
        ],[
            'email.required'    =>'Bạn cần nhập email',
            'password.required' =>'Bạn cần nhập mật khẩu',
            'password.min'      =>'Mật khẩu phải có từ 6 - 16 kí tự',
            'password.max'      =>'Mật khẩu phải có từ 6 - 16 kí tự',
        ]);
            var_dump($request->email,$request->password);die();
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){

            return redirect(route('dashboard'));
            
		}else{

            return redirect(route('admin.login'))->with('alert', 'Sai tài khoản hoặc mật khẩu');
            
        }

    }
}
