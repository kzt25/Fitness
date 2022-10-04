<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\WorkoutController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\User\UserWorkoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() {

    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/datatable/ssd', [AdminController::class, 'ssd']);
    Route::resource('users', UserController::class);
//workout

Route::get('/workoutplan', [WorkoutController::class,'index'])->name('workoutplane');
Route::post('/workoutplan/create',[WorkoutController::class,'createworkoutplan'])->name('createworkoutplan');
Route::get('/workout/{id}',[WorkoutController::class,'workoutindex'])->name('workout');
Route::get('/workout',[WorkoutController::class,'workoutview'])->name('workoutview');
Route::get('/workout/delete/{id}',[WorkoutController::class,'workoutdelete'])->name('workoutdelete');
Route::get('/workout/edit/{id}',[WorkoutController::class,'workoutedit'])->name('workoutedit');
Route::post('/workout/update/{id}',[WorkoutController::class,'workoutupdate'])->name('workoutupdate');
Route::post('/workout/create',[WorkoutController::class,'createworkout'])->name('createworkout');
});


