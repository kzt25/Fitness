<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MealController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\TrainerController;
use App\Http\Controllers\Admin\WorkoutController;
use App\Http\Controllers\Admin\MealPlanController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\User\UserWorkoutController;
use App\Http\Controllers\Admin\BankinginfoController;
use App\Http\Controllers\Auth\PassResetController;
use App\Http\Controllers\Customer\CustomerLoginController;
use App\Http\Controllers\Customer\CustomerRegisterController;
use App\Http\Controllers\Admin\RequestAcceptDeclineController;

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
Route::group(['middleware' => 'prevent-back-history'], function(){
Route::get('/customerlogin',[CustomerLoginController::class,'login'])->name('customerlogin');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/customer/signup', [App\Http\Controllers\HomeController::class, 'customersignup'])->name('home');

Route::post('/data/save', [HomeController::class, 'store'])->name('data.save');
Route::post('customerCreate', [CustomerRegisterController::class, 'CustomerData'])->name('customerCreate');

 Auth::routes();
Route::get('/customer_register',[CustomerRegisterController::class,'register'])->name('customer_register');

Route::get('/user/workout/start',[UserWorkoutController::class,'getstart'])->name('userworkout.getstart');

Route::get('password_reset_view',[PassResetController::class,'passResetView'])->name('password_reset_view');
Route::get('checkPhoneGetOTP',[PassResetController::class,'checkPhoneGetOTP'])->name('checkPhoneGetOTP');
Route::post('password_reset',[PassResetController::class,'password_reset'])->name('password_reset');
});

// Admin Site
Route::group(['middleware' => 'prevent-back-history'], function(){
Route::prefix('admin')->group(function () {

     Route::middleware(['role:System_Admin|King|Queen'])->group(function () {
    // Route::middleware('auth')->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('admin-home');
        Route::get('/profile', [AdminController::class, 'adminProfile'])->name('admin-profile');
        Route::get('/profile/edit', [AdminController::class, 'editAdminProfile'])->name('admin-edit');
        // Route::put('/profile/{}')
        Route::resource('user', UserController::class);
        Route::get('admin/user/datatable/ssd', [UserController::class, 'ssd']);

        Route::get('/requestlist', [HomeController::class, 'requestlist'])->name('requestlist');

        //Workout
        Route::get('/workoutplan', [WorkoutController::class, 'index'])->name('workoutplane');
        Route::post('/workoutplan/create', [WorkoutController::class, 'createworkoutplan'])->name('createworkoutplan');
        Route::get('/workout/{id}', [WorkoutController::class, 'workoutindex'])->name('workout');
        Route::get('/workout', [WorkoutController::class, 'workoutview'])->name('workoutview');
        Route::get('/workout/delete/{id}', [WorkoutController::class, 'workoutdelete'])->name('workoutdelete');
        Route::get('/workout/edit/{id}', [WorkoutController::class, 'workoutedit'])->name('workoutedit');
        Route::post('/workout/update/{id}', [WorkoutController::class, 'workoutupdate'])->name('workoutupdate');
        Route::post('/workout/create', [WorkoutController::class, 'createworkout'])->name('createworkout');
        Route::get('/videoview',[WorkoutController::class,'getVideo'])->name('getvideo');

        //Trainer
        Route::resource('trainer', TrainerController::class);
        Route::get('admin/trainer/datatable/ssd', [TrainerController::class, 'ssd']);

        // Permission
        Route::resource('permission', PermissionController::class);
        Route::get('admin/permission/datatable/ssd', [PermissionController::class, 'ssd']);

        // Role
        Route::resource('role', RoleController::class);
        Route::get('admin/role/datatable/ssd', [RoleController::class, 'ssd']);

        // Meal Plan
        Route::resource('mealplan', MealPlanController::class);
        Route::get('admin/getmealplan', [MealPlanController::class, 'getmealplan'])->name('getmealplan');
        Route::get('admin/mealplan/{id}/delete', [MealPlanController::class, 'destroy'])->name('mealplan.delete');


        // Meal
        Route::resource('meal', MealController::class);
        Route::get('admin/getmeal', [MealController::class, 'getMeal'])->name('getmeal');
        Route::get('admin/meal/{id}/delete', [MealController::class, 'destroy'])->name('meal.delete');

        // Member
        Route::resource('member', MemberController::class);
        Route::get('admin/member/{id}/delete', [MemberController::class, 'destroy'])->name('member.delete');
        Route::get('admin/member/datatable/ssd', [MemberController::class, 'ssd']);

        Route::get('user_member', [MemberController::class, 'user_member_show'])->name('member.user_member');
        Route::get('admin/user_member/datatable/ssd', [MemberController::class, 'user_member_ssd']);

        //BankingInfo
        Route::resource('bankinginfo', BankinginfoController::class);
        Route::get('admin/bankinginfo/datatable/ssd', [BankinginfoController::class, 'ssd']);

        //Request
        Route::resource('request', RequestController::class);
        Route::get('request/member/datatable/ssd', [RequestController::class, 'ssd']);
        Route::get('request/member/accept/{id}', [RequestAcceptDeclineController::class, 'accept'])->name('requestaccept');
        Route::get('request/member/decline/{id}', [RequestAcceptDeclineController::class, 'decline'])->name('requestdecline');
    });

});

});
