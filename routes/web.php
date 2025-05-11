<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', action: [StudentController::class, 'showLogin'])->name('login');

Route::get('/studentdashboard', [StudentController::class, 'dashboard'])->middleware('auth');
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [StudentController::class, 'login'])->name('login.submit');

Route::get('/student-dashboard', [StudentController::class, 'dashboard'])->name('studentdashboard');

Route::get('/studentrecommendation', [StudentController::class, 'recommendation'])->name('studentrecommendation');

Route::get('/editprofile', [StudentController::class, 'editprofile'])->name('editprofile');

Route::get('/home', [StudentController::class, 'home'])->name('home');

Route::get('/aboutthis', [StudentController::class, 'aboutthis'])->name('aboutthis');