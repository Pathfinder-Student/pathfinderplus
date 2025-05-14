<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use App\Models\Assessment;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Result;
use Illuminate\Support\Str;
class StudentController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function showLogin()
    {
        if (Auth::check()) {
            if (session('usertype') === 'admin') {
                return redirect()->route('admindashboard');
            }
            return redirect()->route('studentdashboard');
        }

        return view('login');
    }

 public function studentdashboard()
{
    $student = Auth::user();


    $assessment = Assessment::firstOrCreate(
        [
            'user_id' => $student->id,
            'name' => 'Academic and Personality Skills',
        ],
        [
            'description' => 'Guides strand choice through personality and academic assessment',
            'status' => 'pending',
            'link' => route('assessment1'),
        ]
    );

    $assessments = Assessment::where('user_id', $student->id)->get();

    $results = Result::where('user_id', $student->id)->orderBy('date_taken', 'desc')->get();
    
    $takenCount = \App\Models\Result::where('description', 'Academic and Personality Skills')
                ->distinct('user_id')
                ->count('user_id');


    return view('studentdashboard', compact('student', 'assessments', 'results','takenCount'));
}


   public function dashboard()  
{
    $student = Auth::user();
    if (!$student) {
        return redirect()->route('login');
    }

    $results = Result::where('user_id', $student->id)->orderBy('date_taken', 'desc')->get();

    return view('studentdashboard', compact('student', 'assessments', 'results'));
}

public function login(Request $request)
{
    $credentials = $request->only('username', 'password');

    $admin = Admin::where('username', $credentials['username'])->first();
    if ($admin) {
        if ($admin->password === $credentials['password']) {
            Auth::login($admin);
            session(['usertype' => 'admin', 'username' => $admin->username]);
            return redirect()->intended('/admindashboard');
        } else {
            return back()->withErrors(['password' => 'Incorrect password.'])->withInput();
        }
    }

    $user = User::where('username', $credentials['username'])->first();
    if (!$user) {
        return back()->withErrors(['username' => 'Username does not exist.'])->withInput();
    }

    if ($user->password !== $credentials['password']) {
        return back()->withErrors(['password' => 'Incorrect password.'])->withInput();
    }

    Auth::login($user);
    session(['usertype' => 'student', 'username' => $user->username]);
    return redirect()->intended('/studentdashboard');
}
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('login');
    }

    public function recommendation()
    {
        return view('studentrecommendation');
    }

    public function editprofile()
    {
        return view('editprofile');
    }

    public function aboutthis()
    {
        return view('aboutthis');
    }

    public function examtest()
    {
        return view('examtest');
    }
    public function assessment1()
    {
        return view('assessment1');
    }
    public function assessment2()
    {
        return view('assessment2');
    }
    public function assessment3()
    {
        return view('assessment3');
    }
    public function assessment4()
    {
        return view('assessment4');
    }
    public function assessment5()
    {
        return view('assessment5');
    }
    public function assessment6()
    {
        return view('assessment6');
    }
   

public function submitAssessment1(Request $request)
{
    $answers = json_decode($request->answers, true);

    if (is_array($answers)) {
        \Log::info('Assessment1 Submitted Answers:', $answers);
    } else {
        \Log::warning('Assessment1 Submitted Answers is not an array or is null.');
    }
    
    session(['assessment1' => $answers]);
    return redirect()->route('assessment2');
}

public function submitAssessment2(Request $request)
{
    $answers = json_decode($request->answers, true);

    if (is_array($answers)) {
        \Log::info('Assessment2 Submitted Answers:', $answers);
    } else {
        \Log::warning('Assessment2 Submitted Answers is not an array or is null.');
    }

    session(['assessment2' => $answers]);
    return redirect()->route('assessment3');
}

public function submitAssessment3(Request $request)
{
    $answers = json_decode($request->answers, true);

    if (is_array($answers)) {
        \Log::info('Assessment3 Submitted Answers:', $answers);
    } else {
        \Log::warning('Assessment3 Submitted Answers is not an array or is null.');
    }

    session(['assessment3' => $answers]);
    return redirect()->route('assessment4');
}

public function submitAssessment4(Request $request)
{
    $answers = json_decode($request->answers, true);

    if (is_array($answers)) {
        \Log::info('Assessment4 Submitted Answers:', $answers);
    } else {
        \Log::warning('Assessment4 Submitted Answers is not an array or is null.');
    }

    session(['assessment4' => $answers]);
    return redirect()->route('assessment5');
}

public function submitAssessment5(Request $request)
{
    $answers = json_decode($request->answers, true);

    if (is_array($answers)) {
        \Log::info('Assessment5 Submitted Answers:', $answers);
    } else {
        \Log::warning('Assessment5 Submitted Answers is not an array or is null.');
    }

    session(['assessment5' => $answers]);
    return redirect()->route('assessment6');
}

