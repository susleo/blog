<?php

namespace App\Http\Middleware;

use Closure;

class verifyIsAdmin
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
        if(!auth()->user()->isAdmin()){
            session()->flash('error','Access Denied !! Contact Admin For More...');
           return redirect(route('home'));
        }
        return $next($request);
    }
}
