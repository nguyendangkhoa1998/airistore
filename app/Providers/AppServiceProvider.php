<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Cart;
use Session;
use App\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        //Get menu
        View::composer('layouts.header', function ($view)
        {
            $menus=Category::where('active',1)->get();
            $view->with('menus',$menus);
        });
        // Mini cart
        view::composer('layouts.mini_cart',function($view)
        {
            if (Session('cart'))
            {
                $oldCart=Session::get('cart');
                $cart=new Cart($oldCart);
                $view->with([
                    'cart'=>Session::get('cart'),
                    'product_cart'=>$cart->items,
                    'totalPrice'=>$cart->totalPrice,
                    'totalQty'=>$cart->totalQty
                    ]);
            }
        });
    }
}
