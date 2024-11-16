<?php

use App\Http\Controllers\v1\admin\CategoryController;
use App\Http\Controllers\v1\admin\CourseController;
use App\Http\Controllers\v1\Auth\AuthController;
use App\Http\Controllers\v1\Instructor\CoursesController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'home.landing')->name('home');




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


Route::prefix('instructor')->middleware(['role:instructor'])->group(function () {
    Route::view('/dashboard', 'admin.instructor.dashboard')->name('instructor_dashboard');
    Route::get('/all-courses', [CoursesController::class, 'index'])->name('instructor_courses');
    Route::view('/edit-course', 'admin.instructor.edit_course')->name('instructor_edit_course');
    Route::view('/edit-lesson', 'admin.instructor.edit_lesson')->name('instructor_edit_lesson');
    Route::view('/create-quiz', 'admin.instructor.create_quiz')->name('instructor_create_quiz');
    Route::view('/earnings', 'admin.instructor.earnings')->name('instructor_earnings');
    Route::view('/profile', 'admin.instructor.profile')->name('instructor_profile');
    Route::view('/payout', 'admin.instructor.payout')->name('instructor_payout');

    Route::resource('courses', CoursesController::class)->names([
        'create' => 'instructor.course.create',
        'store' => 'instructor.course.store',
        'index' => 'instructor.course.index',
        'edit' => 'instructor.course.edit',
        'update' => 'instructor.course.update',
        'destroy' => 'instructor.course.destroy',
    ]);
});

Route::prefix('admin')->middleware(['role:admin'])->group(function () {
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('categories.index');       
        Route::post('/categories', 'store')->name('categories.store');      
        Route::put('/categories/{id}', 'update')->name('categories.update'); 
        Route::get('/categories/{id}', 'show')->name('categories.show');     
    });
});