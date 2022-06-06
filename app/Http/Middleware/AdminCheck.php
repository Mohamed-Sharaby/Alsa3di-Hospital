<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminCheck
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
       // if (auth('admin')->guest()) return redirect()->route('admin.login');
        if (auth()->user()->is_active == 0) {
            auth()->logout();
            return back()->with('error','لقد تم حظر الحساب الخاص بك من قبل الادارة');
        }
        return $next($request);
    }
}
