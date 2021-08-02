<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
 
class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(Session::get('role') == 'admin'){
            return $next($request);
        }
        return redirect('loginadmin');
    
    }
}
