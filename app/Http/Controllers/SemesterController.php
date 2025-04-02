<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::all();

        return view("main.view.view_semester", compact("semesters"));
    }

    public function create()
    {
        return view("main.add.add_semester");
    }

    public function store(Request $request)
    {
        $request->validate([
            'semester_name' => 'required|string|unique:semesters,semester_name',
        ]);

        Semester::create($request->all());
        return redirect()->route('semesters.index')->with('success', 'Semester Added');
    }

    public function show($id)
    {
        return response()->json(Semester::findOrFail($id));
    }

    public function edit($id)
    {
        $semesters = Semester::findOrFail($id);

        return view("main.edit.edit_semester", compact("semesters"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'semester_name' => 'required|string|unique:semesters,semester_name',
        ]);

        $semesters = Semester::findOrFail($id);
        $semesters->update($request->all());

        return redirect()->route('semesters.index')->with('success', 'Semester Updated');
    }

    public function destroy($id)
    {
        Semester::destroy($id);
        return redirect()->route('semesters.index')->with('success', 'Semester Deleted');
    }
}
