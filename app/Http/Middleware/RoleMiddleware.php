<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        // check if the user is authenticated and has the required role
        if(!auth()->check() || auth()->user()->role !== $role){
            return redirect('/')->with('error','You dont have the permission to enter this page');
        }
        return $next($request);
    }
}
