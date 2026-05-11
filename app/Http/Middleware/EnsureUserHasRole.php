<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Usage: ->middleware('role:Admin|Petugas')
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        $user = $request->user();

        if (! $user) {
            abort(401);
        }

        $allowed = collect(explode('|', $roles))
            ->filter()
            ->some(fn (string $role) => $user->hasRole($role));

        abort_unless($allowed, 403);

        return $next($request);
    }
}

