<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Enterer
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

        if (Auth::user()->type == 'Enterer') {
            return $next($request);
        } else {
            return redirect()->route('mainpage')->withErrors('you are not login as an Enterer Employee -_- ');
        }
    }
}