public function submitAssessment6(Request $request)
{
    $answers = json_decode($request->input('answers'), true);
    session(['assessment6' => $answers]);

    $allAnswers = array_merge(
        (array) session('assessment1'),
        (array) session('assessment2'),
        (array) session('assessment3'),
        (array) session('assessment4'),
        (array) session('assessment5'),
        (array) session('assessment6')
    );

    $strandAnswers = array_values(array_filter($allAnswers, function ($answer) {
        return in_array(strtoupper($answer), ['STEM', 'ABM', 'HUMSS', 'GAS', 'TVL']);
    }));

    $personalityAnswers = array_values(array_filter($allAnswers, function ($answer) {
        return in_array(strtoupper($answer), ['A', 'B']);
    }));

    $personalityType = $this->determinePersonality($personalityAnswers);
    $recommendedStrand = $this->determineStrand($strandAnswers);
    $resultLabel = $this->mapStrandToLabel($recommendedStrand);

    Result::create([
        'user_id' => Auth::id(),
        'result' => $resultLabel,
        'recommended_strand' => $recommendedStrand,
        'personality_type' => $personalityType,
        'description' => 'Academic and Personality Skills',
        'date_taken' => now(),
        'status' => 'completed',
    ]);

       $assessment = Assessment::firstOrNew([
        'user_id' => Auth::id(),
        'name' => 'Academic and Personality Skills',
    ]);

    $assessment->description = 'Guides strand choice through personality and academic assessment';
    $assessment->link = route('studentdashboard');
    if ($assessment->status !== 'completed') {
        $assessment->status = 'completed';
    }
    $assessment->save();

    session()->forget([
        'assessment1', 'assessment2', 'assessment3',
        'assessment4', 'assessment5', 'assessment6'
    ]);

    return view('assessment6', [
        'resultLabel' => $resultLabel,
        'recommendedStrand' => $recommendedStrand,
        'personalityType' => $personalityType,
    ]);
}
public function showResult(Request $request)
{
    $allAnswers = array_merge(
        (array) session('assessment1'),
        (array) session('assessment2'),
        (array) session('assessment3'),
        (array) session('assessment4'),
        (array) session('assessment5'),
        (array) session('assessment6')
    );

    $recommendedStrand = $this->determineStrand($allAnswers);
    $personalityType = $this->determinePersonality($allAnswers);
    $resultLabel = $this->mapStrandToLabel($recommendedStrand);
    
    

    Result::create([
        'user_id' => auth()->id(),
        'recommended_strand' => $recommendedStrand,
        'personality_type' => $personalityType,
        'description' => 'Academic and Personality Skills',
        'result' => $resultLabel,
        'date_taken' => now(),
        'status' => 'completed',
    ]);

    return view('studentdashboard', compact('recommendedStrand', 'personalityType', 'resultLabel'));
}

public function viewResult($id)
{
    $result = Result::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

    return view('partials.assessment-result', compact('result'));
}

private function determineStrand($answers)
{
    $counts = [
        'STEM' => 0,
        'HUMSS' => 0,
        'ABM' => 0,
        'GAS' => 0,
        'TVL' => 0,
    ];

    foreach ($answers as $answer) {
        $normalized = strtoupper(trim($answer));
        if (array_key_exists($normalized, $counts)) {
            $counts[$normalized]++;
        }
    }

    arsort($counts);
    return array_key_first($counts);
}

private function determinePersonality($answers)
{
    $introvert = 0;
    $extrovert = 0;

    foreach ($answers as $answer) {
        if (strtoupper($answer) === 'A') {
            $introvert++;
        } elseif (strtoupper($answer) === 'B') {
            $extrovert++;
        }
    }

    return $introvert >= $extrovert ? 'Introvert' : 'Extrovert';
}

private function mapStrandToLabel($strand)
{
    return match (strtoupper($strand)) {
        'STEM' => 'Above Average',
        'HUMSS' => 'Creative Thinker',
        'ABM' => 'Business-Oriented',
        'GAS' => 'Flexible Learner',
        'TVL' => 'Hands-On Worker',
        default => 'General',
    };
}
public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'email' => 'required|email',
        'contact' => 'required|string|max:15',
        'address' => 'required|string|max:255',
        'profile_picture' => 'nullable|image|max:2048'
    ]);

    $user->email = $request->email;
    $user->contact = $request->contact;
    $user->address = $request->address;

    if ($request->hasFile('profile_picture')) {
        $file = $request->file('profile_picture');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);
        $user->profile_picture = 'uploads/' . $filename;
    }

    $user->save();

    return back()->with('success', 'Profile updated successfully.');
}
public function Result($id)
{
    $result = result::findOrFail($id);

    return response()->json([
        'description' => $result->description,
        'date_taken' => \Carbon\Carbon::parse($result->date_taken)->format('F d, Y'),
        'result' => $result->result,
        'recommended_strand' => $result->recommended_strand,
    ]);
}

}