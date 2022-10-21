<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MealPlan;

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
        return view('customer.training_center.workout_plan');
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
