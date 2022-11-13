<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isNotLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() != null) {

            if ($request->user()->role == 'user') {
                return redirect('/profile92');
            }

            if ($request->user()->role == 'admin') {
                return redirect('/dashboard92');
            }
        }

        return $next($request);
    }
}
