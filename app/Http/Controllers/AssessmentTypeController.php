<?php

namespace App\Http\Controllers;

use App\Models\AssessmentType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AssessmentTypeController extends Controller
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
        $assessmentTypes = AssessmentType::all();

        return view("main.view.view_assessment_type", compact("assessmentTypes"));
    }

    public function create()
    {
        return view("main.add.add_assessment_type");
    }

    public function store(Request $request)
    {
        $request->validate([
            'assessment_name' => 'required|string|max:255',
            'weight' => 'required|numeric|between:0.01,100',
        ]);

        AssessmentType::create($request->all());
        return redirect()->route('assessment-types.index')->with('success', 'Assessment Type Added.');
    }

    public function show($id)
    {
        return view('main.view.view_assessment_type_show', compact('assessmentType'));
    }

    public function edit($id)
    {
        $assessmentType = AssessmentType::findOrFail($id);

        return view("main.edit.edit_assessment_type", compact("assessmentType"));
    }

    public function update(Request $request, AssessmentType $assessmentType)
    {
        $request->validate([
            'assessment_name' => 'required|string|max:255',
            'weight' => 'required|numeric|between:0.01,100',
        ]);

        $assessmentType->update($request->all());

        return redirect()->route('assessment-types.index')->with('success', 'Assessment Type Updated.');
    }

    public function destroy($id)
    {
        AssessmentType::destroy($id);
        return redirect()->route('assessment-types.index')->with('success', 'Assessment Type Deleted.');
    }
}
