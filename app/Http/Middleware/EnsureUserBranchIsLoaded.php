<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserBranchIsLoaded
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if (auth()->check()) {
            $user = auth()->user();

            // This is the magic line that fixes everything
            $user->loadMissing('branches');

            // Optional: save current branch to session (super fast later)
            if ($user->branches->isNotEmpty()) {
                session([
                    'current_branch_id' => $user->branches->first()->id,
                    'current_branch'    => $user->branches->first(),
                ]);
            }
        }

        return $next($request);
    }
}
