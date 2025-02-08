<?php

use App\Http\Controllers\v1\Instructor\PlanController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\QuizAttemptController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\v1\Auth\AuthController;
use App\Http\Controllers\v1\Instructor\CoursesController;
use App\Http\Controllers\v1\Instructor\LessonController;
use App\Http\Controllers\v1\Instructor\ProfileController;
use App\Http\Controllers\v1\Student\StudentProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticated;


Route::view('/', 'home.landing')->name('home');
Route::view('/about', 'home.about')->name('about')->middleware('auth');




Route::get('JSONCategories', [CategoryController::class, 'JSONCategories'])->name('categories.json');
Route::get('JSONPlans', [PlanController::class, 'JSONPlans'])->name('instructor.plans.json');

Route::resource('subcategories', SubCategoryController::class);

Route::resource('purchases', PurchaseController::class);
Route::get('checkout/{course}', [PurchaseController::class, 'checkout'])->name('checkout');





Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')->name('register')->middleware(RedirectIfAuthenticated::class);
    Route::post('/register', 'register');
    Route::get('/login', 'showLoginForm')->name('login')->middleware(RedirectIfAuthenticated::class);
    Route::post('/login', 'login');
    Route::get('/logout', 'logout')->name('logout');
});

Route::prefix('student')->middleware(['role:student'])->as('student.')->group(function () {
    Route::view('/dashboard', 'admin.student.dashboard')->name('dashboard');
    Route::resource('profile', StudentProfileController::class);

    Route::get('/courses', [PurchaseController::class, 'purchasedCourses'])->name('courses');
    Route::post('/lesson/set-active/{lessonId}', [PurchaseController::class, 'setActiveLesson'])->name('setActiveLesson');
    Route::get('/series', [CoursesController::class, 'studentCourses'])->name('series');
    Route::get('lessons/{id}', [PurchaseController::class, 'studentCoursesAndLessons'])->name('lessons');

    Route::prefix('quiz-attempts')->name('quiz-attempts.')->group(function () {
        Route::get('/', [QuizAttemptController::class, 'index'])->name('index');
        Route::get('/{quiz}', [QuizAttemptController::class, 'show'])->name('show');
        Route::post('/{quiz}', [QuizAttemptController::class, 'store'])->name('store');
    });


    Route::view('/take-course', 'admin.student.take_course')->name('take_course');
    // Route::view('/take-quiz', 'admin.student.take_quiz')->name('take_quiz');
    Route::view('/billing', 'admin.student.billing')->name('billing');
    Route::view('/edit-account', 'admin.student.edit_account')->name('account');

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
    Route::resource('categories', CategoryController::class);

    Route::prefix('plans')->group(function () {
        Route::get('/', [PlanController::class, 'index'])->name('plans.index');
        Route::get('/create', [PlanController::class, 'create'])->name('plans.create');
        Route::post('/', [PlanController::class, 'store'])->name('plans.store');
        Route::get('/{plan}/edit', [PlanController::class, 'edit'])->name('plans.edit');
        Route::put('/{plan}', [PlanController::class, 'update'])->name('plans.update');
        Route::delete('/{plan}', [PlanController::class, 'destroy'])->name('plans.destroy');
    });
        
});



Route::prefix('admin')->middleware(['role:admin'])->group(function () {
    // Route::controller(CategoryController::class)->group(function () {
              
    //     Route::post('/categories', 'store')->name('categories.store');      
    //     Route::put('/categories/{id}', 'update')->name('categories.update'); 
    //     Route::get('/categories/{id}', 'show')->name('categories.show');     
    // });
});