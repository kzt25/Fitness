<?php

namespace App\Http\Controllers\Admin;

use App\Models\Workout;
use App\Models\WorkoutPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class WorkoutController extends Controller
{
    public function index(){
        $workoutplan = WorkoutPlan::select('id','plan_type')->get();
        //dd($workoutplan->toArray());
        return view('admin.workoutplan', compact('workoutplan'));
    }

    public function createworkoutplan(Request $request){
        $this->validate($request,[
            'plantype'=>'required'
        ]);
        $data = new WorkoutPlan();
        $data->plan_type = $request->plantype;
        $data->workout_id = 1;
        $data->save();
        return back();
    }

    public function workoutindex(Request $request){
        $workoutplanId = $request->id;
        //dd($workoutplanId);
        return view('admin.workoutcreate', compact('workoutplanId'));
    }

    public function createworkout(Request $request){
        //dd($request->id);
        $this->validate($request,[
            'workoutname'=> 'required',
            'workoutlevel'=> 'required',
            'calories'=> 'required',
            'time'=> 'required',
            'image' => 'required',
            'video'=> 'required|mimes:mp4,webm',
        ]);

        if($request->hasFile('video')) {
            $video = $request->file('video');
            $video_name =uniqid().'_'. $video->getClientOriginalName();

            Storage::disk('public')->put(
                'upload/'.$video_name,
                file_get_contents($video)
            );
        }
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name =uniqid().'_'. $image->getClientOriginalName();

            Storage::disk('public')->put(
                'upload/'.$image_name,
                file_get_contents($image)
            );
        }
        //$workoutplan = WorkoutPlan::select('workout_plans.id')->where('workout_plans.id',$request->workoutplanId)->first();

        $data = new Workout();
        $data->workout_plan_id = $request->workoutplanId;
        $data->workout_name = $request->workoutname;
        $data->workout_level = $request->workoutlevel;
        $data->calories = $request->calories;
        $data->time = $request->time;
        $data->workout_periods =0;
        $data->image = $image_name;
        $data->video=$video_name;
        $data->save();
        return redirect('/workout');
    }

    public function workoutview(){
        $workoutview = Workout::select('workouts.id','workout_plans.plan_type','workouts.workout_name','workouts.workout_level','workouts.time','workouts.calories')->join('workout_plans','workout_plans.id','workouts.workout_plan_id')->get();

        //dd($workoutview->toArray());
        return view('admin.workout')->with(['workoutview'=>$workoutview]);
    }

    public function workoutdelete($id){
        $data = Workout::findOrFail($id);
        $data->delete();
        return back();
    }

    public function workoutedit($id){
        $data = Workout::where('id',$id)->first();
        //dd($data->toArray());
        return view('admin.workoutedit')->with(['data'=>$data]);
    }

    public function workoutupdate($id, Request $request){
        $check = Workout::findOrFail($id);

        if($request->hasFile('video')) {
            $video = $request->file('video');
            $video_name =uniqid().'_'. $video->getClientOriginalName();

            Storage::disk('public')->put(
                'upload/'.$video_name,
                file_get_contents($video)
            );
        }else{
            $video_name = $check->video;
        }
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name =uniqid().'_'. $image->getClientOriginalName();

            Storage::disk('public')->put(
                'upload/'.$image_name,
                file_get_contents($image)
            );
        }else{
            $image_name = $check->image;
        }



        $check->workout_name = $request->workoutname ?? $check->workout_name;
        $check->workout_level = $request->workoutlevel ?? $check->workout_level;
        $check->time = $request->time ?? $check->time;
        $check->calories = $request->calories ?? $check->calories;
        $check->image = $image_name;
        $check->video = $video_name;
        $check->update();
        return redirect('/workout');
    }
}
