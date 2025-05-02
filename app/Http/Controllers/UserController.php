<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        // Middleware is handled by route group
    }

    public function index()
    {
        $users = User::with('userRole')->get();

        return view("main.view.view_users", compact("users"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'user_email' => 'nullable|email|unique:users,email',
            'user_password' => 'required|string|min:6',
            'user_role' => 'required|integer|in:1,2,3,4,5', // Only valid role IDs
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'surname' => $request->surname,
            'user_email' => $request->user_email,
            'user_password' => Hash::make($request->user_password),
            'user_role_id' => $request->user_role,
        ]);

        return response()->json($user, 201);
    }

    public function show($id)
    {
        return response()->json(User::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->only(['first_name', 'middle_name', 'surname', 'user_email', 'user_role']));
        return response()->json($user);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return response()->json(['message' => 'User deleted']);
    }
}
