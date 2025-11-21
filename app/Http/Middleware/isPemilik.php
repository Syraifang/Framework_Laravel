<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class isPemilik
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $userRole = session('user_role');

        if ($userRole == 5) {
            return $next($request);
        }

        return back()->with('error', 'Akses ditolak.');
    }
}