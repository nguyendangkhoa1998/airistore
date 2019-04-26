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

        $top_view_products=Products::where('status',1)
            ->where('quantity','>',0)
            ->orderBy('views','desc')
            ->take(8)
            ->get();
        $sql="select products.name as name, sum(order_detail.quantity) as quantity from order_detail join products on order_detail.product_id = product.id
            group by order_detail.product_id order by quantity desc";
        // Get banners
        $banners=Banners::where('status',1)->get();
        return view('pages.homepage',compact('new_products','top_view_products','banners'));
    }


    // Get list products
    public function ListProducts($id,Request $request)
    {
        // Get name current categories child 
        if($id=='all'){

            $name_categories_child='All products';

        }else{

            $get_child=CategoriesChild::select('name')->where('id',$id)->first();

            $name_categories_child=$get_child->name;

        }

        // Get all navigation
        $categories_child=CategoriesChild::where('active',1)->get();

        //Get products by id categories chlid
        $products=Products::where('categories_child_id',$id)
            ->where('status',1)
            ->where('quantity','>',0)
            ->paginate(12);

        //search products 
        if ($request->keyword) {

                $products=Products::where('categories_child_id',$id)

                    ->where('name','like',"%$request->keyword%")

                    ->where('status',1)

                    ->where('quantity','>',0)

                    ->paginate(12);

                $products->setPath(route('list.products',['categories_child_id'=>$id]));

                $products->withPath( route('list.products',['categories_child_id'=>$id]).'?keyword=' . $request->keyword);
        } 

        //Get all products
        if($id=='all'){

            //search products 
                if ($id=='all' && $request->keyword) {

                        $products=Products::where('name','like',"%$request->keyword%")

                                        ->where('status',1)

                                        ->where('quantity','>',0)

                                        ->paginate(12);

                        $products->setPath(route('list.products',['categories_child_id'=>'all']));

                        $products->withPath( route('list.products',['categories_child_id'=>'all']).'?keyword=' . $request->keyword);

                } 

            $products=Products::where('status',1)
            ->where('quantity','>',0)
            ->paginate(12);

        }

        return view('pages.shop',compact('products','categories_child','name_categories_child'));
    }

    // Detail product
    public function DetailProducts($id,Request $request)
    {
        $comments=Comments::where('product_id',$id)
        ->orderBy('created_at','desc')
        ->get();

    	$detail=Products::where('id',$id)
            ->where('status',1)
            ->where('quantity','>',0)
            ->first();

        // Views ++
        // $detail->views=++$detail->views;

        $detail->save();

        // Điều hướng về view home
        return view('pages.detail_product',compact('detail','comments'));

    }

    // Comment product
    public function PostComment(Request $request)
    {

        $request->validate([
            'name'  => 'required|max:20|min:2',
            'email' => 'required|max:30|min:2'
        ],[
            'name.required' => 'name must not be empty',
            'name.max'=>'name no more than 20 characters',
            'name.min'=>'name no less than 2 characters',
            'email.required'=>'email must not be empty',
            'email.max'=>'email no more than 30 characters',
            'email.min'=>'email no less than 10 characters',
        ]);
        if (Auth::check()) {
            $detail =new Detail;
            $comment=new Comments;
            $comment->user_id=Auth::id();
            $comment->name=Auth::user()->name;
            $comment->email=Auth::user()->email;
            $comment->product_id=$request->product_id;
            $comment->content=$request->comment;
            $comment->save();
            }else{
            $detail =new Products;
            $comment=new Comments;
            $comment->user_id=null;
            $comment->name=$request->name;
            $comment->email=$request->email;
            $comment->product_id=$request->product_id;
            $comment->content=$request->comment;
            $comment->save();
            }

            return redirect(route('detail.product',['id'=>$request->product_id]))
            ->with('alert','Comment Success');

    }

    // My order
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
