<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckAuth
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('user')) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            return redirect()->route('login')->withErrors(['auth' => 'Anda harus login terlebih dahulu']);
        }

        return $next($request);
    }
}