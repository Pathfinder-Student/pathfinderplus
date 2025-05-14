<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Assessment;
use Illuminate\Support\Facades\DB;
use App\Models\Result;
use App\Models\User;
use App\Models\Student;
class AdminController extends Controller
{
    public function dashboard()
    {
        $takenCount = Result::where('description', 'Academic and Personality Skills')
                        ->distinct('user_id')
                        ->count('user_id');
    return view('admindashboard', compact('takenCount'));
    }
    public function admindashstudents()
    {
        $users = User::where('usertype', 'student')->get();
    return view('admindashstudents', compact('users'));  
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
    $assessment->user_id = null;
    $assessment->name = $validated['name'];
    $assessment->description = $validated['description'];
    $assessment->status = $validated['status'];
    $assessment->link = $validated['link'] ?? null;
    $assessment->save();

    return redirect()->route('admindashassessments')->with('success', 'Assessment added successfully.');
}

 public function showStrandReport()
{
    $strandCounts = DB::table('results')
        ->select('recommended_strand', DB::raw('count(*) as total'))
        ->groupBy('recommended_strand')
        ->pluck('total', 'recommended_strand');

    return view('admindashreports', compact('strandCounts'));
}
public function editAssessment($name)
{
    $assessment = Assessment::where('name', $name)->firstOrFail();
    return view('edit-assessment', compact('assessment'));
}

public function deleteAssessment($name)
{
    Assessment::where('name', $name)->delete();
    return back()->with('success', 'Assessment deleted.');
}
public function show($id)
{
    $user = User::findOrFail($id);
    return view('user.profile', compact('user'));
}
}
