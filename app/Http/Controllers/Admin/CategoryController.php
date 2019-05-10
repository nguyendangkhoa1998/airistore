<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function Index()
    {
    	$category = Category::active()
    	->orderBy('id','desc')
    	->paginate(10);

    	if (!$category) { 
    		abort (404); 
		}

    	return view('administrator.pages.category.list_category',compact('category'));
    }
}
