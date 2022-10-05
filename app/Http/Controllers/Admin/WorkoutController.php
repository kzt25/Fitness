<?php

namespace App\Http\Controllers\Admin;

use App\Models\Workout;
use App\Models\WorkoutPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class WorkoutController extends Controller
{
    public function index(){
        $workoutplan = WorkoutPlan::select('id','plan_type')->get();
        //dd($workoutplan->toArray());
        return view('admin.workout.workoutplan', compact('workoutplan'));
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
        return view('admin.workout.workoutcreate', compact('workoutplanId'));
    }

    public function createworkout(Request $request){
        //dd($request->all());
        $this->validate($request,[
            'workoutname'=> 'required',
            'gendertype' => 'required',
            'workoutlevel'=> 'required',
            'calories'=> 'required',
            'time'=> 'required',
            'image' => 'required',
            'video'=> 'required|mimes:mp4,webm',
        ]);

        if($request->hasFile('video')) {
            $video = $request->file('video');
            $video_name =uniqid().'_'. $video->getClientOriginalName();
            $video->move(public_path().'/upload/',$video_name);
            // Storage::disk('public')->put(
            //     'upload/'.$video_name,
            //     file_get_contents($video)
            // );
        }
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name =uniqid().'_'. $image->getClientOriginalName();

            $image->move(public_path().'/upload/',$image_name);
            // Storage::disk('public')->put(
            //     'upload/'.$image_name,
            //     file_get_contents($image)
            // );
        }
        //$workoutplan = WorkoutPlan::select('workout_plans.id')->where('workout_plans.id',$request->workoutplanId)->first();

        $data = new Workout();
        $data->workout_plan_id = $request->workoutplanId;
        $data->workout_name = $request->workoutname;
        $data->gender_type = $request->gendertype;
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
        $workoutview = Workout::select('workouts.id','workout_plans.plan_type','workouts.workout_name','workouts.gender_type','workouts.workout_level','workouts.time','workouts.calories','workouts.video')->join('workout_plans','workout_plans.id','workouts.workout_plan_id')->get();
        //dd($workoutview->toArray());
        return view('admin.workout.workout')->with(['workoutview'=>$workoutview]);
    }

    public function workoutdelete($id){
        $data = Workout::findOrFail($id);
        $image_name = $data['image'];
        $video_name =$data['video'];

        $data->delete();

        if(File::exists(public_path().'/upload/'.$image_name)){
            File::delete(public_path().'/upload/'.$image_name);
        }
        if(File::exists(public_path().'/upload/'.$video_name)){
            File::delete(public_path().'/upload/'.$video_name);
        }
        return back()->with(['success'=>'Workout delete success.']);
    }

    public function workoutedit($id){
        $data = Workout::where('id',$id)->first();
        //dd($data->toArray());
        return view('admin.workout.workoutedit')->with(['data'=>$data]);
    }

    public function workoutupdate($id, Request $request){
        $check = Workout::findOrFail($id);

        if($request->hasFile('video')) {
            $video = $request->file('video');
            $video_name =uniqid().'_'. $video->getClientOriginalName();
            $video->move(public_path().'/upload/',$video_name);
        }else{
            $video_name = $check->video;
        }
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name =uniqid().'_'. $image->getClientOriginalName();
            $image->move(public_path().'/upload/',$image_name);
        }else{
            $image_name = $check->image;
        }

        $check->workout_name = $request->workoutname ?? $check->workout_name;
        $check->gender_type = $request->gendertype ?? $check->gender_type;
        $check->workout_level = $request->workoutlevel ?? $check->workout_level;
        $check->time = $request->time ?? $check->time;
        $check->calories = $request->calories ?? $check->calories;
        $check->image = $image_name;
        $check->video = $video_name;
        $check->update();
        return redirect('/workout');
    }
}
