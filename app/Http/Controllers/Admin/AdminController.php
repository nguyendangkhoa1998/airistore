<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
	// Dashboard
    public function Index()
    {

        return 'Admin Dashboard';

    }

    //Login
    public function Login()
    {

    	return 'login';

    }

    //Login
    public function PostLogin()
    {

    	return 'logined';

    }
}
