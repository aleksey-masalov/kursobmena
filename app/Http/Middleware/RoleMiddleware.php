<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Closure;

class RoleMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param string $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            abort(404);
//            return redirect($this->redirectTo());
        }

        if (!Auth::user()->hasRole($role)) {
            abort(404);
//            return redirect($this->redirectTo());
        }

        return $next($request);
    }

    /**
     * @return string
     */
    private function redirectTo()
    {
        return homeRoute();
    }
}
