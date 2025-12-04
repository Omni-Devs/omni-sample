<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetCurrentBranch
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
{
    if (auth()->check()) {
        $branchId = $request->input('branch_id') ?? session('branch_id');

        if (!$branchId) {
            $first = auth()->user()->branches()->first();
            if ($first) {
                session(['branch_id' => $first->id]);
            }
        } else {
            // Validate access
            $exists = auth()->user()->branches()->where('branch_id', $branchId)->exists();
            if ($exists) {
                session(['branch_id' => $branchId]);
            }
        }
    }

    return $next($request);
}
}
