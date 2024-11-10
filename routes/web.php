<?php

use App\Http\Controllers\v1\Auth\AuthController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'home.landing')->name('home');


Route::middleware(['auth'])->group(function () {
  
    Route::get('/student/dashboard', action: function () {
        return view('admin.student.dashboard'); 
    })->name('Student Dashboard');


    Route::get('/instructor/dashboard', function () {
        return view('admin.instructor.dashboard'); 
    })->name('instructor.dashboard');
});


Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register');
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
});
