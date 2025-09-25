<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display a listing of users
    public function index()
    {
        $users = User::all();
        $nextUserId = User::max('id') + 1;
        $branches = Branch::all();
        return view('users.index', compact('users', 'nextUserId', 'branches'));
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
        'role' => 'required|string',
        'branch_id' => 'required|array',
        'branch_id.*' => 'exists:branches,id', // validate each branch id
    ]);
    $user = User::create([
        'name' => $validated['name'],
        'username' => $validated['username'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'mobile_number' => $validated['mobile_number'],
        'role' => $validated['role'],
        'address' => $request->input('address', ''),
    ]);

   // Attach multiple branches via pivot
    $user->branches()->sync($validated['branch_id']);

    return redirect()->route('users.index')->with('success', 'User created successfully!');
}

    // Display the specified user
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
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
}
