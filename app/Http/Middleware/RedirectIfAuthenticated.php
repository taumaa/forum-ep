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
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();
                
                // Redirect based on user type
                switch ($user->type) {
                    case 'admin':
                        return redirect()->route('admin.home');
                    case 'student':
                        return redirect()->route('student.home');
                    case 'company':
                        return redirect()->route('company.home');
                    default:
                        return redirect('/');
                }
            }
        }

        return $next($request);
    }
} 