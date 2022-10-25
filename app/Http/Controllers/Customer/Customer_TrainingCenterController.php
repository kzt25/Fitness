<?php

namespace App\Http\Controllers\Customer;

use App\Models\Workout;
use App\Models\MealPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Customer_TrainingCenterController extends Controller

{
    public function index()
    {
        return view('customer.training_center.index');
    }

    public function meal()
    {
        $customer_meal_plans=MealPlan::all();
        return view('customer.training_center.meal',compact('customer_meal_plans'));
    }

    public function workout_plan()
    {
        $user=auth()->user();
        $tc_workouts=DB::table('workouts')
                        ->where('member_type',$user->member_type)
                        ->where('gender_type',$user->gender)
                        ->where('workout_level',$user->membertype_level)
                        ->get();

        return view('customer.training_center.workout_plan',compact('tc_workouts'));
    }

    public function water()
    {
        return view('customer.training_center.water');
    }

    public function workout()
    {
        return view('customer.training_center.workout');
    }
}
