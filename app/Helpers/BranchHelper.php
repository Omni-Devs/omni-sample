<?php

if (!function_exists('current_branch_id')) {
    function current_branch_id()
    {
        $user = auth()->user();

        // Priority order (highest → lowest)
        return request()->header('X-Selected-Branch')
            ?? session('branch_id')
            ?? request()->cookie('branch_id')
            ?? request()->input('branch_id')           // from query string
            ?? ($user?->getRememberToken() ? cache("user_{$user->id}_branch") : null) // optional: cache
            ?? $user?->branches()->first()?->id
            ?? null;
    }
}

if (!function_exists('current_branch')) {
    function current_branch()
    {
        $id = current_branch_id();
        return $id ? \App\Models\Branch::find($id) : null;
    }
}