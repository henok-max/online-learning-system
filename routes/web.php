<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuizeController;
use App\Http\Controllers\CertificateController;


// Public pages
Route::get('/', fn() => view('home'));
Route::get('/about', fn() => view('about'));
Route::get('/contact', fn() => view('contact'));
Route::get('/course', [CourseController::class, 'Courselist'])->name('courselist');
Route::get('/login', fn() => view('login'));

// Student signup and login
Route::get('/signup', [StudentController::class, 'create']);
Route::post('/signup', [StudentController::class, 'register'])->name('student.register');
Route::post('/login', [StudentController::class, 'login'])->name('login');
Route::post('/logout', [StudentController::class, 'logout'])->name('logout');

// Welcome page after signup
Route::get('/courses', [CourseController::class, 'showCourses'])->name('courses.index');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    // Student-specific routes
    Route::get('/enroll', [StudentController::class, 'enroll'])->name('student.enroll');
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');

    // Course-related routes
    // Route::get('courses', [CourseController::class, 'index'])->name('courses.index');

    // Lesson-related routes



    Route::get('/lessons/{courseId}/{lessonId}', [LessonController::class, 'showLesson'])->name('lessons.show');
    Route::post('/quiz/submit', [QuizeController::class, 'submitQuiz'])->name('quiz.submit');
    Route::get('/certificate/{lesson_id}', [CertificateController::class, 'generate'])->name('certificate.generate');
    Route::get('/certificate/download/{lesson_id}', [CertificateController::class, 'download'])->name('certificate.download');
});
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/add-course', [AdminController::class, 'addCourse'])->name('admin.addCourse');
    Route::delete('/admin/delete-student', [AdminController::class, 'deleteStudent'])->name('admin.deleteStudent');
});
