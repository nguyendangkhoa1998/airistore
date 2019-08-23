<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banners;
class BannersController extends Controller
{
	//List
	public function Index()
	{
		$banners = Banners::orderBy('id','desc')->paginate(5);
		return view('administrator.pages.banners.list_banners',compact('banners'));
	}
    //Form Add
	public function Add()
	{
		return view('administrator.pages.banners.form');
	}
    //Post Add
	public function Save(Request $request)
	{
		$idBanner = $request->idBanner;
		if ($idBanner) {
			$request->validate([
				'title' => 'required|max:50|min:1',
				'status' => 'required',
				'image' => 'required'
			]);
			$banner = Banners::findOrFail($idBanner);
			$banner->fill($request->all());
			if ($request->hasFile('image')) {
				$file_name = uniqid().".".$request->image->extension();
				$path = $request->image->storeAs('images/banners',$file_name);
				$banner->images = $path;
			}
			$banner->save();
		}else{
			$banner = new Banners;
			$banner->fill($request->all());
			if ($request->hasFile('image')) {
				$file_name = uniqid().".".$request->image->extension();
				$path = $request->image->storeAs('images/banners',$file_name);
				$banner->images = $path;
			}
			$banner->save();
		}
		return redirect(route('index.banner'))->with('alert_success','Saved banner');
	}
	//Form edit
	public function Edit($idBanner)
	{
		$banner = Banners::findOrFail($idBanner);
		return view('administrator.pages.banners.form',compact('banner'));
	}
	//Delete
	public function Delete($idBanner)
	{
		$banner = Banners::findOrFail($idBanner)->delete();
		return redirect(route('index.banner'))->with('alert_success','Deleted banner');
	}
}
