<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banners;

class BannersController extends Controller
{
    public function Index()
    {
    	$banners = Banners::orderBy('id','desc')->paginate(5);

    	return view('administrator.pages.banners.list_banners',compact('banners'));
    }
}
