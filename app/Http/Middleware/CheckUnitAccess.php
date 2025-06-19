<?php

namespace App\Http\Middleware;

use App\Models\Insiden\Insiden_unit_user;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUnitAccess
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

         if (Auth::check()) {
            $user = Auth::user();
            // Cek apakah user ini terdaftar di tabel unit
            $exists = Insiden_unit_user::where('users_id', $user->id)->exists();

            if (! $exists) {
                session()->flash('error', 'User Anda Belum di Mapping ke Unit Kerja, silahkan hubungi Admin PMKP..');
                Auth::logout(); // Logout user jika tidak terdaftar
                return redirect('/login');
            }
        }
        return $next($request);
    }
}
