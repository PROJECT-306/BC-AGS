<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function index()
    {
        $userRoles = UserRole::all();

        return view("main.view.view_user_role", compact("userRoles"));
    }

    public function create()
    {
        return view("main.add.add_user_role");
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_role_number'  => 'required|string|max:255',
            'user_role_name'  => 'required|string|max:255',
        ]);

        UserRole::create($request->all());
        return redirect()->route('user-roles.index')->with('success', 'User Role Added');
    }

    public function show($id)
    {
        return response()->json(UserRole::findOrFail($id));
    }

    public function edit($id)
    {
        $userRoles = UserRole::findOrFail($id);

        return view("main.edit.edit_user_role", compact("userRoles"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_role_number'  => 'required|string|max:255',
            'user_role_name'  => 'required|string|max:255',
        ]);

        $userRoles = UserRole::findOrFail($id);
        $userRoles->update($request->all());

        return redirect()->route('user-roles.index')->with('success', 'User Role Updated');
    }

    public function destroy($id)
    {
        UserRole::destroy($id);
        return redirect()->route('user-roles.index')->with('success', 'User Role Deleted');
    }
}
