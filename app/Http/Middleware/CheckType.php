<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckType
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
        if (auth()->user()->isVerified != 1  ) {
            return redirect()->back()->with('error', 'You are not a seller yet. Please add your listing to be a seller.');
        }
        return $next($request);
    }
}
