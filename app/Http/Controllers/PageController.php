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
	/* --- Home page --- */
    public function Index()
    {
        $new_products = Products::where('is_new',1)
        ->status()
        ->quantity()
        ->take(12)
        ->get();

        $top_view_products = Products::where('status',1)
        ->quantity()
        ->orderBy('views','desc')
        ->take(8)
        ->get();

        $banners = Banners::where('status',1)->get();

        // $sql="select products.name as name, sum(order_detail.quantity) as quantity from order_detail join products on order_detail.product_id = product.id
        //     group by order_detail.product_id order by quantity desc";

        return view('pages.homepage',compact('new_products','top_view_products','banners'));
    }


    /* --- Get list products --- */
    public function ListProducts($idCategories,Request $request)
    {
        $categories_child = CategoriesChild::where('active','>',0)
        ->orderBy('id','asc')
        ->get( );

        if ($idCategories==='all') {

            $name_categories_child = 'All products';

           if ($request->keyword) {

                $products=Products::where('name','like',"%$request->keyword%")
                ->status()
                ->quantity()
                ->paginate(16);
                $products->setPath(route('list.products',['id'=>'all']))
                ->withPath(route('list.products',['id'=>'all']).'?keyword='.$request->keyword);

            }else{

                $products = Products::status()
                ->quantity()
                ->paginate(16);
                
            }

            return view('pages.shop',compact('categories_child','products','name_categories_child'));

        }else{

            $getCategories = CategoriesChild::find($idCategories);

            $name_categories_child = $getCategories->name;

            if ($request->keyword) {

               $products=Products::where('name','like',"%$request->keyword%")
                ->where('categories_child_id','=',$idCategories)
                ->status()
                ->quantity()
                ->paginate(16);
                $products->setPath(route('list.products',['id'=>$idCategories]))
                ->withPath(route('list.products',['id'=>$idCategories]).'?keyword='.$request->keyword);

            }else{

                 $products=Products::where('name','like',"%$request->keyword%")
                ->where('categories_child_id','=',$idCategories)
                ->status()
                ->quantity()
                ->paginate(16);

            }

            return view('pages.shop',compact('categories_child','products','name_categories_child'));

        }

        
    }


    /* --- Detail product --- */
    public function DetailProducts($id,Request $request)
    {
        $comments = Comments::where('product_id',$id)
        ->orderBy('created_at','desc')
        ->get();

        $detail = Products::find($id);
        // Views ++
        $detail->views=++$detail->views;

        $detail->save();

        // Điều hướng về view home
        return view('pages.detail_product',compact('detail','comments'));

    }



    /* --- Comment product --- */
    public function PostComment(Request $request)
    {
        $product=Products::where('id',$request->product_id)
        ->status()
        ->quantity()
        ->first();
        $product=new Products;
        $product->views=--$product->views;

        $request->validate([
            'name'  => 'required|max:20|min:2',
            'email' => 'required|max:30|min:2'
        ],[
            'name.required'  => 'name must not be empty',
            'name.max'       => 'name no more than 20 characters',
            'name.min'       => 'name no less than 2 characters',
            'email.required' => 'email must not be empty',
            'email.max'      => 'email no more than 30 characters',
            'email.min'      => 'email no less than 10 characters',
        ]);

        if (Auth::check())
        {
            $comment = new Comments;
            $comment->user_id=Auth::id();
            $comment->product_id=$request->product_id;
            $comment->fill($request->all());
            $comment->save();
        }
        else
        {
            $comment = new Comments;
            $comment->user_id=null;
            $comment->product_id=$request->product_id;
            $comment->fill($request->all());
            $comment->save();
        }

        return redirect(route('detail.product',['id'=>$request->product_id]))
        ->with('alert','Comment Success');
    }

    /* --- My order --- */
    public function MyOrder()
    {
    	return view('pages.my_order');
    }

    // Detail order
    public function DetailOrder($id,Request $request)
    {
    	echo 'detail order';
    }
}
