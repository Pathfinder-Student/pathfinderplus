<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssessmentController;

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
Route::get('/assessment1', [StudentController::class, 'assessment1'])->name('assessment1');
Route::get('/assessment2', [StudentController::class, 'assessment2'])->name('assessment2');
Route::get('/assessment3', [StudentController::class, 'assessment3'])->name('assessment3');
Route::get('/assessment4', [StudentController::class, 'assessment4'])->name('assessment4');
Route::get('/assessment5', [StudentController::class, 'assessment5'])->name('assessment5');
Route::get('/assessment6', [StudentController::class, 'assessment6'])->name('assessment6');
Route::post('/student/assessments/store', [StudentController::class, 'storeAssessment'])->name('assessments.store');
Route::post('/assessment1', [StudentController::class, 'submitAssessment1'])->name('assessment1.submit');
Route::post('/assessment2', [StudentController::class, 'submitAssessment2'])->name('assessment2.submit');
Route::post('/assessment3', [StudentController::class, 'submitAssessment3'])->name('assessment3.submit');
Route::post('/assessment4', [StudentController::class, 'submitAssessment4'])->name('assessment4.submit');
Route::post('/assessment5', [StudentController::class, 'submitAssessment5'])->name('assessment5.submit');
Route::post('/assessment6', [StudentController::class, 'submitAssessment6'])->name('assessment6.submit');
Route::get('/assessment/result/{id}', [StudentController::class, 'viewResult'])->name('assessment.result.view');
Route::get('/assessment/result/{id}', [StudentController::class, 'viewResult'])->name('assessment.result.view');


