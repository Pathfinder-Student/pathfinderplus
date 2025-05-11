<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class StudentController extends Controller
{
    public function home(){

        return view('home');
    }
    public function showLogin()
{
    if (Auth::check()) {
        return redirect()->route('studentdashboard');
    }
    return view('login');
}

    public function studentdashboard()
    {    
        $student = Auth::user();
        return view('studentdashboard',compact('student'));
    }
    public function dashboard()
{
    $student = Auth::user();
    if (!$student) {
        return redirect()->route('login');
    }
    return view('studentdashboard', compact('student'));
}

public function login(Request $request)
{
    $credentials = $request->only('username', 'password');
    $user = User::where('username', $credentials['username'])->first();
 
    if (!$user) {
        return back()->withErrors(['login' => 'Username not found']);
    }
    if ($user->password === $credentials['password']) {
        Auth::login($user);
        return redirect()->intended('/studentdashboard');
    }

    return back()->withErrors(['login' => 'Invalid password']);
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
        return view ('aboutthis');
     }
     public function exampletest()
     {
        return view('exampletest');
     }
     
}

