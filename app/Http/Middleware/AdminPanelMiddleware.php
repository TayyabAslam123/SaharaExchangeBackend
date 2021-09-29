<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class AdminPanelMiddleware
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
        if(Auth::user()->email=="admin@admin.com"){
            return $next($request);
        }
        
        return redirect('/');
   }
}
