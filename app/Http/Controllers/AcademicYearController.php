<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    public function __construct()
    {
        $allowedRoles = [1, 3, 5];

        if(Auth::check() && !in_array(Auth::user()->user_role_id, $allowedRoles))
        {
            redirect()->route('dashboard')->with("error", "You don't have permission to access this page.")->send();
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academicYear = AcademicYear::all();
        return view("main.view.view_academic_year", compact("academicYear"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("main.add.add_academic_year");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'year_start' => 'required|integer|digits:4',
            'year_end' => 'required|integer|digits:4|gte:year_start',
        ]);

        AcademicYear::create($request->all());
        return redirect()->route('academic-years.index')->with('success', 'Academic Year Added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $academicYear = AcademicYear::findOrFail($id);

        return view("main.edit.edit_academic_year" ,compact("academicYear"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AcademicYear $academicYear)
    {
        $request->validate([
            'year_start' => 'required|integer|digits:4',
            'year_end' => 'required|integer|digits:4|gte:year_start',
        ]);

        $academicYear->update($request->all());
        return redirect()->route('academic-years.index')->with('success', 'Academic Year Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AcademicYear::destroy($id);
        return redirect()->route('academic-years.index')->with('success', 'Academic Year Deleted.');
    }
}
