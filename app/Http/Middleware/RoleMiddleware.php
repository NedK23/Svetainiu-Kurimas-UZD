<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        $roles = explode('|', $roles);
        $user = Auth::user();
        if (!$user) {
            return redirect('login');
        }
        if (!$user->roles->pluck('name')->intersect($roles)->isNotEmpty()) {
            return redirect('login');
        }
        return $next($request);
    }
}
