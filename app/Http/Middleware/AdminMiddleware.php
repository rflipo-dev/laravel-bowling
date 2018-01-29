<?php 

namespace Bowling\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guest() || !$request->user()->canAccessAdmin())
        {
            return redirect(route('admin_login'));
        }

        return $next($request);
    }

}