<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = Auth::user()->level;
                switch ($role) {
                    case 1:
                        return redirect('/member');
                        break;
                    case 2:
                        return redirect('/manager/dashboard');
                        break;
                    case 3:
                        return redirect('/member/progress');
                        break;
                    default:
                        return redirect('/login');
                        break;
                }
            }
        }

        return $next($request);
    }
}
