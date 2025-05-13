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
         $assessments = Assessment::all();
    $student = Auth::user();

    $results = Result::where('user_id', $student->id)->orderBy('date_taken', 'desc')->get();

    return view('studentdashboard', compact('student', 'assessments', 'results'));
    }

    public function dashboard()
    {
        
        $student = Auth::user();
        if (!$student) {
            return redirect()->route('login');
        }

        return view('studentdashboard', compact('student','assessments'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $admin = Admin::where('username', $credentials['username'])->first();
        if ($admin && $admin->password === $credentials['password']) {
            Auth::login($admin);
            session([
                'usertype' => 'admin',
                'username' => $admin->username,
            ]);
            return redirect()->intended('/admindashboard');
        }

        $user = User::where('username', $credentials['username'])->first();
        if ($user && $user->password === $credentials['password']) {
            Auth::login($user);
            session([
                'usertype' => 'student',
                'username' => $user->username,
            ]);
            return redirect()->intended('/studentdashboard');
        }

        return back()->withErrors(['login' => 'Invalid username or password']);
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
    public function storeAssessment(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required|string',
        'link' => 'nullable|url',
    ]);

    Assessment::create([
        'student_id' => Auth::id(),
        'name' => $request->name,
        'description' => $request->description,
        'status' => $request->status,
        'link' => $request->link,
    ]);

    return redirect()->back()->with('success', 'Assessment added successfully.');
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

    // Filter answers to determine strand and personality
    $strandAnswers = array_values(array_filter($allAnswers, function ($answer) {
        return in_array(strtoupper($answer), ['STEM', 'ABM', 'HUMSS', 'GAS', 'TVL']);
    }));

    $personalityAnswers = array_values(array_filter($allAnswers, function ($answer) {
        return in_array(strtoupper($answer), ['A', 'B']);
    }));

    // Determine personality type and strand
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
        'status' => 'complete',
    ]);

    session()->forget([
        'assessment1', 'assessment2', 'assessment3',
        'assessment4', 'assessment5', 'assessment6'
    ]);

    return redirect()->route('studentdashboard')->with('success', 'Assessment saved successfully.');
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
        'status' => 'complete',
    ]);

    return view('admindashboard', compact('recommendedStrand', 'personalityType', 'resultLabel'));
}

public function viewResult($id)
{
    $result = Result::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

    return view('studentdashboard', compact('result'));
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
}