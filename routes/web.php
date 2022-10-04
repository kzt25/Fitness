<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TrainerController;
use App\Http\Controllers\Admin\User\UserController;

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

    // Member
     Route::resource('member',MemberController::class);
     Route::get('/member/{id}/delete',[MemberController::class,'destroy']);
     Route::get('/member/datatable/ssd', [MemberController::class, 'ssd']);
});
