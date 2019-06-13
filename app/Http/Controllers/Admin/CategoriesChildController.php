<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CategoriesChild;
use App\Category;

class CategoriesChildController extends Controller
{
	public function Index(Request $request){

		$keyword = $request->keyword;

		if (isset($keyword)) {

			if ($keyword==null) {

				$keyword=null;

			}

			$categories_child = CategoriesChild::where('name','like','%$keyword%')
			->orderBy('id','desc')
			->paginate(10);
			$categories_child->setPath(route('index.categories.child'));
			$categories_child->withPath(route('index.categories.child').'?keyword='.$keyword);
		}else{

			$categories_child = CategoriesChild::orderBy('id','desc')->paginate(10);
			$keyword=null;

		}

		return view('administrator.pages.categories_child.list',compact('categories_child','keyword'));

	}

	public function Add(){
		$category = Category::where('active','>',0)->orderBy('id','desc')->get();
		return view('administrator.pages.categories_child.add',compact('category'));
	}

	public function PostAdd(Request $request)
	{
		$request->validate(
			[
				'category_id' => 'required',
				'name' => 'required',
				'active' => 'required'
			],
			[
				'name.required' => 'Name not null',
				'active.required' => 'active not null',
				'category_id.required' => 'category not null'
			]
		);

		$categories_child = new CategoriesChild;
		$categories_child->fill($request->all());
		$categories_child->save();

		return redirect(route('index.categories.child'))->with('alert_success','Add successfuly');
	}

	public function GetEdit($id)
	{

		if (!$id) {
			abort (404); 
		}

		$category = Category::where('active','>',0)->orderBy('id','desc')->get();
		$categories_child = CategoriesChild::find($id);

		return view('administrator.pages.categories_child.edit',compact('categories_child','category'));
	}

	public function PostEdit($id,Request $request)
	{

		if (!$id) {
			abort (404); 
		}

		$request->validate(
			[
				'category_id' => 'required',
				'name' => 'required',
				'active' => 'required'
			],
			[
				'name.required' => 'Name not null',
				'active.required' => 'active not null',
				'category_id.required' => 'category not null'
			]
		);

		$categories_child = CategoriesChild::find($id);
		$categories_child->fill($request->all());
		$categories_child->save();

		return redirect()->back()->with('alert_success','Edit successfuly');

	}

	public function Delete($id)
	{
		if (!$id) {
			abort (404); 
		}

		$categories_child = CategoriesChild::find($id);

		$categories_child->delete();

		return redirect()->back()->with('alert_success','Delete successfuly');
	}
}
