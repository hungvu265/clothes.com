<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class idSanPham
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->has('id')){
            return $next($request);
        }
        else{
            return redirect('store');
        }
    }
}
