<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
// use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return inertia('/','Home');
// });

Route::group(['middleware' => 'auth'], function () {
    //Dashboard
    Route::inertia('/', 'Dashboard')->name('dashboard');


    //Students
    Route::resource('students', StudentController::class);

    //Courses
    Route::resource('courses', CourseController::class);

    //Subjects
    Route::resource('subjects', SubjectController::class)->except('index');

    // Audit
    // Route::get('/audits', function () {
    //     return inertia('Audits/Audit', ['audits' => function () {
    //         $audits = Student::first()->audits();
    //         dd($audits);
    //     }]);
    // })->name('audits');
    //Users
    Route::get('/users', function () {
        return inertia('Users/UserIndex', ['users' => User::latest()->get()]);
    })->name('users.index');
    Route::post('/users/create', [AuthController::class, 'store']);
    Route::inertia('/users/create', 'Users/UserCreate')->name('users.create');


    //Auth
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'guest'], function () {

    //Auth
    Route::post('/login', [AuthController::class, 'login']);
    Route::inertia('/login', 'Auth/Login')->name('login');
});






// Route::inertia('/dashboard', 'Home');
