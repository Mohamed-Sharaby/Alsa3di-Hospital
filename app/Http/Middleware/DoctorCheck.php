<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DoctorCheck
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
        if (auth()->user()->role != 'doctor') {
            auth()->logout();
            return back()->with('error','عفوا .. هذا الحساب لا يمتلك صلاحية الطبيب');
        }
        return $next($request);
    }
}
