<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function Index(Request $request)
    {
    	if ($request->keyword) {

    		if (!$request->keyword) {
    			$keyword=null;
    		}

    		$category = Category::where('name','like',"%$request->keyword%")
    			->orderBy('id','desc')
    			->paginate(10);
    		$category->setPath(route('index.category'));
    		$category->withPath(route('index.category').'?keyword=' . $request->keyword);
    		$keyword=$request->keyword;

    	}else{
    		$category = Category::active()
	    	->orderBy('id','desc')
	    	->paginate(10);
	    	$keyword=null;
    	}

    	if (!$category) { 
    		abort (404); 
		}

    	return view('administrator.pages.category.list_category',compact('category','keyword'));
    }

    public function Add()
    {
    	return view('administrator.pages.category.add');
    }
}
