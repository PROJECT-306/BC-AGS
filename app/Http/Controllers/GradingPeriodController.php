<?php

namespace App\Http\Controllers;

use App\Models\GradingPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradingPeriodController extends Controller
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
        $gradingPeriods = GradingPeriod::all();

        return view("main.view.view_grading_period", compact("gradingPeriods"));
    }

    public function create()
    {
        return view("main.add.add_grading_period");
    }

    public function store(Request $request)
    {
        $request->validate([
            'grading_period_name' => 'required|string|unique:grading_periods,grading_period_name',
        ]);

        GradingPeriod::create($request->all());
        return redirect()->route('grading-periods.index')->with('success', 'Grading Period Added');
    }

    public function show($id)
    {
        return response()->json(GradingPeriod::findOrFail($id));
    }

    public function edit($id)
    {
        $gradingPeriods = GradingPeriod::findOrFail($id);

        return view("main.edit.edit_grading_period", compact("gradingPeriods"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'grading_period_name' => 'required|string|unique:grading_periods,grading_period_name',
        ]);

        $gradingPeriods = GradingPeriod::findOrFail($id);
        $gradingPeriods->update($request->all());

        return redirect()->route('grading-periods.index')->with('success', 'Grading Period Updated');
    }

    public function destroy($id)
    {
        GradingPeriod::destroy($id);
        return redirect()->route('grading-periods.index')->with('success', 'Grading Period Deleted');
    }
}
