<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        if (in_array($request->user()->admin_insiden, $levels)) {
            return $next($request);
        }
        session()->flash('error', 'Anda tidak memiliki akses Administrator.....!');
        Auth::guard('web')->logout();

        return redirect('/');
    }
}
