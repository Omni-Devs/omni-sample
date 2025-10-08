<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    // Display a listing of users
    public function index(Request $request)
    {
        $status = $request->get('status', 'active'); // default to active

        $users = User::where('status', $status)->get();
        $nextUserId = User::max('id') + 1;
        $roles = Role::all();

        return view('users.index', compact('users', 'nextUserId', 'roles'));
    }

    public function create()
    {
        return view('users.create');
    }

    // Store a newly created user
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username',
        'email' => 'required|string|email|max:255|unique:users,email',
        'password' => 'required|string|min:4',
        'mobile_number' => 'required|string|max:20',
        'roles' => 'required|array',
        'roles.*' => 'exists:roles,id', // validate each role ID
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        'address' => 'nullable|string|max:255',
    ]);

    // 🔹 Handle image upload (optional)
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('users', 'public');
    }

    // 🔹 Create user
    $user = User::create([
        'name' => $validated['name'],
        'username' => $validated['username'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'mobile_number' => $validated['mobile_number'],
        'address' => $validated['address'] ?? '',
        'image' => $imagePath,
        'active' => true,
    ]);

    // 🔹 Attach roles (pivot table)
    $user->roles()->sync($validated['roles']);

    return redirect()
        ->route('users.index')
        ->with('success', 'User created successfully!');
    }

    // Display the specified user
    public function show($id)
    {
    $user = User::findOrFail($id);

    return view('users.show', compact('user'));
    }

    // Update the specified user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $id,
            'password' => 'sometimes|string|min:4',
        ]);
        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }
        $user->update($validated);
        return response()->json($user);
    }

    // Remove the specified user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'User deleted']);
    }

    public function viewProfile($id)
    {
        $user = User::findOrFail($id);

        // Load a Blade view and pass user data to it
        $pdf = Pdf::loadView('users.profile-pdf', compact('user'));

        // Download directly
        return $pdf->download($user->name . '.pdf');
    }

    public function archive(User $user)
    {
        $user->update(['status' => 'archived']);
        return redirect()->route('users.index', ['status' => 'active'])
                        ->with('success', 'User moved to archive.');
    }

    public function restore(User $user)
    {
        $user->update(['status' => 'active']);
        return redirect()->route('users.index', ['status' => 'archived'])
                        ->with('success', 'User restored successfully.');
    }

}
