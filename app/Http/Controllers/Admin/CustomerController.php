<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;


class CustomerController extends Controller
{

	public function Index(Request $request)
	{	
		$keyword = $request->keyword;

		if (isset($request->keyword)) {

			if ($request->keyword=="") {

				$keyword = null;

			}
			
			$customers = User::where('name','like',"%$request->keyword%")->where('role','=','1')->orderBy('id','desc')->paginate(10);

			$customers->setPath(route('index.customer'))->withPath(route('index.customer').'?keyword='.$request->keyword);

		}else{

			$keyword = null;

			$customers = User::where('role','=','1')->orderBy('id','desc')->paginate(10);

		}

   		return view('administrator.pages.customers.list_customers',compact('customers','keyword'));
		
	}

	public function Add()
	{

		return view('administrator.pages.customers.add_customer');
		
	}

	public function PostAdd(Request $request)
	{

		$request->validate([
			'name' => 'required|max:30',
			'phone_number' => 'required|numeric|digits_between:9,12',
			'email' => 'required|max:50|min:5',
			'password' => 'required|max:16|min:6',
			'address' => 'required'
		]);

		$customer = new User();

		$customer->role = 1;

		$customer->fill($request->all());

		$customer->save();

		return redirect()->back()->with('alert_success','Add customer success');
	}

	public function GetEdit($id)
	{

		if (!$id) {

			abort(404);

		}

		$customer = User::find($id);

		return view('administrator.pages.customers.edit_customer',compact('customer'));

		
	}

	public function PostEdit($id,Request $request)
	{

		$request->validate([
			'name' => 'required|max:30',
			'phone_number' => 'required|numeric|digits_between:9,12',
			'email' => 'required|max:50|min:5',
			'address' => 'required'
		]);

		$customer = User::find($id);

		$customer->fill($request->all());

		if (isset($request->new_password)) {
			
			$customer->password = $request->new_password;

		}else{
			$customer->password = $customer->password;
		}

		$customer->save();

		return redirect()->back()->with('alert_success','Updated');
		
	}

	public function Delete($id)
	{
		
		if (!$id) {

			abort(404);

		}

		$customer = User::find($id);

		$customer->delete();

		return redirect(route('index.customer'))->with('alert_success','Deleted');

	}

}
