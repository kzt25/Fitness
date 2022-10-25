<?php

namespace App\Http\Controllers\Customer;

use App\Models\Meal;
use App\Models\MealPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Customer_TrainingCenterController extends Controller

{
    public function index()
    {
        return view('customer.training_center.index');
    }

    public function meal()
    {
        $meals =Meal::all();
        return view('customer.training_center.meal',compact('meals'));
    }

        public function showbreakfast(Request $request)
        {

            $meals =Meal::all();

            if($request->keyword != ''){
                $meals = Meal::where('name','LIKE','%'.$request->keyword.'%')->get();
            }
            //dd($members);
            return response()->json([
               'breakfast' => $meals
            ]);
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
