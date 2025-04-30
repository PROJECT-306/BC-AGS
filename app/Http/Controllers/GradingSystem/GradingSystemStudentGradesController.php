<?php

namespace App\Http\Controllers\GradingSystem;


use App\Models\GradingSystem\
{
    GradingSystemStudentGrades,
};

use App\Models\
{
    Student,
    ClassSection,
    GradingPeriod,
};

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GradingSystemStudentGradesController extends Controller
{
    public function __construct()
    {
        $allowedRoles = [1, 3];

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
        $students = Student::all();
        $classSections = ClassSection::all();
        $gradingPeriods = GradingPeriod::all();

        return view();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
