<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PersonalChoice;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->height = $request->height;
        $user->weight = $request->weight;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->neck = $request->neck;
        $user->waist = $request->waist;
        $user->hip = $request->hip;
        $user->shoulders = $request->shoulders;

        $user->member_code = 'yc-' . Str::uuid();
        $user->member_type = $request->member_type;
        $user->membertype_level = $request->membertype_level;

        $personal_choice = new PersonalChoice();
        $personal_choice->physical_limitation = $request->physical_limitation;
        $personal_choice->activities = $request->activities;
        $personal_choice->body_type = $request->body_type;
        $personal_choice->goal = $request->goal;
        $personal_choice->daliy_life = $request->daliy_life;
        $personal_choice->diet_type = $request->diet_type;
        $personal_choice->average_night = $request->average_night;
        $personal_choice->energy_level = $request->energy_level;
        $personal_choice->ideal_weight = $request->ideal_weight;
        $personal_choice->most_attention_areas = $request->most_attention_areas;
        $personal_choice->physical_activity = $request->physical_activity;
        $personal_choice->bad_habits = $request->bad_habits;

        $personal_choice->save();
        // $user->personal_choice_id = 

        return response()->json([$user, $personal_choice]);

    }
}
