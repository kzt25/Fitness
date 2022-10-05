<?php

namespace App\Http\Controllers\User;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserWorkoutController extends Controller
{
    public function index(){


        // return view('user.workoutindex');
    }

    public function getstart(){

        $user = Auth::user();
        $platinum ='Platinum';
        $diamond = 'Diamond';
        $level='Advance';

        $checkMemberlevel = Member::select('member_type_level')->where('user_id',$user->id)->first();
        $checkMembertype = Member::select('member_type')->where('user_id',$user->id)->first();
        //$checkGender = Workout::select('gender_type')->where('gender_type')

        if($checkMembertype->member_type == 'Platinum' || $checkMembertype->member_type == 'Diamond'){

            if($checkMemberlevel->member_type_level == 'Advance'){
                $checkuser = Member::where('members.user_id',$user->id)->where('workouts.workout_level','Advance')->where('workouts.gender_type',$user->gender)
                ->join('workout_plans','workout_plans.id','members.workout_plan_id')
                ->join('workouts','workouts.workout_plan_id','workout_plans.id')
                ->get();
                return view('user.workout.workoutstart',compact('checkuser'));
            }
            else if($checkMemberlevel->member_type_level == 'Beginner'){
                $checkuser = Member::where('members.user_id',$user->id)->where('workouts.workout_level','Beginner')->where('workouts.gender_type',$user->gender)
                ->join('workout_plans','workout_plans.id','members.workout_plan_id')
                ->join('workouts','workouts.workout_plan_id','workout_plans.id')
                ->get();
                return view('user.workout.workoutstart',compact('checkuser'));
            }
            else if($checkMemberlevel->member_type_level == 'Professional'){
                $checkuser = Member::where('members.user_id',$user->id)->where('workouts.workout_level','Professional')->where('workouts.gender_type',$user->gender)
                ->join('workout_plans','workout_plans.id','members.workout_plan_id')
                ->join('workouts','workouts.workout_plan_id','workout_plans.id')
                ->get();
                return view('user.workout.workoutstart',compact('checkuser'));
            }
        }else{
            return view('user.workout.workoutstart')->with(['error','checkuser'=>null]);
        }

    }
}
