<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClasseController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ClassSubjectController;
use App\Http\Controllers\Admin\ClassTimetable;
use App\Http\Controllers\Admin\ExaminationController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Parent\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\HomeController as StudentHomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->name("auth.")->group(function () {
    Route::get('/', 'login')->name("login.view")->middleware("guest");
    Route::post('/login', 'AuthController')->name("login.function");
    Route::get('/logout', 'logout')->name("logout");

    Route::get('/forget-password', 'ForgetPasswordView')->name("forget-password.view");
    Route::post('/forget-password', 'ForgetPassword')->name("forget-password.function");

    Route::get('/reset-password/{token}', 'showResetPasswordForm')->name("reset-password.view");
    Route::post('/reset-password', 'submitResetPasswordForm')->name("reset-password.function");
});

// profile
Route::controller(ProfileController::class)->name("profile.")->group(function () {
    Route::get('profile', "index")->name("index");
    Route::post('/SetProfile', 'SetProfile')->name("SetProfile");
    Route::post('/updatePassword', 'updatePassword')->name("updatePassword");
});

Route::middleware("admin")->prefix("admin")->name("admin.")->group(function () {
    //Admin
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name("home");

    Route::resource("admin", AdminController::class);
    Route::resource("class", ClasseController::class);
    Route::resource("subject", SubjectController::class);
    Route::resource("class_subject", ClassSubjectController::class);
    Route::resource("student", StudentController::class);
    Route::controller(ClassTimetable::class)->group(function () {
        Route::get('ClassTimetable', "ClassTimetableIndex")->name("ClassTimetable.index");
        Route::get('GetSubjects/{class_id}', "GetSubjects")->name("ClassTimetable.GetSubjects");
        Route::post('StoreData', "StoreData")->name("ClassTimetable.StoreData");
    });

    Route::resource("examination", ExaminationController::class);

    Route::controller(ExaminationController::class)->group(function(){
        Route::get('ExamSchedules', "ExamSchedules")->name("ExamSchedules");
        Route::get('calendar', "calendar")->name("calendar");
    });
});

Route::middleware("student")->prefix("student")->name("student.")->group(function () {
    //Student
    Route::get('/', function () {
        return view('student.dashboard');
    })->name("home");
    Route::controller(StudentHomeController::class)->group(function () {
        Route::get('MySubjects', 'MySubjects')->name("MySubjects");
    });
});

Route::middleware("teacher")->name("teacher.")->prefix('teacher')->group(function () {
    //Teacher
    Route::get('/', function () {
        return view('teacher.dashboard');
    })->name("home");
});

Route::middleware("parent")->name("parent.")->prefix("parent")->group(function () {
    //Parent
    Route::get('/', function () {
        return view('parent.dashboard');
    })->name("home");

    Route::controller(HomeController::class)->group(function () {
        Route::get('/MyStudents', 'MyStudents')->name("MyStudents");
    });
});
