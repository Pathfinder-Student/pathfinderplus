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
        return view('login');
    }
    public function dashboard()
{
    return view('studentdashboard');
}
 public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $user = User::where('username', $credentials['username'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            return redirect()->intended('/studentdashboard');
        }

        return back()->withErrors(['login' => 'Invalid username or password']);
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
}

