<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TrainerController;
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Route;

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
    Route::resource('trainer', TrainerController::class);
    Route::get('trainer/datatable/ssd', [TrainerController::class, 'ssd']);
});
