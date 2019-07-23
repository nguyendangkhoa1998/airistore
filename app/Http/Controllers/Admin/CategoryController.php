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
			$category = Category::orderBy('id','desc')->paginate(10);
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
	public function PostAdd(Request $request){
		$request->validate(
			[
				'name' => 'required',
				'active' => 'required'
			],
			[
				'name.required' => 'Name not null',
				'active.required' => 'active not null'
			]
		);
		$category = new Category;
		$category->fill($request->all());
		$category->save();
		return redirect(route('index.category'))->with('alert_success','Add successfuly category !');
	}
	public function GetEdit($id){
		if (!$id) {
			abort (404); 
		}
		$category = Category::find($id);
		return view('administrator.pages.category.edit',compact('category'));
	}
	public function PostEdit($id,Request $request){
		if (!$id) {
			abort (404); 
		}
		$request->validate(
			[
				'name' => 'required',
				'active' => 'required'
			],
			[
				'name.required' => 'Name not null',
				'active.required' => 'active not null'
			]
		);
		$category = Category::find($id);
		$category->fill($request->all());
		$category->save();
		return redirect()->back()->with('alert_success','Edit successfuly category !');
	}
	public function Delete($id){
		if (!$id) {
			abort (404); 
		}
		$category = Category::find($id);
		$category->delete();
		return redirect()->back()->with('alert_success','Delete successfuly');
	}
}
