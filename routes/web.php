<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\v1\Auth\AuthController;
use App\Http\Controllers\v1\Instructor\CoursesController;
use App\Http\Controllers\v1\Instructor\LessonController;
use App\Http\Controllers\v1\Instructor\ProfileController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'home.landing')->name('home');
Route::resource('categories', CategoryController::class);
Route::resource('subcategories', SubCategoryController::class);



Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register');
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
});


Route::prefix('student')->middleware(['role:student'])->group(function () {
    Route::view('/dashboard', 'admin.student.dashboard')->name('student_dashboard');
    Route::view('/series', 'admin.student.series')->name('student_series');
    Route::view('/courses', 'admin.student.courses')->name('student_courses');
    Route::view('/lessons', 'admin.student.lessons')->name('student_lessons');
    Route::view('/take-course', 'admin.student.take_course')->name('student_take_course');
    Route::view('/take-quiz', 'admin.student.take_quiz')->name('student_take_quiz');
    Route::view('/billing', 'admin.student.billing')->name('student_billing');
    Route::view('/edit-account', 'admin.student.edit_account')->name('student_edit_account');
    Route::view('/profile', 'admin.student.profile')->name('student_profile');
    // Route::view('/profile', 'admin.student.profile')->name('student_profile');

});


Route::prefix('instructor')->middleware(['role:instructor'])->as('instructor.')->group(function () {
        
    Route::view('/dashboard', 'admin.instructor.dashboard')->name('dashboard');
        Route::view('/create-quiz', 'admin.instructor.create_quiz')->name('create.quiz');
        Route::view('/earnings', 'admin.instructor.earnings')->name('earnings');
        Route::view('/payout', 'admin.instructor.payout')->name('payout');

        Route::resource('quizzes', QuizController::class);
        
        Route::resource('courses', CoursesController::class);
        Route::resource('lessons', LessonController::class);
        Route::resource('profile', ProfileController::class);
    });



Route::prefix('admin')->middleware(['role:admin'])->group(function () {
    // Route::controller(CategoryController::class)->group(function () {
              
    //     Route::post('/categories', 'store')->name('categories.store');      
    //     Route::put('/categories/{id}', 'update')->name('categories.update'); 
    //     Route::get('/categories/{id}', 'show')->name('categories.show');     
    // });
});