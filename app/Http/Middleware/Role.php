<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param mixed ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

//        if($user->isAdmin())
//            return $next($request);

        foreach($roles as $role) {
            // Check if user has the role
            if($user->hasRole($role))
                return $next($request);
        }

        return response()->json(['message' => 'No permissions to access the resource.'], 403);
    }
}
