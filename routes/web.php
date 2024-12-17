<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchasedCourseController;
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
Route::resource('purchases', PurchaseController::class);



Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register');
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::get('/logout', 'logout')->name('logout');
});


Route::prefix('student')->middleware(['role:student'])->as('student.')->group(function () {
    Route::get('/courses', [PurchaseController::class, 'purchasedCourses'])->name('courses');
    Route::post('/lesson/set-active/{lessonId}', [LessonController::class, 'setActiveLesson'])->name('setActiveLesson');


    Route::get('/series', [CoursesController::class, 'studentCourses'])->name('series');


    Route::view('/dashboard', 'admin.student.dashboard')->name('dashboard');
    Route::get('lessons/{id}', [PurchaseController::class, 'studentCoursesAndLessons'])->name('lessons');

    Route::view('/take-course', 'admin.student.take_course')->name('take_course');
    Route::view('/take-quiz', 'admin.student.take_quiz')->name('take_quiz');
    Route::view('/billing', 'admin.student.billing')->name('billing');
    Route::view('/edit-account', 'admin.student.edit_account')->name('account');
    Route::view('/profile', 'admin.student.profile')->name('profile');

});


Route::prefix('instructor')->middleware(['role:instructor'])->as('instructor.')->group(function () {
        
    Route::view('/dashboard', 'admin.instructor.dashboard')->name('dashboard');
        Route::view('/create-quiz', 'admin.instructor.create_quiz')->name('create.quiz');
        Route::view('/earnings', 'admin.instructor.earnings')->name('earnings');
        Route::view('/payout', 'admin.instructor.payout')->name('payout');


        Route::resource('quizzes', QuizController::class);
        Route::resource('courses', CoursesController::class);
        Route::resource('lessons',  LessonController::class);
        Route::resource('profile', ProfileController::class);
    });



Route::prefix('admin')->middleware(['role:admin'])->group(function () {
    // Route::controller(CategoryController::class)->group(function () {
              
    //     Route::post('/categories', 'store')->name('categories.store');      
    //     Route::put('/categories/{id}', 'update')->name('categories.update'); 
    //     Route::get('/categories/{id}', 'show')->name('categories.show');     
    // });
});