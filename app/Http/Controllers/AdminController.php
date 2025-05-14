<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Assessment;
class AdminController extends Controller
{
    public function dashboard()
    {
    return view('admindashboard');
    }
    public function admindashstudents()
    {
        return view('admindashstudents');
    }
    public function admindashassessments()
    {
        return view('admindashassessments');
    }
    public function admindashreports()
    {
        return view('admindashreports');
    }
    public function admindashsettings()
    {
        return view('admindashsettings');
    }
    public function storeAssessment(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required|string',
        'link' => 'nullable|url',
    ]);

    $assessment = new Assessment();
    $assessment->user_id = Auth::id();
    $assessment->name = $validated['name'];
    $assessment->description = $validated['description'];
    $assessment->status = $validated['status'];
    $assessment->link = $validated['link'] ?? null;
    $assessment->save();

    return redirect()->route('admindashassessment')->with('success', 'Assessment added successfully.');
 }
}
