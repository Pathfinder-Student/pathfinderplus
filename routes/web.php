<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
Route::get('/exampletest', [StudentController::class, 'exampletest'])->name('exampletest');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
