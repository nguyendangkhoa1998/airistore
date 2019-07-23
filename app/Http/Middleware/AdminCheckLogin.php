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
        if (Auth::check()) {
            if (Auth::user()->role > 1) {
                return $next($request);
            }else{
                return redirect(route('admin.login'))->with('alert', 'There is not enough permissions to continue access');
            }
        }else{
            return redirect()->route('admin.login')->with('alert','Please login to continue !');
        }
    }
}
