<?php

use App\Http\Controllers\Admin\AdminBooksController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\SignupController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminStudentsController;
use App\Http\Controllers\Teacher\TeacherDashboardController;
use App\Http\Controllers\Teacher\CreatingAssignmentController;
use App\Http\Controllers\Teacher\TeacherStudentsController;


use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Student\StudentAssignmentController;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\StudentMiddleware;
use App\Http\Middleware\TeacherMiddleware;
use Illuminate\Support\Facades\Route;


// Registering and Logging Routes
Route::get('/', function () {
    return view('Auth.login');
})->name('login');

Route::get('/register', function () {
    return view('Auth.register');
})->name('register');


// Auth Routes
Route::post('/registerUser', [SignupController::class, 'store'])->name('signup');
Route::post('/loginPage', [LoginController::class, 'login'])->name('login.login');

// Student Routes
Route::middleware(StudentMiddleware::class)->group(function () {
    Route::get('studentDashboard', [StudentDashboardController::class, 'index'])->name('student_dashboard');
    Route::get('studentLogout', [LogoutController::class, 'studentLogout'])->name('student.logout');
    Route::get('studentAssignments', [StudentAssignmentController::class, 'index'])->name('assignment.index');
    Route::get('assignmentSolve{assignment}', [StudentAssignmentController::class, 'assignmentSolve'])->name('assignment.solve');
    Route::post('assignmentCorrect/{assignmentId}', [StudentAssignmentController::class, 'assignmentCorrect'])->name('assignment.correct');
    Route::get('studentDegreesShow', [StudentAssignmentController::class, 'degreesShow'])->name('student.degrees.show');
    Route::get('studentsBooks',[StudentDashboardController::class,'books'])->name('students.books');
});

// Teacher Routes
Route::middleware(TeacherMiddleware::class)->group(function () {
    Route::get('teacherDashboard', [TeacherDashboardController::class, 'index'])->name('teacher_dashboard');
    Route::get('teacherLogout', [LogoutController::class, 'teacherLogout'])->name('teacher.logout');
    Route::get('students', [TeacherStudentsController::class, 'index'])->name('teacherStudents');
    Route::get('assignmentCreate', [CreatingAssignmentController::class, 'index'])->name('assignment.create');
    Route::post('assignmentStore', [CreatingAssignmentController::class, 'storeAssignment'])->name('assignment.store');
    Route::get('degreesShow', [TeacherStudentsController::class, 'degreesShow'])->name('degrees.show');
});


// Admin Routes
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('adminDashboard', [AdminDashboardController::class, 'index'])->name('admin_dashboard');
    Route::get('adminLogout', [LogoutController::class, 'adminLogout'])->name('admin.logout');
    Route::get('adminStudents', [AdminStudentsController::class, 'studentsIndex'])->name('adminStudents');
    Route::get('adminTeachers', [AdminStudentsController::class, 'teachersIndex'])->name('adminTeachers');
    Route::resource('adminBooks', AdminBooksController::class);
});
