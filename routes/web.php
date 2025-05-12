<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [StudentController::class, 'showLogin'])->name('login');
Route::post('/login', [StudentController::class, 'login'])->name('login.submit');

Route::get('/studentdashboard', [StudentController::class, 'studentdashboard'])->middleware('auth')->name('studentdashboard');
Route::get('/studentrecommendation', [StudentController::class, 'recommendation'])->name('studentrecommendation');
Route::get('/editprofile', [StudentController::class, 'editprofile'])->name('editprofile');
Route::get('/home', [StudentController::class, 'home'])->name('home');
Route::get('/aboutthis', [StudentController::class, 'aboutthis'])->name('aboutthis');
Route::get('/examtest', [StudentController::class, 'examtest'])->name('examtest');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
Route::get('/admindashboard', action: [AdminController::class, 'dashboard'])->name('admindashboard');
Route::get('/admindashstudents', action: [AdminController::class, 'admindashstudents'])->name('admindashstudents');
Route::get('/admindashassessments', action: [AdminController::class, 'admindashassessments'])->name('admindashassessments');
Route::get('/admindashreports', action: [AdminController::class, 'admindashreports'])->name('admindashreports');
Route::get('/admindashsettings', action: [AdminController::class, 'admindashsettings'])->name('admindashsettings');
Route::get('/logout', [StudentController::class, 'logout'])->name('logout');
