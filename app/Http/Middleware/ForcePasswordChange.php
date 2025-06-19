<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForcePasswordChange
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
        $user = Auth::user();

        // Pastikan pengguna login
        if ($user) {
            $passwordChangedAt = $user->password_changed_at;
            // Jika password belum pernah diubah, atau sudah lebih dari 90 hari
            if (!$passwordChangedAt || Carbon::parse($passwordChangedAt)->addDays(90)->isPast()) {
                return redirect()->route('ganti.password.')->with('error', 'Anda harus mengganti password sebelum melanjutkan.');
            }
        }
        return $next($request);
    }
}
