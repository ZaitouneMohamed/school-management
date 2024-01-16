<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClasseController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ClassSubjectController;
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

Route::middleware("admin")->prefix("admin")->name("admin.")->group(function () {
    //Admin
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name("home");

    Route::resource("admin", AdminController::class);
    Route::resource("class", ClasseController::class);
    Route::resource("subject", SubjectController::class);
    Route::resource("class_subject", ClassSubjectController::class);


});

Route::middleware("student")->name("student.")->group(function () {
    //Student
    Route::get('/student', function () {
        return view('student.dashboard');
    })->name("home");
});

Route::middleware("teacher")->name("teacher.")->group(function () {
    //Teacher
    Route::get('/teacher', function () {
        return view('teacher.dashboard');
    })->name("home");
});

Route::middleware("parent")->name("parent.")->group(function () {
    //Parent
    Route::get('/parent', function () {
        return view('parent.dashboard');
    })->name("home");
});
