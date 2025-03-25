<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        return response()->json(Department::all());
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:departments,name']);
        $department = Department::create($request->only('name'));
        return response()->json($department, 201);
    }

    public function show($id)
    {
        return response()->json(Department::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        $department->update($request->only('name'));
        return response()->json($department);
    }

    public function destroy($id)
    {
        Department::destroy($id);
        return response()->json(['message' => 'Department deleted']);
    }
}
