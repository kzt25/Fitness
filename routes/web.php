<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\WorkoutController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\User\UserWorkoutController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\MealController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\TrainerController;
use App\Http\Controllers\Admin\MealPlanController;
use App\Http\Controllers\Admin\PermissionController;


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

    //Trainer
    Route::resource('trainer', TrainerController::class);
    Route::get('trainer/datatable/ssd', [TrainerController::class, 'ssd']);

    // Permission
    Route::resource('permission', PermissionController::class );
    Route::get('permission/datatable/ssd', [PermissionController::class, 'ssd']);

    // Role
    Route::resource('role', RoleController::class );
    Route::get('role/datatable/ssd', [RoleController::class, 'ssd']);

    // Meal Plan

    Route::resource('mealplan', MealPlanController::class);
    Route::get('getmealplan', [MealPlanController::class, 'getmealplan'])->name('getmealplan');
    Route::get('mealplan/{id}/delete',[MealPlanController::class, 'destroy'])->name('mealplan.delete');
    Route::get('getmeal', [MealController::class, 'getMeal'])->name('getmeal');

    // Meal
    Route::resource('meal', MealController::class);
    Route::get('meal/{id}/delete',[MealController::class, 'destroy'])->name('meal.delete');

    // Member
     Route::resource('member',MemberController::class);
     Route::get('/member/{id}/delete',[MemberController::class,'destroy'])->name('member.delete');
     Route::get('/member/datatable/ssd', [MemberController::class, 'ssd']);
});


