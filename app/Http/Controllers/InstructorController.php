<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index()
    {
        return response()->json(Instructor::with('department')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'nullable|email|unique:instructors,email',
            'department_id' => 'required|exists:departments,id',
        ]);

        $instructor = Instructor::create($request->all());
        return response()->json($instructor, 201);
    }

    public function show($id)
    {
        return response()->json(Instructor::with('department')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $instructor = Instructor::findOrFail($id);
        $instructor->update($request->all());
        return response()->json($instructor);
    }

    public function destroy($id)
    {
        Instructor::destroy($id);
        return response()->json(['message' => 'Instructor deleted']);
    }
}
