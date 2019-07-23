<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products;
use App\ProductGalery;
use App\Category;
use App\CategoriesChild;
class ProductController extends Controller
{
	//----------- List products -------------
	public function Index(Request $request)
	{
		if (isset($request->keyword)) {
			$keyword = $request->keyword;
			if ($keyword==null) {
				$keyword = null;
			}
			$products = Products::where('name','like',"%$keyword%")
			->orderBy('id','desc')
			->paginate(10);
			$products->setPath(route('index.products'))
			->withPath(route('index.products').'?keyword='.$keyword);
		}else{
			$keyword = null;
			$products = Products::orderBy('id','desc')->paginate(10);
		}
		return view('administrator.pages.products.list_products',compact('products','keyword'));
	}
	//----------- Filter products -------------
	public function Filter(Request $request)
	{
		$status = $request->filter_status;
		$new = $request->filter_new;
		if(isset($status) && isset($new)){
			$products = Products::where('status',$status)
				->where('is_new',$new)
				->orderBy('id','desc')
				->paginate(10);
		}elseif (empty($status) && isset($new)) {
			$products = Products::where('is_new',$new)
				->orderBy('id','desc')
				->paginate(10);
		}elseif (isset($status) && empty($new)) {
			$products = Products::where('status',$status)
				->orderBy('id','desc')
				->paginate(10);
		}elseif (empty($status) && empty($new)) {
			$products = Products::orderBy('id','desc')
				->paginate(10);
		}
		$keyword = null;
		$products->setPath(route('filter.products'))
			->withPath(route('filter.products').'?filter_status='.$status.'&filter_new='.$new);
		return view('administrator.pages.products.list_products',compact('products','keyword','status','new'));
	}
	//----------Ajax get categories child----------------
	public function AjaxGetCategoriesChild($id_category)
	{
		$result['categories'] = "";
		if ($id_category==0) {
			$result['categories'] = "<option value=''>Please Select Categories Child</option>";
			$result['disabled'] = 'yes';
		}else{
			$categoriesChild = CategoriesChild::where('category_id','=',$id_category)
				->where('active','=',1)
				->get();
			if (count($categoriesChild)==0) {
				$result['categories'] = "<option value=''>Null</option>";
			}else{
				foreach ($categoriesChild as $item) {
					$result['categories'] .= "<option value='".$item->id."'>".$item->name."</option>";
				}
				$result['disabled'] = 'no';
			}
		}
		return json_encode($result);
	}
	//------------Form add product-----------
	public function Add()
	{
		$category = Category::active()->orderBy('id','asc')->get();
		$categoriesChild = CategoriesChild::where('active','=',1)->get();
		return view('administrator.pages.products.add',compact('category','categoriesChild'));
	}
	//---------- Add product-----------------
	public function PostAdd(Request $request){
		$request->validate(
			[
				'category_id' 			=> 'required',
				'categories_child_id' 	=> 'required',
				'name' 					=> 'required',
				'unit_price' 			=> 'required',
				'quantity' 				=> 'required',
				'is_new'				=> 'required',
				'status'				=> 'required'
			],
			[
				'category_id.required' 			=> 'Category not null',
				'categories_child_id.required' 	=> 'Categories child not null',
				'name.required' 				=> 'Name not null',
				'unit_price.required' 			=> 'Unit price not null',
				'quantity.required'				=> 'Quantity not null',
				'is_new.required'				=> 'Please select is new',
				'status.required'				=>'Please select status'
			]
		);
		$products = new Products();
		$products->fill($request->all());
		if ($request->hasFile('symbolic_image')) {
			$file_name = uniqid().".".$request->symbolic_image->extension();
			$path = $request->symbolic_image->storeAs('images/products',$file_name);
			$products->symbolic_image = $path;
		}
		$products->save();
		if (isset($request->galery)) {
			foreach ($request->galery as $gl) {
				$galeryItem = new ProductGalery();
				$galeryItem->product_id = $products->id;
				$file_name = uniqid().".".$gl->extension();
				$path = $gl->storeAs('images/product_galery/product_'.$products->id,$file_name);
				$galeryItem->image_url = $path;
				$galeryItem->save();
			}
		}
		return redirect(route('index.products'))->with('alert_success','Add success product');
	}
	//--------Get product by Id-----------
	public function GetEdit($id)
	{
		if (!$id) {
			return abort(404);
		}
		$categorys = Category::active()->orderBy('id','asc')->get();
		$categoriesChilds = CategoriesChild::where('active','=',1)->get();
		$product = Products::find($id);
		return view('administrator.pages.products.edit',compact('product','categorys','categoriesChilds'));
	}
	//----------Update product------------------
	public function PostEdit($id,Request $request)
	{
		$request->validate(
			[
				'category_id' 			=> 'required',
				'categories_child_id' 	=> 'required',
				'name' 					=> 'required',
				'unit_price' 			=> 'required',
				'quantity' 				=> 'required',
				'is_new'				=> 'required',
				'status'				=> 'required'
			],
			[
				'category_id.required' 			=> 'Category not null',
				'categories_child_id.required' 	=> 'Categories child not null',
				'name.required' 				=> 'Name not null',
				'unit_price.required' 			=> 'Unit price not null',
				'quantity.required'				=> 'Quantity not null',
				'is_new.required'				=> 'Please select is new',
				'status.required'				=>'Please select status'
			]
		);
		$product = Products::find($id);
		$product->fill($request->all());
		if ($request->hasFile('symbolic_image')) {
			$file_name = uniqid().".".$request->symbolic_image->extension();
			$path = $request->symbolic_image->storeAs('images/products',$file_name);
			$product->symbolic_image = $path;
		}
		$product->save();
		$categorys = Category::active()->orderBy('id','asc')->get();
		$categoriesChilds = CategoriesChild::where('active','=',1)->get();
		return redirect()->back()->with('alert_success','Saved product');
	}
	//------------Delete product by id---------
	public function Delete($ids)
	{
		if (!$ids) {
			return abort(404);
		}
		$listId = explode(',', $ids);
		if (count($listId)>1) {
			foreach ($listId as $id) {
				$galery = ProductGalery::where('product_id',$id)->get();
				if (count($galery)==1) {
					$galery->delete();
				}elseif(count($galery)>1){
					foreach ($galery as $item) {
						$item->delete();
					}
				}
				$product = Products::find($id);
				if ($product) {
					$product->delete();
				}
			}
		}else{
			$galery = ProductGalery::where('product_id',$ids)->get();
				if (count($galery)==1) {
					$galery->delete();
				}elseif(count($galery)>1){
					foreach ($galery as $item) {
						$item->delete();
					}
				}
				$product = Products::find($ids);
				if ($product) {
					$product->delete();
				}
		}
		return redirect()->back()->with('alert_success','Deleted product');
	}
	//-----------Add galery product --------
	public function AddGalery(Request $request){
		$request->validate([
            'galery_edit'=>	'required'
        	],[
            'galery_edit.required'	=>	'galery is not be null'
        	]);
        if ($request->hasFile('galery_edit')){
	            $galeryItem = new ProductGalery();
	            $galeryItem->product_id = $request->product_id;
	            $filename = uniqid().".".$request->galery_edit->extension();
	            $path = $request->file('galery_edit')->move('images/galery/pro_'.$request->product_id,$filename);
	            $galeryItem->image_url = $path;
	            $galeryItem->save();
            }
        return redirect()->back()->with('alert_success','Add galery success');
	}
	//Delete galery by Id
	public function DeleteGalery($id){
		if (!$id) {
			return abort(404);
		}
		$galery = ProductGalery::find($id);
		if ($galery) {
			$galery->delete();
		}
		return redirect()->back()->with('alert_success','Deleted Galery');
	}
}
