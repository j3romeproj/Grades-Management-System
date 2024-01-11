<?php

use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\ClassController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\FacultyController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Students
Route::get('students', [StudentController::class, 'studentInfoRetrieve']);
Route::post('students', [StudentController::class, 'studentInfoInput']);
Route::get('students/{id}', [StudentController::class, 'studentInfoShow']);
Route::get('students/{id}/edit', [StudentController::class, 'studentInfoEdit']);
Route::put('students/{id}/edit', [StudentController::class, 'studentInfoUpdate']);
// Faculties
Route::get('faculties', [FacultyController::class, 'facultyInfoRetrieve']);
Route::post('faculties', [FacultyController::class, 'facultyInfoInput']);
Route::get('faculties/{id}', [FacultyController::class, 'facultyInfoShow']);
Route::get('faculties/{id}/edit', [FacultyController::class, 'facultyInfoEdit']);
Route::put('faculties/{id}/edit', [FacultyController::class, 'facultyInfoUpdate']);
// Courses
Route::get('courses', [CourseController::class, 'courseInfoRetrieve']);
Route::post('courses', [CourseController::class, 'courseInfoInput']);
Route::get('courses/{id}', [CourseController::class, 'courseInfoShow']);
Route::get('courses/{id}/edit', [CourseController::class, 'courseInfoEdit']);
Route::put('courses/{id}/edit', [CourseController::class, 'courseInfoUpdate']);
// Classes
Route::get('classes', [ClassController::class, 'classInfoRetrieve']);
Route::post('classes', [ClassController::class, 'classInfoInput']);
Route::get('classes/{id}', [ClassController::class, 'classInfoShow']);
Route::get('classes/{id}/edit', [ClassController::class, 'classInfoEdit']);
Route::put('classes/{id}/edit', [ClassController::class, 'classInfoUpdate']);
// Accounts
Route::get('accounts', [AccountController::class, 'accountInfoRetrieve']);
Route::post('accounts', [AccountController::class, 'accountInfoInput']);
Route::get('accounts/{id}', [AccountController::class, 'accountInfoShow']);
Route::get('accounts/{id}/edit', [AccountController::class, 'accountInfoEdit']);
Route::put('accounts/{id}/edit', [AccountController::class, 'accountInfoUpdate']);
