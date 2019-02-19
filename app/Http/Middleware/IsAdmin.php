<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (in_array(Auth::user()->role_id, [1, 2])) {
            return $next($request);
        } else {
            return redirect()->back()->withErrors(array('error' => 'You don\'t have access to this page.'));
        }
    }
}
