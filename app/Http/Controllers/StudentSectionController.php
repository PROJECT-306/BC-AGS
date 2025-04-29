<?php

namespace App\Http\Controllers;

use App\Models\StudentSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentSectionController extends Controller
{
    public function __construct()
    {
        $allowedRoles = [1, 3, 4];

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
        $studentSections = StudentSection::all();
        return view('main.add.add_student_section', compact('studentSections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("");
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
