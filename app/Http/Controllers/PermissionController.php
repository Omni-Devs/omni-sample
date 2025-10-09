<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        // Get all roles
        $roles = Role::with('permissions')->get();

        // Return to your Blade view with data
        return view('settings.permission.index', compact('roles'));
    }

    // Show create form
    public function create()
    {
        $permissions = Permission::all();
        return view('settings.permission.create', compact('permissions'));
    }

    // Store new role with permissions
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:roles',
        'description' => 'nullable|string',
        'permissions' => 'required|array'
    ]);

    $role = Role::create([
        'name' => $request->name,
        'description' => $request->description,
        'guard_name' => 'web',
    ]);

    $role->syncPermissions($request->permissions);

    return redirect()->route('permissions.index')->with('success', 'Role created successfully.');
}


    // Edit role
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('name')->toArray();

        return view('permissions.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    // Update role and permissions
    public function update(Request $request, Role $role)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
        'description' => 'nullable|string',
        'permissions' => 'required|array'
    ]);

    $role->update([
        'name' => $request->name,
        'description' => $request->description,
    ]);

    $role->syncPermissions($request->permissions);

    return redirect()->route('permissions.index')->with('success', 'Role updated successfully.');
}

    // Delete role
    public function destroy(Role $role)
    {
        try {
            // Detach related models to avoid constraint issues
            $role->permissions()->detach();
            $role->users()->detach();

            $role->delete();

            return redirect()
                ->route('permissions.index')
                ->with('success', 'Role deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->route('permissions.index')
                ->with('error', 'Failed to delete role: ' . $e->getMessage());
        }
    }
}
