<?php

namespace App\Http\Middleware;

use Closure;

class Adminlogin
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
        if(empty($request->session()->has('adminSession'))){
            return redirect('/admin')->with('flash_message_error', 'Please Login to Access!');
        }
        return $next($request);
    }
}
