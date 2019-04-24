<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminCheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::user()) {


                return redirect(route('admin.login'))->with('msg', 'Please login to continue !') ;

        }
        if (Auth::user()->role <= 1) {

                    return redirect(route('admin.login'))->with('msg', 'Không có quyền truy cập');

        }

        return $next($request);
    }
}
