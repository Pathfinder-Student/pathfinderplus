<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;

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
        return view('studentdashboard', compact('student'));
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

        // Check Admin first
        $admin = Admin::where('username', $credentials['username'])->first();
        if ($admin && $admin->password === $credentials['password']) {
            Auth::login($admin);
            session([
                'usertype' => 'admin',
                'username' => $admin->username,
            ]);
            return redirect()->intended('/admindashboard');
        }

        // Check User
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
        return redirect('/login');
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

    public function exampletest()
    {
        return view('exampletest');
    }
}
