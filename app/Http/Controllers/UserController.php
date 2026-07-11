<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display all users
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $users = User::with('role')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return view('users.index', compact(
            'users',
            'search'
        ));
    }

    /**
     * Show create form
     */
    public function create()
    {
        $roles = Role::orderBy('role_name')->get();

        return view('users.create', compact('roles'));
    }

    /**
     * Store user
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'role_id' => 'required|exists:roles,id',
            'password' => 'required|min:8|confirmed',

        ]);

        User::create([

            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password),

        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Show edit form
     */
    public function edit(User $user)
    {
        $roles = Role::orderBy('role_name')->get();

        return view('users.edit', compact(
            'user',
            'roles'
        ));
    }

    /**
     * Update user
     */
    public function update(Request $request, User $user)
    {
        $request->validate([

            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role_id' => 'required|exists:roles,id',

        ]);

        $data = [

            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,

        ];

        if ($request->filled('password')) {

            $request->validate([

                'password' => 'min:8|confirmed',

            ]);

            $data['password'] = Hash::make($request->password);

        }

        $user->update($data);

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Delete user
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'User deleted successfully.');
    }
}