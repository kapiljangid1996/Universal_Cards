<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class UserAuth
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
        if( Auth::check() ) {
            if (Auth::user()->isUser()) {
                return $next($request);
            } else {
                return redirect()->route('admin.dashboard');
            }
        }
        return response()->view('pages.unauthorized');
    }
}
