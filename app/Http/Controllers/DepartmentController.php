<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $allowedRoles = [1, 3, 5];

        if(Auth::check() && !in_array(Auth::user()->user_role_id, $allowedRoles))
        {
            redirect()->route('dashboard')->with("error", "You don't have permission to access this page.")->send();
        }
    }

    public function index()
    {
        $departments = Department::with(
            [
                "courses"
            ]
        )->get();

        return view("main.view.view_department", compact("departments"));
    }

    public function create()
    {
        return view("main.add.add_department");
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required|string|unique:departments,department_name'
        ]);

        Department::create($request->all());
        return redirect()->route("departments.index")->with('success', 'Department Added');
    }

    public function show($id)
    {
        return response()->json(Department::findOrFail($id));
    }

    public function edit($id)
    {
        $departments = Department::findOrFail($id);

        return view("main.edit.edit_department", compact("departments"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'department_name' => 'required|string|unique:departments,department_name'
        ]);

        $departments = Department::findOrFail($id);
        $departments->update($request->all());

        return redirect()->route("departments.index")->with('success', 'Department Updated');
    }

    public function destroy($id)
    {
        Department::destroy($id);
        return redirect()->route("departments.index")->with('success', 'Department Added');
    }
}
