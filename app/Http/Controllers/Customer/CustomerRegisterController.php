<?php

namespace App\Http\Controllers\Customer;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerRegisterController extends Controller
{
    //
    public function CustomerData(Request $request){
        // return response()->json([
        //            'success' => 'success',
        //             'data' => $request->allData,
        //     ]);
        $user=New User();
        $all_info = $request->allData; // json string
        $all_info =  json_decode(json_encode($all_info));
        $bodyMeasurements = $all_info->bodyMeasurements;
        $bodyMeasurements =  json_decode(json_encode($bodyMeasurements));
        $user_physical_limitation =json_encode($all_info->physicalLimitations);
        $user_body_type =json_encode($all_info->bodyType);
        $user_bad_habits=json_encode($all_info->badHabits);

        //dd($physical_activies);
        $user->name=$all_info->personalInfo[0];
        $user->phone=$all_info->personalInfo[1];
        $user->email=$all_info->personalInfo[2];
        $user->address=$all_info->personalInfo[3];
        $user->password=$all_info->personalInfo[4];

        $user->height=$bodyMeasurements->height;
        $user->age=$bodyMeasurements->age;
        $user->bfp=$bodyMeasurements->bfp;
        $user->bmi=$bodyMeasurements->bmi;
        $user->gender=$bodyMeasurements->gender;
        $user->neck=$bodyMeasurements->neck;
        $user->hip=$bodyMeasurements->hip;
        $user->shoulders=$bodyMeasurements->shoulders;
        $user->waist=$bodyMeasurements->waist;
        $user->weight=$bodyMeasurements->weight;

        $user->bad_habits=$user_bad_habits;
        $user->body_type=$user_body_type;
        $user->physical_limitation=$user_physical_limitation;

        $user->energy_level=$all_info->energyLevel[0];
        $user->ideal_weight=$all_info->idealWeight[0];
        $user->goal=$all_info->mainGoal[0];
        $user->physical_activity=$all_info->physicalActivity[0];
        $user->activities=$all_info->preferedActivities[0];
        $user->membertype_level=$all_info->proficiency[0];
        $user->average_night=$all_info->sleep[0];
        $user->most_attention_areas=$all_info->typicalDay[0];
        //$user->average_night=$all_info->waterIntake[0];

        // $user->bodyarea=$all_info->bodyArea[0];
        // $user->member_id=$all_info->memberPlan[0];

        $user->save();
        //dd($all_info->bodyMeasurements->height);


    }
}
