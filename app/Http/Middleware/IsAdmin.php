<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request); // السماح بالوصول إذا كان المستخدم Admin
        }

        // إعادة التوجيه إذا لم يكن المستخدم Admin
        return redirect('/')->with('error', 'You do not have access to this page.');
        
    }

}