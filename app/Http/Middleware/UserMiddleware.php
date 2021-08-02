<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
 
class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(Session::get('role') == 'user'){
            return $next($request);
        }
        return redirect('/');
    }
}
