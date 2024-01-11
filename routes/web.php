<?php

use App\Http\Controllers\Api\FacultyController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Page\PageController;
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
Route::group(['middleware'=>['revalidate_back_history']], function(){
    Route::get('/', [AuthController::class, 'login'])->name('getLogin')->middleware('custom_guest');
    Route::post('/', [AuthController::class, 'loginPOST'])->name('postLogin')->middleware('custom_guest');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/student', [PageController::class, 'grades'])->name('studentDashboard')->middleware('custom_auth');
    Route::get('/faculty', [FacultyController::class, 'facultyDashboard'])->name('facultyDashboard')->middleware('custom_auth');
});
