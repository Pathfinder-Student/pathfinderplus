<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;

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
}
