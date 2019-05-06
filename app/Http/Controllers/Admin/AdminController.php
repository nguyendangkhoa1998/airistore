<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
	// Dashboard
    public function index()
    {

        return 'Admin Dashboard';

    }

    public function Logout()
    {
        Auth::logout();
        return 'Logout';
    }

}
