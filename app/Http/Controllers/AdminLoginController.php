<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    //Login
    public function Login()
    {

        return view('administrator.pages.login');

    }

    //Login
    public function PostLogin()
    {

        return 'logined';

    }
}
