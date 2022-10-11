<?php

namespace App\Http\Controllers\Customer;

use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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

        $user_member_type_level=$all_info->proficiency[0];
        $user_member_type=$all_info->memberPlan[0];
        $user_gender=$bodyMeasurements->gender;

        $member=Member::findOrFail($user_member_type);


        //$user_body_type =json_encode($all_info->bodyType);
        $user_bad_habits=json_encode($all_info->badHabits);
        $user_bodyArea=json_encode($all_info->bodyArea);
        $user->member_type=$member->member_type;

        $user->name=$all_info->personalInfo[0];
        $user->phone=$all_info->personalInfo[1];
        $user->email=$all_info->personalInfo[2];
        $user->address=$all_info->personalInfo[3];
        $user->password=Hash::make($all_info->personalInfo[4]);
        $user->height=$bodyMeasurements->height;
        $user->age=$bodyMeasurements->age;
        $user->bfp=$bodyMeasurements->bfp;
        $user->bmi=$bodyMeasurements->bmi;
        $user->gender=$user_gender;
        if($user_member_type=='free'){
            $user->active_status=0;
        }else{
            $user->active_status=1;
        }

        if($user_gender=='male'){
            $user->hip=0;
        }else{
            $user->hip=$bodyMeasurements->hip;
        }

        $user->neck=$bodyMeasurements->neck;
        $user->shoulders=$bodyMeasurements->shoulders;
        $user->waist=$bodyMeasurements->waist;
        $user->weight=$bodyMeasurements->weight;

        $user->bad_habits=$user_bad_habits;
        $user->body_type=$all_info->bodyType[0];
        $user->physical_limitation=$user_physical_limitation;

        $user->energy_level=$all_info->energyLevel[0];
        $user->ideal_weight=$all_info->idealWeight[0];
        $user->goal=$all_info->mainGoal[0];
        $user->physical_activity=$all_info->physicalActivity[0];
        $user->activities=$all_info->preferedActivities[0];
        $user->hydration=$all_info->waterIntake[0];
        $user->membertype_level=$user_member_type_level;
        $user->average_night=$all_info->sleep[0];
        $user->most_attention_areas=$all_info->typicalDay[0];

        $user->body_area=$user_bodyArea;
        $member_id=$member->id;
        $user->save();
        $user->members()->attach($member_id,['member_type_level' => $user_member_type_level]);


    }
}
