<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Category;
use App\CategoriesChild;
use App\Products;
use App\Orders;
use App\OrderDetail;
use App\OrderStatus;
use App\Comments;
use App\User;
use App\Banners;
use App\Cart;



class PageController extends Controller
{   
	
	// Home page
    public function Index()
    {
    	// Get products is new
        $new_products=Products::where('is_new',1)
            ->where('status',1)
            ->where('quantity','>',0)
            ->take(12)
            ->get();

        // Get banners
        $banners=Banners::where('status',1)->get();
        return view('pages.homepage',compact('new_products','banners'));
    }


    // Get list products
    public function ListProducts($id,Request $request)
    {
        //Lấy ra tên danh mục
        if($id=='all'){

            $name_categories_child='All products';

        }else

            $name_categories_child=CategoriesChild::select('id','name')->where('id',$id)->first();

        

        //Lấy ra tất cả danh mục
        $categories_child=CategoriesChild::all();

        //Tìm kiếm sản phẩm
        if ($request->keyword) {

                $products=Products::where(' categories_child_id',$id)

                                ->where('name','like',"%$request->keyword%")

                                ->where('status',1)

                                ->where('quantity','>',1)

                                ->paginate(12);

                $products->setPath(route('list.products',['categories_child_id'=>$id]));

                $products->withPath( route('list.products',['categories_child_id'=>$id]).'?keyword=' . $request->keyword);

        } 

        if($id=='all'){

             $products=Products::where('status',1)
             ->where('quantity',1)
             ->paginate(12);
        }
            //Lấy ra danh sách sản phẩm theo id category child
            $products=Products::where('categories_child_id',$id)
            ->where('status',1)
            ->where('quantity','>',0)
            ->paginate(12);
    

        // Điều hướng về view danh sách sản phẩm
        return view('pages.shop',compact('products','categories_child','name_categories_child'));
    }

    // Detail product
    public function DetailProducts($id,Request $request)
    {
    	echo 'detail';
    }

    // Comment product
    public function PostComment(Request $request)
    {
    	echo 'post comment';
    }

    // My order
    public function MyOrder()
    {
    	echo 'my order';
    }

    // Detail order
    public function DetailOrder($id,Request $request)
    {
    	echo 'detail order';
    }
}
